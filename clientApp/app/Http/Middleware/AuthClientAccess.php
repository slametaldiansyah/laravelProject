<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthClientAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (session()->has('token')) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
