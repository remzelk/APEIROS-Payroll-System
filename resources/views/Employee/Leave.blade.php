@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/employee.css" >
@endsection
@section('title', 'Leave Request')
@section('content')
<nav id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><br>
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/958687472227868682/275714560_317115067181930_3442500599053539010_n.png?width=1025&height=180" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="/Employee">Home</a></li>
    <li class="nav-item"><a href="/Employee/Profile">Profile</a></li>
    <li class="nav-item"><a href="/Employee/Payslips">Payslips</a></li>
    <li class="nav-item"><a href="/Employee/Schedule">Schedule</a></li>
    <li class="nav-item"><a href="/Employee/Attendance">Attendance</a></li>
    <li class="nav-item"><a href="/Employee/LeaveRequest" class="active">Leave Request</a></li>
    <li class="nav-item"><a href="/Employee/BIRForm2316">BIR Form 2316</a></li>
    <li class="nav-item"><a href="/Employee/AccountSettings">Account Settings</a></li>
    <li class="nav-item"><a href="/Employee/Login" onclick="return confirm('Are you sure to logout?')">Logout</a></li>
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
<button class="bt" onclick="openNav()">&#9776; <a class = "navbar-brand my-2 my-lg-0">Employee Portal</a></button> 
<a class="navbar-brand form-inline my-2 my-lg-0 right">Apeiros Security Solutions & Investigation Agency, Inc.</a>
</nav>

<div id="main">
  <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
			<h1>Leave:</h1><br>
			Empty for now.
        </div>
    </div>
  </div>
<div>
@endsection