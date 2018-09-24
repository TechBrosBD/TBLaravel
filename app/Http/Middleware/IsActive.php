<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isActive
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
        if(Auth::check() && Auth::user()->isActive != '1'){
            Auth::logout();
            return redirect('/login')->withErrors('Your account has been suspended. Please contact Administrator.');
        } 
        return $next($request);
    }
}
