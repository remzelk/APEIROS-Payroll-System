<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('Admin.login');
    }

    public function accountsettings()
    {
        return view('Admin.accountsettings');
    }
}
