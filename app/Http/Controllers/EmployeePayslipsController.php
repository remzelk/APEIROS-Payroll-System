<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\PayrollCode;
use App\Models\User;
use Auth;
use App\Models\Application;
use App\Models\Detachments;

class EmployeePayslipsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $payrollcode = PayrollCode::join('payroll', 'payrollcode.PayCode', '=', 'payroll.PayCode')
            ->select('payrollcode.*', 'payroll.*')
            ->orderBy('payrollcode.id', 'DESC')
            ->where('userno', 'LIKE', Auth::user()->userno)
            ->orwhere('Start', 'LIKE', "%$search%")
            ->orwhere('End', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $payrollcode = PayrollCode::join('payroll', 'payrollcode.PayCode', '=', 'payroll.PayCode')
            ->select('payrollcode.*', 'payroll.*')
            ->orderBy('payrollcode.id', 'DESC')
            ->where('userno', 'LIKE', Auth::user()->userno)
            ->get();
        }
        $data = compact('payrollcode', 'search');
        return view('Employee.Payslips.index')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function show($id)
    {
        $payroll = Payroll::where('PayCode', 'LIKE', $id)
        ->where('UserNo', 'LIKE', Auth::user()->userno)
        ->firstOrFail();
        $detachment = Detachments::all();
        $application = Application::where('UserNo', 'LIKE', Auth::user()->userno)->firstOrFail();
        $payrollcode = PayrollCode::where('PayCode', 'LIKE', $id)->firstOrFail();
        $data = compact('payroll', 'payrollcode', 'detachment', 'application');
        return view('Employee.Payslips.show')->with($data);
    }

    public function destroy($id)
    {
        //
    }
}
