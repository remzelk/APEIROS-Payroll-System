<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminProfileListController extends Controller
{

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $user = User::orderBy('name', 'ASC')
            ->where('position', 'LIKE', "4")
            ->orwhere('position', 'LIKE', "5")
            ->orwhere('name', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $user = User::orderBy('name', 'ASC')
            ->where('position', 'LIKE', "4")
            ->orwhere('position', 'LIKE', "5")
            ->get();
        }
        $data = compact('user', 'search');
        return view('Admin.ProfileList.index')->with($data);
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
        $profile = Profile::where('UserNo', $id)->firstOrFail();
        $user = User::where('userno', $id)->firstOrFail();
        $data = compact('profile', 'user');
        return view('Admin.ProfileList.show')->with($data);
    }

    public function edit($id)
    {
        $profile = Profile::where('UserNo', $id)->firstOrFail();
        return view('Admin.ProfileList.edit')->with('profile', $profile);
    }

    public function update(Request $request, $id)
    {
        if( $request->file('Image') != NULL)
        {
            $request->validate([
                'Image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);

            $imagename = time() . '-' . $request->input('LastName') . '.' . $request->file('Image')->extension();
            $request->file('Image')->move(public_path('images'), $imagename);
        }

        $profile = Profile::where('UserNo', $id)->firstOrFail();
        if( $request->file('Image') != NULL)
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
        return redirect('/Admin/ProfileList/' . $profile->UserNo);
    }

    public function destroy($id)
    {
        //
    }
}
