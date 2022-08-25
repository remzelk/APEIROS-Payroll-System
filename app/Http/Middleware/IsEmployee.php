<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsEmployee
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->position == 'Employee')
        {
            return $next($request);
        }

        return redirect('Employee.login')->with('error', "Access denied.");
    }
}
