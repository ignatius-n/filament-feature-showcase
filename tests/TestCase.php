<?php

namespace HeliosLive\FilamentFeatureShowcase\Tests;

use HeliosLive\FilamentFeatureShowcase\FeatureShowcaseServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            FeatureShowcaseServiceProvider::class,
        ];
    }
}