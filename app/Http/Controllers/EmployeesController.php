<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class EmployeesController extends Controller
{
    public function settings(Request $request)
    {
        return view('Employee.accountsettings');
    }

    public function index()
    {
        $announcement = Announcement::all();
        return view('Employee.index')->with('announcement', $announcement);
    }

}
