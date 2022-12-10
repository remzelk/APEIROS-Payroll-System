@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css" >
@endsection
@section('title', 'Payroll')
@section('content')
<nav id="mySidenav" class="sidenav">
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/1016964339208556555/White.png?width=960&height=169" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="/Accounting">Home</a></li>
    <li class="nav-item"><a href="/Accounting/SocialBenefits">Social Benefits</a></li>
    <li class="nav-item"><a href="/Accounting/PayrollCode">Payroll Codes</a></li>
    <li class="nav-item"><a href="/Accounting/Payroll" class="active">Payroll</a></li>
    <li class="nav-item"><a href="/Accounting/AccountSettings">Account Settings</a></li>
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
<button class="bt" onclick="toggleNav()">&#9776; <a class = "navbar-brand my-2 my-lg-0">Accounting Portal</a></button> 
<a class="navbar-brand form-inline my-2 my-lg-0 right">Welcome, {{ Auth::user()->name }}!</a>
</nav>

<div  id="main">
  <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
			<h1 class="mb-3">Payroll</h1>
			<h3 class="mb-3">Start: {{ $payrollcode['Start'] }} &emsp; End: {{ $payrollcode['End'] }}</h3>
			<a href="/Accounting/Payroll/create">+Add Employee</a>
			<div class="form-inline my-2 my-lg-0 right"> 
				<form action="" method="get">
					<input class="form-control mb-4 search" type="search" name="search" value="{{ $search }}" placeholder="Name/Detach./Loc.">
					<button class="btn btn-outline-success mb-4" type="submit">Search</button>
				</form>
			</div>

			<div class="scroll">
			<table class="table table-striped">
				<thead>
					<tr>
						<th></th>
						<th></th>
						<th class="align-middle">Detachment</th>
						<th class="align-middle">User No.</th>
						<th class="align-middle">Employee Name</th>
						<th class="align-middle">No. of Days</th>
						<th class="align-middle">Rate Per Day</th>
						<th class="align-middle">Basic Pay</th>
						<th class="align-middle">Officer's Allowance</th>
						<th class="align-middle">Night Shift Differential</th>
						<th class="align-middle">Night Differential</th>
						<th class="align-middle">S.H. Days</th>
						<th class="align-middle">Special Holiday</th>
						<th class="align-middle">L.H. Days</th>
						<th class="align-middle">Legal Holiday</th>
						<th class="align-middle">Adjustment</th>
						<th class="align-middle">Gross Pay</th>
						<th class="align-middle">PhilHealth</th>
						<th class="align-middle">HDMF</th>
						<th class="align-middle">HDMF Loan</th>
						<th class="align-middle">SSS</th>
						<th class="align-middle">SSS Loan</th>
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
				@forelse($payroll as $key => $payroll)
				<tr>
					<td class="align-middle">
						<a href="/Accounting/Payroll/{{$payroll['PayCode']}}/{{ $payroll['UserNo'] }}" class="btn btn-primary" onclick="return confirm('Edit employee: <?php echo $payroll['Name'] ?>?')"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					</td>
					<td class="align-middle">
						<form action="/Accounting/Payroll/{{ $payroll['UserNo'] }}" method="POST">
							@csrf
							@method('Delete')
                            <input type="hidden" name="PayCode" value="{{$payroll['PayCode']}}">
                            <input type="hidden" name="Name" value="{{$payroll['Name']}}">
							<button class="btn btn-danger" onclick="return confirm('Remove employee: <?php echo $payroll['Name'] ?>?')"><i class="fa fa-trash" aria-hidden="true" value="Delete"></i></button>
						</form>
					</td>
					<td>
						{{ $payroll['Detachment'] }}: {{ $payroll['Location'] }}
					</td>
					<td>
						{{ $payroll['UserNo'] }}
					</td>
					<td>
						{{ $payroll['Name'] }}
					</td>
					<td>
						{{ $payroll['DaysWorked'] }}
					</td>
					<td>
						{{ $payroll['RatePerDay'] }}
					</td>
					<td>
						{{ $payroll['GrossPay'] }}
					</td>
					<td>
						{{ $payroll['OfficersAllowance'] }}
					</td>
					<td>
						{{ $payroll['NSDifferential'] }}
					</td>
					<td>
						{{ $payroll['NightDifferential'] }}
					</td>
					<td>
						{{ $payroll['SHDays'] }}
					</td>
					<td>
						{{ $payroll['SpecialHoliday'] }}
					</td>
					<td>
						{{ $payroll['LHDays'] }}
					</td>
					<td>
						{{ $payroll['LegalHoliday'] }}
					</td>
					<td>
						{{ $payroll['OTAdj'] }}
					</td>
					<td>
						{{ $payroll['FinalGrossPay'] }}
					</td>
					<td>
						{{ $payroll['PhilHealth'] }}
					</td>
					<td>
						{{ $payroll['HDMF'] }}
					</td>
					<td>
						{{ $payroll['HDMFLoan'] }}
					</td>
					<td>
						{{ $payroll['SSS'] }}
					</td>
					<td>
						{{ $payroll['SSSLoan'] }}
					</td>
					<td>
						{{ $payroll['FAMaintenance'] }}
					</td>
					<td>
						{{ $payroll['RadioMaintenance'] }}
					</td>	
					<td>
						{{ $payroll['BankCharge'] }}
					</td>
					<td>
						{{ $payroll['Insurance'] }}
					</td>
					<td>
						{{ $payroll['CashBond'] }}
					</td>
					<td>
						{{ $payroll['TotalDeduction'] }}
					</td>
					<td>
						{{ $payroll['CashAdvance'] }}
					</td>
					<td>
						{{ $payroll['TotalNetPay'] }}
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="29">
						<h1>No Data!</h1>
					</td>
    			
				</tr>
				@endforelse
			</div>
			</table>
			</div>
        </div>
    </div>
  </div>
<div>
@endsection