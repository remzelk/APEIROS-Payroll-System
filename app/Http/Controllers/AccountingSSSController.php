<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SSS;
use Illuminate\Auth\Events\PasswordReset;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountingSSSController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $sss = SSS::where('Min', 'LIKE', "%$search%")
            ->orwhere('Max', 'LIKE', "%$search%")
            ->orwhere('Contribution', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $sss = SSS::all();
        }
        $data = compact('sss', 'search');
        return view('Accounting.Payroll.SSS.index')->with($data);
    }

    public function create()
    {
        return view('Accounting.Payroll.SSS.add');
    }

    public function store(Request $request)
    {
        $sss = new SSS();
        $sss->Min = request('Min');
        $sss->Max = request('Max');
        $sss->Contribution = request('Contribution');
        $sss->save();
        return redirect('/Accounting/Payroll/SSS'); 
    }

    public function edit($id)
    {
        $sss = SSS::where('id', $id)->firstOrFail();
        return view('Accounting.Payroll.SSS.edit')->with('sss', $sss);
    }

    public function update(Request $request, $id)
    {
        $sss = SSS::where('id', $id)->firstOrFail();
        $sss->Min = $request->input('Min');
        $sss->Max = $request->input('Max');
        $sss->Contribution = $request->input('Contribution');
        $sss->update();
        return redirect('/Accounting/Payroll/SSS');
    }
}
