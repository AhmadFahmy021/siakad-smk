<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (Auth::user()->role == 'admin') {
            return $next($request);
        } else {
            switch (Auth::user()->role) {
                case 'user':
                    return redirect('user/dashboard');
                    break;
                case 'teacher':
                    return redirect('teacher/dashboard');
                    break;
                
                default:
                    return abort(403);
                    break;
               }
        }
    }
}
