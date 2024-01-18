<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        // if (!Auth::check() || Auth::user()->usertype !== $usertype) {
        //     abort(403, 'Unauthorized action.');
        // }

        // return $next($request);

        if($request->user() && $request->user()->role == 'Super Admin')
        {
            return $next($request);
        }
        
        else{
            return redirect()->back();
            // return abort( 403, 'Unauthorized User.');
        }
    
        
    }
}
