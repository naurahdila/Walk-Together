<?php

namespace App\Providers;
<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\AuthCheckMiddleware;
=======

use Illuminate\Support\ServiceProvider;
>>>>>>> d-putra

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

<<<<<<< HEAD
    

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Mendaftarkan middleware kustom
        Route::aliasMiddleware('auth-check', AuthCheckMiddleware::class);
=======
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
>>>>>>> d-putra
    }
}
