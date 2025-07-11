<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class DetectLocaleFromDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Str::startsWith($request->getHost(), ['id.', 'www.id.'])) {
            App::setLocale('id');
        } elseif (Str::startsWith($request->getHost(), ['en.', 'www.en.'])) {
            App::setLocale('en');
        }

        return $next($request);
    }
}
