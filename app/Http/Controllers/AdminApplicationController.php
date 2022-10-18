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
    public function download($id)
    {
        $application = Application::where('UserNo', $id)->firstOrFail();
        return response()->download(public_path(('application/' . $application->ApplicationForm), ($application->UserNo)));
    }

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $user = Application::orderBy('Name', 'ASC')
            ->where('Name', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $user = Application::orderBy('Name', 'ASC')
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
        $application = Application::where('ApplicationForm', $id)->firstOrFail();
        return view('Admin.Application.show')->with('application', $application);
    }

    public function edit($id)
    {
        $application = Application::where('UserNo', $id)->firstOrFail();
        return view('Admin.Application.edit')->with('application', $application);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ApplicationForm' => ['required', 'mimes:pdf']
        ]);

        $applicationform = time() . '-' . $request->input('ApplicationForm') . '.' . $request->file('ApplicationForm')->extension();
        $request->file('ApplicationForm')->move(public_path('application'), $applicationform);

        $application = Application::where('userno', $id)->firstOrFail();
        $application->ApplicationForm = $applicationform;
        $application->update();
        return view('Admin.Application.index')->with('application', $application);
    }

    public function destroy($id)
    {
        //
    }
}
