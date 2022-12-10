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
@section('title', 'Profile')
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
    <li class="nav-item"><a href="/Admin/BIRForm2316">BIR Form 2316</a></li>
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

<div id="main">
  <div class="container">
    <div class="main-body">          
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                @if($profile['Image'] == NULL)
                <img src="https://th.bing.com/th/id/R.3e77a1db6bb25f0feb27c95e05a7bc57?rik=DswMYVRRQEHbjQ&riu=http%3a%2f%2fwww.coalitionrc.com%2fwp-content%2fuploads%2f2017%2f01%2fplaceholder.jpg&ehk=AbGRPPcgHhziWn1sygs8UIL6XIb1HLfHjgPyljdQrDY%3d&risl=&pid=ImgRaw&r=0" alt="Chief" class="rounded-circle" width="150" height="150">
                @else
                <img src="{{ asset('images/' . $profile['Image'] )}}" alt="Chief" class="rounded-circle" width="150" height="150">
                @endif
                <div class="mt-3">
                  <h4>{{ $user['name'] }}</h4>
                  <h5>{{ $user['userno'] }}</h5>
                  <h6 class="text-secondary mb-1">{{ $profile['ContactNumber'] }}<h6>
                  <a href="/Admin/ProfileList/{{ $user['userno'] }}/edit" class="btn btn-info" onclick="return confirm('Edit Profile?')">Edit</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">Last Name</h6>
                <span class="text-secondary">{{ $profile['LastName'] }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">First Name</h6>
                <span class="text-secondary">{{ $profile['FirstName'] }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">Middle Name</h6>
                <span class="text-secondary">{{ $profile['MiddleName'] }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">Extension</h6>
                <span class="text-secondary">{{ $profile['Extension'] }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">Maternal/Paternal</h6>
                <span class="text-secondary">{{ $profile['MP'] }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">Nickname</h6>
                <span class="text-secondary">{{ $profile['NickName'] }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">Personal Email</h6>
                <span class="text-secondary">{{ $profile['Email'] }}</span>
              </li>
            </ul>
          </div>              
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="mb-3">Personal Data</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Date of Birth</h6>
                    <span class="text-secondary">{{ $profile['DateOfBirth'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Place of Birth</h6>
                    <span class="text-secondary">{{ $profile['PlaceOfBirth'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Sex</h6>
                    <span class="text-secondary">{{ $profile['Sex'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Nationality</h6>
                    <span class="text-secondary">{{ $profile['Nationality'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Marital Status</h6>
                    <span class="text-secondary">{{ $profile['MaritalStatus'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Religion</h6>
                    <span class="text-secondary">{{ $profile['Religion'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Nationality</h6>
                    <span class="text-secondary">{{ $profile['Nationality'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Current Address</h6>
                    <span class="text-secondary">{{ $profile['CurrentAddress'] }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Permanent Address</h6>
                    <span class="text-secondary">{{ $profile['PermanentAddress'] }}</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row">
	    				<div class="col-sm-12">
			    			<div class="card mb-3">
					    		<div class="card-body">
                    <h5 class="mb-3">Contact Person in Case of Emergency</h5>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0">Name</h6>
                          <span class="text-secondary">{{ $profile['CPName'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0">Relationship</h6>
                          <span class="text-secondary">{{ $profile['CPRelationship'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0">Address</h6>
                          <span class="text-secondary">{{ $profile['CPAddress'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">                                        
                          <h6 class="mb-0">Contact Number:</h6>
                          <span class="text-secondary">{{ $profile['CPContactNumber'] }}</span>
                        </li>
                      </ul>
							      </div>
						      </div>
					      </div>
              </div>
              <div class="row">
					      <div class="col-sm-12">
						      <div class="card mb-3">
							      <div class="card-body">
                      <h5 class="mb-3">Social Benefits</h5>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                          <h6 class="mb-0">SSS</h6>
                          <span class="text-secondary">{{ $profile['SSS'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0">Pag-Ibig</h6>
                          <span class="text-secondary">{{ $profile['PagIbig'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0">Philhealth</h6>
                          <span class="text-secondary">{{ $profile['Philhealth'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0">TIN</h6>
                          <span class="text-secondary">{{ $profile['TIN'] }}</span>
                        </li>
                      </ul>
							      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection