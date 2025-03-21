<?php

use App\Http\Middleware\CheckAgentRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->validateCsrfTokens(except: [
            '/verification/upload',
            '/palmpay/webhook',
            '/funding-request',
            '/read',

        ]);

        $middleware->alias([
            'check.agent' => \App\Http\Middleware\CheckAgentRole::class,
            'is_kyced' => \App\Http\Middleware\IsKyced::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
