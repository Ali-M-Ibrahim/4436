<?php

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
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
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'User not authenticated'
                ], 403);
            }
        });
    })->create();
