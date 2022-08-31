<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->position == 'Admin')
        {
            return $next($request);
        }

        if (Auth::user()->position == 'Human Resources')
        {
            return $redirect()->route('HumanResources');
        }

        if (Auth::user()->position == 'Accounting')
        {
            return $redirect()->route('Accounting');
        }

        if (Auth::user()->position == 'Employee')
        {
            return $redirect()->route('Employee');
        }
    }
}
