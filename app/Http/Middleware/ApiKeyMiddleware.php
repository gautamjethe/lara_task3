<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle($request, Closure $next)
{
    if ($request->api_token != 'helloatg') {
       // return response()->json('Invalid API key', 401);
        return response()->json([
            'message' => 'Invalid API key', 'status'=>'0'
        ], 401);
    } 


    return $next($request);
}
}
