<?php

namespace App\Http\Middleware;

use App\Http\Controllers\LoginController;
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

            if (!session()->has('user')) {
                return redirect('/login');
            } else {
               dd(session()->get('user'));
            }
        }
}
