<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->guest()) {
            return redirect()->route('myLogin');
        }

        return $next($request);
    }
}
