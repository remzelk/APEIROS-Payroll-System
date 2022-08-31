@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/humanresources.css" >
@endsection
@section('title', 'Profile')
@section('content')
<nav id="mySidenav" class="sidenav">
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/958687472227868682/275714560_317115067181930_3442500599053539010_n.png?width=1025&height=180" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="/HumanResources">Home</a></li>
    <li class="nav-item"><a href="/HumanResources/Profile" class="active">Profile</a></li>
    <li class="nav-item"><a href="/HumanResources/EmployeeList">Employee List</a></li>
    <li class="nav-item"><a href="/HumanResources/Detachments">Detachments</a></li>
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
<button class="bt" onclick="toggleNav()">&#9776; <a class = "navbar-brand my-2 my-lg-0">Employee Portal</a></button> 
<a class="navbar-brand form-inline my-2 my-lg-0 right">Apeiros Security Solutions & Investigation Agency, Inc.</a>
</nav>

<div id="main">
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Employee" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>Dela Cruz, Juan M.</h4>
                                    <h4>(Juan)</h4>
                                    <p class="text-secondary mb-1">02/23/2020</p>
                                    <p class="text-secondary mb-1"><b>Position:</b> Security Personnel</p><br>
                                    <button class="btn btn-info">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Birthday</h6>
                            <span class="text-secondary">01/01/1995</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Gender</h6>
                            <span class="text-secondary">Male</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Current Address</h6>
                            <span class="text-secondary">Ayala, Makati City</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Phone</h6>
                            <span class="text-secondary">9165756675</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Email</h6>
                            <span class="text-secondary">juandelacruz@sample.com</span>
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
                            <h6 class="mb-0">Age</h6>
                            <span class="text-secondary">27</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Height</h6>
                            <span class="text-secondary">5'11"</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Weight</h6>
                            <span class="text-secondary">200 kg</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Marital Status</h6>
                            <span class="text-secondary">Single</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Religion</h6>
                            <span class="text-secondary">Roman Catholic</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Color of Eyes</h6>
                            <span class="text-secondary">Blue</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Complexion</h6>
                            <span class="text-secondary">Light</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Other distinguishing features:</h6>
                            <span class="text-secondary">Mole on the upper left of nape</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Permanent Address</h6>
                            <span class="text-secondary">Guadalupe, Makati City</span>
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
                                        <span class="text-secondary">Alberta M. Dela Cruz</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Relationship</h6>
                                        <span class="text-secondary">Mother</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Address</h6>                                            
                                        <span class="text-secondary">Guadalupe, Makati</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">                                        
                                        <h6 class="mb-0">Contact Number(s):</h6>
                                        <span class="text-secondary">92455315763</span>
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
                                        <span class="text-secondary">ABC1234</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Date Issued</h6>
                                        <span class="text-secondary">05/06/2020</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Date of Expiration</h6>
                                        <span class="text-secondary">05/06/25</span>
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
                                        <span class="text-secondary">1234567890</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Pag-Ibig</h6>
                                        <span class="text-secondary">0987654321</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Philhealth</h6>
                                        <span class="text-secondary">346457658</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">TIN</h6>
                                        <span class="text-secondary">23423664597</span>
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
                                        <span class="text-secondary">Guadalupe Catholic School</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Date Graduated</h6>
                                        <span class="text-secondary">05/18/2006</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Location</h6>
                                        <span class="text-secondary">Guadalupe, Makati City</span>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h5 class="mb-0"><i>High School</i></h5>                                    
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h6 class="mb-0">Name of School</h6>
                                        <span class="text-secondary">Guadalupe Catholic School</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Date Graduated</h6>
                                        <span class="text-secondary">05/09/2012</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Location</h6>
                                        <span class="text-secondary">Guadalupe, Makati City</span>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h5 class="mb-0"><i>College</i></h5>                                    
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-0">
                                        <h6 class="mb-0">Name of School</h6>
                                        <span class="text-secondary">University of Makati</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Date Graduated</h6>
                                        <span class="text-secondary">06/06/2016</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Location</h6>
                                        <span class="text-secondary">East Rembo, Makati City</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Course</h6>
                                        <span class="text-secondary">Criminology</span>
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
                                        <td colspan="3" class="text-secondary border-0">07/08/2022</td>
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
                                        <td>03/08/2017</td>
                                        <td>05/23/2020</td>
                                        <td>Makati City Hall | Olympia, Makati City</td>
                                        <td>88701000</td>
                                        <td>MAPSA</td>
                                        <td>Wanted to branch out</td>
                                    </tr>
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
                                        <td class="text-secondary">Marcus E. Dela Cruz</td>
                                        <td class="text-secondary">54</td>
                                        <td class="text-secondary">Guadalupe, Makati City</td>
                                        <td class="text-secondary">Woodworker</td>
                                    </tr>
                                    <tr>
                                        <th>Mother's Maiden Name</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Occupation</th>
                                    </tr>
                                    <tr>
                                        <td class="text-secondary">Alberta C. Mondragon</td>
                                        <td class="text-secondary">50</td>
                                        <td class="text-secondary">Guadalupe, Makati City</td>
                                        <td class="text-secondary">N/A</td>
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
                                        <td class="text-secondary">Martha D.C. Rodriguez</td>
                                        <td class="text-secondary">28</td>
                                        <td class="text-secondary">Guadalupe, Makati City</td>
                                        <td class="text-secondary">Call Center Agent</td>
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
                                        <td class="text-secondary"></td>
                                        <td class="text-secondary"></td>
                                        <td class="text-secondary"></td>
                                        <td class="text-secondary"></td>
                                    </tr>
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
                                        <td colspan="2" class="text-secondary border-0">09/30/1990</td>
                                    </tr>
                                    <tr>
                                        <th>Started</th>
                                        <th>Ended</th>
                                        <th>Address</th>
                                        <th>Types of Residency</th>
                                    </tr>
                                    <tr>
                                        <td class="text-secondary">09/30/1990</td>
                                        <td class="text-secondary"></td>
                                        <td class="text-secondary">Guadalupe, Makati City</td>
                                        <td class="text-secondary">Townhouse</td>
                                    </tr>
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
                                        <td colspan="2" class="text-secondary border-0"></td>
                                    </tr>
                                    <tr>
                                        <th>Started</th>
                                        <th>Ended</th>
                                        <th>Name of Organization</th>
                                        <th>Position</th>
                                        <th>Location</th>
                                    </tr>
                                    <tr>
                                        <td class="text-secondary"></td>
                                        <td class="text-secondary"></td>
                                        <td class="text-secondary"></td>
                                        <td class="text-secondary"></td>
                                        <td class="text-secondary"></td>
                                    </tr>
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
                                        <td class="text-secondary"></td>
                                        <td class="text-secondary"></td>
                                        <td class="text-secondary"></td>
                                        <td class="text-secondary"></td>
                                    </tr>
                                </table>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>

</div>
@endsection