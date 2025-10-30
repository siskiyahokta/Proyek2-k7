<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $role = $request->session()->get('auth_user_role');
        if ($role !== 'admin') {
            return redirect()->route('login')->with('status', 'Silakan login sebagai admin.');
        }
        return $next($request);
    }
}
