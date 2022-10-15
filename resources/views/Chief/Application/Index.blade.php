@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css" >
@endsection
@section('title', 'Application')
@section('content')
<nav id="mySidenav" class="sidenav">
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/1016964339208556555/White.png?width=960&height=169" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
  <li class="nav-item"><a href="/Chief">Home</a></li>
    <li class="nav-item"><a href="/Chief/Application/{{ Auth::user()->userno }}" class="active">Application</a></li>
    <li class="nav-item"><a href="/Chief/Attendance">Attendance</a></li>
    <li class="nav-item"><a href="/Chief/Payslips">Payslips</a></li>
    <li class="nav-item"><a href="/Chief/LeaveRequests">Leave Request</a></li>
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

<div  id="main">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        @if($errors->any())
                          {!! implode('', $errors->all('<div><h6 style="color:red">:message</h6></div>')) !!}
                        @endif
                        <h3 class="mb-3">Application Form</h3>
                        @if($application['Submitted'] == 0)
                            <form action="/Chief/Application/{{ Auth::user()->userno }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('Put')
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Address</label>
                                    <input type="text" id="Address" name="Address" class="form-control mb-4" value="{{ old('Address', $application['Address']) }}" required>
                                  </div>
                                  <div class="col-md-6">
                                    <label>Phone</label>
                                    <input type="text" id="Phone" name="Phone" class="form-control mb-4" value="{{ old('Phone', $application['Phone']) }}" required>
                                  </div>
                                  <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="email" id="Email" name="Email" class="form-control mb-4" value="{{ old('Email', $application['Email']) }}" required>
                                  </div>
                                  <div class="col-md-6">
                                    <label>SSS</label>
                                    <input type="text" id="SSS" name="SSS" class="form-control mb-4" value="{{ old('SSS', $application['SSS']) }}" required>
                                  </div>
                                  <div class="col-md-6">
                                    <label>Pag-IBIG</label>
                                    <input type="text" id="PagIbig" name="PagIbig" class="form-control mb-4" value="{{ old('PagIbig', $application['PagIbig']) }}" required>
                                  </div>
                                  <div class="col-md-6">
                                    <label>Philhealth</label>
                                    <input type="text" id="Philhealth" name="Philhealth" class="form-control mb-4" value="{{ old('Philhealth', $application['Philhealth']) }}" required>
                                  </div>
                                  <div class="col-md-6">
                                    <label>TIN</label>
                                    <input type="text" id="TIN" name="TIN" class="form-control mb-4" value="{{ old('TIN', $application['TIN']) }}" required>
                                  </div>
                                  <label>Digital version of your application form (PDF format)</label>
                                  <input type="file" id="ApplicationForm" name="ApplicationForm" class="form-control mb-4" accept="application/*" value="{{ old('ApplicationForm', $application['ApplicationForm']) }}" required> 
                                <input type="hidden" id="Submitted" name="Submitted" value="1">
                                </div>
                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg bton" type="submit" value="Submit" id="submit" onclick="return confirm('Are you sure these data are correct?')">
                                </div>
                            </form>
                        @else
                            <h6>Application form already submitted!</h6>
                        @endif
                </div>
            </div>
        </div>
    </div>
<div>
@endsection