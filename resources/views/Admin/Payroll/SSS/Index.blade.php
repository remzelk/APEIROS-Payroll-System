@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css" >
@endsection
@section('title', 'SSS')
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

<div id="main">
  <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
          <a href="/Admin/Payroll" class="mb-4">< Payroll</a>
          <h1 class="mb-3">SSS Contribution Table</h1>
          <div class="mb-4">
            <a href="/Admin/Payroll/SSS/create" class="mb-4">+Add Contribution</a>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="align-middle">Minimum</th>
                <th class="align-middle">Maximum</th>
                <th class="align-middle">Employee Contribution</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <div class="scroll">
              @forelse($sss as $key => $sss)
              <tr>
                <td>
                    {{ $sss['Min'] }}
                </td>
                <td>
                    {{ $sss['Max'] }}
                </td>
                <td>
                    {{ $sss['Contribution'] }}
                </td>
                <td class="align-middle">
					<a href="/Admin/Payroll/SSS/{{ $sss['id'] }}/edit" class="btn btn-primary" onclick="return confirm('Edit contribution: <?php echo 'Min: ' , $sss['Min'] , ', Max: ' , $sss['Max'] ?>?')"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				</td>
				<td class="align-middle">
					<form action="/Admin/Payroll/SSS/{{ $sss['id'] }}" method="POST">
						@csrf
						@method('Delete')
                        <input type="hidden" name="name" value= <?php echo $key ?>>
						<button class="btn btn-danger" onclick="return confirm('Remove employee: <?php echo 'Min: ' , $sss['Min'] , ', Max: ' , $sss['Max'] ?>?')"><i class="fa fa-trash" aria-hidden="true" value="Delete"></i></button>
					</form>					
                </td>
                @empty
                <td colspan="5">
                  <h1>No Data!</h1>
                </td>
              @endforelse
            </tr>
          </div>
			  </table>
        </div>
    </div>
  </div>
<div>
@endsection