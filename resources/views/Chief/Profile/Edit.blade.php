@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css" >
@endsection
@section('title', 'Profile')
@section('content')
<nav id="mySidenav" class="sidenav">
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/1016964339208556555/White.png?width=960&height=169" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
  <li class="nav-item"><a href="/Chief">Home</a></li>
    <li class="nav-item"><a href="/Chief/Profile" class="active">Profile</a></li>
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

<div id="main">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                      @if($errors->any())
                        {!! implode('', $errors->all('<div><h6 style="color:red">:message</h6></div>')) !!}
                      @endif
                        <form action="/Chief/Profile/{{ Auth::user()->userno }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('Put')
                        <a href="/Chief/Profile">< Profile</a>
                        <h1 class="mb-4 pb-2 pb-md-0 mb-md-5">Profile (Edit)</h1>
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Personal Data</h3>
                        <label>Digital version of your 2 x 2 image</label>
                        <input type="file" id="Image" name="Image" class="form-control mb-4" accept="image/*" value="{{ old('Image', $profile['Image']) }}"> 
                        <div class="row">
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input type="text" id="LastName" name="LastName" class="form-control mb-4" value="{{ old('LastName',  $profile['LastName']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input type="text" id="FirstName" name="FirstName" class="form-control mb-4" value="{{ old('FirstName',  $profile['FirstName']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Middle Name</label>
                                <input type="text" id="MiddleName" name="MiddleName" class="form-control mb-4" value="{{ old('MiddleName',  $profile['MiddleName']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Extension</label>
                                <input type="text" id="Extension" name="Extension" class="form-control mb-4" value="{{ old('Extension',  $profile['Extension']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Maternal/Paternal</label>
                                <input type="text" id="MP" name="MP" class="form-control mb-4" value="{{ old('MP',  $profile['MP']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Sex</label> 
                                <select id="Sex" name="Sex" class="form-control mb-4" required>
                                    @if (old('Sex', $profile['Sex']) == "")
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    @elseif (old('Sex', $profile['Sex']) == "Male")
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                    @elseif (old('Sex', $profile['Sex']) == "Female")
                                        <option value="Male">Male</option>
                                        <option value="Female" selected>Female</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Contact Number</label>
                                <input type="number" id="ContactNumber" name="ContactNumber" class="form-control mb-4" value="{{ old('ContactNumber',  $profile['ContactNumber']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Personal Email</label>
                                <input type="text" id="Email" name="Email" class="form-control mb-4" value="{{ old('Email',  $profile['Email']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Date of Birth</label>
                                <input type="date" id="DateOfBirth" name="DateOfBirth" class="form-control mb-4" value="{{ old('DateOfBirth',  $profile['DateOfBirth']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Place of Birth</label>
                                <input type="text" id="PlaceOfBirth" name="PlaceOfBirth" class="form-control mb-4" value="{{ old('PlaceOfBirth',  $profile['PlaceOfBirth']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Marital Status</label>
                                <select name="MaritalStatus" id="MaritalStatus" class="form-control mb-4" required>
                                    @if( old('MaritalStatus', $profile['MaritalStatus']) == "")
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Divorced">Divorced</option>
                                    @elseif ( old('MaritalStatus', $profile['MaritalStatus']) == "Single")
                                        <option value="Single" selected>Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Divorced">Divorced</option>
                                    @elseif ( old('MaritalStatus', $profile['MaritalStatus']) == "Married")
                                        <option value="Single">Single</option>
                                        <option value="Married" selected>Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Divorced">Divorced</option>
                                    @elseif ( old('MaritalStatus', $profile['MaritalStatus']) == "Widowed")
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed" selected>Widowed</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Divorced">Divorced</option>
                                    @elseif ( old('MaritalStatus', $profile['MaritalStatus']) == "Separated")
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Separated" selected>Separated</option>
                                        <option value="Divorced">Divorced</option>
                                    @elseif ( old('MaritalStatus', $profile['MaritalStatus']) == "Divorced")
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Divorced" selected>Divorced</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Religion</label>
                                <input type="text" id="Religion" name="Religion" class="form-control mb-4" value="{{ old('Religion',  $profile['Religion']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Nationality</label>
                                <input type="text" id="Nationality" name="Nationality" class="form-control mb-4" value="{{ old('Nationality',  $profile['Nationality']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Current Address</label>
                                <input type="text" id="CurrentAddress" name="CurrentAddress" class="form-control mb-4" value="{{ old('CurrentAddress',  $profile['CurrentAddress']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Permanent Address</label>
                                <input type="text" id="PermanentAddress" name="PermanentAddress" class="form-control mb-4" value="{{ old('PermanentAddress',  $profile['PermanentAddress']) }}" required> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Contact Person in Case of Emergency</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" id="CPName" name="CPName" class="form-control mb-4" value="{{ old('CPName',  $profile['CPName']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Relationship</label>
                                <input type="text" id="CPRelationship" name="CPRelationship" class="form-control mb-4" value="{{ old('CPRelationship',  $profile['CPRelationship']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="CPAddress" name="CPAddress" class="form-control mb-4" value="{{ old('CPAddress',  $profile['CPAddress']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Number</label>
                                <input type="number" id="CPContactNumber" name="CPContactNumber" class="form-control mb-4" value="{{ old('CPContactNumber',  $profile['CPContactNumber']) }}" required> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Social Benefits</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label>SSS</label>
                                <input type="text" id="SSS" name="SSS" class="form-control mb-4" value="{{ old('SSS',  $profile['SSS']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Pag-Ibig</label>
                                <input type="text" id="PagIbig" name="PagIbig" class="form-control mb-4" value="{{ old('PagIbig',  $profile['PagIbig']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Philhealth</label>
                                <input type="text" id="Philhealth" name="Philhealth" class="form-control mb-4" value="{{ old('Philhealth',  $profile['Philhealth']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>TIN</label>
                                <input type="text" id="TIN" name="TIN" class="form-control mb-4" value="{{ old('TIN',  $profile['TIN']) }}" required> 
                            </div>
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