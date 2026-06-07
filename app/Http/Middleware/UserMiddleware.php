<?php

namespace App\Http\Middleware;

use App\Models\role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (! Auth::check()) {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->role->id == role::RoleName['Merchant']) {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->role->id == role::RoleName['User']) {
            return $next($request);
        }

        return redirect()->route('website.login');
    }
}
