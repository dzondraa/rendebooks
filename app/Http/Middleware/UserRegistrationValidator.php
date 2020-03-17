<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserRegistrationValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'username' => 'required|unique:users|max:25',
            'email' => 'required|email address',
        ]);

        dd($validatedData);

        return $next($request);
    }
}
