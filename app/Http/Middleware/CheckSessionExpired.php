<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Routes yang memerlukan authentication
        $protectedRoutes = [
            'data-warga.*',
            'dashboard',
            'profile.*'
        ];

        // Check if current route requires authentication
        $requiresAuth = false;
        foreach ($protectedRoutes as $pattern) {
            if ($request->routeIs($pattern)) {
                $requiresAuth = true;
                break;
            }
        }

        // If route requires auth but user is not authenticated
        if ($requiresAuth && !Auth::check()) {
            if ($request->expectsJson()) {
                // For AJAX requests
                return response()->json([
                    'message' => 'Session expired. Please login again.',
                    'redirect' => route('login'),
                    'session_expired' => true
                ], 401);
            } else {
                // For regular web requests
                return redirect()->route('login')
                    ->with('warning', 'Session Anda telah habis. Silakan login kembali untuk melanjutkan.')
                    ->with('redirect_after_login', $request->fullUrl());
            }
        }

        return $next($request);
    }
}
