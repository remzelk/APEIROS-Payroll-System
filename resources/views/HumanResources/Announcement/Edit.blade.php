@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css" >
@endsection
@section('title', 'Home')
@section('content')
<nav id="mySidenav" class="sidenav">
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/1016964339208556555/White.png?width=960&height=169" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="/HumanResources" class="active">Home</a></li>
    <li class="nav-item"><a href="/HumanResources/ProfileList">Profile List</a></li>
    <li class="nav-item"><a href="/HumanResources/BIRForm2316">BIR Form 2316</a></li>
    <li class="nav-item"><a href="/HumanResources/Detachments">Detachments</a></li>
    <li class="nav-item"><a href="/HumanResources/AssignDetachments">Assign Detachments</a></li>
    <li class="nav-item"><a href="/HumanResources/Attendance">Attendance</a></li>HumanResources
    <li class="nav-item"><a href="/HumanResources/LeaveRequests">Leave Requests</a></li>
    <li class="nav-item"><a href="/HumanResources/DigitalAttendance">Digital Attendance</a></li>
    <li class="nav-item"><a href="/HumanResources/AccountSettings">Account Settings</a></li>
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
<button class="bt" onclick="toggleNav()">&#9776; <a class = "navbar-brand my-2 my-lg-0">Human Resources Portal</a></button> 
<a class="navbar-brand form-inline my-2 my-lg-0 right">Welcome, {{ Auth::user()->name }}!</a>
</nav>

<div  id="main">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit Announcement</h3>
            <form action="/HumanResources/{{ $announcement['id'] }}" method="POST">
              @csrf
              @method('Put')
            <div class="row">
                <div class="col-md-6">
                    <label>Start</label>
                    <input type="date" id="DateStart" name="DateStart" class="form-control mb-4" value="{{ $announcement['DateStart'] }}"> 
                </div>
                <div class="col-md-6">
                    <label>End</label>
                    <input type="date" id="DateEnd" name="DateEnd" class="form-control mb-4" value="{{ $announcement['DateEnd'] }}"> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Description</label>
                    <textarea id="Description" name="Description" class="form-control mb-4" placeholder="Enter Description" rows="4" required>{{ $announcement['Description'] }}</textarea>
                </div>
            </div>
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg bton" type="submit" value="Submit" id="submit" onclick="return confirm('Are you sure these data are correct?')">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<div>
@endsection