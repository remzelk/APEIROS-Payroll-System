<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HumanResourcesController extends Controller
{
    public function index()
    {
        return view('HumanResources.index');
    }

    public function profile()
    {
        return view('HumanResources.profile', ['EmployeeList'=>$this->EmployeeList]);
    }

    public function addemployee()
    {
        
        return view('HumanResources.addemployee');
    }

    public function editemployee()
    {
        
        return view('HumanResources.editemployee');
    }

    public function accountsettings()
    {
        return view('HumanResources.accountsettings');
    }
}
