<?php

namespace Michelmelo\LaravelTelegramLogs;

use Illuminate\Support\ServiceProvider;
use Michelmelo\LaravelTelegramLogs\Commands\LaravelTelegramLogsCommand;

class LaravelTelegramLogsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-telegram-logs.php' => config_path('laravel-telegram-logs.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/laravel-telegram-logs'),
            ], 'views');

            $migrationFileName = 'create_laravel_telegram_logs_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->commands([
                LaravelTelegramLogsCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-telegram-logs');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-telegram-logs.php', 'laravel-telegram-logs');
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
