<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsHumanResources
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->position == 'Human Resources')
        {
            return $next($request);
        }

        return redirect('HumanResources.login')->with('error', "Access denied.");
    }
}
