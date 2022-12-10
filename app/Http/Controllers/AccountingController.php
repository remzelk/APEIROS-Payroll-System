<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AccountingController extends Controller
{
    public function settings(Request $request)
    {
        return view('Accounting.accountsettings');
    }

    public function index()
    {
        $announcement = Announcement::all();
        return view('Accounting.index')->with('announcement', $announcement);
    }
}
