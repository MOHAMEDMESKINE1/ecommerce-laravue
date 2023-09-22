<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       try {
            if (!Auth::check() && !Auth::user()->role === 'admin') {
                
                return $next($request);
        
            }
       } catch (Exception $ex) {
            response()->json([
                "Error AdminMidlleware  :".$ex->getMessage() 
            ]);
       }
      
    }
}
