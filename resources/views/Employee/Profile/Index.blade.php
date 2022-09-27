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

<div id="main">
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('images/' . $profile['Image'] )}}" alt="Employee" class="rounded-circle" width="150" height="150">
                                <div class="mt-3">
                                    <h4>{{ $profile['LastName'] }}, {{ $profile['FirstName'] }} {{ $profile['MiddleName'] }} {{ $profile['Extension'] }} {{ $profile['MP'] }}</h4>
                                    <h5>{{ $profile['NickName'] }}</h5>
                                    <p class="text-secondary mb-1"><b>Position:</b> {{ $profile['Position'] }}</p><br>
                                    <h6 class="text-secondary mb-1">{{ $profile['ContactNumber'] }}<h6>
                                    @if($profile['ContactNumber2'] != "")
                                    {
                                        <h6 class="text-secondary mb-1">{{ $profile['ContactNumber2'] }}<h6>
                                    }
                                    @endif
                                    @if($profile['ContactNumber3'] != "")
                                    {
                                        <h6 class="text-secondary mb-1">{{ $profile['ContactNumber3'] }}<h6>
                                    }
                                    @endif
                                    @if($profile['ContactNumber4'] != "")
                                    {
                                        <h6 class="text-secondary mb-1">{{ $profile['ContactNumber4'] }}<h6>
                                    }
                                    @endif
                                    <a href="/Employee/Profile/{{ Auth::user()->id }}/edit" class="btn btn-info" onclick="return confirm('Edit Profile?')">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Date of Application</h6>
                            <span class="text-secondary">{{ $profile['DateOfApplication'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Date Hired</h6>
                            <span class="text-secondary">{{ $profile['DateHired'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Sex</h6>
                            <span class="text-secondary">{{ $profile['Sex'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Email</h6>
                            <span class="text-secondary">{{ $profile['Email'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Facebook</h6>
                            <span class="text-secondary">{{ $profile['Facebook'] }}</span>
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
                                <h6 class="mb-0">Age</h6>
                                <span class="text-secondary">{{ $profile['Age'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Height</h6>
                                <span class="text-secondary">{{ $profile['Height'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Weight</h6>
                                <span class="text-secondary">{{ $profile['Weight'] }}</span>
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
                                <h6 class="mb-0">Color of Eyes</h6>
                                <span class="text-secondary">{{ $profile['ColorOfEyes'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Complexion</h6>
                                <span class="text-secondary">{{ $profile['Complexion'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Other distinguishing features</h6>
                                <span class="text-secondary">{{ $profile['DistinguishingFeature'] }}</span>
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
                                        <h6 class="mb-0">Contact Number(s):</h6>
                                        <span class="text-secondary">{{ $profile['CPContactNumber'] }}, 
                                        @if($profile['CPContactNumber2'] != "")
                                        {
                                            <h6 class="text-secondary mb-1">{{ $profile['CPContactNumber2'] }}<h6>
                                        }
                                        @endif
                                        @if($profile['CPContactNumber3'] != "")
                                        {
                                            <h6 class="text-secondary mb-1">{{ $profile['CPContactNumber3'] }}<h6>
                                        }
                                        @endif
                                        @if($profile['CPContactNumber4'] != "")
                                        {
                                            <h6 class="text-secondary mb-1">{{ $profile['CPContactNumber4'] }}<h6>
                                        }
                                        @endif
                                        </span>
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
                            <h5 class="mb-3">LESP</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h6 class="mb-0">License Number</h6>
                                        <span class="text-secondary">{{ $profile['LicenseNumber'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Date Issued</h6>
                                        <span class="text-secondary">{{ $profile['DateIssued'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Date of Expiration</h6>
                                        <span class="text-secondary">{{ $profile['DateofExpiration'] }}</span>
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
                <div class="row">
					<div class="col-sm-12">
						<div class="card mb-3">
							<div class="card-body">
                            <h5 class="mb-3">Educational Attainment</h5>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h5 class="mb-0"><i>Elementary</i></h5>                                    
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h6 class="mb-0">Name of School</h6>
                                        <span class="text-secondary">{{ $profile['ElementaryNameofSchool'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Location</h6>
                                        <span class="text-secondary">{{ $profile['ElementaryLocation'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Date Graduated</h6>
                                        <span class="text-secondary">{{ $profile['ElementaryDateGraduated'] }}</span>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h5 class="mb-0"><i>High School</i></h5>                                    
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h6 class="mb-0">Name of School</h6>
                                        <span class="text-secondary">{{ $profile['HighSchoolNameofSchool'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Location</h6>
                                        <span class="text-secondary">{{ $profile['HighSchoolLocation'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Date Graduated</h6>
                                        <span class="text-secondary">{{ $profile['HighSchoolDateGraduated'] }}</span>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h5 class="mb-0"><i>College</i></h5>                                    
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h6 class="mb-0">Name of School</h6>
                                        <span class="text-secondary">{{ $profile['CollegeNameofSchool'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Location</h6>
                                        <span class="text-secondary">{{ $profile['CollegeLocation'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Date Graduated</h6>
                                        <span class="text-secondary">{{ $profile['CollegeDateGraduated'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Course</h6>
                                        <span class="text-secondary">{{ $profile['CollegeCourse'] }}</span>
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
                            <h5 class="mb-3">Employment History</h5>
                                <table class="table">
                                    <tr>
                                        <th colspan="3" class="border-0">Date of Employment</th>
                                        <td colspan="3" class="text-secondary border-0">{{ $profile['EHDateofEmployment'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Started</th>
                                        <th>Date Ended</th>
                                        <th>Company Name & Address</th>
                                        <th>Contact Numbers</th>
                                        <th>Position</th>
                                        <th>Reason of Leaving</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $profile['EHDateStarted'] }}</td>
                                        <td>{{ $profile['EHDateEnded'] }}</td>
                                        <td>{{ $profile['EHCompanyNameAddress'] }}</td>
                                        <td>{{ $profile['EHContactNumbers'] }}</td>
                                        <td>{{ $profile['EHPosition'] }}</td>
                                        <td>{{ $profile['EHReasonofLeaving'] }}</td>
                                    </tr>
                                    @if ($profile['EHDateStarted2'] != "")
                                    {
                                        <tr>
                                            <td>{{ $profile['EHDateStarted2'] }}</td>
                                            <td>{{ $profile['EHDateEnded2'] }}</td>
                                            <td>{{ $profile['EHCompanyNameAddress2'] }}</td>
                                            <td>{{ $profile['EHContactNumbers2'] }}</td>
                                            <td>{{ $profile['EHPosition2'] }}</td>
                                            <td>{{ $profile['EHReasonofLeaving2'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['EHDateStarted3'] != "")
                                    {
                                        <tr>
                                            <td>{{ $profile['EHDateStarted3'] }}</td>
                                            <td>{{ $profile['EHDateEnded3'] }}</td>
                                            <td>{{ $profile['EHCompanyNameAddress3'] }}</td>
                                            <td>{{ $profile['EHContactNumbers3'] }}</td>
                                            <td>{{ $profile['EHPosition3'] }}</td>
                                            <td>{{ $profile['EHReasonofLeaving3'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['EHDateStarted4'] != "")
                                    {
                                        <tr>
                                            <td>{{ $profile['EHDateStarted4'] }}</td>
                                            <td>{{ $profile['EHDateEnded4'] }}</td>
                                            <td>{{ $profile['EHCompanyNameAddress4'] }}</td>
                                            <td>{{ $profile['EHContactNumbers4'] }}</td>
                                            <td>{{ $profile['EHPosition4'] }}</td>
                                            <td>{{ $profile['EHReasonofLeaving4'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['EHDateStarted5'] != "")
                                    {
                                        <tr>
                                            <td>{{ $profile['EHDateStarted5'] }}</td>
                                            <td>{{ $profile['EHDateEnded5'] }}</td>
                                            <td>{{ $profile['EHCompanyNameAddress5'] }}</td>
                                            <td>{{ $profile['EHContactNumbers5'] }}</td>
                                            <td>{{ $profile['EHPosition5'] }}</td>
                                            <td>{{ $profile['EHReasonofLeaving5'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['EHDateStarted6'] != "")
                                    {
                                        <tr>
                                            <td>{{ $profile['EHDateStarted6'] }}</td>
                                            <td>{{ $profile['EHDateEnded6'] }}</td>
                                            <td>{{ $profile['EHCompanyNameAddress6'] }}</td>
                                            <td>{{ $profile['EHContactNumbers6'] }}</td>
                                            <td>{{ $profile['EHPosition6'] }}</td>
                                            <td>{{ $profile['EHReasonofLeaving6'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['EHDateStarted7'] != "")
                                    {
                                        <tr>
                                            <td>{{ $profile['EHDateStarted7'] }}</td>
                                            <td>{{ $profile['EHDateEnded7'] }}</td>
                                            <td>{{ $profile['EHCompanyNameAddress7'] }}</td>
                                            <td>{{ $profile['EHContactNumbers7'] }}</td>
                                            <td>{{ $profile['EHPosition7'] }}</td>
                                            <td>{{ $profile['EHReasonofLeaving7'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['EHDateStarted8'] != "")
                                    {
                                        <tr>
                                            <td>{{ $profile['EHDateStarted8'] }}</td>
                                            <td>{{ $profile['EHDateEnded8'] }}</td>
                                            <td>{{ $profile['EHCompanyNameAddress8'] }}</td>
                                            <td>{{ $profile['EHContactNumbers8'] }}</td>
                                            <td>{{ $profile['EHPosition8'] }}</td>
                                            <td>{{ $profile['EHReasonofLeaving8'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['EHDateStarted9'] != "")
                                    {
                                        <tr>
                                            <td>{{ $profile['EHDateStarted9'] }}</td>
                                            <td>{{ $profile['EHDateEnded9'] }}</td>
                                            <td>{{ $profile['EHCompanyNameAddress9'] }}</td>
                                            <td>{{ $profile['EHContactNumbers9'] }}</td>
                                            <td>{{ $profile['EHPosition9'] }}</td>
                                            <td>{{ $profile['EHReasonofLeaving9'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['EHDateStarted10'] != "")
                                    {
                                        <tr>
                                            <td>{{ $profile['EHDateStarted10'] }}</td>
                                            <td>{{ $profile['EHDateEnded10'] }}</td>
                                            <td>{{ $profile['EHCompanyNameAddress10'] }}</td>
                                            <td>{{ $profile['EHContactNumbers10'] }}</td>
                                            <td>{{ $profile['EHPosition10'] }}</td>
                                            <td>{{ $profile['EHReasonofLeaving10'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                </table>
							</div>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-12">
						<div class="card mb-3">
							<div class="card-body">
                            <h5 class="mb-3">Family Information</h5>
                            <table class="table mb-3">
                                    <tr>
                                        <th class="border-0">Father's Name</th>
                                        <th class="border-0">Age</th>
                                        <th class="border-0">Address</th>
                                        <th class="border-0">Occupation</th>
                                    </tr>
                                    <tr>
                                        <td class="text-secondary">{{ $profile['FIFathersName'] }}</td>
                                        <td class="text-secondary">{{ $profile['FIFatherAge'] }}</td>
                                        <td class="text-secondary">{{ $profile['FIFatherAddress'] }}</td>
                                        <td class="text-secondary">{{ $profile['FIFatherOccupation'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mother's Maiden Name</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Occupation</th>
                                    </tr>
                                    <tr>
                                        <td class="text-secondary">{{ $profile['FIMothersMaidenName'] }}</td>
                                        <td class="text-secondary">{{ $profile['FIMotherAge'] }}</td>
                                        <td class="text-secondary">{{ $profile['FIMotherAddress'] }}</td>
                                        <td class="text-secondary">{{ $profile['FIMotherOccupation'] }}</td>
                                    </tr>
                                </table>
                                <table class="table mb-3">
                                    <tr>
                                        <td class="border-0"><h5><i>Brothers & Sisters</i></h5></td>
                                    <tr>
                                    <tr>
                                        <th class="border-0">Complete Name</th>
                                        <th class="border-0">Age</th>
                                        <th class="border-0">Address</th>
                                        <th class="border-0">Occupation</th>
                                    </tr>
                                    <tr>
                                        <td class="text-secondary">{{ $profile['FISiblingName'] }}</td>
                                        <td class="text-secondary">{{ $profile['FISiblingAge'] }}</td>
                                        <td class="text-secondary">{{ $profile['FISiblingAddress'] }}</td>
                                        <td class="text-secondary">{{ $profile['FISiblingOccupation'] }}</td>
                                    </tr>
                                    @if ($profile['FISiblingName2' != ""])
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['FISiblingName2'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingAge2'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingAddress2'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingOccupation2'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['FISiblingName3' != ""])
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['FISiblingName3'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingAge3'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingAddress3'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingOccupation3'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['FISiblingName4' != ""])
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['FISiblingName4'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingAge4'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingAddress4'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingOccupation4'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['FISiblingName5' != ""])
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['FISiblingName5'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingAge5'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingAddress5'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingOccupation5'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['FISiblingName6' != ""])
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['FISiblingName6'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingAge6'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingAddress6'] }}</td>
                                            <td class="text-secondary">{{ $profile['FISiblingOccupation6'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                </table>
                                <table class="table mb-3">
                                    <tr>
                                        <td class="border-0 pl-5 ml-4"><h5><i>Spouse</i></h5></td>
                                    <tr>
                                    <tr>
                                        <th class="border-0">Complete Name</th>
                                        <th class="border-0">Date of Birth</th>
                                        <th class="border-0">Address</th>
                                        <th class="border-0">Date & Place of Marriage</th>
                                        <th class="border-0">Occupation</th>
                                    </tr>
                                    <tr>
                                        <td class="text-secondary">{{ $profile['FISpouseName'] }}</td>
                                        <td class="text-secondary">{{ $profile['FISpouseDateofBirth'] }}</td>
                                        <td class="text-secondary">{{ $profile['FISpouseAddress'] }}</td>
                                        <td class="text-secondary">{{ $profile['FISpouseDateofMarriage'] }}</td>
                                        <td class="text-secondary">{{ $profile['FISpouseOccupation'] }}</td>
                                    </tr>
                                </table>
                                <table class="table mb-3">
                                    <tr>
                                        <td class="border-0"><h5><i>Children</i></h5></td>
                                    <tr>
                                    <tr>
                                        <th class="border-0">Complete Name</th>
                                        <th class="border-0">Age</th>
                                        <th class="border-0">Address</th>
                                        <th class="border-0">Occupation</th>
                                    </tr>
                                    <tr>
                                        <td class="text-secondary">{{ $profile['FIChildName'] }}</td>
                                        <td class="text-secondary">{{ $profile['FIChildAge'] }}</td>
                                        <td class="text-secondary">{{ $profile['FIChildAddress'] }}</td>
                                        <td class="text-secondary">{{ $profile['FIChildOccupation'] }}</td>
                                    </tr>
                                    @if ($profile['FIChildName2'])
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['FIChildName2'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildAge2'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildAddress2'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildOccupation2'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['FIChildName3'])
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['FIChildName3'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildAge3'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildAddress3'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildOccupation3'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['FIChildName4'])
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['FIChildName4'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildAge4'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildAddress4'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildOccupation4'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['FIChildName5'])
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['FIChildName5'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildAge5'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildAddress5'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildOccupation5'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['FIChildName6'])
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['FIChildName6'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildAge6'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildAddress6'] }}</td>
                                            <td class="text-secondary">{{ $profile['FIChildOccupation6'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                </table>
							</div>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-12">
						<div class="card mb-3">
							<div class="card-body">
                            <h5 class="mb-3">Place of Residency Since Birth</h5>
                            <table class="table mb-3">
                                    <tr>
                                        <th colspan="2" class="border-0">Inclusive Date</th>
                                        <td colspan="2" class="text-secondary border-0">{{ $profile['PRSBInclusiveDate'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Started</th>
                                        <th>Ended</th>
                                        <th>Address</th>
                                        <th>Types of Residency</th>
                                    </tr>
                                    <tr>
                                        <td class="text-secondary">{{ $profile['PRSBStarted'] }}</td>
                                        <td class="text-secondary">{{ $profile['PRSBEnded'] }}</td>
                                        <td class="text-secondary">{{ $profile['PRSBAddress'] }}</td>
                                        <td class="text-secondary">{{ $profile['PRSBTypeofResidency'] }}</td>
                                    </tr>
                                    @if ($profile['PRSBStarted2'] != "")
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['PRSBStarted2'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBEnded2'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBAddress2'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBTypeofResidency2'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['PRSBStarted3'] != "")
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['PRSBStarted3'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBEnded3'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBAddress3'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBTypeofResidency3'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['PRSBStarted4'] != "")
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['PRSBStarted4'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBEnded4'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBAddress4'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBTypeofResidency4'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['PRSBStarted5'] != "")
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['PRSBStarted5'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBEnded5'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBAddress5'] }}</td>
                                            <td class="text-secondary">{{ $profile['PRSBTypeofResidency5'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                </table>
							</div>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-12">
						<div class="card mb-3">
							<div class="card-body">
                            <h5 class="mb-3">Organization</h5>
                            <table class="table mb-3">
                                    <tr>
                                        <th colspan="2" class="border-0">Date of Membership</th>
                                        <td colspan="2" class="text-secondary border-0">{{ $profile['ODateofMembership'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Started</th>
                                        <th>Ended</th>
                                        <th>Name of Organization</th>
                                        <th>Position</th>
                                        <th>Location</th>
                                    </tr>
                                    <tr>
                                        <td class="text-secondary">{{ $profile['OStarted'] }}</td>
                                        <td class="text-secondary">{{ $profile['OEnded'] }}</td>
                                        <td class="text-secondary">{{ $profile['ONameofOrganization'] }}</td>
                                        <td class="text-secondary">{{ $profile['OPosition'] }}</td>
                                        <td class="text-secondary">{{ $profile['OLocation'] }}</td>
                                    </tr>
                                    @if ($profile['OStarted2'] != "") 
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['OStarted2'] }}</td>
                                            <td class="text-secondary">{{ $profile['OEnded2'] }}</td>
                                            <td class="text-secondary">{{ $profile['ONameofOrganization2'] }}</td>
                                            <td class="text-secondary">{{ $profile['OPosition2'] }}</td>
                                            <td class="text-secondary">{{ $profile['OLocation2'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['OStarted3'] != "") 
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['OStarted3'] }}</td>
                                            <td class="text-secondary">{{ $profile['OEnded3'] }}</td>
                                            <td class="text-secondary">{{ $profile['ONameofOrganization3'] }}</td>
                                            <td class="text-secondary">{{ $profile['OPosition3'] }}</td>
                                            <td class="text-secondary">{{ $profile['OLocation3'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                </table>
							</div>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-12">
						<div class="card mb-3">
							<div class="card-body">
                            <h5 class="mb-3">Character References</h5>
                            <table class="table mb-3">
                                    <tr>
                                        <th>Complete Name</th>
                                        <th>Address</th>
                                        <th>Occupation</th>
                                        <th>Contact Number</th>
                                    </tr>
                                    <tr>
                                        <td class="text-secondary">{{ $profile['CRCompleteName'] }}</td>
                                        <td class="text-secondary">{{ $profile['CRAddress'] }}</td>
                                        <td class="text-secondary">{{ $profile['CROccupation'] }}</td>
                                        <td class="text-secondary">{{ $profile['CRContactNumber'] }}</td>
                                    </tr>
                                    @if ($profile['CRCompleteName2'] != "")
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['CRCompleteName2'] }}</td>
                                            <td class="text-secondary">{{ $profile['CRAddress2'] }}</td>
                                            <td class="text-secondary">{{ $profile['CROccupation2'] }}</td>
                                            <td class="text-secondary">{{ $profile['CRContactNumber2'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                    @if ($profile['CRCompleteName3'] != "")
                                    {
                                        <tr>
                                            <td class="text-secondary">{{ $profile['CRCompleteName3'] }}</td>
                                            <td class="text-secondary">{{ $profile['CRAddress3'] }}</td>
                                            <td class="text-secondary">{{ $profile['CROccupation3'] }}</td>
                                            <td class="text-secondary">{{ $profile['CRContactNumber3'] }}</td>
                                        </tr>
                                    }
                                    @endif
                                </table>
							</div>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-12">
						<div class="card mb-3">
							<div class="card-body">
                            <h5 class="mb-3">Self-Declaration</h5>
                                <ul class="list-group list-group-flush">
                                <h5 class="mb-3 pl-3"><i>Arrest & Conduct</i></h5>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h6 class="mb-0">Have you ever been dismissed or forced to resign from a certain position and/or previous employment?</h6>
                                        <span class="text-secondary">{{ $profile['ACDismissedForcedResign'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Have you ever been investigated/arrested and/or detained for any violation of the law? If so, state name of the court, nature of offense and disposition of the case.</h6>
                                        <span class="text-secondary">{{ $profile['ACInvestigatedArrestedDetained'] }}</span>
                                        <span class="text-secondary">{{ $profile['ACInvestigatedArrestedDetainedViolation'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Has any member(s) of your family been investigated/arrested and/or detained for any violation of the law?</h6>
                                        <span class="text-secondary">{{ $profile['ACFamilyInvestigatedArrestedDetained'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Are you willing to be assigned to any post? If NO, please indicate the reason why.</h6>
                                        <span class="text-secondary">{{ $profile['ACWillingtobeAssigned'] }}</span>
                                        <span class="text-secondary">{{ $profile['ACWillingtobeAssignedReason'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Do you use any intoxicating liquor? If so, for what extent?</h6>
                                        <span class="text-secondary">{{ $profile['ACLiquor'] }}</span>
                                        <span class="text-secondary">{{ $profile['ACLiquorExtent'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap mb-5">
                                        <h6 class="mb-0">Do you use any drugs/substances prohibited by the law? If so, for what extent?</h6>
                                        <span class="text-secondary">{{ $profile['ACDrugs'] }}</span>
                                        <span class="text-secondary">{{ $profile['ACDrugsExtent'] }}</span>
                                    </li>
                                    <h5 class="mb-3 pl-3"><i>Health Condition</i></h5>
                                    <h5 class="mb-5 pl-5"><i>Past/Present Medical History</i></h5>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Hospitalization</h6>
                                        <span class="text-secondary">{{ $profile['HCHospitalization'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Operation</h6>
                                        <span class="text-secondary">{{ $profile['HCOperation'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">PTB</h6>
                                        <span class="text-secondary">{{ $profile['HCPTB'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Hepatitis</h6>
                                        <span class="text-secondary">{{ $profile['HCHepatitis'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Allergies</h6>
                                        <span class="text-secondary">{{ $profile['HCAllergies'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Urinary Tract Infection</h6>
                                        <span class="text-secondary">{{ $profile['HCUTI'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Bronchial Asthma</h6>
                                        <span class="text-secondary">{{ $profile['HCBronchialAsthma'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Diabetes</h6>
                                        <span class="text-secondary">{{ $profile['HCDiabetes'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">HPN</h6>
                                        <span class="text-secondary">{{ $profile['HCHPN'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap mb-5">
                                        <h6 class="mb-0">Others</h6>
                                        <span class="text-secondary">{{ $profile['HCOthers'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Alcohol intake per month</h6>
                                        <span class="text-secondary">{{ $profile['SDAlcohol'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Cigarette intake x sticks/day</h6>
                                        <span class="text-secondary">{{ $profile['SDCigarette'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Present Medication</h6>
                                        <span class="text-secondary">{{ $profile['SDPresentMedication'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap mb-5">
                                        <h6 class="mb-0">Pregnancy</h6>
                                        <span class="text-secondary">{{ $profile['SDPregnancy'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Are you physically fit for all types of work?</h6>
                                        <span class="text-secondary">{{ $profile['SDAllTypesofWork'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Are you physically fit for work but with minor ailment/abnormality?</h6>
                                        <span class="text-secondary">{{ $profile['SDMinorAilmentAbnormality'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Are you physically fit for work but with major ailment/abnormality noted?</h6>
                                        <span class="text-secondary">{{ $profile['SDMajorAilmentAbnormality'] }}</span>
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
                            <h5 class="mb-3">Sketch of your Present Address</h5>
                            <h6 class="mb-3">Start from a common landmark nearest to your home.</h6>
                            <img src="{{ asset('sketch/' . $profile['Sketch'] )}}" alt="EmployeeSketch" height="400" width="650">
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
</div>
@endsection