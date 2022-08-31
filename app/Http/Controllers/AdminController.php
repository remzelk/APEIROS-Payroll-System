<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $EmployeeList = [
        1 => [
            'LastName' => 'Ramirez Vidal',
            'FirstName' => 'Eduardo Luis',
            'MiddleInitial' => 'de Jesus',
            'Birthday' => '01/01/1995',
            'Gender' => 'Male',
            'Phone' => 9165756675,
            'Address' => 'Ayala, Makati City',
            'Position' => 'Admin',
            'DateJoined' => '02/23/2020',
            'Email' => 'eldjrv@sample.com',
            'Password' => 'gw6Dg2av'
        ],
        2 => [
            'LastName' => 'Dela Cruz',
            'FirstName' => 'Juan',
            'MiddleInitial' => 'M',
            'Birthday' => '01/01/1995',
            'Gender' => 'Male',
            'Phone' => 9165756675,
            'Address' => 'Ayala, Makati City',
            'Position' => 'Security Personel',
            'DateJoined' => '02/23/2020',
            'Email' => 'juan.delacruz@sample.com',
            'Password' => 'fSjsblEbkv'
        ]
    ];

    public function index()
    {
        return view('Admin.index');
    }

    public function profile()
    {
        return view('Admin.profile', ['EmployeeList'=>$this->EmployeeList]);
    }

    public function addemployee()
    {
        
        return view('Admin.addemployee');
    }

    public function editemployee()
    {
        
        return view('Admin.editemployee');
    }

    public function accountsettings()
    {
        return view('Admin.accountsettings');
    }
}
