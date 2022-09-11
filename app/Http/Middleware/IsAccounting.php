<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAccounting
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->position == 'Accounting')
        {
            return $next($request);
        }

        if (Auth::user()->position == 'Admin')
        {
            return $redirect()->route('Admin');
        }

        if (Auth::user()->position == 'Human Resources')
        {
            return $redirect()->route('HumanResources');
        }

        if (Auth::user()->position == 'Employee')
        {
            return $redirect()->route('Employee');
        }
    }
}
