<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch (Auth::guard($guard)->user()->position)
                {
                    case 1:
                        return redirect('/Admin');
                        break;
                    case 2:
                        return redirect('/HumanResources');
                        break;
                    case 3:
                        return redirect('/Accounting');
                        break;
                    case 4:
                        return redirect('/Employee');
                        break;
                    default:
                        return redirect('/login');
                        break;
                }
            }
        }

        return $next($request);
    }
}
