<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class EmployeesController extends Controller
{
    public function index()
    {
        $announcement = Announcement::all();
        return view('Employee.index')->with('announcement', $announcement);
    }

    public function profile()
    {
        return view('Employee.profile', ['EmployeeList'=>$this->EmployeeList]);
    }

    public function payslipscurrent()
    {
        
        return view('Employee.Payslips.current');
    }

    public function payslipsarchive()
    {
        
        return view('Employee.Payslips.archive');
    }

    public function attendance()
    {
        
        return view('Employee.attendance');
    }

    public function leaverequest()
    {
        
        return view('Employee.leave');
    }

    public function bir()
    {
        
        return view('Employee.birform');
    }

    public function accountsettings()
    {
        return view('Employee.accountsettings');
    }
}
