<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GoogleRecaptcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->has("r")) {
            abort(403);
        }

        return $next($request);
    }
}
