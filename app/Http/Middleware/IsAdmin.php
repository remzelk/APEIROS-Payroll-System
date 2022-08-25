<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->position == 'Admin')
        {
            return $next($request);
        }

        return redirect('Admin.login')->with('error', "Access denied.");
    }
}
