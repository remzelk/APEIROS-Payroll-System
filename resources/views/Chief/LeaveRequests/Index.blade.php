@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css" >
@endsection
@section('title', 'Leave Request Archive')
@section('content')
<nav id="mySidenav" class="sidenav">
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/1016964339208556555/White.png?width=960&height=169" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
  <li class="nav-item"><a href="/Chief">Home</a></li>
    <li class="nav-item"><a href="/Chief/Profile">Profile</a></li>
    <li class="nav-item"><a href="/Chief/Attendance">Attendance</a></li>
    <li class="nav-item"><a href="/Chief/Payslips">Payslips</a></li>
    <li class="nav-item"><a href="/Chief/LeaveRequests" class="active">Leave Request</a></li>
    <li class="nav-item"><a href="/Chief/BIRForm2316">BIR Form 2316</a></li>
    <li class="nav-item"><a href="/Chief/AccountSettings">Account Settings</a></li>
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
<button class="bt" onclick="toggleNav()">&#9776; <a class = "navbar-brand my-2 my-lg-0">Chief Portal</a></button> 
<a class="navbar-brand form-inline my-2 my-lg-0 right">Welcome, {{ Auth::user()->name }}!</a>
</nav>

<div id="main">
  <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
			    <h1 class="mb-3">Leave Request Archive</h1>
          <h4 class="mb-3"><b>Days Left:</b> {{ $daysleft }} &emsp; <b>Paid Days Left:</b> {{ $paidleft }}</h4>
          <a href="/Chief/LeaveRequests/create" class="mb-4">+Send Leave Request</a>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="align-middle">Start</th>
                <th class="align-middle">End</th>
                <th class="align-middle">Leave Type</th>
                <th class="align-middle">Approved</th>
                <th></th>
              </tr>
            </thead>
            <div class="scroll">
              @forelse($leave as $key => $leave)
              <tr>
                <td>{{ $leave['Start'] }}</td>
                <td>{{ $leave['End'] }}</td>
                <td>{{ $leave['LeaveType'] }}</td>
                @if($leave['Approved'] == "1")
                    <td>Yes</td>
                @elseif($leave['Approved'] == "0")
                    <td>No</td>
                @elseif($leave['Approved'] == NULL)
                    <td>TBA</td>
                @endif
                <td class="align-middle">
                    <a href="/Chief/LeaveRequests/{{ $leave['LeaveNo'] }}" class="btn btn-primary">View</a>
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