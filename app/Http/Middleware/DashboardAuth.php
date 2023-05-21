<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            
            return redirect()->route('getLogin')->with('error', 'You should log in first !!');
        }else{
            if (!auth()->user()->role =='ADMIN') {
                return redirect()->route('getLogin')->with('error', 'You are not an admin !!');
            }
        }
        return $next($request);
    }
}
