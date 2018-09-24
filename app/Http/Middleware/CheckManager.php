<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckManager
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
        if(Auth::check() && Auth::user()->role != 'manager' && Auth::user()->role != 'admin'){
            Auth::logout();
            return redirect('/login')->withErrors('Only Admin and Managers may access this page.');
        }
        return $next($request);
    }
}
