<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash, Session;

class HumanResourcesChangePasswordController extends Controller
{
    public function index()
    {

      return view('HumanResources.accountsettings');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
          'current_password' => 'required',
          'password' => 'required|string|min:6|confirmed',
          'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password successfully changed!');
    }
}
