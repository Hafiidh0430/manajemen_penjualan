<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (Auth::check() &&  Auth::user()->level === 'admin') {
            return $next($request);
        } else {
            if (Auth::check() && in_array(Auth::user()->level, $roles)) {
                return $next($request);
            } else {
                return redirect()->to('/login', 302);
            }
        }
    }
}
