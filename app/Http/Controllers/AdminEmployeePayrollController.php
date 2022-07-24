<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;

class AdminEmployeePayrollController extends Controller
{
    public function index(Request $request)
    {
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
        return view('Admin.employeepayroll')->with($data);
    }

    public function create()
    {
        return view('Admin.addpayroll');
    }

    public function store(Request $request)
    {
        $payroll = new Payroll();
        $payroll->Name = request('Name');
        $payroll->Detachment = request('Detachment');
        $payroll->Location = request('Location');
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
        return redirect('/Admin/EmployeePayroll');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $payroll = Payroll::findorfail($id);
        return view('Admin.editpayroll')->with('payroll', $payroll);   
    }

    public function update(Request $request, $Id)
    {
        $payroll = Payroll::findorfail($Id);
        $payroll->Name = $request->input('Name');
        $payroll->Detachment = $request->input('Detachment');
        $payroll->Location = $request->input('Location');
        $payroll->DaysWorked = $request->input('DaysWorked');
        $payroll->RatePerDay = $request->input('RatePerDay');
        $payroll->GrossPay = ($payroll->DaysWorked * $payroll->RatePerDay);
        $payroll->OfficersAllowance = $request->input('OfficersAllowance');
        $payroll->NSDifferential = $request->input('NSDifferential');
        $payroll->NightDifferential = ($payroll->NSDifferential * 42);
        $payroll->SHDays = $request->input('SHDays');
        $payroll->SpecialHoliday = ($payroll->SHDays * $payroll->RatePerDay * 0.3);
        $payroll->LHDays = $request->input('LHDays');
        $payroll->LegalHoliday = ($payroll->LHDays * $payroll->RatePerDay);
        $payroll->OTAdj = $request->input('OTAdj');
        $payroll->FinalGrossPay = ($payroll->GrossPay + $payroll->OfficersAllowance + $payroll->NightDifferential + $payroll->SpecialHoliday + $payroll->LegalHolidays + $payroll->OTAdj);
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
