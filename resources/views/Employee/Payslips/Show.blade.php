@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/payslip.css" >
@endsection
@section('title', 'Payslips')
@section('content')
<div id="main">
<a href="" id="printpayslip" onclick="window.print()" target="_blank" class="btn btn-primary pr"><i class="fa fa-print" aria-hidden="true"></i>Print</a>
  <img src="https://cdn.discordapp.com/attachments/958687400203255808/1016414040618180638/275714560_317115067181930_3442500599053539010_n_1.png" alt="logo"><br><br>
  <div class="d-flex justify-content-between">
    <div>
      <h1>{{ $payroll['Name'] }}</h1>
      <p>{{ $application['Address'] }}</p>
      <p>{{ $application['Phone'] }}</p>
      <p>{{ $application['Email'] }}</p>
    </div>
    <div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Detachment</th>
            <th scope="col">Period Start Date</th>
            <th scope="col">Period End Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach($detachment as $detachment)
              @if($detachment['DCode'] == $payroll['DCode'])
                <td>{{ $detachment['Detachment'] }}: {{ $detachment['Location'] }}</td>
              @endif
            @endforeach
                <td>{{ $payrollcode['Start'] }}</td>
                <td>{{ $payrollcode['End'] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
<h1 class="center mb-4">Payslip</h1>  
<div class="d-flex justify-content-between mb-2">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th scope="row">No. of days</td>
        <td>{{ $payroll['DaysWorked'] }}</td>
      </tr>
      <tr>
        <th scope="row">Rate per day</td>
        <td>{{ $payroll['RatePerDay'] }}</td>
      </tr>
      <tr>
        <th scope="row">Gross Pay</td>
        <th scope="row">{{ $payroll['GrossPay'] }}</th>
      </tr>
      <tr>
        <th scope="row">Officer's Allowance</td>
        <td>{{ $payroll['OfficersAllowance'] }}</td>
      </tr>
      <tr>
        <th scope="row">Night Shift Differential</td>
        <td>{{ $payroll['NSDifferential'] }}</td>
      </tr>
      <tr>
        <th scope="row">Night Differential</td>
        <td>{{ $payroll['NightDifferential'] }}</td>
      </tr>
      <tr>
        <th scope="row">S.H. Days</td>
        <td>{{ $payroll['SHDays'] }}</td>
      </tr>
      <tr>
        <th scope="row">Special Holiday</td>
        <td>{{ $payroll['SpecialHoliday'] }}</td>
      </tr>
      <tr>
        <th scope="row">L.H. Days</td>
        <td>{{ $payroll['LHDays'] }}</td>
      </tr>
      <tr>
      <tr>
        <th scope="row">Legal Holiday</td>
        <td>{{ $payroll['LegalHoliday'] }}</td>
      </tr>
      <tr>
        <th scope="row">OT/Adj.</td>
        <td>{{ $payroll['OTAdj'] }}</td>
      </tr>
      <tr>
        <th scope="row">Gross Pay</td>
        <th scope="row">{{ $payroll['FinalGrossPay'] }}</th>
      </tr>
    </tbody>
  </table>
  <h1>&emsp;</h1>
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th scope="row">SSS</td>
        <td>{{ $payroll['SSS'] }}</td>
      </tr>
      <tr>
        <th scope="row">SSS Loan</td>
        <td>{{ $payroll['SSSLoan'] }}</td>
      </tr>
      <tr>
        <th scope="row">PhilHealth</td>
        <td>{{ $payroll['PhilHealth'] }}</td>
      </tr>
      <tr>
        <th scope="row">HDMF</td>
        <td>{{ $payroll['HDMF'] }}</td>
      </tr>
      <tr>
        <th scope="row">HDMF Loan</td>
        <td>{{ $payroll['HDMFLoan'] }}</td>
      </tr>
      <tr>
        <th scope="row">Firearms Maintenance</td>
        <td>{{ $payroll['FAMaintenance'] }}</td>
      </tr>
      <tr>
        <th scope="row">Radio Maintenance</td>
        <td>{{ $payroll['RadioMaintenance'] }}<td>
      </tr>
      <tr>
        <th scope="row">Bank Charge</td>
        <td>{{ $payroll['BankCharge'] }}</td>
      </tr>
      <tr>
        <th scope="row">Insurance</td>
        <td>{{ $payroll['Insurance'] }}</td>
      </tr>
      <tr>
        <th scope="row">Cash Bond</td>
        <td>{{ $payroll['CashBond'] }}</td>
      </tr>
      <tr>
        <th scope="row">Total Deduction</td>
        <td scope="row">{{ $payroll['TotalDeduction'] }}</td>
      </tr>
      <tr>
        <th scope="row">Cash Advance</td>
        <td>{{ $payroll['CashAdvance'] }}</td>
      </tr>
    </tbody>
  </table>
</div>
<div class="center">
  <h1 class="mb-4">Net Pay: {{ $payroll['TotalNetPay'] }}</h1>
  <p class="mb-4">If you have any concerns, please contact us on apeirosagency@yahoo.com.</p>
</div>
<div>
@endsection