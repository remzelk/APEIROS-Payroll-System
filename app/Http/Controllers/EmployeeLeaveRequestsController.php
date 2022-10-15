<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\PayrollCode;
use App\Models\LeaveRequests;
use App\Models\User;
use App\Models\Application;
use App\Models\Detachments;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

class EmployeeLeaveRequestsController extends Controller
{
    public function index()
    {
        $leave = LeaveRequests::orderBy('id', 'DESC')->where('UserNo', 'LIKE', Auth::user()->userno)->get();
        return view('Employee.LeaveRequests.index')->with('leave', $leave);
    }

    public function create()
    {
        return view('Employee.LeaveRequests.add');
    }
    
    public function store(Request $request)
    {
        $leave = new LeaveRequests();
        $current = Carbon::now();
        $year = Carbon::now()->format('Y');
        $y = substr($year, -2);
        $m = Carbon::now()->format('m');
        $d = Carbon::now()->format('d');
        $count = LeaveRequests::withTrashed()->where('LeaveNo', 'LIKE', "L" . $y . $m . $d . "%")->count() + 1;
        if ($count < 10)
        {
            $count = "0" . $count;
        }
        $lno = ('L' . $y . $m . $d . $count);
        $leave->LeaveNo = $lno;
        $leave->UserNo = request('UserNo');
        $leave->Name = request('Name');
        $leave->Start = request('Start');
        $leave->End = request('End');
        $leave->LeaveType = request('LeaveType');
        $leave->Reason = request('Reason');
        $c = LeaveRequests::where('UserNo', 'LIKE', Auth::user()->userno)->count();
        if ($c != 0)
        {
            $last = LeaveRequests::orderBy('id', 'DESC')->where('UserNo', 'LIKE', Auth::user()->userno)->firstOrFail();
            $leave->DaysUsed = $last->DaysUsed;
            $leave->PaidDaysUsed = $last->PaidDaysUsed;
        }
        $leave->save();
        return redirect('/Employee/LeaveRequests');
    }

    public function show($id)
    {
        $leave  = LeaveRequests::where('LeaveNo', $id)->firstOrFail();
        return view('Employee.LeaveRequests.show')->with('leave', $leave);
    }

}
