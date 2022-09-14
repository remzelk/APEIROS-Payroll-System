<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo;
    
    public function redirectTo() 
    {
        switch (Auth::user()->position)
        {
            case 1:
                $this->redirectTo = '/Admin';
                return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = '/HumanResources';
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = '/Accounting';
                return $this->redirectTo;
                break;
            case 4:
                $this->redirectTo = '/Employee';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
                break;
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
