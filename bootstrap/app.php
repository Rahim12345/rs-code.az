<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Global middleware
        $middleware->append([
            \App\Http\Middleware\Language::class,
        ]);

        // Web group middleware eklentileri
        $middleware->web(append: [
            \App\Http\Middleware\Language::class,
            \App\Http\Middleware\TrackVisitor::class,
        ]);

        // Route middleware alias'ları
        $middleware->alias([
            'auth'             => \App\Http\Middleware\Authenticate::class,
            'guest'            => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'isLogin'          => \App\Http\Middleware\isLogin::class,
            'isLogout'         => \App\Http\Middleware\isLogout::class,
            'locale'           => \App\Http\Middleware\setLocale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
