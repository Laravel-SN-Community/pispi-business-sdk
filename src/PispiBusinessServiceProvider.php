<?php

namespace PispiBusiness\PispiBusiness;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PispiBusiness\PispiBusiness\Commands\PispiBusinessCommand;

class PispiBusinessServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('pispi-business-sdk')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_pispi_business_sdk_table')
            ->hasCommand(PispiBusinessCommand::class);
    }
}
