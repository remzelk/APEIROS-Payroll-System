<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AdminAnnouncementController extends Controller
{
    public function index()
    {
        $announcement = Announcement::all();
        return view('Admin.Announcement.index')->with('announcement', $announcement);
    }

    public function create()
    {
        return view('Admin.Announcement.add');
    }

    public function store(Request $request)
    {
        $announcement = new Announcement();
        $announcement->DateStart = request('DateStart');
        $announcement->DateEnd = request('DateEnd');
        $announcement->Description = request('Description');
        $announcement->save();
        return redirect('/Admin');
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('Admin.Announcement.edit')->with('announcement', $announcement);
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->DateStart = $request->input('DateStart');
        $announcement->DateEnd = $request->input('DateEnd');
        $announcement->Description = $request->input('Description');
        $announcement->update();
        return redirect('/Admin');
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
        return redirect('/Admin');
    }
}
