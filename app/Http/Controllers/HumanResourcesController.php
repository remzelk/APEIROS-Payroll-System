<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HumanResourcesController extends Controller
{
    private $Employees = [
        1 => [
            'LastName' => 'Dela Cruz',
            'FirstName' => 'Juan',
            'Birthday' => '2000/1/1',
            'Gender' => 'Male',
            'Post' => 'Arzo Hotel',
            'Address' => 'Malolos, Bulacan',
            'Phone' => 9123456789,
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

    private $EmployeeList = [
        1 => [
            'LastName' => 'Dela Cruz',
            'FirstName' => 'Juan',
            'MiddleInitial' => 'M',
            'Birthday' => '01/01/1995',
            'Gender' => 'Male',
            'Phone' => 9165756675,
            'Address' => 'Ayala, Makati City',
            'Position' => 'Security Personel',
            'DateJoined' => '02/23/2020',
            'Email' => 'juandela.cruz@gmail.com',
            'Password' => 'fSjsblEbkv'
        ]
    ];

    private $Detachments = [
        1 => [
            'Detachment' => 'Arlechino',
            'Location' => 'Makati'
        ],
        2 => [
            'Detachment' => 'Arzo Hotel',
            'Location' => 'Manila'
        ],
        3 => [
            'Detachment' => 'Autohub',
            'Location' => 'Quezon'
        ],
        4 => [
            'Detachment' => 'Autohub',
            'Location' => 'Taguig'
        ],
        5 => [
            'Detachment' => 'JIT',
            'Location' => 'Para??aque'
        ],
        6 => [
            'Detachment' => 'Bixby Knolls',
            'Location' => 'Quezon'
        ],
        7 => [
            'Detachment' => 'Bizzu',
            'Location' => 'Makati'
        ],
        8 => [
            'Detachment' => 'Care One',
            'Location' => 'Cavite'
        ],
        9 => [
            'Detachment' => 'Coastline Truck Center',
            'Location' => 'Bulacan'
        ],
        10 => [
            'Detachment' => 'Coastline Truck Center',
            'Location' => 'Subic'
        ],
        11 => [
            'Detachment' => 'Dr. Ching',
            'Location' => 'Makati'
        ],
        12 => [
            'Detachment' => 'Felina',
            'Location' => 'Quezon'
        ],
        13 => [
            'Detachment' => 'FFGMI',
            'Location' => 'Batangas'
        ],
        14 => [
            'Detachment' => 'Filipino Mall',
            'Location' => 'Pasay'
        ],
        15 => [
            'Detachment' => 'Five West',
            'Location' => 'Manila'
        ],
        16 => [
            'Detachment' => 'Good Heart',
            'Location' => 'Quezon'
        ],
        17 => [
            'Detachment' => 'H-CHEM',
            'Location' => 'Pasig'
        ],
        18 => [
            'Detachment' => 'KDDI - CYBER BETA',
            'Location' => 'Makati'
        ],
        19 => [
            'Detachment' => 'KDDI',
            'Location' => 'Batangas'
        ],
        20 => [
            'Detachment' => 'KDDI',
            'Location' => 'Quezon'
        ],
        21 => [
            'Detachment' => 'Libra Agro',
            'Location' => 'Quezon'
        ],
        22 => [
            'Detachment' => 'Mega East',
            'Location' => 'Bataan'
        ],
        23 => [
            'Detachment' => 'Mega East',
            'Location' => 'Tarlac'
        ],
        24 => [
            'Detachment' => 'MultiSys',
            'Location' => 'Para??aque'
        ],
        25 => [
            'Detachment' => 'Norvic',
            'Location' => 'Makati'
        ],
        26 => [
            'Detachment' => 'Ohana',
            'Location' => 'Quezon'
        ],
        27 => [
            'Detachment' => 'Ohana - Frozen',
            'Location' => 'Quezon'
        ],
        28 => [
            'Detachment' => 'Palm Coast',
            'Location' => 'Pasay'
        ],
        29 => [
            'Detachment' => 'Penhurst',
            'Location' => 'Taguig'
        ],
        30 => [
            'Detachment' => 'Pest Science',
            'Location' => 'Makati'
        ],
        31 => [
            'Detachment' => 'Rayner Lorenzo',
            'Location' => 'Manila'
        ],
        32 => [
            'Detachment' => 'RCW & Golvious',
            'Location' => 'Quezon'
        ],
        33 => [
            'Detachment' => 'RCW & Golvious',
            'Location' => 'Taytay'
        ],
        34 => [
            'Detachment' => 'San Antonio',
            'Location' => 'Batangas'
        ],
        35 => [
            'Detachment' => 'Therosa',
            'Location' => 'Manila'
        ]
    ];

    public function login()
    {
        return view('HumanResources.login');
    }

    public function index()
    {
        return view('HumanResources.index');
    }

    public function profile()
    {
        return view('HumanResources.profile', ['EmployeeList'=>$this->EmployeeList]);
    }

    public function employeelist()
    {
        
        return view('HumanResources.employeelist', ['EmployeeList'=>$this->EmployeeList]);
    }

    public function addemployee()
    {
        
        return view('HumanResources.addemployee');
    }
    
    public function editemployee()
    {
        
        return view('HumanResources.editemployee');
    }

    public function detachments()
    {
        
        return view('HumanResources.detachments', ['Detachments'=>$this->Detachments]);
    }

    public function adddetachments()
    {
        
        return view('HumanResources.adddetachments');
    }

    public function editdetachments()
    {
        
        return view('HumanResources.editdetachments');
    }

    public function accountsettings()
    {
        return view('HumanResources.accountsettings');
    }
}
