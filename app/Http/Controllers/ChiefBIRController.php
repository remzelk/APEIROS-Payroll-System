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

class ChiefBIRController extends Controller
{
    public function view($id)
    {
        $bir = BIR::where('BIRForm', $id)->firstORFail();
        return view('Chief.BIR.view')->with('bir', $bir);
    }

    public function download($id)
    {
        $bir = BIR::where('BIRForm', $id)->firstORFail();
        return response()->download(public_path(('bir/' . $bir->BIRForm), ($bir->BIRForm)));
    }

    public function index(Request $request)
    {
        $id = Auth::user()->userno;
        $search = $request['search'] ?? "";
        if ($search != ""){
            $bir = BIR::orderBy('id', 'DESC')
            ->orwhere('UserNo', 'LIKE', $id)
            ->orwhere('Year', 'LIKE', "%$search%")
            ->orwhere('Name', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $bir = BIR::orderBy('id', 'DESC')
            ->where('UserNo', 'LIKE', $id)
            ->get();
        }
        $data = compact('bir', 'search');
        return view('Chief.BIR.index')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, $id)
    {
        //
    }
}

