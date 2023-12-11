<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(Auth::user());
        if (Auth::user()->role == 'teacher') {
            return $next($request);
        } else {
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect('admin/dashboard');
                    break;
                case 'user':
                    return redirect('user/dashboard');
                    break;
                
                default:
                    return abort(403);
                    break;
               }
        }
    }
}
