<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

it('loads package translation lines', function () {
    expect(__('filament-feature-showcase::messages.actions.close'))
        ->toBe('Close');

    expect(__('filament-feature-showcase::messages.header.version', ['version' => '1.2.0']))
        ->toBe('Version 1.2.0');
});

it('can publish package translations', function () {
    Artisan::call('vendor:publish', [
        '--tag' => 'filament-feature-showcase-translations',
        '--force' => true,
    ]);

    $possiblePaths = [
        lang_path('vendor/filament-feature-showcase/en/messages.php'),
        resource_path('lang/vendor/filament-feature-showcase/en/messages.php'),
    ];

    expect(collect($possiblePaths)->contains(fn (string $path) => File::exists($path)))
        ->toBeTrue();
});

it('keeps plain changelog strings unchanged when passed through translations', function () {
    expect(__('Dark Mode Support'))->toBe('Dark Mode Support');
    expect(__('Toggle between light and dark themes.'))->toBe('Toggle between light and dark themes.');
});