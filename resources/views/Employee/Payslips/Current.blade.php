@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/payslip.css" >
@endsection
@section('title', 'Current Payslip')
@section('content')
<nav id="mySidenav" class="sidenav">
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/1016964339208556555/White.png?width=960&height=169" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="/Employee">Home</a></li>
    <li class="nav-item"><a href="/Employee/Profile/{{ Auth::user()->id }}">Profile</a></li>
    <li  class="nav-item has-submenu">
      <a href="#" class="nav-link">Payslips <i class="fa fa-caret-down"></i></a>
        <ul class="submenu collapse">
          <li><a class="nav-item active" href="/Employee/Payslips-Current">Current Payslip</a></li>
          <li><a class="nav-link" href="/Employee/Payslips-Archive">Payslip Archive</a></li>
      </ul>
    <li class="nav-item"><a href="/Employee/Attendance">Attendance</a></li>
    <li class="nav-item"><a href="/Employee/LeaveRequest">Leave Request</a></li>
    <li class="nav-item"><a href="/Employee/BIRForm2316">BIR Form 2316</a></li>
    <li class="nav-item"><a href="/Employee/AccountSettings">Account Settings</a></li>
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

<nav id="navbar" class="navbar navbar-light navbg">
<button class="bt" onclick="toggleNav()">&#9776; <a class = "navbar-brand my-2 my-lg-0">Employee Portal</a></button> 
<a class="navbar-brand form-inline my-2 my-lg-0 right">Welcome, {{ Auth::user()->name }}!</a>
</nav>

<div id="main">
<a href="" id="printpayslip" onclick="window.print()" target="_blank" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i>Print</a>
  <img src="https://cdn.discordapp.com/attachments/958687400203255808/1016414040618180638/275714560_317115067181930_3442500599053539010_n_1.png" alt="logo"><br><br>
  <div class="d-flex justify-content-between">
    <div>
      <h1>Name</h1>
      <p>Address</p>
      <p>Phone Number</p>
      <p>Email</p>
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
            <td></td>
            <td></td>
            <td></td>
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
        <td></td>
      </tr>
      <tr>
        <th scope="row">Salary per day</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Ecola</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Total pay</td>
        <th scope="row"></th>
      </tr>
      <tr>
        <th scope="row">Adj.</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Uniform</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Allowance</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Differential</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Night Differential</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">T/N/Differential</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Special Holiday</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Legal Holiday</td>
        <td></td>
      </tr><tr>
        <th scope="row">Gross Pay</td>
        <th scope="row"></th>
      </tr>
    </tbody>
  </table>
  <h1>&emsp;</h1>
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th scope="row">SSS</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">PhilHealth</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Pag-IBIG</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Firearms Maintenance</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Radio Maintenance</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Bank Charge</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Insurance</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Cash Advance</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Cash Bond</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Burial Assistance</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">SSS Loan</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">HDMF Loan</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Other</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row">Total Deduction</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="center">
  <h1 class="mb-4">Net Pay:</h1>
  <p class="mb-4">If you have any concerns, please contact us on apeirosagency@yahoo.com.</p>
</div>
<div>
@endsection