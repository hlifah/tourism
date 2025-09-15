<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the logged-in user is not the admin
        if (Auth::check() && Auth::user()->email !== 'asma@gmail.com') {
            return redirect('/'); // Redirect non-admin users to home
        }

        return $next($request);
    }
}
