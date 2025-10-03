<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class setLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('lang'))
        {
            app()->setLocale(session('lang'));
        }
        else
        {
            app()->setLocale('az');
        }
        return $next($request);
    }
}
