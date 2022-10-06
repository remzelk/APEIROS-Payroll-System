<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AccountingController extends Controller
{
    public function index()
    {
        $announcement = Announcement::all();
        return view('Accounting.index')->with('announcement', $announcement);
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
