@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/Main.css" >
@endsection
@section('title', 'Employee List')
@section('content')
@include('partials.navbar')
<div  id="main">
  <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
			<h1>List of Employees</h1><br>
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