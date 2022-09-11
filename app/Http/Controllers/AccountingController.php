<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function index()
    {
        return view('Accounting.index');
    }

    public function profile()
    {
        return view('Accounting.profile', ['EmployeeList'=>$this->EmployeeList]);
    }

    public function accountsettings()
    {
        return view('Accounting.accountsettings');
    }
}
