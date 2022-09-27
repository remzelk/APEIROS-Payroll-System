<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.index');
    }

    public function profile()
    {
        return view('Admin.profile', ['EmployeeList'=>$this->EmployeeList]);
    }

    public function addemployee()
    {
        
        return view('Admin.addemployee');
    }

    public function editemployee()
    {
        
        return view('Admin.editemployee');
    }

    public function accountsettings()
    {
        return view('Admin.accountsettings');
    }
}
