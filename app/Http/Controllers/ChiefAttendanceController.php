<?php

namespace App\Http\Controllers;

use Session;
use App\Models\PayrollCode;
use App\Models\Attendance;
use App\Models\Detachments;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Carbon\Carbon;
use App\Models\Payroll;
use App\Models\SSS;


class ChiefAttendanceController extends Controller
{
    public function editattendance($paycode, $id)
        {
            $attendance = Attendance::where('PayCode', 'LIKE', $paycode)
            ->where('UserNo', 'LIKE', $id)->firstOrFail();
            $detachment = Detachments::all();
            $payrollcode = PayrollCode::orderBy('PayCode', 'DESC')->get();
            $user = User::orderBy('Name', 'ASC')->get();
            $data = compact('user', 'detachment', 'attendance', 'payrollcode');
            return view('Chief.Attendance.edit')->with($data);   
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
        return view('Chief.Attendance.index')->with($data);
    }

    public function create(Request $request)
    { 
        //
    }

    public function store(Request $request)
    {
        $attendance = new Attendance();
        $id = $request->user()->userno;
        $user = User::where('UserNo', $id)->firstOrFail();
        $detachment = Detachments::where('DCode', $user->dcode)->firstOrFail();
        $payrollcode = PayrollCode::where('PayCode', request('duration'))->firstOrFail();
        $attendance->Sta = $payrollcode->Start;
        $attendance->End = $payrollcode->End;
        $attendance->Detachment = $detachment->Detachment;
        $attendance->Location = $detachment->Location;
        $attendance->Submitted = request('Submitted');
        $sheet =  $user->dcode . '-' . request('duration') . '.' . $request->file('attendancesheet')->extension();
        $request->file('attendancesheet')->move(public_path('attendance'), $sheet);
        $attendance->AttendanceSheet = $sheet;
        $a = Attendance::withTrashed()
        ->where('Start', $attendance->Start)
        ->where('End', $attendance->End)
        ->where('Detachment', $attendance->Detachment)
        ->where('Location', $attendance->Location)
        ->count();
        if($a != 0) {
            return Redirect::back()->with('error', 'Attendance sheet for this duration has already been submitted!');
        }
        $attendance->save();
        return redirect('/Chief/Attendance')->with('success', 'Attendance sheet uploaded successfully!');
    }

    public function show(Request $request, $id)
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
            $attendance = Attendance::where('PayCode', 'LIKE', $id)
            ->get();
        }
        $detachment = Detachments::all();
        $payrollcode = PayrollCode::where('PayCode', 'LIKE', $id)->firstOrFail();
        $data = compact('attendance', 'search', 'payrollcode', 'detachment');
        return view('Chief.Attendance.list')->with($data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::where('UserNo', $id)->where('PayCode', request('PayCode'))->firstOrFail();
        $attendance->DaysWorked = request('DaysWorked');
        $attendance->NSDifferential = request('NSDifferential');
        $attendance->SHDays = request('SHDays');
        $attendance->LHDays = request('LHDays');
        $attendance->update();
        return redirect('/Chief/Attendance/' . $attendance->PayCode);
    }

    public function destroy($id)
    {
        //
    }
}
