<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use DateTime;
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

class AdminLeaveRequestsController extends Controller
{
    public function archive(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $leave = LeaveRequests::orderBy('id', 'DESC')
            ->where('Name', 'LIKE', "%$search%")
            ->orwhere('UserNo', 'LIKE', "%$search%")
            ->orwhere('LeaveNo', 'LIKE', "%$search%")
            ->whereNotNull('Approved')
            ->get();
        }
        else{
            $leave = LeaveRequests::orderBy('id', 'DESC')
            ->whereNotNull('Approved')
            ->get();
        }
        $data = compact('leave', 'search');
        return view('Admin.LeaveRequests.archive')->with($data);
    }

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $leave = LeaveRequests::orderBy('id', 'ASC')
            ->where('Name', 'LIKE', "%$search%")
            ->orwhere('UserNo', 'LIKE', "%$search%")
            ->orwhere('LeaveNo', 'LIKE', "%$search%")
            ->whereNull('Approved')
            ->get();
        }
        else{
            $leave = LeaveRequests::orderBy('id', 'ASC')
            ->whereNull('Approved')
            ->get();
        }
        $data = compact('leave', 'search');
        return view('Admin.LeaveRequests.index')->with($data);
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
        $leave  = LeaveRequests::where('LeaveNo', $id)->firstOrFail();
        return view('Admin.LeaveRequests.show')->with('leave', $leave);
    }

    public function edit($id)
    {
        $leave = LeaveRequests::where('LeaveNo', $id)->firstOrFail();
        $data = compact('leave');
        return view('Admin.LeaveRequests.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $leave = LeaveRequests::where('LeaveNo', $id)->firstOrFail();
        $leave->Approved = $request->input('Approved');
        if($leave->Approved == 1)
        {
            $end = $leave->End;
            $start = $leave->Start;
            $e = new DateTime($end);
            $s = new DateTime($start);
            $interval = $s->diff($e);
            $diff = $interval->format('%a');
            $leave->DaysUsed = $diff + $leave->DaysUsed;
            if($leave->LeaveType != "Leave Without Pay")
            {
                $leave->PaidDaysUsed = $leave->PaidDaysUsed + $leave->DaysUsed;
                if ($leave->PaidDaysUsed >= 5)
                {
                    $leave->PaidDaysUsed = 5;
                }
            }
        }
        $leave->update();
        return redirect('/Admin/LeaveRequests');
    }

    public function destroy($id)
    {
        //
    }
}
