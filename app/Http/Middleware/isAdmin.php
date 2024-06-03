<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        /* .... this is middleware for some role .... */
        if(auth()->check()){
            if(auth()->user()->role == 'admin'){
                return $next($request);
            }else{
                return to_route('user.home');
            }
        }

    }
}
