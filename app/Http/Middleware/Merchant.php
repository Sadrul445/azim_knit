<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Merchant
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && (Auth::user()->usertype === 'merchandiser' || Auth::user()->usertype === 'admin')) {
            return $next($request);
        }

        return redirect('/');
    }
}
