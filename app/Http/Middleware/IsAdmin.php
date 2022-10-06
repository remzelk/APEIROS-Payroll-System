<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->position == 1)
        {
            return $next($request);
        }

        if (Auth::user()->position == 2)
        {
            return $redirect()->route('HumanResources.index');
        }

        if (Auth::user()->position == 3)
        {
            return $redirect()->route('Accounting.index');
        }

        if (Auth::user()->position == 4)
        {
            return $redirect()->route('Employee.index');
        }

        if (Auth::user()->position == 5)
        {
            return $redirect()->route('Chief.index');
        }
    }
}
