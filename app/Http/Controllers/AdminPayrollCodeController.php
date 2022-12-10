<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\PayrollCode;
use App\Models\Payroll;
use App\Models\Detachments;
use App\Models\Attendance;
use App\Models\User;
use App\Models\SSS;
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
        $user = User::where('Position', 'LIKE', "4")
        ->orwhere('Position', 'LIKE', "5")
        ->get();
        foreach($user as $user)
        {
            $payroll = new Payroll();
            $payroll->PayCode = $payrollcode->PayCode;
            $payroll->UserNo = $user->userno;
            $payroll->Name = $user->name;
            $payroll->DCode = $user->dcode;
            $d = Detachments::where('DCode', $payroll->DCode)->firstOrFail();
            $payroll->Detachment = $d->Detachment;
            $payroll->Location = $d->Location;
            $payroll->DaysWorked = 0;
            $last = Payroll::orderBy('id', 'DESC')->where('UserNo', 'LIKE', $user->userno)->first();
            if($last == NULL)
            {
                $payroll->RatePerDay = 0;
            }
            else
            {
                $payroll->RatePerDay = $last->RatePerDay;
            }
            $payroll->GrossPay = ($payroll->DaysWorked * $payroll->RatePerDay);
            $payroll->OfficersAllowance = 0;
            $payroll->NSDifferential = 0;
            $payroll->NightDifferential = (($payroll->RatePerDay / 12) * 0.10 * 8 * $payroll->NSDifferential);
            $payroll->SHDays = 0;
            $payroll->SpecialHoliday = ($payroll->SHDays * $payroll->RatePerDay * 0.3);
            $payroll->LHDays = 0;
            $payroll->LegalHoliday = ($payroll->LHDays * $payroll->RatePerDay);
            $payroll->OTAdj = 0;                
            $payroll->FinalGrossPay = ($payroll->GrossPay + $payroll->OfficersAllowance + $payroll->NightDifferential + $payroll->SpecialHoliday + $payroll->LegalHolidays + $payroll->OTAdj);
            if(((Carbon::parse($payrollcode->Start)->format('d')) >= 1) && (Carbon::parse($payrollcode->Start)->format('d')) <= 15)
            {
                $payroll->PhilHealth = ((($payroll->GrossPay * 2) * 0.04) / 2);
                $payroll->HDMF = 100; 
                $payroll->SSS = 0;
            }
            elseif (((Carbon::parse($payrollcode->Start)->format('d')) >= 16) && ((Carbon::parse($payrollcode->Start)->format('d')) <= 30))
            {
                $payroll->PhilHealth = 0;
                $payroll->HDMF = 0; 
                $sss = SSS::where('Min', '<=', $payroll->FinalGrossPay)->where('Max', '>=', $payroll->FinalGrossPay)->firstOrFail();
                $payroll->SSS = $sss->Contribution;
                
            }
            if($last == NULL)
            {
                $payroll->RatePerDay = 0;
            }
            else
            {
                $payroll->RatePerDay = $last->RatePerDay;
            }
            $payroll->SSSLoan = 0;
            $payroll->HDMFLoan = 0;
            $payroll->FAMaintenance = 10;
            $payroll->RadioMaintenance = 10;
            $payroll->BankCharge = 10;
            $payroll->Insurance = 30;
            $payroll->CashBond = 100;
            $payroll->TotalDeduction = ($payroll->PhilHealth + $payroll->HDMF + $payroll->HDMFLoan + $payroll->SSS + $payroll->FAMaintenance + $payroll->RadioMaintenance + $payroll->BankCharge + $payroll->Insurance + $payroll->CashBond);
            $payroll->CashAdvance = 0;
            $payroll->TotalNetPay = ($payroll->FinalGrossPay - $payroll->TotalDeduction - $payroll->CashAdvance);
            if ($payroll->TotalNetPay < 0)
            {
                $payroll->TotalNetPay = 0;
            }
            $payroll->save();
            $attendance = new Attendance();
            $attendance->PayCode = $payrollcode->PayCode;
            $attendance->DCode = $payroll->DCode;
            $attendance->UserNo = $payroll->UserNo;
            $attendance->Name = $payroll->Name;
            $attendance->Detachment = $payroll->Detachment;
            $attendance->Location = $payroll->Location;
            $attendance->DaysWorked = 0;
            $attendance->NSDifferential = 0;
            $attendance->SHDays = 0;
            $attendance->LHDays = 0;
            $attendance->save();
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
        $payroll = Payroll::where('PayCode', $id)->delete();
        return redirect('/Admin/PayrollCode');
    }
}
