<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\PayrollCode;
use App\Models\User;
use App\Models\SSS;
use App\Models\Detachments;

class HumanResourcesDigitalAttendanceController extends Controller
{
    public function editattendance($paycode, $id)
    {
        $payroll = Payroll::where('PayCode', 'LIKE', $paycode)
        ->where('UserNo', 'LIKE', $id)->firstOrFail();
        $detachment = Detachments::all();
        $payrollcode = PayrollCode::orderBy('PayCode', 'DESC')->get();
        $user = User::orderBy('Name', 'ASC')->get();
        $data = compact('user', 'detachment', 'payroll', 'payrollcode');
        return view('HumanResources.DigitalAttendance.edit')->with($data);   
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
        return view('HumanResources.DigitalAttendance.index')->with($data);
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
        $payroll = Payroll::where('UserNo', $id)->where('PayCode', request('PayCode'))->firstOrFail();
        $pc = PayrollCode::where('PayCode', request('PayCode'))->firstOrFail();
        $payroll->DaysWorked = request('DaysWorked');
        $payroll->GrossPay = ($payroll->DaysWorked * $payroll->RatePerDay);
        $payroll->NSDifferential = request('NSDifferential');
        $payroll->NightDifferential = (($payroll->RatePerDay / 12) * 0.10 * 8 * $payroll->NSDifferential);
        $payroll->SHDays = request('SHDays');
        $payroll->SpecialHoliday = ($payroll->SHDays * $payroll->RatePerDay * 0.3);
        $payroll->LHDays = request('LHDays');
        $payroll->LegalHoliday = ($payroll->LHDays * $payroll->RatePerDay);
        $payroll->FinalGrossPay = ($payroll->GrossPay + $payroll->OfficersAllowance + $payroll->NightDifferential + $payroll->SpecialHoliday + $payroll->LegalHolidays + $payroll->OTAdj);
        if(((Carbon::parse($pc->Start)->format('d')) >= 1) && (Carbon::parse($pc->Start)->format('d')) <= 15)
        {
            $payroll->PhilHealth = ((($payroll->FinalGrossPay * 2) * 0.04) / 2);
            $payroll->HDMF = 100; 
            $payroll->SSS = 0;
        }
        elseif (((Carbon::parse($pc->Start)->format('d')) >= 16) && ((Carbon::parse($pc->Start)->format('d')) <= 30))
        {
            $payroll->PhilHealth = 0;
            $payroll->HDMF = 0; 
            $sss = SSS::all();
            foreach($sss as $sss)
            {
                if((($payroll->FinalGrossPay * 2) >= $sss->Min) && (($payroll->FinalGrosspay * 2) <= $sss->Max))
                {
                    $payroll->SSS = $sss->Contribution;
                }
            }
        }
        $payroll->TotalDeduction = ($payroll->PhilHealth + $payroll->HDMF + $payroll->HDMFLoan + $payroll->SSS + $payroll->SSSLoan + $payroll->FAMaintenance + $payroll->RadioMaintenance + $payroll->BankCharge + $payroll->Insurance + $payroll->CashBond);
        $payroll->TotalNetPay = ($payroll->FinalGrossPay - $payroll->TotalDeduction - $payroll->CashAdvance);
        if ($payroll->TotalNetPay < 0)
        {
            $payroll->TotalNetPay = 0;
        }
        $payroll->update();
        return redirect('/HumanResources/DigitalAttendance/' . $payroll->PayCode);
    }
    
    public function show(Request $request, $id)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $payroll = Payroll::join('detachments', 'payroll.DCode', '=', 'detachments.DCode')
            ->select('payroll.*', 'detachments.*')
            ->orderBy('Detachment', 'ASC')
            ->orwhere('Name', 'LIKE', "%$search%")
            ->orwhere('Detachment', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $payroll = Payroll::where('PayCode', 'LIKE', $id)
            ->get();
        }
        $detachment = Detachments::all();
        $payrollcode = PayrollCode::where('PayCode', 'LIKE', $id)->firstOrFail();
        $data = compact('payroll', 'search', 'payrollcode', 'detachment');
        return view('HumanResources.DigitalAttendance.list')->with($data);
    }
    
    public function destroy(Request $request, $id)
    {
        //
    }
}
