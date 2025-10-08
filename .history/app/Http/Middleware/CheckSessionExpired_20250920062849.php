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
        // Check if user is supposed to be authenticated but session is null
        if ($request->expectsJson()) {
            // For AJAX requests
            if (!Auth::check()) {
                return response()->json([
                    'message' => 'Session expired. Please login again.',
                    'redirect' => route('login')
                ], 401);
            }
        } else {
            // For regular web requests
            if (!Auth::check() && $request->routeIs('data-warga.*')) {
                return redirect()->route('login')->with('error', 'Session Anda telah habis. Silakan login kembali.');
            }
        }

        return $next($request);
    }
}
