<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class UploadRouteProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(function () {
                Route::post('/upload', [\App\Http\Controllers\VideoUploadController::class, 'store']);
                Route::get('/tes', function () {
                    return ['message' => 'API OK from provider'];
                });
            });
    }
}
