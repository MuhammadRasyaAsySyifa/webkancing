<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user(); // Mengambil objek User yang sedang login
    
        if ($user && $user->isAdmin()) {
            return $next($request);
        }
    
        return redirect('/'); // Redirect jika pengguna bukan admin
    }
    
}

