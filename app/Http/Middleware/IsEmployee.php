<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class IsEmployee
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->position == 4)
        {
            return $next($request);
        }
        
        if (Auth::user()->position == 1)
        {
            return $redirect()->route('Admin');
        }

        if (Auth::user()->position == 2)
        {
            return $redirect()->route('HumanResources');
        }

        if (Auth::user()->position == 3)
        {
            return $redirect()->route('Accounting');
        }
    }
}
