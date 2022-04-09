<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    private $Employees = [
        1 => [
            'LastName' => 'Dela Cruz',
            'FirstName' => 'Juan',
            'Birthday' => '2000/1/1',
            'Gender' => 'Male',
            'Branch' => 'Bulacan',
            'Post' => 'Arzo Hotel',
            'Address' => 'Malolos, Bulacan',
            'Phone' => '+63 912 345 6789',
            'Email' => 'juandelacruz@sample.com',
            'DaysWorked' => 15,
            'RatePerDay' => 550.00,
            'GrossPay' => 8250.00,
            'OfficersAllowance' => 0,
            'NSDifferential' => 8,
            'NightDifferential' => 336.00,
            'SHDays' => 0,
            'SpecialHoliday' => 0.00,
            'LHDays' => 0,
            'LegalHoliday' => 0.00,
            'OTAdj' => 0.00,
            'FinalGrossPay' => 8586.00,
            'PhilHealth' => 250.00,
            'HDMF' => 100.00,
            'HDMFLoan' => 0,
            'FAMaintenance' => 10,
            'RadioMaintenance' => 10,
            'BankCharge' => 10,
            'Insurance' => 510.00,
            'CashBond' => 100,
            'TotalDeduction' => 510.00,
            'CashAdvance' => 2000,
            'TotalNetPay' => 6076.00
        ]
    ];

    public function index()
    {
        return view('Employees.index', ['Employees'=>$this->Employees]);
    }
    public function show($id)
    {
        abort_if(!(isset($this->Employees[$id])), 404);
        return view('Employees.show', ['Employee'=>$this->Employees[$id]]);
    }
    public function create()
    {
        return view('Employees.create');
    }
    public function store(Request $request)
    {
        $LastName = Request()->input('LastName');
        $FirstName = Request()->input('FirstName');
        $Birthday = Request()->input('Birthday');
        $Gender = Request()->input('Gender');
        $DaysWorked = Request()->input('DaysWorked');
        $RatePerDay = Request()->input('RatePerDay');
        $GrossPay = $DaysWorked * $RatePerDay;
        $OfficersAllowance = Request()->input('OfficersAllowance');
        $NSDifferential = Request()->input('NSDifferential');
        $NightDifferential = $NSDifferential * 42;
        $SHDays = Request()->input('SHDays');
        $SpecialHoliday = $SHDays * $RatePerDay * 0.3;
        $LHDays = Request()->input('LHDays');
        $LegalHoliday = $LHDays * $RatePerDay;
        $OTAdj = Request()->input('OTAdj');
        $FinalGrossPay = $GrossPay + $OfficersAllowance + $NightDifferential + $SpecialHoliday + $LegalHolidays + $OTAdj;
        $PhilHealth = Request()->input('PhilHealth');
        $HDMF = Request()->input('HDMF');
        $HDMFLoan = Request()->input('HDMFLoan');
        $FAMaintenance = Request()->input('$FAMaintenance');
        $RadioMaintenance = Request()->input('RadioMaintenance');
        $BankCharge = Request()->input('BankCharge');
        $Insurance = Request()->input('Insurance');
        $CashBond = Request()->input('CashBond');
        $TotalDeduction = $PhilHealth + $HDMF + $HDMFLoan + $FAMaintenance + $RadioMaintenance + $Insurance + $CashBond;
        $CA = Request()->input('CA');
        $TotalNetPay = $FinalGrossPay - $TotalDeduction - $CA;
        $Employees = [
            $id => [
                'LastName' => $LastName,
                'FirstName' => $FirstName,
                'Birthday' => $Birthday,
                'Gender' => $Gender,
                'DaysWorked' => $DaysWorked,
                'RatePerDay' => $RatePerDay,
                'GrossPay' => $GrossPay,
                'OfficersAllowance' => $OfficersAllowance,
                'NSDifferential' => $NSDifferential,
                'NightDifferential' => $NightDifferential,
                'SHDays' => $SHDays,
                'SpecialHoliday' => $SpecialHoliday,
                'LHDays' => $LHDays,
                'LegalHoliday' => $LegalHoliday,
                'OTAdj' => 0.00,
                'FinalGrossPay' => $FinalGrossPay,
                'PhilHealth' => $PhilHealth,
                'HDMF' => $HDMF,
                'HDMFLoan' => $HDMFLoan,
                'FAMaintenance' => $FAMaintenance,
                'RadioMaintenance' => $RadioMaintenance,
                'BankCharge' => $BankCharge,
                'Insurance' => $Insurance,
                'CashBond' => $CashBond,
                'TotalDeduction' => $TotalDeduction,
                'CA' => $CA,
                'TotalNetPay' => $TotalNetPay
            ]

        ];
        return view('Employees.store', ['Employee'=>$this->EmployeeId[$id]]);
    }
    public function edit($id)
    {
        abort_if(!(isset($this->Employees[$id])), 404);
        return view('Employees.edit', ['Employee'=>$this->Employees[$id]]);
    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {
    }
    public function login()
    {
        return view('Employees.login');
    }
    public function profile($id)
    {
        abort_if(!(isset($this->Employees[$id])), 404);
        return view('Employees.profile', ['Employee'=>$this->Employees[$id]]);
    }
}