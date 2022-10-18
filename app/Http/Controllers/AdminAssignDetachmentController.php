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

class AdminAssignDetachmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $assign = Application::orderBy('Name', 'ASC')
            ->where('UserNo', 'LIKE', "%$search%")
            ->orwhere('Name', 'LIKE', "%$search%")    
            ->orwhere('DCode', 'LIKE', "%$search%")    
            ->orwhere('Detachment', 'LIKE', "%$search%")
            ->orwhere('Location', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $assign = Application::orderBy('Name', 'ASC')->get();
        }
        $data = compact('assign', 'search');
        return view('Admin.AssignDetachment.index')->with($data);
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
        $assign = Application::orderBy('Name', 'ASC')
            ->where('UserNo', 'LIKE', $id)
            ->firstOrFail();
        $detachment = Detachments::all();
        $data = compact('assign', 'detachment');
        return view('Admin.AssignDetachment.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $application = Application::where('userno', $id)->firstOrFail();
        $application->DCode = $request->input('DCode');
        $d = Detachments::where('DCode', $application->DCode)->firstOrFail();
        $application->Detachment = $d->Detachment;
        $application->Location = $d->Location;
        $application->update();
        return redirect('/Admin/AssignDetachments');
    }

    public function destroy($id)
    {
        //
    }
}
