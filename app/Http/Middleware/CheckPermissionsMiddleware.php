<?php

namespace App\Http\Middleware;


use Closure;

class CheckPermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!c_u_p($request)){
            abort(403);
        }
        return $next($request);
    }
}
