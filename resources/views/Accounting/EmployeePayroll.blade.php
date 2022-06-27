@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/accounting.css" >
@endsection
@section('title', 'Employee Payroll')
@section('content')
<nav id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><br>
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/958687472227868682/275714560_317115067181930_3442500599053539010_n.png?width=1025&height=180" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="/Accounting">Home</a></li>
    <li class="nav-item"><a href="/Accounting/Profile">Profile</a></li>
    <li class="nav-item"><a href="/Accounting/EmployeePayroll" class="active">Employee Payroll</a></li>
    <li class="nav-item"><a href="/Accounting/AccountSettings">Account Settings</a></li>
	<li class="nav-item"><a href="/Accounting/Login" onclick="return confirm('Are you sure to logout?')">Logout</a></li>
  </ul>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
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
<button class="bt" onclick="openNav()">&#9776; <a class = "navbar-brand my-2 my-lg-0">Accounting Portal</a></button> 
<a class="navbar-brand form-inline my-2 my-lg-0 right">Apeiros Security Solutions & Investigation Agency, Inc.</a>
</nav>

<div  id="main">
  <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
			<h1>Employee Payroll</h1><br>
			<div class="form-inline my-2 my-lg-0"> 
				<select class="form-control mb-4" name="Post" id="Post">
					<option value="AllPosts" selected="selected">All Posts</option>
				</select>
			</div>
			<div class="form-inline my-2 my-lg-0 right"> 
    			<input class="form-control mb-4 search" type="search" placeholder="Search Employee" aria-label="Search">
    			<button class="btn btn-outline-success mb-4" type="submit">Search</button>
			</div>
			<div class="scroll">
			<table class="table table-striped">
				<thead>
					<tr>
						<th class="align-middle">Employee Name</th>
						<th class="align-middle">No. of Days</th>
						<th class="align-middle">Rate Per Day</th>
						<th class="align-middle">Gross Pay</th>
						<th class="align-middle">Officer's Allowance</th>
						<th class="align-middle">Night Shift Differential</th>
						<th class="align-middle">Night Differential</th>
						<th class="align-middle">No. of Days</th>
						<th class="align-middle">Special Holiday</th>
						<th class="align-middle">No. of Days</th>
						<th class="align-middle">Legal Holiday</th>
						<th class="align-middle">OT/Adj.</th>
						<th class="align-middle">Gross Pay</th>
						<th class="align-middle">PhilHealth</th>
						<th class="align-middle">HDMF</th>
						<th class="align-middle">HDMF Loan</th>
						<th class="align-middle">F/A MNTNZ</th>
						<th class="align-middle">Radio MNTANANZ</th>
						<th class="align-middle">Bank Charge</th>
						<th class="align-middle">Insurance</th>
						<th class="align-middle">Cash Bond</th>
						<th class="align-middle">Total Deduction</th>
						<th class="align-middle">CA</th>
						<th class="align-middle">Total Net Pay</th>
					</tr>
				</thead>
			<div class="scroll">
				@forelse($Employees as $key => $Employee)
				<tr>
					<td>
						{{ $Employee['LastName'] }}, {{ $Employee['FirstName'] }}
					</td>
					<td>
						{{ $Employee['DaysWorked'] }}
					</td>
					<td>
						{{ $Employee['RatePerDay'] }}
					</td>
					<td>
						{{ $Employee['GrossPay'] }}
					</td>
					<td>
						{{ $Employee['OfficersAllowance'] }}
					</td>
					<td>
						{{ $Employee['NSDifferential'] }}
					</td>
					<td>
						{{ $Employee['NightDifferential'] }}
					</td>
					<td>
						{{ $Employee['SHDays'] }}
					</td>
					<td>
						{{ $Employee['SpecialHoliday'] }}
					</td>
					<td>
						{{ $Employee['LHDays'] }}
					</td>
					<td>
						{{ $Employee['LegalHoliday'] }}
					</td>
					<td>
						{{ $Employee['OTAdj'] }}
					</td>
					<td>
						{{ $Employee['FinalGrossPay'] }}
					</td>
					<td>
						{{ $Employee['PhilHealth'] }}
					</td>
					<td>
						{{ $Employee['HDMF'] }}
					</td>
					<td>
						{{ $Employee['HDMFLoan'] }}
					</td>
					<td>
						{{ $Employee['FAMaintenance'] }}
					</td>
					<td>
						{{ $Employee['RadioMaintenance'] }}
					</td>	
					<td>
						{{ $Employee['BankCharge'] }}
					</td>
					<td>
						{{ $Employee['Insurance'] }}
					</td>
					<td>
						{{ $Employee['CashBond'] }}
					</td>
					<td>
						{{ $Employee['TotalDeduction'] }}
					</td>
					<td>
						{{ $Employee['CashAdvance'] }}
					</td>
					<td>
						{{ $Employee['TotalNetPay'] }}
					</td>
				</tr>
			@empty
    		<h1>No Data!</h1>
			@endforelse
			</div>
			</table>
			</div>
        </div>
    </div>
  </div>
<div>
@endsection