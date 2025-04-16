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
            'checkIfAuthenticated' => \App\Http\Middleware\CheckAuthentication::class
        ]);

        //global middleware
//        $middleware->append(\App\Http\Middleware\CheckAuthentication::class);



        $middleware->validateCsrfTokens(except: [
            'post',
            'put',
            'delete',
            "create-m3",
            "create-m4",
            "update-m2/*",
            "update-m3/*"
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
