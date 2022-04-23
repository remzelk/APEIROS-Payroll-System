@extends('layouts.mainlayout')
@section('head')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/Main.css" >
@endsection
@section('title', 'Profile')
@section('content')
@include('partials.navbar')
<div  id="main">
<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{ $Employee['FirstName'] }} {{ $Employee['LastName'] }}</h4>
                      <p class="text-secondary mb-1">Security Guard</p>
                      <p class="text-secondary mb-1"><b>Post:</b> {{ $Employee['Post'] }}</p><br>
                      <button type="button" class="btn btn-primary hidden-print"><span class="fa fa-print"></span> Print</button>
                      <button class="btn btn-info">Edit</button>
                      <button class="btn btn-danger">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Birthday</h6>
                    <span class="text-secondary">{{ $Employee['Birthday'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Gender</h6>
                    <span class="text-secondary">{{ $Employee['Gender'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Address</h6>
                    <span class="text-secondary">{{ $Employee['Address'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Phone</h6>
                    <span class="text-secondary">{{ $Employee['Phone'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Email</h6>
                    <span class="text-secondary">{{ $Employee['Email'] }}</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <h3 class="mb-0 center">15 Day Report</h3>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0">No. of Days</h6>
                    <span class="text-secondary">{{ $Employee['DaysWorked'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0">Rate Per Day</h6>
                    <span class="text-secondary">{{ number_format($Employee['RatePerDay'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Gross Pay</h6>
                    <span class="text-secondary">{{ number_format($Employee['GrossPay'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0">Officers Allowance</h6>
                    <span class="text-secondary">{{ number_format($Employee['OfficersAllowance'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Night Shift Days</h6>
                    <span class="text-secondary">{{ $Employee['NSDifferential'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Night Differential</h6>
                    <span class="text-secondary">{{ number_format($Employee['NightDifferential'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Special Holiday Days</h6>
                    <span class="text-secondary">{{ $Employee['SHDays'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Special Holiday</h6>
                    <span class="text-secondary">{{ number_format($Employee['SpecialHoliday'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Legal Holiday Days</h6>
                    <span class="text-secondary">{{ $Employee['LHDays'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Legal Holiday</h6>
                    <span class="text-secondary">{{ number_format($Employee['LegalHoliday'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Overtime</h6>
                    <span class="text-secondary">{{ number_format($Employee['OTAdj'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Final Gross Pay</h6>
                    <span class="text-secondary"><b>{{ number_format($Employee['FinalGrossPay'], 2) }}</b></span>
                  </li>
                </ul>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card">
                    <div class="card-body">
                    <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0">PhilHealth</h6>
                    <span class="text-secondary">{{ number_format($Employee['PhilHealth'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">HDMF</h6>
                    <span class="text-secondary">{{ number_format($Employee['HDMF'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0">HDMF Loan</h6>
                    <span class="text-secondary">{{ number_format($Employee['HDMFLoan'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Fire Arms Maintenance</h6>
                    <span class="text-secondary">{{ number_format($Employee['FAMaintenance'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Radio Maintenance</h6>
                    <span class="text-secondary">{{ number_format($Employee['RadioMaintenance'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Bank Charge</h6>
                    <span class="text-secondary">{{ number_format($Employee['BankCharge'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Insurance</h6>
                    <span class="text-secondary">{{ number_format($Employee['Insurance'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Cash Bond</h6>
                    <span class="text-secondary">{{ number_format($Employee['CashBond'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Total Deduction</h6>
                    <span class="text-secondary">{{ number_format($Employee['TotalDeduction'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Cash Advance</h6>
                    <span class="text-secondary">{{ number_format($Employee['CashAdvance'], 2) }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Total Net Pay</h6>
                    <span class="text-secondary"><b>{{ number_format($Employee['TotalNetPay'], 2) }}</b></span>
                  </li>
                </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
            </div>
          </div>
        </div>
    </div>
@endsection