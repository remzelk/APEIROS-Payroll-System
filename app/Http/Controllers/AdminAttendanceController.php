<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PayrollCode;
use App\Models\Attendance;
use App\Models\Detachments;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\Payroll;
use App\Models\SSS;


class AdminAttendanceController extends Controller
{
    public function attendance(Request $request, $paycode, $id)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $attendance = Attendance::join('detachments', 'attendance.DCode', '=', 'detachments.DCode')
            ->select('attendance.*', 'detachments.*')
            ->orderBy('Detachment', 'ASC')
            ->orwhere('Name', 'LIKE', "%$search%")
            ->orwhere('Detachment', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $attendance = Attendance::where('PayCode', 'LIKE', $paycode)
            ->where('DCode', 'LIKE', $id)
            ->get();
        }
        $detachment = Detachments::where('DCode', 'LIKE', $id)->firstOrFail();
        $payrollcode = PayrollCode::where('PayCode', 'LIKE', $paycode)->firstOrFail();
        $data = compact('attendance', 'search', 'payrollcode', 'detachment');
        return view('Admin.Attendance.show')->with($data);
    }

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $payrollcode = PayrollCode::orderBy('id', 'DESC')
            ->orwhere('Start', 'LIKE', "%$search%")
            ->orwhere('End', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $payrollcode = PayrollCode::orderBy('id', 'DESC')
            ->get();
        }
        $data = compact('payrollcode', 'search');
        return view('Admin.Attendance.index')->with($data);
    }

    public function create(Request $request)
    { 
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, $id)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $attendance = Attendance::join('detachments', 'attendance.DCode', '=', 'detachments.DCode')
            ->select('attendance.*', 'detachments.*')
            ->orderBy('Detachment', 'ASC')
            ->where('Name', 'LIKE', "%$search%")
            ->orwhere('Detachment', 'LIKE', "%$search%")
            ->groupby('attendance.DCode')
            ->get();
        }
        else{
            $attendance = Attendance::join('detachments', 'attendance.DCode', '=', 'detachments.DCode')
            ->select('attendance.*', 'detachments.*')
            ->where('attendance.PayCode', 'LIKE', $id)
            ->groupby('attendance.DCode')
            ->get();
        }
        $detachment = Detachments::all();
        $payrollcode = PayrollCode::where('PayCode', 'LIKE', $id)->firstOrFail();
        $data = compact('attendance', 'search', 'payrollcode', 'detachment');
        return view('Admin.Attendance.list')->with($data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
