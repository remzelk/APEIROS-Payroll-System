<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountingController extends Controller
{
    private $Employees = [
        1 => [
            'LastName' => 'Dela Cruz',
            'FirstName' => 'Juan',
            'Birthday' => '2000/1/1',
            'Gender' => 'Male',
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

    public function login(){
        return view('Accounting.login');
    }
    
    public function employeepayroll()
    {
        return view('Accounting.employeepayroll', ['Employees'=>$this->Employees]);
    }

    public function accountsettings()
    {
        return view('Accounting.accountsettings');
    }
}
