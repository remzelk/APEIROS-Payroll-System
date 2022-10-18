<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\PayrollCode;
use Carbon\Carbon;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;

class AdminPayrollCodeController extends Controller
{
    public function index()
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $payrollcode = PayrollCode::orderby('PayCode', 'DESC')
            ->where('PayCode', 'LIKE', "%$search%")
            ->orwhere('Start', 'LIKE', "%$search%")
            ->orwhere('End', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $payrollcode = PayrollCode::orderby('PayCode', 'DESC')
            ->get();
        }
        $data = compact('payrollcode', 'search');
        return view('Admin.PayrollCode.index')->with($data);
    }

    public function create()
    {
        return view('Admin.PayrollCode.add');
    }

    public function store(Request $request)
    {
        $payrollcode = new PayrollCode();
        $payrollcode->Start = request('Start');
        $payrollcode->End = request('End');
        $sy = substr((Carbon::parse(request('Start'))->format('Y')), -2);
        $sm = Carbon::parse(request('Start'))->format('m');
        $sd = Carbon::parse(request('Start'))->format('d');
        $ey = substr((Carbon::parse(request('End'))->format('Y')), -2);
        $em = Carbon::parse(request('End'))->format('m');
        $ed = Carbon::parse(request('End'))->format('d');
        $code = ($sy . $sm . $sd . $ey . $em. $ed);
        $payrollcode->PayCode = ('P' . $code);
        $p = PayrollCode::withTrashed()->where('PayCode', 'LIKE', $payrollcode->PayCode)->count();
        if($p != 0) {
            return Redirect::back()->with('error', 'Payroll code already exists!');
        }
        $payrollcode->save();
        return redirect('/Admin/PayrollCode')->with('message', 'Payroll code: ' . $payrollcode->PayCode . ' generated successfully!');
    }

    public function edit($id)
    {
        $payrollcode = PayrollCode::where('PayCode', $id)->firstOrFail();
        return view('Admin.PayrollCode.edit')->with('payrollcode', $payrollcode);
    }

    public function update(Request $request, $id)
    {
        $payrollcode = PayrollCode::where('PayCode', $id)->firstOrFail();
        $payrollcode->Start = $request->input('Start');
        $payrollcode->End = $request->input('End');
        $sy = Carbon::parse($request->input('Start'))->format('Y')->substr($year, -2);
        $sm = Carbon::parse($request->input('Start'))->format('m');
        $sd = Carbon::parse($request->input('Start'))->format('d');
        $ey = Carbon::parse($request->input('End'))->format('Y')->substr($year, -2);
        $em = Carbon::parse($request->input('End'))->format('m');
        $ed = Carbon::parse($request->input('End'))->format('d');
        $code = ($sy . $sm . $sd . $ey . $em. $ed);
        $payrollcode->PayCode = ('P' . $code);
        $p = PayrollCode::withTrashed()->where('PayCode', 'LIKE', $payrollcode->PayCode)->count();
        if($p != 0) {
            return Redirect::back()->with('error', 'Payroll code already exists!');
        }
        $payrollcode->update();
        return redirect('/Admin/PayrollCode')->with('message', 'Payroll code: ' . $payrollcode->PayCode . ' edited successfully!');
    }

    public function destroy($id)
    {
        $payrollcode = PayrollCode::where('PayCode', $id)->firstOrFail();
        $payrollcode->delete();
        return redirect('/Admin/PayrollCode');
    }
}
