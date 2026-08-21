<?php

use App\Http\Middleware\VerificarSesion;
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
        // Alias del middleware que verifica la sesión de SIGO
        // (equivalente a validar sesión iniciada, como en el proyecto original en PHP puro)
        $middleware->alias([
            'sesion' => VerificarSesion::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
