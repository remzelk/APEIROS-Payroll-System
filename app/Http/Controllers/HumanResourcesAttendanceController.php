<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PayrollCode;
use App\Models\Attendance;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class HumanResourcesAttendanceController extends Controller
{
    public function view($id)
    {
        $attendance = Attendance::where('attendancesheet', $id)->firstOrFail();
        return view('HumanResources.Attendance.show')->with('attendance', $attendance);
    }

    public function download($id)
    {
        $attendance = Attendance::where('id', $id)->firstOrFail();
        return response()->download(public_path(('attendance/' . $attendance->AttendanceSheet), ($attendance->AttendanceSheet)));
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
        return view('HumanResources.Attendance.index')->with($data);
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
        $payrollcode = PayrollCode::where('PayCode', $id)->firstOrFail();
        $search = $request['search'] ?? "";
        if ($search != ""){
            $attendance = Attendance::orderBy('Detachment', 'ASC')
            ->orderBy('Location', 'ASC')
            ->orwhere('Detachment', 'LIKE', "%$search%")
            ->orwhere('Location', 'LIKE', "%$search%")
            ->where('Start', $payrollcode->Start)
            ->where('End', $payrollcode->End)
            ->get();
        }
        else{
            $attendance = Attendance::orderBy('Detachment', 'ASC')
            ->orderBy('Location', 'ASC')
            ->where('Start', $payrollcode->Start)
            ->where('End', $payrollcode->End)
            ->get();
        }
        $data = compact('attendance', 'search', 'payrollcode');
        return view('HumanResources.Attendance.list')->with($data);
    }

    public function edit($id)
    {
        $attendance = Attendance::where('userno', $id)->firstOrFail();
        return view('HumanResources.Attendance.edit')->with('attendance', $attendance);
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
