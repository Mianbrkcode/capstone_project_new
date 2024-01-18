<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Sector
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if($request->user() && $request->user()->role == 'Admin')
        {
            return $next($request);
        }
        
        else{
            // return abort( 403, 'Unauthorized User.');
            return redirect()->back();
        }
    
    }
}
