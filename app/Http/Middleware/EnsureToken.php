<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->header('Authorization') == 'Bearer Qpq6EC13vwIFpV8GYCF#') {
            return $next($request);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
