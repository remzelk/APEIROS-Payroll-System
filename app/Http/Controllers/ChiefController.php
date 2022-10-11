<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class ChiefController extends Controller
{
    public function index()
    {
        $announcement = Announcement::all();
        return view('Chief.index')->with('announcement', $announcement);
    }

    public function payslipscurrent()
    {
        
        return view('Chief.Payslips.current');
    }

    public function payslipsarchive()
    {
        
        return view('Chief.Payslips.archive');
    }

    public function leaverequest()
    {
        
        return view('Chief.leave');
    }

    public function bir()
    {
        
        return view('Chief.birform');
    }

    public function accountsettings()
    {
        return view('Chief.accountsettings');
    }
}
