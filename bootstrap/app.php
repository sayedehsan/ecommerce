<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;



return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // web: __DIR__.'/../routes/web.php',
        web: [
            __DIR__.'/../routes/web.php',
            __DIR__.'/../routes/auth.php',
            // __DIR__.'/../routes/admin.php',
            // __DIR__.'/../routes/vendor.php',
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix('auth')
                ->name('auth.')
                ->group(base_path('routes/auth.php'));

            Route::middleware(['web', 'auth', 'role:vendor'])
                ->prefix('vendor')
                ->name('vendor.')
                ->group(base_path('routes/vendor.php'));

            Route::middleware(['web','auth', 'role:admin'])
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));
        },

    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(['role'=>RoleMiddleware::class]);
        })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
