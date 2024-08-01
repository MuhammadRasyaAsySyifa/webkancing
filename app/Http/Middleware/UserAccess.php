<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            if (Auth::user()->role == $role) {
                return $next($request);
            }
            return redirect('/')->with('error', 'Anda bukan admin, silahkan kembali');
        }
    }
}
