<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detachments;
use App\Models\BIR;
use App\Models\User;
use Carbon\Carbon;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class HumanResourcesBIRController extends Controller
{
    public function view($id)
    {
        $bir = BIR::where('BIRForm', $id)->firstORFail();
        return view('HumanResources.BIR.view')->with('bir', $bir);
    }

    public function download($id)
    {
        $bir = BIR::where('BIRForm', $id)->firstORFail();
        return response()->download(public_path(('bir/' . $bir->BIRForm), ($bir->BIRForm)));
    }

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $bir = BIR::select('Year')
            ->orderBy('Year', 'DESC')
            ->orwhere('Year', 'LIKE', "%$search%")
            ->distinct()
            ->get();
        }
        else{
            $bir = BIR::select('Year')
            ->orderBy('Year', 'DESC')
            ->distinct()
            ->get();
        }
        $data = compact('bir', 'search');
        return view('HumanResources.BIR.index')->with($data);
    }

    public function create()
    {
        $user = User::orderBy('userno', 'ASC')
        ->where('position', 'LIKE', '4')
        ->orwhere('position', 'LIKE', '5')
        ->get();
        $year =  Carbon::now()->year;
        $data = compact('user', 'year');
        return view('HumanResources.BIR.add')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'BIRForm' => ['required', 'mimes:pdf']
        ]);

        $birform = time() . '-' . request('UserNo') . '.' . $request->file('BIRForm')->extension();
        $request->file('BIRForm')->move(public_path('bir'), $birform);

        $bir = new BIR();
        $bir->UserNo = request('UserNo');
        $user = User::where('userno', 'LIKE', $bir->UserNo)->firstOrFail();
        $bir->Name = $user->name;
        $bir->Year = request('Year');
        $bir->BIRForm = $birform;
        $b = BIR::withTrashed()->where('Year', 'LIKE', $bir->Year)
        ->where('UserNo', 'LIKE', $bir->UserNo)->count();
        if($b != 0) {
            return Redirect::back()->with('error', 'Already sent the BIR Form 2316 to this user!');
        }
        $bir->save();
        return redirect('/HumanResources/BIRForm2316');
    }

    public function show(Request $request, $id)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $bir = BIR::orderBy('id', 'DESC')
            ->where('Year', 'LIKE', $id)
            ->orwhere('UserNo', 'LIKE', "%$search%")
            ->orwhere('Name', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $bir = BIR::orderBy('id', 'DESC')
            ->where('Year', 'LIKE', $id)
            ->get();
        }
        $data = compact('bir', 'search');
        return view('HumanResources.BIR.show')->with($data);
    }
}

