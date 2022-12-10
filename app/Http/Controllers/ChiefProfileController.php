<?php

namespace App\Http\Controllers;

use Session;
use App\Models\PayrollCode;
use App\Models\Attendance;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;

class ChiefProfileController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->user()->userno;
        $profile=Profile::where('UserNo', $id)->firstOrFail();
        return view('Chief.Profile.index')->with('profile', $profile);
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
        //
    }

    public function edit($id)
    {
        $profile = Profile::where('UserNo', $id)->firstOrFail();
        return view('Chief.Profile.edit')->with('profile', $profile);
    }

    public function update(Request $request, $id)
    {
        if($request->file('Image') != NULL)
        {
        $request->validate([
            'Image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);

        $imagename = time() . '-' . $request->input('LastName') . '.' . $request->file('Image')->extension();
        $request->file('Image')->move(public_path('images'), $imagename);
        }

        $profile = Profile::where('UserNo', $id)->firstOrFail();
        if($request->file('Image') != NULL)
        {
        $profile->Image = $imagename;
        }
        $profile->LastName = $request->input('LastName');
        $profile->FirstName = $request->input('FirstName');
        $profile->MiddleName = $request->input('MiddleName');
        $profile->Extension = $request->input('Extension');
        $profile->MP = $request->input('MP');
        $profile->NickName = $request->input('NickName');
        $profile->Email = $request->input('Email');
        $profile->CurrentAddress = $request->input('CurrentAddress');
        $profile->PermanentAddress = $request->input('PermanentAddress');
        $profile->ContactNumber = $request->input('ContactNumber');
        $profile->DateOfBirth = $request->input('DateOfBirth');
        $profile->PlaceOfBirth = $request->input('PlaceOfBirth');
        $profile->Nationality = $request->input('Nationality');
        $profile->Sex = $request->input('Sex');
        $profile->MaritalStatus = $request->input('MaritalStatus');
        $profile->Religion = $request->input('Religion');
        $profile->CPName = $request->input('CPName');
        $profile->CPRelationship = $request->input('CPRelationship');
        $profile->CPAddress = $request->input('CPAddress');
        $profile->CPContactNumber = $request->input('CPContactNumber');
        $profile->SSS = $request->input('SSS');
        $profile->PagIbig = $request->input('PagIbig');
        $profile->Philhealth = $request->input('Philhealth');
        $profile->TIN = $request->input('TIN');
        $profile->update();
        return redirect('/Chief/Profile');
    }

    public function destroy($id)
    {
        //
    }
}
