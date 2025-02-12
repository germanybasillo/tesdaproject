<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictAdminAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            if (in_array($request->route()->getName(), [
                'qualification.one',
                'qualification.two',
                'qualification.three',
                'qualification.four',
                 'apply',
            ])) {
                return response()->view('restricted');
            }
        }
        return $next($request);
    }
}
