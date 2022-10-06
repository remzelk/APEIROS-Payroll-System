<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\User;
use App\Models\Detachments;

class AdminEmployeePayrollController extends Controller
{
    public function index(Request $request)
    {
        $currenttime = Carbon::today();
        $search = $request['search'] ?? "";
        if ($search != ""){
            $payroll = Payroll::where('Name', 'LIKE', "%$search%")
            ->orwhere('Detachment', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $payroll = Payroll::all();
        }
        $data = compact('payroll', 'search');
        return view('Admin.Payroll.index')->with($data);
    }

    public function create()
    {
        $detachment = Detachments::all();
        $user = User::orderBy('Name', 'ASC')->get();
        $data = compact('user', 'detachment');
        return view('Admin.Payroll.add')->with($data);
    }

    public function store(Request $request)
    {
        $payroll = new Payroll();
        $payroll->Start = request('Start');
        $payroll->End = request('End');
        $payroll->EmployeeNo = request('EmployeeNo')
        $payroll->Name = request('Name');
        $DetachmentID = request('DetachmentID');
        $d = Detachments::where('Id', request('DetachmentID'))->firstOrFail();
        $payroll->Detachment = $d->Detachment . ': ' . $d->Location; 
        $payroll->DaysWorked = request('DaysWorked');
        $payroll->RatePerDay = request('RatePerDay');
        $payroll->GrossPay = ($payroll->DaysWorked * $payroll->RatePerDay);
        $payroll->OfficersAllowance = request('OfficersAllowance');
        $payroll->NSDifferential = request('NSDifferential');
        $payroll->NightDifferential = ($payroll->NSDifferential * 42);
        $payroll->SHDays = request('SHDays');
        $payroll->SpecialHoliday = ($payroll->SHDays * $payroll->RatePerDay * 0.3);
        $payroll->LHDays = request('LHDays');
        $payroll->LegalHoliday = ($payroll->LHDays * $payroll->RatePerDay);
        $payroll->OTAdj = request('OTAdj');
        $payroll->FinalGrossPay = ($payroll->GrossPay + $payroll->OfficersAllowance + $payroll->NightDifferential + $payroll->SpecialHoliday + $payroll->LegalHolidays + $payroll->OTAdj);
        $payroll->PhilHealth = request('PhilHealth');
        $payroll->HDMF = request('HDMF');
        $payroll->HDMFLoan = request('HDMFLoan');
        $payroll->FAMaintenance = request('FAMaintenance');
        $payroll->RadioMaintenance = request('RadioMaintenance');
        $payroll->BankCharge = request('BankCharge');
        $payroll->Insurance = request('Insurance');
        $payroll->CashBond = request('CashBond');
        $payroll->TotalDeduction = ($payroll->PhilHealth + $payroll->HDMF + $payroll->HDMFLoan + $payroll->FAMaintenance + $payroll->RadioMaintenance + $payroll->BankCharge + $payroll->Insurance + $payroll->CashBond);
        $payroll->CashAdvance = request('CashAdvance');
        $payroll->TotalNetPay = ($payroll->FinalGrossPay - $payroll->TotalDeduction - $payroll->CashAdvance);
        $payroll->save();
        return redirect('/Admin/Payroll');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $payroll = Payroll::findorfail($id);
        $detachment = Detachments::all();
        $user = User::orderBy('Name', 'ASC')->get();
        $data = compact('user', 'detachment', 'payroll');
        return view('Admin.Payroll.edit')->with($data);   
    }

    public function update(Request $request, $Id)
    {
        $payroll = Payroll::findorfail($Id);
        $payroll->Start = $request->input('Start');
        $payroll->End = $request->input('End');
        $payroll->Name = $request->input('Name');
        $DetachmentID = $request->input('DetachmentID');
        $d = Detachments::where('Id', request('DetachmentID'))->firstOrFail();
        $payroll->Detachment = $d->Detachment . ': ' . $d->Location; 
        $payroll->DaysWorked = request->input('DaysWorked');
        $payroll->RatePerDay = $d->Wage;
        $payroll->GrossPay = ($payroll->DaysWorked * $payroll->RatePerDay);
        $payroll->OfficersAllowance = $request->input('OfficersAllowance');
        $payroll->NSDifferential = $request->input('NSDifferential');
        $payroll->NightDifferential = ($payroll->NSDifferential * 42);
        $payroll->SHDays = $request->input('SHDays');
        $payroll->SpecialHoliday = ($payroll->SHDays * $payroll->RatePerDay * 0.3);
        $payroll->LHDays = $request->input('LHDays');
        $payroll->LegalHoliday = ($payroll->LHDays * $payroll->RatePerDay);
        $payroll->OTAdj = $request->input('OTAdj');
        $payroll->FinalGrossPay = ($payroll->GrossPay + $payroll->OfficersAllowance + $payroll->NightDifferential + $payroll->SpecialHoliday + $payroll->LegalHoliday + $payroll->OTAdj);
        $payroll->PhilHealth = $request->input('PhilHealth');
        $payroll->HDMF = $request->input('HDMF');
        $payroll->HDMFLoan = $request->input('HDMFLoan');
        $payroll->FAMaintenance = $request->input('FAMaintenance');
        $payroll->RadioMaintenance = $request->input('RadioMaintenance');
        $payroll->BankCharge = $request->input('BankCharge');
        $payroll->Insurance = $request->input('Insurance');
        $payroll->CashBond = $request->input('CashBond');
        $payroll->TotalDeduction = ($payroll->PhilHealth + $payroll->HDMF + $payroll->HDMFLoan + $payroll->FAMaintenance + $payroll->RadioMaintenance + $payroll->BankCharge + $payroll->Insurance + $payroll->CashBond);
        $payroll->CashAdvance = $request->input('CashAdvance');
        $payroll->TotalNetPay = ($payroll->FinalGrossPay - $payroll->TotalDeduction - $payroll->CashAdvance);
        $payroll->update();
        return redirect('/Admin/EmployeePayroll');
    }

    public function destroy($id)
    {
        $payroll = Payroll::findorfail($id);
        $payroll->delete();
        return redirect('/Admin/EmployeePayroll');
    }
}
