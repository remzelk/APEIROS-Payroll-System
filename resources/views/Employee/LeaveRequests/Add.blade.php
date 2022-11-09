@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css" >
@endsection
@section('title', 'Leave Request Form')
@section('content')
<nav id="mySidenav" class="sidenav">
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/1016964339208556555/White.png?width=960&height=169" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="/Employee">Home</a></li>
    <li class="nav-item"><a href="/Employee/Application/{{ Auth::user()->userno }}">Application</a></li>
    <li class="nav-item"><a href="/Employee/Payslips">Payslips</a></li>
    <li class="nav-item"><a href="/Employee/LeaveRequests" class="active">Leave Requests</a></li>
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

<nav class="navbar navbar-light navbg">
<button class="bt" onclick="toggleNav()">&#9776; <a class = "navbar-brand my-2 my-lg-0">Employee Portal</a></button> 
<a class="navbar-brand form-inline my-2 my-lg-0 right">Welcome, {{ Auth::user()->name }}!</a>
</nav>

<div  id="main">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        @if($errors->any())
                          {!! implode('', $errors->all('<div><h6 style="color:red">:message</h6></div>')) !!}
                        @endif
                        @if(Session::has('error'))
                          <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <h3 class="mb-3">Leave Request Form</h3>
                            <form action="/Employee/LeaveRequests" method="POST">
                                @csrf 
                                <div class="row">
                                  <div class="col-md-6">
                                    <input type="hidden" id="UserNo" name="UserNo" class="form-control mb-4" value="{{ Auth::user()->userno }}" required>
                                    <input type="hidden" id="Name" name="Name" class="form-control mb-4" value="{{ Auth::user()->name }}" required>
                                    <label>Start</label>
                                    <input type="date" id="Start" name="Start" class="form-control mb-4" value="{{ old('Start') }}" required>
                                  </div>
                                  <div class="col-md-6">
                                    <label>End</label>
                                    <input type="date" id="End" name="End" class="form-control mb-4" value="{{ old('End') }}" required>
                                  </div>
                                  <div class="col-md-6">
                                    <label>Leave Type</label>
                                    <select id="LeaveType" name="LeaveType" class="form-control mb-4" required>
                                      <option value="Bereavement Leave">Bereavement Leave</option>
                                      <option value="Emergency Leave">Emergency Leave</option>
                                      <option value="Flexible Working Arrangement">Flexible Working Arrangement</option>
                                      <option value="Leave Without Pay">Leave Without Pay</option>
                                      <option value="Maternity Leave">Maternity Leave</option>
                                      <option value="Paternity Leave">Paternity Leave</option>
                                      <option value="Official Business">Official Business</option>
                                      <option value="Sick Leave">Sick Leave</option>
                                      <option value="Solo Parent Leave">Solo Parent Leave</option>
                                      <option value="Special Benefit for Women">Special Benefit for Women</option>
                                      <option value="Vacation Leave">Vacation Leave</option>
                                    </select>
                                  </div>
                                </div>
                                    <label>Reason</label>
                                    <textarea type="text" id="Reason" name="Reason" class="form-control mb-4" placeholder="Enter Reason" rows="4" required></textarea>
                                  
                                
                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg bton" type="submit" value="Submit" id="submit" onclick="return confirm('Are you sure these data are correct?')">
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
<div>
@endsection