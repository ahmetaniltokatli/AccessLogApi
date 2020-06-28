<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Log;

class RequestLogMiddleware
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
        Log::info( 'Action Name: ' .  class_basename(\Illuminate\Support\Facades\Route::current()->getActionName()) .  ' - Request Ip: '. $request->ip() . ' - Date: ' . now());
        return $next($request);
    }
}
