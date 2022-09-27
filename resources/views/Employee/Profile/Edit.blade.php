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
    <li class="nav-item"><a href="/Employee">Home</a></li>
    <li class="nav-item"><a href="/Employee/Profile" class="active">Profile</a></li>
    <li  class="nav-item has-submenu">
      <a href="#" class="nav-link">Payslips <i class="fa fa-caret-down"></i></a>
        <ul class="submenu collapse">
          <li><a class="nav-item" href="/Employee/Payslips-Current">Current Payslip</a></li>
          <li><a class="nav-link" href="/Employee/Payslips-Archive">Payslip Archive</a></li>
      </ul>
    </li>
    <li class="nav-item"><a href="/Employee/Attendance">Attendance</a></li>
    <li class="nav-item"><a href="/Employee/LeaveRequest">Leave Request</a></li>
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
                        <form action="/Employee/Profile/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('Put')
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date of Application</label>
                                    <input type="date" id="DateOfApplication" name="DateOfApplication" class="form-control mb-4" value="{{ old('DateOfApplication', $profile['DateOfApplication']) }}" required> 
                                </div>
                                <div class="col-md-6">
                                    <label>Date Hired</label>
                                    <input type="date" id="DateHired" name="DateHired" class="form-control mb-4" value="{{ old('DateHired' ,$profile['DateHired']) }}" required> 
                                </div>
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
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Personal Data</h3>
                        <label>Digital version of your 2 x 2 image</label>
                        <input type="file" id="Image" name="Image" class="form-control mb-4" accept="image/*" value="{{ old('Image', $profile['Image']) }}" required> 
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
                                    @if ( old('Sex', $profile['Sex']) == "")
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
                            <input type="hidden" id="Position" name="Position" value="Security Guard">
                            <div class="col-md-6">
                                <label>Contact Number 1</label>
                                <input type="number" id="ContactNumber" name="ContactNumber" class="form-control mb-4" value="{{ old('ContactNumber',  $profile['ContactNumber']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Number 2</label>
                                <input type="number" id="ContactNumber2" name="ContactNumber2" class="form-control mb-4" value="{{ old('ContactNumber2',  $profile['ContactNumber2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Number 3</label>
                                <input type="number" id="ContactNumber3" name="ContactNumber3" class="form-control mb-4" value="{{ old('ContactNumber3',  $profile['ContactNumber3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Number 4</label>
                                <input type="number" id="ContactNumber4" name="ContactNumber4" class="form-control mb-4" value="{{ old('ContactNumber4',  $profile['ContactNumber4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="text" id="Email" name="Email" class="form-control mb-4" value="{{ old('Email',  $profile['Email']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Facebook</label>
                                <input type="text" id="Facebook" name="Facebook" class="form-control mb-4" value="{{ old('Facebook',  $profile['Facebook']) }}"> 
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
                                <label>Age</label>
                                <input type="number" id="Age" name="Age" class="form-control mb-4" value="{{ old('Age',  $profile['Age']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Height</label>
                                <input type="text" id="Height" name="Height" class="form-control mb-4" value="{{ old('Height',  $profile['Height']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Weight</label>
                                <input type="text" id="Weight" name="Weight" class="form-control mb-4" value="{{ old('Weight',  $profile['Weight']) }}" required> 
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
                                <label>Color of Eyes</label>
                                <input type="text" id="ColorOfEyes" name="ColorOfEyes" class="form-control mb-4" value="{{ old('ColorOfEyes',  $profile['ColorOfEyes']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Complexion</label>
                                <input type="text" id="Complexion" name="Complexion" class="form-control mb-4" value="{{ old('Complexion',  $profile['Complexion']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Other distinguishing features</label>
                                <input type="text" id="DistinguishingFeature" name="DistinguishingFeature" class="form-control mb-4" value="{{ old('DistinguishingFeature',  $profile['DistinguishingFeature']) }}" required> 
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
                                <label>Contact Number 1</label>
                                <input type="number" id="CPContactNumber" name="CPContactNumber" class="form-control mb-4" value="{{ old('CPContactNumber',  $profile['CPContactNumber']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Number 2</label>
                                <input type="number" id="CPContactNumber2" name="CPContactNumber2" class="form-control mb-4" value="{{ old('CPContactNumber2',  $profile['CPContactNumber2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Number 3</label>
                                <input type="number" id="CPContactNumber3" name="CPContactNumber3" class="form-control mb-4" value="{{ old('CPContactNumber3',  $profile['CPContactNumber3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Number 4</label>
                                <input type="number" id="CPContactNumber4" name="CPContactNumber4" class="form-control mb-4" value="{{ old('CPContactNumber4',  $profile['CPContactNumber4']) }}"> 
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
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">LESP</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label>License Number</label>
                                <input type="text" id="LicenseNumber" name="LicenseNumber" class="form-control mb-4" value="{{ old('LicenseNumber',  $profile['LicenseNumber']) }}"  required> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Issued</label>
                                <input type="date" id="DateIssued" name="DateIssued" class="form-control mb-4" value="{{ old('DateIssued',  $profile['DateIssued']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Date of Expiration</label>
                                <input type="date" id="DateofExpiration" name="DateofExpiration" class="form-control mb-4" value="{{ old('DateofExpiration',  $profile['DateofExpiration']) }}" required> 
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
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Educational Attainment</h3>
                        <h5 class="mb-3"><i>Elementary</i></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name of School</label>
                                <input type="text" id="ElementaryNameofSchool" name="ElementaryNameofSchool" class="form-control mb-4" value="{{ old('ElementaryNameofSchool',  $profile['ElementaryNameofSchool']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Location</label>
                                <input type="text" id="ElementaryLocation" name="ElementaryLocation" class="form-control mb-4" value="{{ old('ElementaryLocation',  $profile['ElementaryLocation']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Graduated</label>
                                <input type="date" id="ElementaryDateGraduated" name="ElementaryDateGraduated" class="form-control mb-4" value="{{ old('ElementaryDateGraduated',  $profile['ElementaryDateGraduated']) }}"> 
                            </div>
                        </div>
                        <h5 class="mb-3"><i>High School</i></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name of School</label>
                                <input type="text" id="HighSchoolNameofSchool" name="HighSchoolNameofSchool" class="form-control mb-4" value="{{ old('HighSchoolNameofSchool',  $profile['HighSchoolNameofSchool']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Location</label>
                                <input type="text" id="HighSchoolLocation" name="HighSchoolLocation" class="form-control mb-4" value="{{ old('HighSchoolLocation',  $profile['HighSchoolLocation']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Graduated</label>
                                <input type="date" id="HighSchoolDateGraduated" name="HighSchoolDateGraduated" class="form-control mb-4" value="{{ old('HighSchoolDateGraduated',  $profile['HighSchoolDateGraduated']) }}"> 
                            </div>
                        </div>
                        <h5 class="mb-3"><i>College</i></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name of School</label>
                                <input type="text" id="CollegeNameofSchool" name="CollegeNameofSchool" class="form-control mb-4" value="{{ old('CollegeNameofSchool',  $profile['CollegeNameofSchool']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Location</label>
                                <input type="text" id="CollegeLocation" name="CollegeLocation" class="form-control mb-4" value="{{ old('CollegeLocation',  $profile['CollegeLocation']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Graduated</label>
                                <input type="date" id="CollegeDateGraduated" name="CollegeDateGraduated" class="form-control mb-4" value="{{ old('CollegeDateGraduated',  $profile['CollegeDateGraduated']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Course</label>
                                <input type="text" id="CollegeCourse" name="CollegeCourse" class="form-control mb-4" value="{{ old('CollegeCourse',  $profile['CollegeCourse']) }}"> 
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
                    <div class="card-body p-4 p-md-5 list-group list-group-flush">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Employment History</h3>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Date of Employment</label>
                                <input type="date" id="EHDateofEmployment" name="EHDateofEmployment" class="form-control mb-4" value="{{ old('EHDateofEmployment',  $profile['EHDateofEmployment']) }}" required> 
                            </div>
                        </div>
                        <div class="row mb-3 list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Date Started</label>
                                <input type="date" id="EHDateStarted" name="EHDateStarted" class="form-control mb-4" value="{{ old('EHDateStarted',  $profile['EHDateStarted']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Ended</label>
                                <input type="date" id="EHDateEnded" name="EHDateEnded" class="form-control mb-4" value="{{ old('EHDateEnded',  $profile['EHDateEnded']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Company Name & Address</label>
                                <input type="text" id="EHCompanyNameAddress" name="EHCompanyNameAddress" class="form-control mb-4" value="{{ old('EHCompanyNameAddress',  $profile['EHCompanyNameAddress']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Numbers</label>
                                <input type="number" id="EHContactNumbers" name="EHContactNumbers" class="form-control mb-4" value="{{ old('EHContactNumbers',  $profile['EHContactNumbers']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="EHPosition" name="EHPosition" class="form-control mb-4" value="{{ old('EHPosition',  $profile['EHPosition']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Reason of Leaving</label>
                                <input type="text" id="EHReasonofLeaving" name="EHReasonofLeaving" class="form-control mb-4" value="{{ old('EHReasonofLeaving',  $profile['EHReasonofLeaving']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Date Started</label>
                                <input type="date" id="EHDateStarted2" name="EHDateStarted2" class="form-control mb-4" value="{{ old('EHDateStarted2',  $profile['EHDateStarted2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Ended</label>
                                <input type="date" id="EHDateEnded2" name="EHDateEnded2" class="form-control mb-4" value="{{ old('EHDateEnded2',  $profile['EHDateEnded2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Company Name & Address</label>
                                <input type="text" id="EHCompanyNameAddress2" name="EHCompanyNameAddress2" class="form-control mb-4" value="{{ old('EHCompanyNameAddress2',  $profile['EHCompanyNameAddress2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Numbers</label>
                                <input type="number" id="EHContactNumbers2" name="EHContactNumbers2" class="form-control mb-4" value="{{ old('EHContactNumbers2',  $profile['EHContactNumbers2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="EHPosition2" name="EHPosition2" class="form-control mb-4" value="{{ old('EHPosition2',  $profile['EHPosition2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Reason of Leaving</label>
                                <input type="text" id="EHReasonofLeaving2" name="EHReasonofLeaving2" class="form-control mb-4" value="{{ old('EHReasonofLeaving2',  $profile['EHReasonofLeaving2']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3 list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Date Started</label>
                                <input type="date" id="EHDateStarted3" name="EHDateStarted3" class="form-control mb-4" value="{{ old('EHDateStarted3',  $profile['EHDateStarted3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Ended</label>
                                <input type="date" id="EHDateEnded3" name="EHDateEnded3" class="form-control mb-4" value="{{ old('EHDateEnded3',  $profile['EHDateEnded3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Company Name & Address</label>
                                <input type="text" id="EHCompanyNameAddress3" name="EHCompanyNameAddress3" class="form-control mb-4" value="{{ old('EHCompanyNameAddress3',  $profile['EHCompanyNameAddress3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Numbers</label>
                                <input type="number" id="EHContactNumbers3" name="EHContactNumbers3" class="form-control mb-4" value="{{ old('EHContactNumbers3',  $profile['EHContactNumbers3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="EHPosition3" name="EHPosition3" class="form-control mb-4" value="{{ old('EHPosition3',  $profile['EHPosition3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Reason of Leaving</label>
                                <input type="text" id="EHReasonofLeaving3" name="EHReasonofLeaving3" class="form-control mb-4" value="{{ old('EHReasonofLeaving3',  $profile['EHReasonofLeaving3']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Date Started</label>
                                <input type="date" id="EHDateStarted4" name="EHDateStarted4" class="form-control mb-4" value="{{ old('EHDateStarted4',  $profile['EHDateStarted4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Ended</label>
                                <input type="date" id="EHDateEnded4" name="EHDateEnded4" class="form-control mb-4" value="{{ old('EHDateEnded4',  $profile['EHDateEnded4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Company Name & Address</label>
                                <input type="text" id="EHCompanyNameAddress4" name="EHCompanyNameAddress4" class="form-control mb-4" value="{{ old('EHCompanyNameAddress4',  $profile['EHCompanyNameAddress4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Numbers</label>
                                <input type="number" id="EHContactNumbers4" name="EHContactNumbers4" class="form-control mb-4" value="{{ old('EHContactNumbers4',  $profile['EHContactNumbers4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="EHPosition4" name="EHPosition4" class="form-control mb-4" value="{{ old('EHPosition4',  $profile['EHPosition4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Reason of Leaving</label>
                                <input type="text" id="EHReasonofLeaving4" name="EHReasonofLeaving4" class="form-control mb-4" value="{{ old('EHReasonofLeaving4',  $profile['EHReasonofLeaving4']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3 list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Date Started</label>
                                <input type="date" id="EHDateStarted5" name="EHDateStarted5" class="form-control mb-4" value="{{ old('EHDateStarted5',  $profile['EHDateStarted5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Ended</label>
                                <input type="date" id="EHDateEnded5" name="EHDateEnded5" class="form-control mb-4" value="{{ old('EHDateEnded5',  $profile['EHDateEnded5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Company Name & Address</label>
                                <input type="text" id="EHCompanyNameAddress5" name="EHCompanyNameAddress5" class="form-control mb-4" value="{{ old('EHCompanyNameAddress5',  $profile['EHCompanyNameAddress5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Numbers</label>
                                <input type="number" id="EHContactNumbers5" name="EHContactNumbers5" class="form-control mb-4" value="{{ old('EHContactNumbers5',  $profile['EHContactNumbers5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="EHPosition5" name="EHPosition5" class="form-control mb-4" value="{{ old('EHPosition5',  $profile['EHPosition5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Reason of Leaving</label>
                                <input type="text" id="EHReasonofLeaving5" name="EHReasonofLeaving5" class="form-control mb-4" value="{{ old('EHReasonofLeaving5',  $profile['EHReasonofLeaving5']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Date Started</label>
                                <input type="date" id="EHDateStarted6" name="EHDateStarted6" class="form-control mb-4" value="{{ old('EHDateStarted6',  $profile['EHDateStarted6']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Ended</label>
                                <input type="date" id="EHDateEnded6" name="EHDateEnded6" class="form-control mb-4" value="{{ old('EHDateEnded6',  $profile['EHDateEnded6']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Company Name & Address</label>
                                <input type="text" id="EHCompanyNameAddress6" name="EHCompanyNameAddress6" class="form-control mb-4" value="{{ old('EHCompanyNameAddress6',  $profile['EHCompanyNameAddress6']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Numbers</label>
                                <input type="number" id="EHContactNumbers6" name="EHContactNumbers6" class="form-control mb-4" value="{{ old('EHContactNumbers6',  $profile['EHContactNumbers6']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="EHPosition6" name="EHPosition6" class="form-control mb-4" value="{{ old('EHPosition6',  $profile['EHPosition6']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Reason of Leaving</label>
                                <input type="text" id="EHReasonofLeaving6" name="EHReasonofLeaving6" class="form-control mb-4" value="{{ old('EHReasonofLeaving6',  $profile['EHReasonofLeaving6']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3 list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Date Started</label>
                                <input type="date" id="EHDateStarted7" name="EHDateStarted7" class="form-control mb-4" value="{{ old('EHDateStarted7',  $profile['EHDateStarted7']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Ended</label>
                                <input type="date" id="EHDateEnded7" name="EHDateEnded7" class="form-control mb-4" value="{{ old('EHDateEnded7',  $profile['EHDateEnded7']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Company Name & Address</label>
                                <input type="text" id="EHCompanyNameAddress7" name="EHCompanyNameAddress7" class="form-control mb-4" value="{{ old('EHCompanyNameAddress7',  $profile['EHCompanyNameAddress7']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Numbers</label>
                                <input type="number" id="EHContactNumbers7" name="EHContactNumbers7" class="form-control mb-4" value="{{ old('EHContactNumbers7',  $profile['EHContactNumbers7']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="EHPosition7" name="EHPosition7" class="form-control mb-4" value="{{ old('EHPosition7',  $profile['EHPosition7']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Reason of Leaving</label>
                                <input type="text" id="EHReasonofLeaving7" name="EHReasonofLeaving7" class="form-control mb-4" value="{{ old('EHReasonofLeaving7',  $profile['EHReasonofLeaving7']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Date Started</label>
                                <input type="date" id="EHDateStarted8" name="EHDateStarted8" class="form-control mb-4" value="{{ old('EHDateStarted8',  $profile['EHDateStarted8']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Ended</label>
                                <input type="date" id="EHDateEnded8" name="EHDateEnded8" class="form-control mb-4" value="{{ old('EHDateEnded8',  $profile['EHDateEnded8']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Company Name & Address</label>
                                <input type="text" id="EHCompanyNameAddress8" name="EHCompanyNameAddress8" class="form-control mb-4" value="{{ old('EHCompanyNameAddress8',  $profile['EHCompanyNameAddress8']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Numbers</label>
                                <input type="number" id="EHContactNumbers8" name="EHContactNumbers8" class="form-control mb-4" value="{{ old('EHContactNumbers8',  $profile['EHContactNumbers8']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="EHPosition8" name="EHPosition8" class="form-control mb-4" value="{{ old('EHPosition8',  $profile['EHPosition8']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Reason of Leaving</label>
                                <input type="text" id="EHReasonofLeaving8" name="EHReasonofLeaving8" class="form-control mb-4" value="{{ old('EHReasonofLeaving8',  $profile['EHReasonofLeaving8']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3 list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Date Started</label>
                                <input type="date" id="EHDateStarted9" name="EHDateStarted9" class="form-control mb-4" value="{{ old('EHDateStarted9',  $profile['EHDateStarted9']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Ended</label>
                                <input type="date" id="EHDateEnded9" name="EHDateEnded9" class="form-control mb-4" value="{{ old('EHDateEnded9',  $profile['EHDateEnded9']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Company Name & Address</label>
                                <input type="text" id="EHCompanyNameAddress9" name="EHCompanyNameAddress9" class="form-control mb-4" value="{{ old('EHCompanyNameAddress9',  $profile['EHCompanyNameAddress9']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Numbers</label>
                                <input type="number" id="EHContactNumbers9" name="EHContactNumbers9" class="form-control mb-4" value="{{ old('EHContactNumbers9',  $profile['EHContactNumbers9']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="EHPosition9" name="EHPosition9" class="form-control mb-4" value="{{ old('EHPosition9',  $profile['EHPosition9']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Reason of Leaving</label>
                                <input type="text" id="EHReasonofLeaving9" name="EHReasonofLeaving9" class="form-control mb-4" value="{{ old('EHReasonofLeaving9',  $profile['EHReasonofLeaving9']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Date Started</label>
                                <input type="date" id="EHDateStarted10" name="EHDateStarted10" class="form-control mb-4" value="{{ old('EHDateStarted10',  $profile['EHDateStarted10']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date Ended</label>
                                <input type="date" id="EHDateEnded10" name="EHDateEnded10" class="form-control mb-4" value="{{ old('EHDateEnded10',  $profile['EHDateEnded10']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Company Name & Address</label>
                                <input type="text" id="EHCompanyNameAddress10" name="EHCompanyNameAddress10" class="form-control mb-4" value="{{ old('EHCompanyNameAddress10',  $profile['EHCompanyNameAddress10']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Contact Numbers</label>
                                <input type="number" id="EHContactNumbers10" name="EHContactNumbers10" class="form-control mb-4" value="{{ old('EHContactNumbers10',  $profile['EHContactNumbers10']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="EHPosition10" name="EHPosition10" class="form-control mb-4" value="{{ old('EHPosition10',  $profile['EHPosition10']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Reason of Leaving</label>
                                <input type="text" id="EHReasonofLeaving10" name="EHReasonofLeaving10" class="form-control mb-4" value="{{ old('EHReasonofLeaving10',  $profile['EHReasonofLeaving10']) }}"> 
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
                    <div class="card-body p-4 p-md-5 list-group list-group-flush">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Family Information</h3>
                        <h5 class="mb-3"><i>Father</i></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" id="FIFathersName" name="FIFathersName" class="form-control mb-4" value="{{ old('FIFathersName',  $profile['FIFathersName']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FIFatherAge" name="FIFatherAge" class="form-control mb-4" value="{{ old('FIFatherAge',  $profile['FIFatherAge']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FIFatherAddress" name="FIFatherAddress" class="form-control mb-4" value="{{ old('FIFatherAddress',  $profile['FIFatherAddress']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FIFatherOccupation" name="FIFatherOccupation" class="form-control mb-4" value="{{ old('FIFatherOccupation',  $profile['FIFatherOccupation']) }}"> 
                            </div>
                        </div>
                        <h5 class="mb-3"><i>Mother</i></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Maiden Name</label>
                                <input type="text" id="FIMothersMaidenName" name="FIMothersMaidenName" class="form-control mb-4" value="{{ old('FIMothersMaidenName',  $profile['FIMothersMaidenName']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FIMotherAge" name="FIMotherAge" class="form-control mb-4" value="{{ old('FIMotherAge',  $profile['FIMotherAge']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FIMotherAddress" name="FIMotherAddress" class="form-control mb-4" value="{{ old('FIMotherAddress',  $profile['FIMotherAddress']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FIMotherOccupation" name="FIMotherOccupation" class="form-control mb-4" value="{{ old('FIMotherOccupation',  $profile['FIMotherOccupation']) }}"> 
                            </div>
                        </div>
                        <h5 class="mb-3"><i>Brothers & Sisters</i></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FISiblingName" name="FISiblingName" class="form-control mb-4" value="{{ old('FISiblingName',  $profile['FISiblingName']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FISiblingAge" name="FISiblingAge" class="form-control mb-4" value="{{ old('FISiblingAge',  $profile['FISiblingAge']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FISiblingAddress" name="FISiblingAddress" class="form-control mb-4" value="{{ old('FISiblingAddress',  $profile['FISiblingAddress']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FISiblingOccupation" name="FISiblingOccupation" class="form-control mb-4" value="{{ old('FISiblingOccupation',  $profile['FISiblingOccupation']) }}"> 
                            </div>
                        </div>
                        <div class="row list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FISiblingName2" name="FISiblingName2" class="form-control mb-4" value="{{ old('FISiblingName2',  $profile['FISiblingName2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FISiblingAge2" name="FISiblingAge2" class="form-control mb-4" value="{{ old('FISiblingAge2',  $profile['FISiblingAge2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FISiblingAddress2" name="FISiblingAddress2" class="form-control mb-4" value="{{ old('FISiblingAddress2',  $profile['FISiblingAddress2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FISiblingOccupation2" name="FISiblingOccupation2" class="form-control mb-4" value="{{ old('FISiblingOccupation2',  $profile['FISiblingOccupation2']) }}"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FISiblingName3" name="FISiblingName3" class="form-control mb-4" value="{{ old('FISiblingName3',  $profile['FISiblingName3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FISiblingAge3" name="FISiblingAge3" class="form-control mb-4" value="{{ old('FISiblingAge3',  $profile['FISiblingAge3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FISiblingAddress3" name="FISiblingAddress3" class="form-control mb-4" value="{{ old('FISiblingAddress3',  $profile['FISiblingAddress3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FISiblingOccupation3" name="FISiblingOccupation3" class="form-control mb-4" value="{{ old('FISiblingOccupation3',  $profile['FISiblingOccupation3']) }}"> 
                            </div>
                        </div>
                        <div class="row list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FISiblingName4" name="FISiblingName4" class="form-control mb-4" value="{{ old('FISiblingName4',  $profile['FISiblingName4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FISiblingAge4" name="FISiblingAge4" class="form-control mb-4" value="{{ old('FISiblingAge4',  $profile['FISiblingAge4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FISiblingAddress4" name="FISiblingAddress4" class="form-control mb-4" value="{{ old('FISiblingAddress4',  $profile['FISiblingAddress4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FISiblingOccupation4" name="FISiblingOccupation4" class="form-control mb-4" value="{{ old('FISiblingOccupation4',  $profile['FISiblingOccupation4']) }}"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FISiblingName5" name="FISiblingName5" class="form-control mb-4" value="{{ old('FISiblingName5',  $profile['FISiblingName5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FISiblingAge5" name="FISiblingAge5" class="form-control mb-4" value="{{ old('FISiblingAge5',  $profile['FISiblingAge5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FISiblingAddress5" name="FISiblingAddress5" class="form-control mb-4" value="{{ old('FISiblingAge5',  $profile['FISiblingAddress5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FISiblingOccupation5" name="FISiblingOccupation5" class="form-control mb-4" value="{{ old('FISiblingOccupation5',  $profile['FISiblingOccupation5']) }}"> 
                            </div>
                        </div>
                        <div class="row list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FISiblingName6" name="FISiblingName6" class="form-control mb-4" value="{{ old('FISiblingName6',  $profile['FISiblingName6']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FISiblingAge6" name="FISiblingAge6" class="form-control mb-4" value="{{ old('FISiblingAge6',  $profile['FISiblingAge6']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FISiblingAddress6" name="FISiblingAddress6" class="form-control mb-4" value="{{ old('FISiblingAddress6',  $profile['FISiblingAddress6']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FISiblingOccupation6" name="FISiblingOccupation6" class="form-control mb-4" value="{{ old('FISiblingOccupation6',  $profile['FISiblingOccupation6']) }}"> 
                            </div>
                        </div>
                        <h5 class="mb-3"><i>Spouse</i></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FISpouseName" name="FISpouseName" class="form-control mb-4" value="{{ old('FISpouseName',  $profile['FISpouseName']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date of Birth</label>
                                <input type="date" id="FISpouseDateofBirth" name="FISpouseDateofBirth" class="form-control mb-4" value="{{ old('FISpouseDateofBirth',  $profile['FISpouseDateofBirth']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FISpouseAddress" name="FISpouseAddress" class="form-control mb-4" value="{{ old('FISpouseAddress',  $profile['FISpouseAddress']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Date & Place of Marriage</label>
                                <input type="text" id="FISpouseDateofMarriage" name="FISpouseDateofMarriage" class="form-control mb-4" value="{{ old('FISpouseDateofMarriage',  $profile['FISpouseDateofMarriage']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FISpouseOccupation" name="FISpouseOccupation" class="form-control mb-4" value="{{ old('FISpouseOccupation',  $profile['FISpouseOccupation']) }}"> 
                            </div>
                        </div>
                        <h5 class="mb-3"><i>Children</i></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FIChildName" name="FIChildName" class="form-control mb-4" value="{{ old('FIChildName',  $profile['FIChildName']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FIChildAge" name="FIChildAge" class="form-control mb-4" value="{{ old('FIChildAge',  $profile['FIChildAge']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FIChildAddress" name="FIChildAddress" class="form-control mb-4" value="{{ old('FIChildAddress',  $profile['FIChildAddress']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FIChildOccupation" name="FIChildOccupation" class="form-control mb-4" value="{{ old('FIChildOccupation',  $profile['FIChildOccupation']) }}"> 
                            </div>
                        </div>
                        <div class="row list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FIChildName2" name="FIChildName2" class="form-control mb-4" value="{{ old('FIChildName2',  $profile['FIChildName2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FIChildAge2" name="FIChildAge2" class="form-control mb-4" value="{{ old('FIChildAge2',  $profile['FIChildAge2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FIChildAddress2" name="FIChildAddress2" class="form-control mb-4" value="{{ old('FIChildAddress2',  $profile['FIChildAddress2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FIChildOccupation2" name="FIChildOccupation2" class="form-control mb-4" value="{{ old('FIChildOccupation2',  $profile['FIChildOccupation2']) }}"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FIChildName3" name="FIChildName3" class="form-control mb-4" value="{{ old('FIChildName3',  $profile['FIChildName3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FIChildAge3" name="FIChildAge3" class="form-control mb-4" value="{{ old('FIChildAge3',  $profile['FIChildAge3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FIChildAddress3" name="FIChildAddress3" class="form-control mb-4" value="{{ old('FIChildAddress3',  $profile['FIChildAddress3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FIChildOccupation3" name="FIChildOccupation3" class="form-control mb-4" value="{{ old('FIChildOccupation3',  $profile['FIChildOccupation3']) }}"> 
                            </div>
                        </div>
                        <div class="row list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FIChildName4" name="FIChildName4" class="form-control mb-4" value="{{ old('FIChildName4',  $profile['FIChildName4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FIChildAge4" name="FIChildAge4" class="form-control mb-4" value="{{ old('FIChildAge4',  $profile['FIChildAge4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FIChildAddress4" name="FIChildAddress4" class="form-control mb-4" value="{{ old('FIChildAddress4',  $profile['FIChildAddress4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FIChildOccupation4" name="FIChildOccupation4" class="form-control mb-4" value="{{ old('FIChildOccupation4',  $profile['FIChildOccupation4']) }}"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FIChildName5" name="FIChildName5" class="form-control mb-4" value="{{ old('FIChildName5',  $profile['FIChildName5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FIChildAge5" name="FIChildAge5" class="form-control mb-4" value="{{ old('FIChildAge5',  $profile['FIChildAge5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FIChildAddress5" name="FIChildAddress5" class="form-control mb-4" value="{{ old('FIChildAddress5',  $profile['FIChildAddress5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FIChildOccupation5" name="FIChildOccupation5" class="form-control mb-4" value="{{ old('FIChildOccupation5',  $profile['FIChildOccupation5']) }}"> 
                            </div>
                        </div>
                        <div class="row list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="FIChildName6" name="FIChildName6" class="form-control mb-4" value="{{ old('FIChildName6',  $profile['FIChildName6']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="number" id="FIChildAge6" name="FIChildAge6" class="form-control mb-4" value="{{ old('FIChildAge6',  $profile['FIChildAge6']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="FIChildAddress6" name="FIChildAddress6" class="form-control mb-4" value="{{ old('FIChildAddress6',  $profile['FIChildAddress6']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Occupation</label>
                                <input type="text" id="FIChildOccupation6" name="FIChildOccupation6" class="form-control mb-4" value="{{ old('FIChildOccupation6',  $profile['FIChildOccupation6']) }}"> 
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
                    <div class="card-body p-4 p-md-5 list-group list-group-flush">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Place of residency since birth</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Inclusive Date</label>
                                <input type="date" id="PRSBInclusiveDate" name="PRSBInclusiveDate" class="form-control mb-4" value="{{ old('PRSBInclusiveDate',  $profile['PRSBInclusiveDate']) }}" required> 
                            </div>
                        </div>
                        <div class="row list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Started</label>
                                <input type="date" id="PRSBStarted" name="PRSBStarted" class="form-control mb-4" value="{{ old('PRSBStarted',  $profile['PRSBStarted']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Ended</label>
                                <input type="date" id="PRSBEnded" name="PRSBEnded" class="form-control mb-4" value="{{ old('PRSBEnded',  $profile['PRSBEnded']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="PRSBAddress" name="PRSBAddress" class="form-control mb-4" value="{{ old('PRSBAddress',  $profile['PRSBAddress']) }}" required> 
                            </div>
                            <div class="col-md-6">
                                <label>Type of Residency</label>
                                <input type="text" id="PRSBTypeofResidency" name="PRSBTypeofResidency" class="form-control mb-4" value="{{ old('PRSBTypeofResidency',  $profile['PRSBTypeofResidency']) }}" required> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Started</label>
                                <input type="date" id="PRSBStarted2" name="PRSBStarted2" class="form-control mb-4" value="{{ old('PRSBStarted2',  $profile['PRSBStarted2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Ended</label>
                                <input type="date" id="PRSBEnded2" name="PRSBEnded2" class="form-control mb-4" value="{{ old('PRSBEnded2',  $profile['PRSBEnded2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="PRSBAddress2" name="PRSBAddress2" class="form-control mb-4" value="{{ old('PRSBAddress2',  $profile['PRSBAddress2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Type of Residency</label>
                                <input type="text" id="PRSBTypeofResidency2" name="PRSBTypeofResidency2" class="form-control mb-4" value="{{ old('PRSBTypeofResidency2',  $profile['PRSBTypeofResidency2']) }}"> 
                            </div>
                        </div>
                        <div class="row list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Started</label>
                                <input type="date" id="PRSBStarted3" name="PRSBStarted3" class="form-control mb-4" value="{{ old('PRSBStarted3',  $profile['PRSBStarted3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Ended</label>
                                <input type="date" id="PRSBEnded3" name="PRSBEnded3" class="form-control mb-4" value="{{ old('PRSBEnded3',  $profile['PRSBEnded3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="PRSBAddress3" name="PRSBAddress3" class="form-control mb-4" value="{{ old('PRSBAddress3',  $profile['PRSBAddress3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Type of Residency</label>
                                <input type="text" id="PRSBTypeofResidency3" name="PRSBTypeofResidency3" class="form-control mb-4" value="{{ old('PRSBTypeofResidency3',  $profile['PRSBTypeofResidency3']) }}"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Started</label>
                                <input type="date" id="PRSBStarted4" name="PRSBStarted4" class="form-control mb-4" value="{{ old('PRSBStarted4',  $profile['PRSBStarted4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Ended</label>
                                <input type="date" id="PRSBEnded4" name="PRSBEnded4" class="form-control mb-4" value="{{ old('PRSBEnded4',  $profile['PRSBEnded4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="PRSBAddress4" name="PRSBAddress4" class="form-control mb-4" value="{{ old('PRSBAddress4',  $profile['PRSBAddress4']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Type of Residency</label>
                                <input type="text" id="PRSBTypeofResidency4" name="PRSBTypeofResidency4" class="form-control mb-4" value="{{ old('PRSBTypeofResidency4',  $profile['PRSBTypeofResidency4']) }}"> 
                            </div>
                        </div>
                        <div class="row list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Started</label>
                                <input type="date" id="PRSBStarted5" name="PRSBStarted5" class="form-control mb-4" value="{{ old('PRSBStarted5',  $profile['PRSBStarted5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Ended</label>
                                <input type="date" id="PRSBEnded5" name="PRSBEnded5" class="form-control mb-4" value="{{ old('PRSBEnded5',  $profile['PRSBEnded5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="PRSBAddress5" name="PRSBAddress5" class="form-control mb-4" value="{{ old('PRSBAddress5',  $profile['PRSBAddress5']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Type of Residency</label>
                                <input type="text" id="PRSBTypeofResidency5" name="PRSBTypeofResidency5" class="form-control mb-4" value="{{ old('PRSBTypeofResidency5',  $profile['PRSBTypeofResidency5']) }}"> 
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
                    <div class="card-body p-4 p-md-5 list-group list-group-flush">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Organization</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Date of Membership</label>
                                <input type="date" id="ODateofMembership" name="ODateofMembership" class="form-control mb-4" value="{{ old('ODateofMembership',  $profile['ODateofMembership']) }}"> 
                            </div>
                        </div>
                        <div class="row list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Started</label>
                                <input type="date" id="OStarted" name="OStarted" class="form-control mb-4" value="{{ old('OStarted',  $profile['OStarted']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Ended</label>
                                <input type="date" id="OEnded" name="OEnded" class="form-control mb-4" value="{{ old('OEnded',  $profile['OEnded']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Name of Organization</label>
                                <input type="text" id="ONameofOrganization" name="ONameofOrganization" class="form-control mb-4" value="{{ old('ONameofOrganization',  $profile['ONameofOrganization']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="OPosition" name="OPosition" class="form-control mb-4" value="{{ old('OPosition',  $profile['OPosition']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Location</label>
                                <input type="text" id="OLocation" name="OLocation" class="form-control mb-4" value="{{ old('OLocation',  $profile['OLocation']) }}"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Started</label>
                                <input type="date" id="OStarted2" name="OStarted2" class="form-control mb-4" value="{{ old('OStarted2',  $profile['OStarted2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Ended</label>
                                <input type="date" id="OEnded2" name="OEnded2" class="form-control mb-4" value="{{ old('OEnded2',  $profile['OEnded2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Name of Organization</label>
                                <input type="text" id="ONameofOrganization2" name="ONameofOrganization2" class="form-control mb-4" value="{{ old('ONameofOrganization2',  $profile['ONameofOrganization2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="OPosition2" name="OPosition2" class="form-control mb-4" value="{{ old('OPosition2',  $profile['OPosition2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Location</label>
                                <input type="text" id="OLocation2" name="OLocation2" class="form-control mb-4" value="{{ old('OLocation2',  $profile['OLocation2']) }}"> 
                            </div>
                        </div>
                        <div class="row list-group-item d-flex">
                            <div class="col-md-6">
                                <label>Started</label>
                                <input type="date" id="OStarted" name="OStarted" class="form-control mb-4" value="{{ old('OStarted3',  $profile['OStarted3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Ended</label>
                                <input type="date" id="OEnded" name="OEnded" class="form-control mb-4" value="{{ old('OEnded3',  $profile['OEnded3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Name of Organization</label>
                                <input type="text" id="ONameofOrganization" name="ONameofOrganization" class="form-control mb-4" value="{{ old('ONameofOrganization3',  $profile['ONameofOrganization3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Position</label>
                                <input type="text" id="OPosition3" name="OPosition3" class="form-control mb-4" value="{{ old('OPosition3',  $profile['OPosition3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Location</label>
                                <input type="text" id="OLocation3" name="OLocation3" class="form-control mb-4" value="{{ old('OLocation3',  $profile['OLocation3']) }}"> 
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
                    <div class="card-body p-4 p-md-5 list-group list-group-flush">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Character References</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="CRCompleteName" name="CRCompleteName" class="form-control mb-4" value="{{ old('CRCompleteName',  $profile['CRCompleteName']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="CRAddress" name="CRAddress" class="form-control mb-4" value="{{ old('CRAddress',  $profile['CRAddress']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label></label>
                                <input type="text" id="CROccupation" name="CROccupation" class="form-control mb-4" value="{{ old('CROccupation',  $profile['CROccupation']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label></label>
                                <input type="text" id="CRContactNumber" name="CRContactNumber" class="form-control mb-4" value="{{ old('CRContactNumber',  $profile['CRContactNumber']) }}"> 
                            </div>
                        </div>
                        <div class="row list-group-item">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="CRCompleteName2" name="CRCompleteName2" class="form-control mb-4" value="{{ old('CRCompleteName2',  $profile['CRCompleteName2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="CRAddress2" name="CRAddress2" class="form-control mb-4" value="{{ old('CRAddress2',  $profile['CRAddress2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label></label>
                                <input type="text" id="CROccupation2" name="CROccupation2" class="form-control mb-4" value="{{ old('CROccupation2',  $profile['CROccupation2']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label></label>
                                <input type="text" id="CRContactNumber2" name="CRContactNumber2" class="form-control mb-4" value="{{ old('CRContactNumber2',  $profile['CRContactNumber2']) }}"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Complete Name</label>
                                <input type="text" id="CRCompleteName3" name="CRCompleteName3" class="form-control mb-4" value="{{ old('CRCompleteName3',  $profile['CRCompleteName3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" id="CRAddress3" name="CRAddress3" class="form-control mb-4" value="{{ old('CRAddress3',  $profile['CRAddress3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label></label>
                                <input type="text" id="CROccupation3" name="CROccupation3" class="form-control mb-4" value="{{ old('CROccupation3',  $profile['CROccupation3']) }}"> 
                            </div>
                            <div class="col-md-6">
                                <label></label>
                                <input type="text" id="CRContactNumber3" name="CRContactNumber3" class="form-control mb-4" value="{{ old('CRContactNumber3',  $profile['CRContactNumber3']) }}"> 
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
                    <div class="card-body p-4 p-md-5 list-group list-group-flush">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Self-Declaration</h3>
                        <h5 class="mb-3"><i>Arrest & Conduct</i></h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Have you ever been dismissed or forced to resign from a certain position and/or previous employment?</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('ACDismissedForcedResign', $profile['ACDismissedForcedResign']) == "")
                                <input type="radio" id="ACDismissedForcedResign" name="ACDismissedForcedResign" value="Yes" required> Yes</input>
                                <input type="radio" id="ACDismissedForcedResign" name="ACDismissedForcedResign" value="No"> No</input>
                            @elseif ( old('ACDismissedForcedResign', $profile['ACDismissedForcedResign']) == "Yes")
                                <input type="radio" id="ACDismissedForcedResign" name="ACDismissedForcedResign" value="Yes" required checked> Yes</input>
                                <input type="radio" id="ACDismissedForcedResign" name="ACDismissedForcedResign" value="No"> No</input>
                            @elseif ( old('ACDismissedForcedResign', $profile['ACDismissedForcedResign']) == "No")
                                <input type="radio" id="ACDismissedForcedResign" name="ACDismissedForcedResign" value="Yes" required> Yes</input>
                                <input type="radio" id="ACDismissedForcedResign" name="ACDismissedForcedResign" value="No"checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Have you ever been investigated/arrested and/or detained for any violation of the law? If so, state name of the court, nature of offense and disposition of the case.</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('ACInvestigatedArrestedDetained', $profile['ACInvestigatedArrestedDetained']) == "")
                                <input type="radio" id="ACInvestigatedArrestedDetained" name="ACInvestigatedArrestedDetained" value="Yes" required> Yes</input>
                                <input type="radio" id="ACInvestigatedArrestedDetained" name="ACInvestigatedArrestedDetained" value="No"> No</input>
                            @elseif ( old('ACInvestigatedArrestedDetained', $profile['ACInvestigatedArrestedDetained']) == "Yes")
                                <input type="radio" id="ACInvestigatedArrestedDetained" name="ACInvestigatedArrestedDetained" value="Yes" required checked> Yes</input>
                                <input type="radio" id="ACInvestigatedArrestedDetained" name="ACInvestigatedArrestedDetained" value="No"> No</input>
                            @elseif ( old('ACInvestigatedArrestedDetained', $profile['ACInvestigatedArrestedDetained']) == "No")
                                <input type="radio" id="ACInvestigatedArrestedDetained" name="ACInvestigatedArrestedDetained" value="Yes" required> Yes</input>
                                <input type="radio" id="ACInvestigatedArrestedDetained" name="ACInvestigatedArrestedDetained" value="No" checked> No</input>
                            @endif
                                <input type="text" id="ACInvestigatedArrestedDetainedViolation" name="ACInvestigatedArrestedDetainedViolation" class="form-control mb-4" value="{{ old('ACInvestigatedArrestedDetainedViolation',  $profile['ACInvestigatedArrestedDetainedViolation']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Has any member(s) of your family been investigated/arrested and/or detained for any violation of the law?</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('ACFamilyInvestigatedArrestedDetained', $profile['ACFamilyInvestigatedArrestedDetained']) == "")
                                <input type="radio" id="ACFamilyInvestigatedArrestedDetained" name="ACFamilyInvestigatedArrestedDetained" value="Yes" required> Yes</input>
                                <input type="radio" id="ACFamilyInvestigatedArrestedDetained" name="ACFamilyInvestigatedArrestedDetained" value="No"> No</input>
                            @elseif ( old('ACFamilyInvestigatedArrestedDetained', $profile['ACFamilyInvestigatedArrestedDetained']) == "Yes")
                                <input type="radio" id="ACFamilyInvestigatedArrestedDetained" name="ACFamilyInvestigatedArrestedDetained" value="Yes" required checked> Yes</input>
                                <input type="radio" id="ACFamilyInvestigatedArrestedDetained" name="ACFamilyInvestigatedArrestedDetained" value="No"> No</input>
                            @elseif ( old('ACFamilyInvestigatedArrestedDetained', $profile['ACFamilyInvestigatedArrestedDetained']) == "No")
                                <input type="radio" id="ACFamilyInvestigatedArrestedDetained" name="ACFamilyInvestigatedArrestedDetained" value="Yes" required> Yes</input>
                                <input type="radio" id="ACFamilyInvestigatedArrestedDetained" name="ACFamilyInvestigatedArrestedDetained" value="No"checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Are you willing to be assigned to any post? If NO, please indicate the reason why.</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('ACWillingtobeAssigned', $profile['ACWillingtobeAssigned']) == "")
                                <input type="radio" id="ACWillingtobeAssigned" name="ACWillingtobeAssigned" value="Yes" required> Yes</input>
                                <input type="radio" id="ACWillingtobeAssigned" name="ACWillingtobeAssigned" value="No"> No</input>
                            @elseif ( old('ACWillingtobeAssigned', $profile['ACWillingtobeAssigned']) == "Yes")
                                <input type="radio" id="ACWillingtobeAssigned" name="ACWillingtobeAssigned" value="Yes" required checked> Yes</input>
                                <input type="radio" id="ACWillingtobeAssigned" name="ACWillingtobeAssigned" value="No"> No</input>
                            @elseif ( old('ACWillingtobeAssigned', $profile['ACWillingtobeAssigned']) == "No")
                                <input type="radio" id="ACWillingtobeAssigned" name="ACWillingtobeAssigned" value="Yes" required> Yes</input>
                                <input type="radio" id="ACWillingtobeAssigned" name="ACWillingtobeAssigned" value="No" checked> No</input>
                            @endif
                                <input type="text" id="ACWillingtobeAssignedReason" name="ACWillingtobeAssignedReason" class="form-control mb-4" value="{{ old('ACWillingtobeAssignedReason',  $profile['ACWillingtobeAssignedReason']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Do you use any intoxicating liquor? If so, for what extent?</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('ACLiquor', $profile['ACLiquor']) == "")
                                <input type="radio" id="ACLiquor" name="ACLiquor" value="Yes" required> Yes</input>
                                <input type="radio" id="ACLiquor" name="ACLiquor" value="No"> No</input>
                            @elseif ( old('ACLiquor', $profile['ACLiquor']) == "Yes")
                                <input type="radio" id="ACLiquor" name="ACLiquor" value="Yes" required checked> Yes</input>
                                <input type="radio" id="ACLiquor" name="ACLiquor" value="No"> No</input>
                            @elseif ( old('ACLiquor', $profile['ACLiquor']) == "No")
                                <input type="radio" id="ACLiquor" name="ACLiquor" value="Yes" required> Yes</input>
                                <input type="radio" id="ACLiquor" name="ACLiquor" value="No" checked> No</input>
                            @endif
                                <input type="text" id="ACLiquorExtent" name="ACLiquorExtent" class="form-control mb-4" value="{{ old('ACLiquorExtent',  $profile['ACLiquorExtent']) }}"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Do you use any drugs/substances prohibited by the law? If so, for what extent?</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('ACDrugs', $profile['ACDrugs']) == "")
                                <input type="radio" id="ACDrugs" name="ACDrugs" value="Yes" required> Yes</input>
                                <input type="radio" id="ACDrugs" name="ACDrugs" value="No"> No</input>
                            @elseif ( old('ACDrugs', $profile['ACDrugs']) == "Yes")
                                <input type="radio" id="ACDrugs" name="ACDrugs" value="Yes" required checked> Yes</input>
                                <input type="radio" id="ACDrugs" name="ACDrugs" value="No"> No</input>
                            @elseif ( old('ACDrugs', $profile['ACDrugs']) == "No")
                                <input type="radio" id="ACDrugs" name="ACDrugs" value="Yes" required> Yes</input>
                                <input type="radio" id="ACDrugs" name="ACDrugs" value="No" checked> No</input>
                            @endif
                                <input type="text" id="ACDrugsExtent" name="ACDrugsExtent" class="form-control mb-4" value="{{ old('ACDrugsExtent',  $profile['ACDrugsExtent']) }}"> 
                            </div>
                        </div>
                        <h5 class="mb-3"><i>Health Condition</i></h5>
                        <h6 class="mb-3"><i>Past/Present Medical History</i></h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Hospitalization</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('HCHospitalization', $profile['HCHospitalization']) == "")
                                <input type="radio" id="HCHospitalization" name="HCHospitalization" value="Yes" required> Yes</input>
                                <input type="radio" id="HCHospitalization" name="HCHospitalization" value="No"> No</input>
                            @elseif ( old('HCHospitalization', $profile['HCHospitalization']) == "Yes")
                                <input type="radio" id="HCHospitalization" name="HCHospitalization" value="Yes" required checked> Yes</input>
                                <input type="radio" id="HCHospitalization" name="HCHospitalization" value="No"> No</input>
                            @elseif ( old('HCHospitalization', $profile['HCHospitalization']) == "No")
                                <input type="radio" id="HCHospitalization" name="HCHospitalization" value="Yes" required> Yes</input>
                                <input type="radio" id="HCHospitalization" name="HCHospitalization" value="No" checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Operation</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('HCOperation', $profile['HCOperation']) == "")
                                <input type="radio" id="c" name="HCOperation" value="Yes" required> Yes</input>
                                <input type="radio" id="HCOperation" name="HCOperation" value="No"> No</input>
                            @elseif ( old('HCOperation', $profile['HCOperation']) == "Yes")
                                <input type="radio" id="c" name="HCOperation" value="Yes" required checked> Yes</input>
                                <input type="radio" id="HCOperation" name="HCOperation" value="No"> No</input>
                            @elseif ( old('HCOperation', $profile['HCOperation']) == "No")
                                <input type="radio" id="c" name="HCOperation" value="Yes" required> Yes</input>
                                <input type="radio" id="HCOperation" name="HCOperation" value="No" checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>PTB</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('HCPTB', $profile['HCPTB']) == "")
                                <input type="radio" id="HCPTB" name="HCPTB" value="Yes" required> Yes</input>
                                <input type="radio" id="HCPTB" name="HCPTB" value="No"> No</input>
                            @elseif ( old('HCPTB', $profile['HCPTB']) == "Yes")
                                <input type="radio" id="HCPTB" name="HCPTB" value="Yes" required checked> Yes</input>
                                <input type="radio" id="HCPTB" name="HCPTB" value="No"> No</input>
                            @elseif ( old('HCPTB', $profile['HCPTB']) == "No")
                                <input type="radio" id="HCPTB" name="HCPTB" value="Yes" required> Yes</input>
                                <input type="radio" id="HCPTB" name="HCPTB" value="No" checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Hepatitis</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('HCHepatitis', $profile['HCHepatitis']) == "")
                                <input type="radio" id="HCHepatitis" name="HCHepatitis" value="Yes" required> Yes</input>
                                <input type="radio" id="HCHepatitis" name="HCHepatitis" value="No"> No</input>
                            @elseif ( old('HCHepatitis', $profile['HCHepatitis']) == "Yes")
                                <input type="radio" id="HCHepatitis" name="HCHepatitis" value="Yes" required checked> Yes</input>
                                <input type="radio" id="HCHepatitis" name="HCHepatitis" value="No"> No</input>
                            @elseif ( old('HCHepatitis', $profile['HCHepatitis']) == "No")
                                <input type="radio" id="HCHepatitis" name="HCHepatitis" value="Yes" required> Yes</input>
                                <input type="radio" id="HCHepatitis" name="HCHepatitis" value="No"checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Allergies</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('HCAllergies', $profile['HCAllergies']) == "")
                                <input type="radio" id="HCAllergies" name="HCAllergies" value="Yes" required> Yes</input>
                                <input type="radio" id="HCAllergies" name="HCAllergies" value="No"> No</input>
                            @elseif ( old('HCAllergies', $profile['HCAllergies']) == "Yes")
                                <input type="radio" id="HCAllergies" name="HCAllergies" value="Yes" required checked> Yes</input>
                                <input type="radio" id="HCAllergies" name="HCAllergies" value="No"> No</input>
                            @elseif ( old('HCAllergies', $profile['HCAllergies']) == "No")
                                <input type="radio" id="HCAllergies" name="HCAllergies" value="Yes" required> Yes</input>
                                <input type="radio" id="HCAllergies" name="HCAllergies" value="No" checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Urinary Tract Infection</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('HCUTI', $profile['HCUTI']) == "")
                                <input type="radio" id="HCUTI" name="HCUTI" value="Yes" required> Yes</input>
                                <input type="radio" id="HCUTI" name="HCUTI" value="No"> No</input>
                            @elseif ( old('HCUTI', $profile['HCUTI']) == "Yes")
                                <input type="radio" id="HCUTI" name="HCUTI" value="Yes" required checked> Yes</input>
                                <input type="radio" id="HCUTI" name="HCUTI" value="No"> No</input>
                            @elseif ( old('HCUTI', $profile['HCUTI']) == "No")
                                <input type="radio" id="HCUTI" name="HCUTI" value="Yes" required> Yes</input>
                                <input type="radio" id="HCUTI" name="HCUTI" value="No" checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Bronchial Asthma</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('HCBronchialAsthma', $profile['HCBronchialAsthma']) == "")
                                <input type="radio" id="HCBronchialAsthma" name="HCBronchialAsthma" value="Yes" required> Yes</input>
                                <input type="radio" id="HCBronchialAsthma" name="HCBronchialAsthma" value="No"> No</input>
                            @elseif ( old('HCBronchialAsthma', $profile['HCBronchialAsthma']) == "Yes")
                                <input type="radio" id="HCBronchialAsthma" name="HCBronchialAsthma" value="Yes" required checked> Yes</input>
                                <input type="radio" id="HCBronchialAsthma" name="HCBronchialAsthma" value="No"> No</input>
                            @elseif ( old('HCBronchialAsthma', $profile['HCBronchialAsthma']) == "No")
                                <input type="radio" id="HCBronchialAsthma" name="HCBronchialAsthma" value="Yes" required> Yes</input>
                                <input type="radio" id="HCBronchialAsthma" name="HCBronchialAsthma" value="No" checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Diabetes</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('HCDiabetes', $profile['HCDiabetes']) == "")
                                <input type="radio" id="HCDiabetes" name="HCDiabetes" value="Yes" required> Yes</input>
                                <input type="radio" id="HCDiabetes" name="HCDiabetes" value="No"> No</input>
                            @elseif ( old('HCDiabetes', $profile['HCDiabetes']) == "Yes")
                                <input type="radio" id="HCDiabetes" name="HCDiabetes" value="Yes" required checked> Yes</input>
                                <input type="radio" id="HCDiabetes" name="HCDiabetes" value="No"> No</input>
                            @elseif ( old('HCDiabetes', $profile['HCDiabetes']) == "No")
                                <input type="radio" id="HCDiabetes" name="HCDiabetes" value="Yes" required> Yes</input>
                                <input type="radio" id="HCDiabetes" name="HCDiabetes" value="No" checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>HPN</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('HCHPN', $profile['HCHPN']) == "")
                                <input type="radio" id="HCHPN" name="HCHPN" value="Yes" required> Yes</input>
                                <input type="radio" id="HCHPN" name="HCHPN" value="No"> No</input>
                            @elseif ( old('HCHPN', $profile['HCHPN']) == "Yes")
                                <input type="radio" id="HCHPN" name="HCHPN" value="Yes" required checked> Yes</input>
                                <input type="radio" id="HCHPN" name="HCHPN" value="No"> No</input>
                            @elseif ( old('HCHPN', $profile['HCHPN']) == "No")
                                <input type="radio" id="HCHPN" name="HCHPN" value="Yes" required> Yes</input>
                                <input type="radio" id="HCHPN" name="HCHPN" value="No" checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Others</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('HCOthers', $profile['HCOthers']) == "")
                                <input type="radio" id="HCOthers" name="HCOthers" value="Yes" required> Yes</input>
                                <input type="radio" id="HCOthers" name="HCOthers" value="No"> No</input>
                            @elseif ( old('HCOthers', $profile['HCOthers']) == "Yes")
                                <input type="radio" id="HCOthers" name="HCOthers" value="Yes" required checked> Yes</input>
                                <input type="radio" id="HCOthers" name="HCOthers" value="No"> No</input>
                            @elseif ( old('HCOthers', $profile['HCOthers']) == "No")
                                <input type="radio" id="HCOthers" name="HCOthers" value="Yes" required> Yes</input>
                                <input type="radio" id="HCOthers" name="HCOthers" value="No" checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="list-group-item mb-3">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Alcohol intake per month</label>
                                    <input type="text" class="form-control mb-4" id="SDAlcohol" name="SDAlcohol" value="{{ old('SDAlcohol',  $profile['SDAlcohol']) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Cigarette intake x sticks/day</label>
                                    <input type="number" class="form-control mb-4" id="SDCigarette" name="SDCigarette" value="{{ old('SDCigarette',  $profile['SDCigarette']) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Present Medication</label>
                                    <input type="text" class="form-control mb-4" id="SDPresentMedication" name="SDPresentMedication" value="{{ old('SDPresentMedication',  $profile['SDPresentMedication']) }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Pregnancy</label><br>
                                    @if ( old('SDPregnancy', $profile['SDPregnancy']) == "")
                                        <input type="radio" id="SDPregnancy" name="SDPregnancy" value="Yes" required> Yes</input>
                                        <input type="radio" id="SDPregnancy" name="SDPregnancy" value="No"> No</input>
                                    @elseif ( old('SDPregnancy', $profile['SDPregnancy']) == "Yes")
                                        <input type="radio" id="SDPregnancy" name="SDPregnancy" value="Yes" required checked> Yes</input>
                                        <input type="radio" id="SDPregnancy" name="SDPregnancy" value="No"> No</input>
                                    @elseif ( old('SDPregnancy', $profile['SDPregnancy']) == "No")
                                        <input type="radio" id="SDPregnancy" name="SDPregnancy" value="Yes" required> Yes</input>
                                        <input type="radio" id="SDPregnancy" name="SDPregnancy" value="No" checked> No</input>
                                    @endif
                                    </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Are you physically fit for all types of work?</label>
                            </div>
                             <div class="col-md-6">
                            @if ( old('SDAllTypesofWork', $profile['SDAllTypesofWork']) == "")
                                <input type="radio" id="SDAllTypesofWork" name="SDAllTypesofWork" value="Yes" required> Yes</input>
                                <input type="radio" id="SDAllTypesofWork" name="SDAllTypesofWork" value="No"> No</input>
                            @elseif ( old('SDAllTypesofWork', $profile['SDAllTypesofWork']) == "Yes")
                                <input type="radio" id="SDAllTypesofWork" name="SDAllTypesofWork" value="Yes" required checked> Yes</input>
                                <input type="radio" id="SDAllTypesofWork" name="SDAllTypesofWork" value="No"> No</input>
                            @elseif ( old('SDAllTypesofWork', $profile['SDAllTypesofWork']) == "No")
                                <input type="radio" id="SDAllTypesofWork" name="SDAllTypesofWork" value="Yes" required> Yes</input>
                                <input type="radio" id="SDAllTypesofWork" name="SDAllTypesofWork" value="No" checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Are you physically fit for work but with minor ailment/abnormality?</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('SDMinorAilmentAbnormality', $profile['SDMinorAilmentAbnormality']) == "")
                                <input type="radio" id="SDMinorAilmentAbnormality" name="SDMinorAilmentAbnormality" value="Yes" required> Yes</input>
                                <input type="radio" id="SDMinorAilmentAbnormality" name="SDMinorAilmentAbnormality" value="No"> No</input>
                            @elseif ( old('SDMinorAilmentAbnormality', $profile['SDMinorAilmentAbnormality']) == "Yes")
                                <input type="radio" id="SDMinorAilmentAbnormality" name="SDMinorAilmentAbnormality" value="Yes" required checked> Yes</input>
                                <input type="radio" id="SDMinorAilmentAbnormality" name="SDMinorAilmentAbnormality" value="No"> No</input>
                            @elseif ( old('SDMinorAilmentAbnormality', $profile['SDMinorAilmentAbnormality']) == "No")
                                <input type="radio" id="SDMinorAilmentAbnormality" name="SDMinorAilmentAbnormality" value="Yes" required> Yes</input>
                                <input type="radio" id="SDMinorAilmentAbnormality" name="SDMinorAilmentAbnormality" value="No" checked> No</input>
                            @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Are you physically fit for work but with major ailment/abnormality noted?</label>
                            </div>
                            <div class="col-md-6">
                            @if ( old('SDMajorAilmentAbnormality', $profile['SDMajorAilmentAbnormality']) == "")
                                <input type="radio" id="SDMajorAilmentAbnormality" name="SDMajorAilmentAbnormality" value="Yes" required> Yes</input>
                                <input type="radio" id="SDMajorAilmentAbnormality" name="SDMajorAilmentAbnormality" value="No"> No</input>
                            @elseif ( old('SDMajorAilmentAbnormality', $profile['SDMajorAilmentAbnormality']) == "Yes")
                                <input type="radio" id="SDMajorAilmentAbnormality" name="SDMajorAilmentAbnormality" value="Yes" required checked> Yes</input>
                                <input type="radio" id="SDMajorAilmentAbnormality" name="SDMajorAilmentAbnormality" value="No"> No</input>
                            @elseif ( old('SDMajorAilmentAbnormality', $profile['SDMajorAilmentAbnormality']) == "No")
                                <input type="radio" id="SDMajorAilmentAbnormality" name="SDMajorAilmentAbnormality" value="Yes" required> Yes</input>
                                <input type="radio" id="SDMajorAilmentAbnormality" name="SDMajorAilmentAbnormality" value="No" checked> No</input>
                            @endif
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
                    <div class="card-body p-4 p-md-5 ">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Sketch of your Present Address</h3>
                        <h5 class="mb-3"><i>Start from a common landmark nearest to your home</i></h5>
                                <input type="file" id="Sketch" name="Sketch" class="form-control mb-4" accept="image/*" value="{{ old('Sketch',  $profile['Sketch']) }}" required> 
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