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
        // Handle CSRF token mismatch (419 error)
        $exceptions->render(function (\Illuminate\Session\TokenMismatchException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Form telah kedaluwarsa. Halaman akan dimuat ulang.',
                    'csrf_expired' => true,
                    'reload_page' => true
                ], 419);
            }

            return response()->view('errors.419', [], 419);
        });

        // Handle 403 Forbidden
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Access denied.',
                    'error' => 'Forbidden'
                ], 403);
            }

            return response()->view('errors.403', [], 403);
        });

        // Handle 404 Not Found
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Resource not found.',
                    'error' => 'Not Found'
                ], 404);
            }

            return response()->view('errors.404', [], 404);
        });

        // Handle 503 Service Unavailable
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Service temporarily unavailable.',
                    'error' => 'Service Unavailable'
                ], 503);
            }

            return response()->view('errors.503', [], 503);
        });

        // Handle 429 Too Many Requests
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Too many requests. Please try again later.',
                    'error' => 'Too Many Requests'
                ], 429);
            }

            return response()->view('errors.429', [
                'retryAfter' => $e->getHeaders()['Retry-After'] ?? 60
            ], 429);
        });

        // Handle 422 Unprocessable Entity (Validation errors)
        $exceptions->render(function (\Illuminate\Validation\ValidationException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => $e->errors()
                ], 422);
            }

            // For non-AJAX requests, let Laravel handle validation normally
            return null;
        });

        // Handle 500 Internal Server Error
        $exceptions->render(function (\Throwable $e, $request) {
            // Only handle if it's not already handled by other specific handlers
            if ($e instanceof \Illuminate\Session\TokenMismatchException ||
                $e instanceof \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException ||
                $e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException ||
                $e instanceof \Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException ||
                $e instanceof \Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException ||
                $e instanceof \Illuminate\Validation\ValidationException ||
                $e instanceof \Illuminate\Auth\AuthenticationException) {
                return null; // Let other handlers handle these
            }

            // Log the error for debugging
            \Illuminate\Support\Facades\Log::error('Unhandled Exception', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'user_id' => \Illuminate\Support\Facades\Auth::id(),
            ]);

            // In development, let Laravel show the detailed error
            if (config('app.debug')) {
                return null; // Let Laravel handle it with detailed error page
            }

            // In production, show custom 500 page for server errors
            if (!$request->expectsJson()) {
                return response()->view('errors.500', [], 500);
            }

            return response()->json([
                'message' => 'Internal Server Error',
                'error' => config('app.debug') ? $e->getMessage() : 'Something went wrong'
            ], 500);
        });

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
