<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\PayrollCode;
use App\Models\User;
use App\Models\Profile;
use App\Models\Detachments;
use App\Models\SSS;
use Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;

class AccountingEmployeePayrollController extends Controller
{
    public function editpayroll($paycode, $id)
    {
        $payroll = Payroll::where('PayCode', 'LIKE', $paycode)
        ->where('UserNo', 'LIKE', $id)->firstOrFail();
        $detachment = Detachments::all();
        $payrollcode = PayrollCode::orderBy('PayCode', 'DESC')->get();
        $user = User::orderBy('Name', 'ASC')->get();
        $data = compact('user', 'detachment', 'payroll', 'payrollcode');
        return view('Accounting.Payroll.edit')->with($data);   
    }

     public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $payrollcode = PayrollCode::orderBy('id', 'DESC')
            ->where('Start', 'LIKE', "%$search%")
            ->orwhere('End', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $payrollcode = PayrollCode::orderBy('id', 'DESC')
            ->get();
        }
        $data = compact('payrollcode', 'search');
        return view('Accounting.Payroll.index')->with($data);
    }

    public function create(Request $request)
    {
        $detachment = Detachments::all();
        $payrollcode = PayrollCode::orderBy('PayCode', 'DESC')->get();
        $user = User::orderBy('Name', 'ASC')->get();
        $data = compact('user', 'detachment', 'payrollcode');
        return view('Accounting.Payroll.add')->with($data);
    }

    public function store(Request $request)
    {
        $payroll = new Payroll();
        $pc = PayrollCode::where('PayCode', request('PayCode'))->first();
        $payroll->PayCode = request('PayCode');
        $payroll->UserNo = request('Name');
        $u = User::where('userno', 'LIKE', $payroll->UserNo)->first();
        $payroll->Name = $u->name;
        $payroll->DCode = $u->dcode; 
        $d = Detachments::where('DCode', $payroll->DCode)->first();
        $payroll->Detachment = $d->Detachment;
        $payroll->Location = $d->Location;
        $payroll->DaysWorked = 0;
        $payroll->RatePerDay = request('RatePerDay');
        $payroll->GrossPay = ($payroll->DaysWorked * $payroll->RatePerDay);
        $payroll->OfficersAllowance = request('OfficersAllowance');
        $payroll->NSDifferential = 0;
        $payroll->NightDifferential = (($payroll->RatePerDay / 12) * 0.10 * 8 * $payroll->NSDifferential);
        $payroll->SHDays = 0;
        $payroll->SpecialHoliday = ($payroll->SHDays * $payroll->RatePerDay * 0.3);
        $payroll->LHDays = 0;
        $payroll->LegalHoliday = ($payroll->LHDays * $payroll->RatePerDay);
        $payroll->OTAdj = request('OTAdj');
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
        $payroll->SSSLoan = request('SSSLoan');
        $payroll->HDMFLoan = request('HDMFLoan');
        $payroll->FAMaintenance = request('FAMaintenance');
        $payroll->RadioMaintenance = request('RadioMaintenance');
        $payroll->BankCharge = request('BankCharge');
        $payroll->Insurance = request('Insurance');
        $payroll->CashBond = request('CashBond');
        $payroll->TotalDeduction = ($payroll->PhilHealth + $payroll->HDMF + $payroll->HDMFLoan + $payroll->SSS + $payroll->FAMaintenance + $payroll->RadioMaintenance + $payroll->BankCharge + $payroll->Insurance + $payroll->CashBond);
        $payroll->CashAdvance = request('CashAdvance');
        $payroll->TotalNetPay = ($payroll->FinalGrossPay - $payroll->TotalDeduction - $payroll->CashAdvance);
        if ($payroll->TotalNetPay < 0)
        {
            $payroll->TotalNetPay = 0;
        }
        $payroll->save();
        return redirect('/Accounting/Payroll/' . $payroll->PayCode);
    }

    public function show(Request $request, $id)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $payroll = Payroll::orderBy('Name', 'ASC')
            ->orderBy('Detachment', 'ASC')
            ->where('UserNo', 'LIKE', "%$search%")
            ->orwhere('Name', 'LIKE', "%$search%")
            ->orwhere('Detachment', 'LIKE', "%$search%")
            ->orwhere('Location', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $payroll = Payroll::where('PayCode', 'LIKE', $id)
            ->get();
        }
        $payrollcode = PayrollCode::where('PayCode', 'LIKE', $id)->firstOrFail();
        $data = compact('payroll', 'search', 'payrollcode');
        return view('Accounting.Payroll.list')->with($data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $payroll = Payroll::where('UserNo', $id)->first();
        $pc = PayrollCode::where('PayCode', request('PayCode'))->first();
        $payroll->PayCode = $pc->PayCode;
        $payroll->UserNo = request('Name');
        $u = User::where('userno', 'LIKE', $payroll->UserNo)->first();
        $payroll->Name = $u->name;
        $payroll->DCode = $u->dcode; 
        $d = Detachments::where('DCode', $payroll->DCode)->first();
        $payroll->Detachment = $d->Detachment;
        $payroll->Location = $d->Location;
        $payroll->RatePerDay = request('RatePerDay');
        $payroll->GrossPay = ($payroll->DaysWorked * $payroll->RatePerDay);
        $payroll->OfficersAllowance = request('OfficersAllowance');
        $payroll->NightDifferential = (($payroll->RatePerDay / 12) * 0.10 * 8 * $payroll->NSDifferential);
        $payroll->SpecialHoliday = ($payroll->SHDays * $payroll->RatePerDay * 0.3);
        $payroll->LegalHoliday = ($payroll->LHDays * $payroll->RatePerDay);
        $payroll->OTAdj = request('OTAdj');
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
        $payroll->SSSLoan = request('SSSLoan');
        $payroll->HDMFLoan = request('HDMFLoan');
        $payroll->FAMaintenance = request('FAMaintenance');
        $payroll->RadioMaintenance = request('RadioMaintenance');
        $payroll->BankCharge = request('BankCharge');
        $payroll->Insurance = request('Insurance');
        $payroll->CashBond = request('CashBond');
        $payroll->TotalDeduction = ($payroll->PhilHealth + $payroll->HDMF + $payroll->HDMFLoan + $payroll->SSS + $payroll->FAMaintenance + $payroll->RadioMaintenance + $payroll->BankCharge + $payroll->Insurance + $payroll->CashBond);
        $payroll->CashAdvance = request('CashAdvance');
        $payroll->TotalNetPay = ($payroll->FinalGrossPay - $payroll->TotalDeduction - $payroll->CashAdvance);
        if ($payroll->TotalNetPay < 0)
        {
            $payroll->TotalNetPay = 0;
        }
        $payroll->update();
        return redirect('/Accounting/Payroll/' . $payroll->PayCode);
    }

    public function destroy(Request $request, $id)
    {
        $payroll = Payroll::orderby('id', 'DESC')
        ->where('UserNo', $id)
        ->firstOrFail();
        $payroll->delete();
        return redirect('/Accounting/Payroll/' . $payroll->PayCode);
    }
}
