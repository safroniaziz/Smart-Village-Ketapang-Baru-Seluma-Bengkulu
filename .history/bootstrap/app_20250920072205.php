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
    ->withMiddleware(function (Middleware $middleware): void {
        // Register custom middleware
        $middleware->alias([
            'check.session' => \App\Http\Middleware\CheckSessionExpired::class,
        ]);
        
        // Apply session check middleware to all web routes globally
        $middleware->web([
            \App\Http\Middleware\CheckSessionExpired::class,
        ]);
        
        // Priority middleware order
        $middleware->priority([
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\CheckSessionExpired::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Handle authentication exceptions
        $exceptions->render(function (\Illuminate\Auth\AuthenticationException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Session expired. Please login again.',
                    'redirect' => route('login'),
                    'session_expired' => true
                ], 401);
            }
            
            return redirect()->route('login')
                ->with('warning', 'Session Anda telah habis. Silakan login kembali.')
                ->with('redirect_after_login', $request->fullUrl());
        });
        
        // Handle general exceptions that might expose user data
        $exceptions->render(function (\Error $e, $request) {
            // If error contains "Attempt to read property" and relates to Auth::user()
            if (str_contains($e->getMessage(), 'Attempt to read property') && 
                str_contains($e->getMessage(), 'null')) {
                
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Session expired. Please login again.',
                        'redirect' => route('login'),
                        'session_expired' => true
                    ], 401);
                }
                
                return redirect()->route('login')
                    ->with('warning', 'Session Anda telah habis. Silakan login kembali.');
            }
            
            // Let other errors be handled normally
            return null;
        });
    })->create();
