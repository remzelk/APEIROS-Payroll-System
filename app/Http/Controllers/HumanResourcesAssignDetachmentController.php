<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detachments;
use App\Models\User;
use App\Models\Application;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class HumanResourcesAssignDetachmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $assign = Application::join('users', 'users.userno', '=', 'application.UserNo')
            ->select('users.*', 'application.*')
            ->orderBy('Name', 'ASC')
            ->where('Name', 'LIKE', "%$search%")
            ->orwhere('Position', 'LIKE', '4')
            ->orwhere('Position', 'LIKE', '5')
            ->whereNull('users.deleted_at')
            ->get();
        }
        else{
            $assign = Application::join('users', 'users.userno', '=', 'application.UserNo')
            ->select('users.*', 'application.*')
            ->orderBy('Name', 'ASC')
            ->orwhere('Position', 'LIKE', '4')
            ->orwhere('Position', 'LIKE', '5')
            ->whereNull('users.deleted_at')
            ->get();
        }
        $detachment = Detachments::all();
        $data = compact('assign', 'search', 'detachment');
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
        $assign = Application::join('users', 'users.userno', '=', 'application.UserNo')
            ->select('users.*', 'application.*')
            ->orderBy('Name', 'ASC')
            ->where('application.userno', 'LIKE', $id)
            ->firstOrFail();
        $detachment = Detachments::all();
        $data = compact('assign', 'detachment');
        return view('HumanResources.AssignDetachment.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $application = Application::where('userno', $id)->firstOrFail();
        $application->DCode = $request->input('DCode');
        $application->update();
        return redirect('/HumanResources/AssignDetachments');
    }

    public function destroy($id)
    {
        //
    }
}
