<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Allow only logged-in admins
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Block everyone else
        return redirect()->route('admin.login')
            ->with('error', 'Please login as admin');
    }
}
