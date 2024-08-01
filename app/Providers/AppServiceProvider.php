<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $ds = DIRECTORY_SEPARATOR;
        $this->loadMigrationsFrom([
            base_path("database" . $ds . "migrations" . $ds . "system"),
            base_path("database" . $ds . "migrations" . $ds . "users"),
            base_path("database" . $ds . "migrations" . $ds . "website"),
            base_path("database" . $ds . "migrations" . $ds . "events"),
            base_path("database" . $ds . "migrations" . $ds . "forms"),
        ]);
        $this->loadRoutesFrom(base_path("routes" . $ds . "auth.php"));
        $this->loadRoutesFrom(base_path("routes" . $ds . "app.php"));
    }
}
