<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // if (Auth::user()->role == 'seller') {
        //     return redirect()->route('seller');
        // }
        
        if (Auth::user()->role == 'customer') {
            return $next($request);   
        }


        

        // return $next($request);
    }
}
