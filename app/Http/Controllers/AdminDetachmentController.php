<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detachments;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminDetachmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $detachment = Detachments::where('Detachment', 'LIKE', "%$search%")
            ->orwhere('Region', 'LIKE', "%$search%")
            ->orwhere('Location', 'LIKE', "%$search%")
            ->orwhere('DCode', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $detachment = Detachments::all();
        }
        $data = compact('detachment', 'search');
        return view('Admin.Detachments.index')->with($data);
    }

    public function create()
    {
        return view('Admin.Detachments.add');
    }

    public function store(Request $request)
    {
        $detachment = new Detachments();
        $count = Detachments::withTrashed()->count() + 1;
        if (($count > 10) && ($count < 100))
        {
            $count = "0" . $count;
        }
        elseif ($count < 10)
        {
            $count = "00" . $count;
        }
        $detachment->Detachment = request('Detachment');
        $detachment->Location = request('Location');
        $detachment->Region = request('Region');
        $detachment->DCode = ("D" . $count);
        $detachment->ContactNo = request('ContactNo');
        $detachment->Email = request('Email');
        $detachment->Address = request('Address');
        $detachment->save();
        return redirect('/Admin/Detachments');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $detachment = Detachments::where('DCode', $id)->firstOrFail();
        return view('Admin.Detachments.edit')->with('detachment', $detachment);
    }

    public function update(Request $request, $id)
    {
        $detachment = Detachments::where('DCode', $id)->firstOrFail();
        $detachment->Detachment = $request->input('Detachment');
        $detachment->Location = $request->input('Location');
        $detachment->Region = $request->input('Region');
        $detachment->ContactNo = $request->input('ContactNo');
        $detachment->Email = $request->input('Email');
        $detachment->Address = $request->input('Address');
        $detachment->update();
        return redirect('/Admin/Detachments');
    }

    public function destroy($id)
    {
        $detachment = Detachments::where('DCode', $id)->firstOrFail();
        $detachment->delete();
        return redirect('/Admin/Detachments');
    }
}
