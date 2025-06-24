<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('is_logged_in')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}


// Middleware SessionAuth adalah pengaman untuk route, yang memastikan hanya user yang memiliki session is_logged_in yang boleh mengakses halaman tertentu. Jika belum login, mereka akan diarahkan ke halaman login.