@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css" >
@endsection
@section('title', 'Employee Payroll (Add Employee)')
@section('content')
<nav id="mySidenav" class="sidenav">
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/958687472227868682/275714560_317115067181930_3442500599053539010_n.png?width=1025&height=180" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="/Admin">Home</a></li>
    <li class="nav-item"><a href="/Admin/Profile">Profile</a></li>
    <li class="nav-item"><a href="/Admin/EmployeeList">Employee List</a></li>
    <li class="nav-item"><a href="/Admin/EmployeePayroll" class="active">Employee Payroll</a></li>
    <li class="nav-item"><a href="/Admin/DetachmentsWages">Detachments & Wages</a></li>
    <li class="nav-item"><a href="/Admin/AccountSettings">Account Settings</a></li>
    <li class="nav-item"><a href="/Admin/Login" onclick="return confirm('Are you sure to logout?')">Logout</a></li>
  </ul>
</nav>
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
<a class="navbar-brand form-inline my-2 my-lg-0 right">Welcome, User!</a>
</nav>

<div  id="main">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
          <a href="/Admin/EmployeePayroll">< <u>Employee Payroll</u></a><br><br>
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add Employee</h3>
            <form action="/Admin/EmployeePayroll/" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                  <label>Full Name</label>                    
                  <input type="text" id="Name" name="Name" class="form-control mb-4" placeholder="Enter Full Name"> 
                </div>
                <div class="col-md-6">
                  <label>Detachment</label>
                  <select id="Detachment" name="Detachment" class="form-control mb-4">
                    @foreach ($detachment as $detachment)
                      <option id="RatePerDay" name="RatePerDay" value="{{ $detachment['Detachment'] }}">{{ $detachment['Detachment'] }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label>Location</label>
                  <input type="text" id="Location" name="Location" class="form-control mb-4" placeholder="Enter Location"> 
                </div>
                <div class="col-md-6">
                  <label>No. of Days</label>
                  <input type="number" step="1" max="31" min="0" value="0" id="DaysWorked" name="DaysWorked" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>Officer's Allowance</label>
                  <input type="number" step="1" min="0" value="0.00" id="OfficersAllowance" name="OfficersAllowance" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>Night Shift Differential (Days)</label>
                  <input type="number" step="1" max="31" min="0" value="0" id="NSDifferential" name="NSDifferential" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>Special Holiday (Days)</label>
                  <input type="number" step="1" min="0" value="0" id="SHDays" name="SHDays" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>Legal Holiday (Days)</label>
                  <input type="number" step="1" min="0" value="0" id="LHDays" name="LHDays" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>Overtime/Adj.</label>
                  <input type="number" step="1" min="0" value="0.00" id="OTAdj" name="OTAdj" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>PhilHealth</label>
                  <input type="number" step="1" min="0" value="0.00" id="PhilHealth" name="PhilHealth" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>HDMF</label>
                  <input type="number" step="1" min="0" value="0.00" id="HDMF" name="HDMF" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>HDMF Loan</label>
                  <input type="number" step="1" min="0" value="0.00" id="HDMFLoan" name="HDMFLoan" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>Firearms Maintenance</label>
                  <input type="number" step="1" min="0" value="0.00" id="FAMaintenance" name="FAMaintenance" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>Radio Maintenance</label>
                  <input type="number" step="1" min="0" value="0.00" id="RadioMaintenance" name="RadioMaintenance" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>Bank Charge</label>
                  <input type="number" step="1" min="0" value="0.00" id="BankCharge" name="BankCharge" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>Insurance</label>
                  <input type="number" step="1" min="0" value="0.00" id="Insurance" name="Insurance" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>Cash Bond</label>
                  <input type="number" step="1" min="0" value="0.00" id="CashBond" name="CashBond" class="form-control mb-4">
                </div>
                <div class="col-md-6">
                  <label>Cash Advance</label>
                  <input type="number" step="1" min="0" value="0.00" id="CashAdvance" name="CashAdvance" class="form-control mb-4">
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