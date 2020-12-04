<?php

namespace Erickzh\FirstPackage;

use Erickzh\FirstPackage\Commands\FirstPackageCommand;
use Illuminate\Support\ServiceProvider;

class FirstPackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/first-package.php' => config_path('first-package.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/first-package'),
            ], 'views');

            $migrationFileName = 'create_first_package_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->commands([
                FirstPackageCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'first-package');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/first-package.php', 'first-package');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
