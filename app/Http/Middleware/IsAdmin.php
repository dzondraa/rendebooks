<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
            // IF LoginController::isAdmin() - TO DO - make controller with that functionf
            if (true) {
                return $next($request);
            }

            return redirect('/');
        }
}
