<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAccounting
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->position == 'Accounting')
        {
            return $next($request);
        }

        return redirect('Accounting.login')->with('error', "Access denied.");
    }
}
