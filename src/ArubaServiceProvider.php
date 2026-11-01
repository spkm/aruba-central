<?php

namespace spkm\ArubaCentral;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ArubaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('aruba')
            ->hasConfigFile('aruba')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->publishConfigFile();
            });

        $this->app->singleton('aruba', fn ($app) => new ArubaService);
    }
}
