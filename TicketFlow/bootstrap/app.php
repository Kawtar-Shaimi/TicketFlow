<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
            'client' => \App\Http\Middleware\Client::class,
            'developer' => \App\Http\Middleware\Developer::class,
        ]);
        $middleware->redirectUsersTo(fn ($user) => match ($user->role) {
            'admin' => 'admin.index',
            'client' => 'clients.index',
            'developer' => 'developer.index',
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
