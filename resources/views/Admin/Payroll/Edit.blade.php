@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css" >
@endsection
@section('title', 'Payroll (Edit Employee)')
@section('content')
<nav id="mySidenav" class="sidenav">
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/1016964339208556555/White.png?width=960&height=169" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="/Admin">Home</a></li> 
    <li class="nav-item has-submenu">
    <a href="#" class="nav-link">Credentials <i class="fa fa-caret-down"></i></a>
        <ul class="submenu collapse">
          <li><a class="nav-item" href="/Admin/Credentials/Admin">Admin</a></li>
          <li><a class="nav-link" href="/Admin/Credentials/HumanResources">Human Resources</a></li>
          <li><a class="nav-item" href="/Admin/Credentials/Accounting">Accounting</a></li>
          <li><a class="nav-item" href="/Admin/Credentials/Employee">Employee</a></li>
          <li><a class="nav-item" href="/Admin/Credentials/Chief">Chief</a></li>
          <li><a class="nav-item" href="/Admin/Credentials/Register">Register</a></li>
        </ul>
    </li>
    <li class="nav-item"><a href="/Admin/ProfileList">Profile List</a></li>
    <li class="nav-item"><a href="/Admin/SocialBenefits">Social Benefits</a></li>
    <li class="nav-item"><a href="/Admin/BIRForm2316">BIR Form 2316</a></li>
    <li class="nav-item"><a href="/Admin/Detachments">Detachments</a></li>
    <li class="nav-item"><a href="/Admin/AssignDetachments">Assign Detachments</a></li>
    <li class="nav-item"><a href="/Admin/PayrollCode">Payroll Codes</a></li>
    <li class="nav-item"><a href="/Admin/Attendance">Attendance</a></li>
    <li class="nav-item"><a href="/Admin/Payroll" class="active">Payroll</a></li>
    <li class="nav-item"><a href="/Admin/LeaveRequests">Leave Requests</a></li>
    <li class="nav-item"><a href="/Admin/DigitalAttendance">Digital Attendance</a></li>
    <li class="nav-item"><a href="/Admin/AccountSettings">Account Settings</a></li>
    <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
  </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
<script>
function toggleNav() {
	var sidenav = document.getElementById("mySidenav"),
    main = document.getElementById("main");
    sidenav.style.width = sidenav.style.width == "250px" ? '0' : '250px';
    main.style.marginLeft = main.style.marginLeft === "250px" ? '0' : '250px';
}

document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidenav .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    });
  })
}); 
</script>

<nav class="navbar navbar-light navbg">
<button class="bt" onclick="toggleNav()">&#9776; <a class = "navbar-brand my-2 my-lg-0">Admin Portal</a></button> 
<a class="navbar-brand form-inline my-2 my-lg-0 right">Welcome, {{ Auth::user()->name }}!</a>
</nav>

<div  id="main">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
          <a href="/Admin/Payroll">< <u>Payroll</u></a><br><br>
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit Employee</h3>
            <form action="/Admin/Payroll/{{ $payroll['UserNo'] }}" method="POST">
            @csrf
            @method('Put')
            <div class="row">
              <div class="col-md-6">
                  <label>Duration</label>                    
                  <select id="PayCode" name="PayCode" class="form-control mb-4" required>
                    @foreach ($payrollcode as $key => $payrollcode)
                      @if($payrollcode['PayCode'] == $payroll['PayCode'])
                        <option value="{{ $payrollcode['PayCode'] }}" selected><b>Start:</b> {{ $payrollcode['Start'] }}, <b>End:</b> {{ $payrollcode['End'] }}</option>
                      @else
                        <option value="{{ $payrollcode['PayCode'] }}"><b>Start:</b> {{ $payrollcode['Start'] }}, <b>End:</b> {{ $payrollcode['End'] }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label>Name</label>                    
                  <select id="Name" name="Name" class="form-control mb-4" required>
                    @foreach ($user as $key => $user)
                      @if(($user['position'] == "4") || ($user['position'] == "5") && ($user['name'] != ""))
                        @if($user['userno'] == $payroll['UserNo'])
                        <option value="{{ $user['userno'] }}" selected>{{ $user['name'] }}</option>
                        @else
                        <option value="{{ $user['userno'] }}">{{ $user['name'] }}</option>
                        @endif
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label>Rate Per Day</label>
                  <input type="number" step="1" min="0" value="{{ $payroll['RatePerDay'] }}" id="RatePerDay" name="RatePerDay" class="form-control mb-4" required>
                </div>
                <div class="col-md-6">
                  <label>Officer's Allowance</label>
                  <input type="number" step="1" min="0" value="{{ $payroll['OfficersAllowance'] }}" id="OfficersAllowance" name="OfficersAllowance" class="form-control mb-4" required>
                </div>
                <div class="col-md-6">
                  <label>Overtime/Adj.</label>
                  <input type="number" step="1" min="0" value="{{ $payroll['OTAdj'] }}" id="OTAdj" name="OTAdj" class="form-control mb-4" required>
                </div>
                <div class="col-md-6">
                  <label>SSS Loan</label>
                  <input type="number" step="1" min="0" value="{{ $payroll['SSSLoan'] }}" id="SSSLoan" name="SSSLoan" class="form-control mb-4" required>
                </div>
                <div class="col-md-6">
                  <label>HDMF Loan</label>
                  <input type="number" step="1" min="0" value="{{ $payroll['HDMFLoan'] }}" id="HDMFLoan" name="HDMFLoan" class="form-control mb-4" required>
                </div>
                <div class="col-md-6">
                  <label>Firearms Maintenance</label>
                  <input type="number" step="1" min="0" value="{{ $payroll['FAMaintenance'] }}" id="FAMaintenance" name="FAMaintenance" class="form-control mb-4" required>
                </div>
                <div class="col-md-6">
                  <label>Radio Maintenance</label>
                  <input type="number" step="1" min="0" value="{{ $payroll['RadioMaintenance'] }}" id="RadioMaintenance" name="RadioMaintenance" class="form-control mb-4" required>
                </div>
                <div class="col-md-6">
                  <label>Bank Charge</label>
                  <input type="number" step="1" min="0" value="{{ $payroll['BankCharge'] }}" id="BankCharge" name="BankCharge" class="form-control mb-4" required>
                </div>
                <div class="col-md-6">
                  <label>Insurance</label>
                  <input type="number" step="1" min="0" value="{{ $payroll['Insurance'] }}" id="Insurance" name="Insurance" class="form-control mb-4" required>
                </div>
                <div class="col-md-6">
                  <label>Cash Bond</label>
                  <input type="number" step="1" min="0" value="{{ $payroll['CashBond'] }}" id="CashBond" name="CashBond" class="form-control mb-4" required>
                </div>
                <div class="col-md-6">
                  <label>Cash Advance</label>
                  <input type="number" step="1" min="0" value="{{ $payroll['CashAdvance'] }}" id="CashAdvance" name="CashAdvance" class="form-control mb-4" required>
                </div>
            </div>
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg bton" type="submit" onclick="return confirm('Are you sure these data are correct?')" value="Submit" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<div>
@endsection