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
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;

class ChiefLeaveRequestsController extends Controller
{
    public function index()
    {
        $leave = LeaveRequests::orderBy('id', 'DESC')->where('UserNo', 'LIKE', Auth::user()->userno)->get();
        $last = LeaveRequests::orderBy('id', 'DESC')->where('UserNo', 'LIKE', Auth::user()->userno)->firstOrFail();
        $paidleft = (5 - $last->DaysUsed);
        $daysleft = (15 - $last->PaidDaysUsed);
        $data = compact('leave', 'paidleft', 'daysleft');
        return view('Chief.LeaveRequests.index')->with($data);
    }

    public function create()
    {
        return view('Chief.LeaveRequests.add');
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
        $last = LeaveRequests::orderBy('id', 'DESC')->where('UserNo', 'LIKE', Auth::user()->userno)->firstOrFail();
        $end = $leave->End;
        $start = $leave->Start;
        $e = new DateTime($end);
        $s = new DateTime($start);
        $interval = $s->diff($e);
        $diff = $interval->format('%a');
        if(($diff + $last->DaysUsed) > 15)
        {
            return Redirect::back()->with('error', 'Your request exceeds your leave limit. Days available: ' . 15 - $last->DaysUsed);
        }
        if ($c != 0)
        {
            $leave->DaysUsed = $last->DaysUsed;
            $leave->PaidDaysUsed = $last->PaidDaysUsed;
        }
        $leave->save();
        return redirect('/Chief/LeaveRequests');
    }

    public function show($id)
    {
        $leave  = LeaveRequests::where('LeaveNo', $id)->firstOrFail();
        return view('Chief.LeaveRequests.show')->with('leave', $leave);
    }

}
