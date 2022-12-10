<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detachments;
use App\Models\User;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;


class HumanResourcesAssignDetachmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $assign = User::leftjoin('detachments', 'users.dcode', '=', 'detachments.DCode')
            ->select('users.*', 'detachments.*')
            ->orderBy('name', 'ASC')
            ->where('userno', 'LIKE', "%$search%")
            ->orwhere('name', 'LIKE', "%$search%")    
            ->orwhere('users.dcode', 'LIKE', "%$search%")
            ->whereNull('users.deleted_at')
            ->get();
        }
        else{
            $assign = User::leftjoin('detachments', 'users.dcode', '=', 'detachments.DCode')
            ->select('users.*', 'detachments.*')
            ->orderBy('name', 'ASC')
            ->where('position', 'LIKE', 4)
            ->orwhere('position', 'LIKE', 5)
            ->whereNull('users.deleted_at')
            ->get();
        }
        $detachment = Detachments::all();
        $data = compact('assign', 'detachment', 'search');
        return view('HumanResources.AssignDetachment.index')->with($data);
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
        $assign = User::orderBy('Name', 'ASC')
            ->where('UserNo', 'LIKE', $id)
            ->firstOrFail();
        $detachment = Detachments::all();
        $data = compact('assign', 'detachment');
        return view('HumanResources.AssignDetachment.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('userno', $id)->firstOrFail();
        $user->dcode = $request->input('DCode');
        $user->save();
        return redirect('/HumanResources/AssignDetachments');
    }

    public function destroy($id)
    {
        //
    }
}
