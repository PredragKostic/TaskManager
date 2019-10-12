<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
    
        if(!auth()->check()){
            return redirect('login');
        }elseif(!auth()->user()->isAdmin()){
            return redirect('admin/home');
        }

        return $next($request);
    }
}

