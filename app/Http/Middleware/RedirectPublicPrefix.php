<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectPublicPrefix
{
    public function handle(Request $request, Closure $next)
    {
        $uri = $request->getRequestUri(); // /public/veb-saytlarin-hazirlanmasi?foo=bar

        if (str_starts_with($uri, '/public/')) {
            $newUri = substr($uri, strlen('/public'));
            return redirect($newUri, 301);
        }

        return $next($request);
    }
}
