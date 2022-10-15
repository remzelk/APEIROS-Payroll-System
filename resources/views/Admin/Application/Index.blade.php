@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css" >
  <script src="{{ asset('js/app.js') }}" defer></script>
@endsection
@section('title', 'Application')
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
    <li class="nav-item"><a href="/Admin/Application" class="active">Application List</a></li>
    <li class="nav-item"><a href="/Admin/SocialBenefits">Social Benefits</a></li>
    <li class="nav-item"><a href="/Admin/Detachments">Detachments</a></li>
    <li class="nav-item"><a href="/Admin/AssignDetachments">Assign Detachments</a></li>
    <li class="nav-item"><a href="/Admin/PayrollCode">Payroll Codes</a></li>
    <li class="nav-item"><a href="/Admin/Attendance">Attendance</a></li>
    <li class="nav-item"><a href="/Admin/Payroll">Payroll</a></li>
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
  <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
			<h1>Application List</h1><br>
      <form action="" method="get">
        <div class="form-inline my-2 my-lg-0 right"> 
            <input class="form-control mb-4 search" type="search"  name="search" id="search" value="{{$search}}" placeholder="Search">
            <button class="btn btn-outline-success mb-4" type="submit">Search</button>
        </div>
      </form>
		<div class="scroll">
			<table class="table table-striped">
				<thead>
					<tr>
						<th class="align-middle">Name</th>
            <th class="align-middle">Position</th>
            <th></th>
            <th></th>
					</tr>
				</thead>
			<div class="scroll">
				@forelse($user as $key => $user)
        @if($user['position'] == "4")
				<tr>
					<td class="text-left">{{ $user['name'] }}</td>
          <td class="text-left">Security Guard</td>
          <td class="text-left"><a class="profile-name" target="__blank" href="/Admin/ApplicationList/{{ $user['userno'] }}">View</a></td>
          <td class="text-left"><a class="profile-name" href="{{ route('downloadapplication', $user['userno']) }}">Download</a></td>
        </tr>
        @elseif($user['position'] == "5")
				<tr>
					<td class="text-left">{{ $user['name'] }}</td>
          <td class="text-left">Chief Security Guard</td>
          <td class="text-left"><a class="profile-name" arget="__blank" href="/Admin/ApplicationList/{{ $user['userno'] }}">View</a></td>
          <td class="text-left"><a class="profile-name" href="{{ route('downloadapplication', $user['userno']) }}">Download</a></td>
        </tr>
        @endif
        @empty
          <tr>
    		    <td colspan="4">
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