<?php

namespace App\Http\Middleware;

use Closure;

class AuthKey
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
        if($request->header('APP_KEY') == env('PUSHER_APP_KEY'))  return $next($request);
        else return response()->json(['error' => 'APP KEY not found.']);

    }
}
