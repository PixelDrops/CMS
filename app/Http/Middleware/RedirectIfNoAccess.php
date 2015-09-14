<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNoAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        $request->user();
        // Check Appropriate Access

        return $next($request);
    }
}
