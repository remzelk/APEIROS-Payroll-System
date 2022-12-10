<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class ChiefController extends Controller
{
    public function settings(Request $request)
    {
        return view('Chief.accountsettings');
    }

    public function index()
    {
        $announcement = Announcement::all();
        return view('Chief.index')->with('announcement', $announcement);
    }
}
