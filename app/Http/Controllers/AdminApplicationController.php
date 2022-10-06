<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Application;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminApplicationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $user = User::orderBy('Name', 'ASC')
            ->where('Name', 'LIKE', "%$search%")
            ->where('Position', 'LIKE', '2')
            ->where('Position', 'LIKE', '3')
            ->where('Position', 'LIKE', '4')
            ->where('Position', 'LIKE', '5')
            ->get();
        }
        else{
            $user = User::orderBy('Name', 'ASC')
            ->where('Position', 'LIKE', '2')
            ->where('Position', 'LIKE', '3')
            ->where('Position', 'LIKE', '4')
            ->where('Position', 'LIKE', '5')
            ->get();
        }
        $data = compact('user', 'search');
        return view('Admin.Application.index')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $application = Application::where('userno', $id)->firstOrFail();
        return view('Admin.Application.show')->with('application', $application);
    }

    public function edit($id)
    {
        $application = Application::where('userno', $id)->firstOrFail();
        return view('Admin.Application.edit')->with('application', $application);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Image' => ['required', 'image', 'mimes:pdf', 'max:2048'],
            'Sketch' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $imagename = time() . '-' . $request->input('LastName') . '.' . $request->file('Image')->extension();
        $sketchname = time() . '-' . $request->input('LastName') . '.' . $request->file('Sketch')->extension();
        $request->file('Image')->move(public_path('images'), $imagename);
        $request->file('Sketch')->move(public_path('sketch'), $sketchname);

        $application = Application::where('userID', $id)->firstOrFail();
        $application->Image = $imagename;
        $application->update();
        return view('Admin.Application.application')->with('application', $application);
    }

    public function destroy($id)
    {
        //
    }
}
