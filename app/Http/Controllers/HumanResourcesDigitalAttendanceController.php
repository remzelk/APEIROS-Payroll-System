<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\PayrollCode;
use App\Models\User;
use App\Models\Application;
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
            $payroll->PhilHealth = ((($payroll->GrossPay * 2) * 0.04) / 2);
            $payroll->HDMF = 100; 
            $payroll->SSS = 0;
        }
        elseif (((Carbon::parse($pc->Start)->format('d')) >= 16) && ((Carbon::parse($pc->Start)->format('d')) <= 30))
        {
            $payroll->PhilHealth = 0;
            $payroll->HDMF = 0; 
            if(($payroll->GrossPay * 2) < 3250.00)
            {
                $payroll->SSS = 135.00;
            }
            if((($payroll->GrossPay * 2) >= 3250.00) && (($payroll->Grosspay * 2) < 3750.99))
            {
                $payroll->SSS = 157.50;
            }
            if((($payroll->GrossPay * 2) >= 3750.00) && (($payroll->Grosspay * 2) < 4250.99))
            {
                $payroll->SSS = 180.00;
            }
            if((($payroll->GrossPay * 2) >= 4250.00) && (($payroll->Grosspay * 2) < 4750.99))
            {
                $payroll->SSS = 202.50;
            }
            if((($payroll->GrossPay * 2) >= 4750.00) && (($payroll->Grosspay * 2) < 5250.99))
            {
                $payroll->SSS = 225.00;            
            }
            if((($payroll->GrossPay * 2) >= 5250.00) && (($payroll->Grosspay * 2) < 5750.99))
            {
                $payroll->SSS = 247.50;
            }
            if((($payroll->GrossPay * 2) >= 5750.00) && (($payroll->Grosspay * 2) < 6250.99))
            {
                $payroll->SSS = 270.00;
            }
            if((($payroll->GrossPay * 2) >= 6250.00) && (($payroll->Grosspay * 2) < 6750.99))
            {
                $payroll->SSS = 292.50;
            }
            if((($payroll->GrossPay * 2) >= 6750.00) && (($payroll->Grosspay * 2) < 7250.99))
            {
                $payroll->SSS = 315.00;
            }
            if((($payroll->GrossPay * 2) >= 7250.00) && (($payroll->Grosspay * 2) < 7750.99))
            {
                $payroll->SSS = 337.50;
            }
            if((($payroll->GrossPay * 2) >= 7750.00) && (($payroll->Grosspay * 2) < 8250.99))
            {
                $payroll->SSS = 360.00;            
            }
            if((($payroll->GrossPay * 2) >= 8250.00) && (($payroll->Grosspay * 2) < 8750.99))
            {
                $payroll->SSS = 382.50;            
            }
            if((($payroll->GrossPay * 2) >= 8750.00) && (($payroll->Grosspay * 2) < 9250.99))
            {
                $payroll->SSS = 405.00;
            }
            if((($payroll->GrossPay * 2) >= 9250.00) && (($payroll->Grosspay * 2) < 9750.99))
            {                
                $payroll->SSS = 427.50;
            }
            if((($payroll->GrossPay * 2) >= 9750.00) && (($payroll->Grosspay * 2) < 10250.99))
            {
                $payroll->SSS = 450.00;
            }
            if((($payroll->GrossPay * 2) >= 10250.00) && (($payroll->Grosspay * 2) < 10750.99))
            {
                $payroll->SSS = 472.50;            
            }
            if((($payroll->GrossPay * 2) >= 10750.00) && (($payroll->Grosspay * 2) < 11250.99))
            {
                $payroll->SSS = 495.00;
            }
            if((($payroll->GrossPay * 2) >= 11250.00) && (($payroll->Grosspay * 2) < 11750.99))
            {
                $payroll->SSS = 517.50;
            }
            if((($payroll->GrossPay * 2) >= 11750.00) && (($payroll->Grosspay * 2) < 12250.99))
            {
                $payroll->SSS = 540.00;
            }
            if((($payroll->GrossPay * 2) >= 12250.00) && (($payroll->Grosspay * 2) < 12750.99))
            {
                $payroll->SSS = 562.50;
            }
            if((($payroll->GrossPay * 2) >= 12750.00) && (($payroll->Grosspay * 2) < 13250.99))
            {
                $payroll->SSS = 585.00;
            }
            if((($payroll->GrossPay * 2) >= 13250.00) && (($payroll->Grosspay * 2) < 13750.99))
            {
                $payroll->SSS = 607.50;
            }
            if((($payroll->GrossPay * 2) >= 13750.00) && (($payroll->Grosspay * 2) < 14250.99))
            {
                $payroll->SSS = 630.00;
            }
            if((($payroll->GrossPay * 2) >= 14250.00) && (($payroll->Grosspay * 2) < 14750.99))
            {
                $payroll->SSS = 652.50;
            }
            if((($payroll->GrossPay * 2) >= 14750.00) && (($payroll->Grosspay * 2) < 15250.99))
            {
                $payroll->SSS = 675.00;
            }
            if((($payroll->GrossPay * 2) >= 15250.00) && (($payroll->Grosspay * 2) < 15750.99))
            {
                $payroll->SSS = 697.50;
            }
            if((($payroll->GrossPay * 2) >= 15750.00) && (($payroll->Grosspay * 2) < 16250.99))
            {
                $payroll->SSS = 720.00;
            }
            if((($payroll->GrossPay * 2) >= 16250.00) && (($payroll->Grosspay * 2) < 16750.99))
            {
                $payroll->SSS = 742.50;
            }
            if((($payroll->GrossPay * 2) >= 16750.00) && (($payroll->Grosspay * 2) < 17250.99))
            {
                $payroll->SSS = 765.00;
            }
            if((($payroll->GrossPay * 2) >= 17250.00) && (($payroll->Grosspay * 2) < 17750.99))
            {
                $payroll->SSS = 787.50;
            }
            if((($payroll->GrossPay * 2) >= 17750.00) && (($payroll->Grosspay * 2) < 18250.99))
            {
                $payroll->SSS = 787.50;
            }
            if((($payroll->GrossPay * 2) >= 18250.00) && (($payroll->Grosspay * 2) < 18750.99))
            {
                $payroll->SSS = 832.50;
            }
            if((($payroll->GrossPay * 2) >= 18750.00) && (($payroll->Grosspay * 2) < 19250.99))
            {
                $payroll->SSS = 855.00;
            }
            if((($payroll->GrossPay * 2) >= 19250.00) && (($payroll->Grosspay * 2) < 19750.99))
            {
                $payroll->SSS = 877.50;
            }
            if((($payroll->GrossPay * 2) >= 19750.00) && (($payroll->Grosspay * 2) < 20250.99))
            {
                $payroll->SSS = 900.00;
            }
            if((($payroll->GrossPay * 2) >= 20250.00) && (($payroll->Grosspay * 2) < 20750.99))
            {
                $payroll->SSS = 922.50;
            }
            if((($payroll->GrossPay * 2) >= 20750.00) && (($payroll->Grosspay * 2) < 21250.99))
            {
                $payroll->SSS = 945.00;
            }
            if((($payroll->GrossPay * 2) >= 21250.00) && (($payroll->Grosspay * 2) < 21750.99))
            {
                $payroll->SSS = 967.50;
            }
            if((($payroll->GrossPay * 2) >= 21750.00) && (($payroll->Grosspay * 2) < 22250.99))
            {
                $payroll->SSS = 990.00;
            }
            if((($payroll->GrossPay * 2) >= 22250.00) && (($payroll->Grosspay * 2) < 22750.99))
            {
                $payroll->SSS = 1012.50;
            }
            if((($payroll->GrossPay * 2) >= 22750.00) && (($payroll->Grosspay * 2) < 23250.99))
            {
                $payroll->SSS = 1035.00;
            }
            if((($payroll->GrossPay * 2) >= 23250.00) && (($payroll->Grosspay * 2) < 23750.99))
            {
                $payroll->SSS = 1057.50;
            }
            if((($payroll->GrossPay * 2) >= 23750.00) && (($payroll->Grosspay * 2) < 24250.99))
            {
                $payroll->SSS = 1080.00;
            }
            if((($payroll->GrossPay * 2) >= 24250.00) && (($payroll->Grosspay * 2) < 24750.99))
            {
                $payroll->SSS = 1102.50;
            }
            if(($payroll->GrossPay * 2) >= 24750.00)
            {
                $payroll->SSS = 1125.00;
            }
        }
        $payroll->TotalDeduction = ($payroll->PhilHealth + $payroll->HDMF + $payroll->HDMFLoan + $payroll->SSS + $payroll->SSSLoan + $payroll->FAMaintenance + $payroll->RadioMaintenance + $payroll->BankCharge + $payroll->Insurance + $payroll->CashBond);
        $payroll->TotalNetPay = ($payroll->FinalGrossPay - $payroll->TotalDeduction - $payroll->CashAdvance);
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
