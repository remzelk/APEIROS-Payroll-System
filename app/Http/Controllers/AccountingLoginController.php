<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AccountingLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = "/Accounting";

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->Position == 'Accounting') {
                return redirect()->route('accounting.index');
            }else{
                return redirect()->route('accounting.login');
            }
        }else{
            return redirect()->route('accounting.login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}
