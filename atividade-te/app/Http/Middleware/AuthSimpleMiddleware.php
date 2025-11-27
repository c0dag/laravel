<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthSimpleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('usuario_logado')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
