<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ChiefApplicationController extends Controller
{
    public function index()
    {
        //
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
        $application=Application::where('userno', $id)->firstOrFail();
        return view('Chief.Application.index')->with('application', $application);
    }

    public function edit($id)
    {
        $application = Application::where('userno', $id)->firstOrFail();
        return view('Chief.Application.edit')->with('application', $application);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ApplicationForm' => ['required', 'mimes:pdf']
        ]);

        $applicationform = time() . '-' . Auth::user()->userno . '.' . $request->file('ApplicationForm')->extension();
        $request->file('ApplicationForm')->move(public_path('application'), $applicationform);

        $application = Application::where('userno', $id)->firstOrFail();
        $application->Address = $request->input('Address');
        $application->Phone = $request->input('Phone');
        $application->Email = $request->input('Email');
        $application->SSS = $request->input('SSS');
        $application->PagIbig = $request->input('PagIbig');
        $application->Philhealth = $request->input('Philhealth');
        $application->TIN = $request->input('TIN');
        $application->Submitted = $request->input('Submitted');
        $application->ApplicationForm = $applicationform;
        $application->update();
        return view('Chief.Application.index')->with('application', $application)->with('message', 'Application added successfully!');;
    }

    public function destroy($id)
    {
        //
    }
}
