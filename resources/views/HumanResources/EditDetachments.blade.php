@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/humanresources.css" >
@endsection
@section('title', 'Edit Detachment')
@section('content')
<nav id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><br>
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/958687472227868682/275714560_317115067181930_3442500599053539010_n.png?width=1025&height=180" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="/HumanResources">Home</a></li>
    <li class="nav-item"><a href="/HumanResources/Profile">Profile</a></li>
    <li class="nav-item"><a href="/HumanResources/EmployeeList">Employee List</a></li>
    <li class="nav-item"><a href="/HumanResources/AddEmployee">Add Employee</a></li>
    <li class="nav-item"><a href="/HumanResources/Detachments" class="active">Detachments</a></li>
    <li class="nav-item"><a href="/HumanResources/AccountSettings">Account Settings</a></li>
	<li class="nav-item"><a href="/HumanResources/Login" onclick="return confirm('Are you sure to logout?')">Logout</a></li>
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
<button class="bt" onclick="openNav()">&#9776; <a class = "navbar-brand my-2 my-lg-0">Human Resources Portal</a></button> 
<a class="navbar-brand form-inline my-2 my-lg-0 right">Apeiros Security Solutions & Investigation Agency, Inc.</a>
</nav>

<div  id="main">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
          <a href="/HumanResources/Detachments">< <u>Detachments</u></a><br><br>
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit Detachment</h3>
            <form>

            <div class="row">
                <div class="col-md-6">
                    <label>Detachment</label>
                    <input type="text" id="FirstName" class="form-control mb-4" placeholder="Enter Detachment"> 
                </div>
                <div class="col-md-6">
                    <label>Location</label>
                    <input type="text" id="LastName" class="form-control mb-4" placeholder="Enter Location"> 
                </div>
            </div>
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg bton" type="submit" value="Submit" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<div>
<script>
    window.onbeforeunload = function(){
  return 'Are you sure you want to leave?';
};
</script>
@endsection