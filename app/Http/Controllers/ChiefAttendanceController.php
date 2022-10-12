<?php

namespace App\Http\Controllers;

use Session;
use App\Models\PayrollCode;
use App\Models\Attendance;
use App\Models\Detachments;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;


class ChiefAttendanceController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->user()->userno;
        $application = Application::where('UserNo', $id)->firstOrFail();
        $payrollcode = PayrollCode::all();
        $detachment = Detachments::where('DCode', $application->DCode)->firstOrFail();
        $data = compact('payrollcode', 'detachment');
        return view('Chief.Attendance.index')->with($data);
    }

    public function create(Request $request)
    { 
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'attendancesheet' => ['required', 'mimes:pdf']
        ]);

        $attendance = new Attendance();
        $id = $request->user()->userno;
        $app = Application::where('UserNo', $id)->firstOrFail();
        $detachment = Detachments::where('DCode', $app->DCode)->firstOrFail();
        $payrollcode = PayrollCode::where('PayCode', request('duration'))->firstOrFail();
        $attendance->Start = $payrollcode->Start;
        $attendance->End = $payrollcode->End;
        $attendance->Detachment = $detachment->Detachment;
        $attendance->Location = $detachment->Location;
        $attendance->Submitted = request('Submitted');
        $sheet =  $app->DCode . '-' . request('duration') . '.' . $request->file('attendancesheet')->extension();
        $request->file('attendancesheet')->move(public_path('attendance'), $sheet);
        $attendance->AttendanceSheet = $sheet;
        $a = Attendance::withTrashed()
        ->where('Start', $attendance->Start)
        ->where('End', $attendance->End)
        ->where('Detachment', $attendance->Detachment)
        ->where('Location', $attendance->Location)
        ->firstOrFail();
        if($a->Submitted != 0) {
            return Redirect::back()->with('error', 'Attendance sheet for this duration has already been submitted!');
        }
        $attendance->save();
        return redirect('/Chief/Attendance')->with('success', 'Attendance sheet uploaded successfully!');
    }

    public function show($id)
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

    public function destroy($id)
    {
        //
    }
}
