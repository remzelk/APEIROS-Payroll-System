@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css" >
@endsection
@section('title', 'Detachments & Wages')
@section('content')
<nav id="mySidenav" class="sidenav">
  <div class="d-flex justify-content-center align-items-center px-3 py-4">
  <img src="https://media.discordapp.net/attachments/958687400203255808/958687472227868682/275714560_317115067181930_3442500599053539010_n.png?width=1025&height=180" alt="logo" width="250" height="40">
  </div>
  <ul class="nav flex-column" id="nav_accordion">
    <li class="nav-item"><a href="/Admin">Home</a></li>
    <li class="nav-item"><a href="/Admin/Profile">Profile</a></li>
    <li class="nav-item"><a href="/Admin/EmployeeList">Employee List</a></li>
    <li class="nav-item"><a href="/Admin/EmployeePayroll">Employee Payroll</a></li>
    <li class="nav-item"><a href="/Admin/DetachmentsWages" class="active">Detachments & Wages</a></li>
    <li class="nav-item"><a href="/Admin/AccountSettings">Account Settings</a></li>
    <li class="nav-item"><a href="/Login" onclick="return confirm('Are you sure you want to logout?')">Logout</a></li>
  </ul>
</nav>
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
<a class="navbar-brand form-inline my-2 my-lg-0 right">Welcome, User!</a>
</nav>

<div  id="main">
  <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
			<h1>List of Detachments with Wages</h1><br>
      <div class="form-inline">
      <a href="/Admin/DetachmentsWages/create" class="mb-4">+Add Detachment</a>&emsp;&emsp;
      <form action="" method="get">
        <div class="my-2 my-lg-0 right"> 
            <input class="form-control mb-4 search" type="search"  name="search" id="search" value="{{$search}}" placeholder="Search">
            <button class="btn btn-outline-success mb-4" type="submit">Search</button>
        </div>
      </form>
    </div>
			<div class="scroll">
			<table class="table table-striped">
				<thead>
					<tr>
						<th class="align-middle">Detachment</th>
						<th class="align-middle">Location</th>
            <th class="align-middle">Region</th>
            <th class="align-middle">Wage</th>
            <th></th>
            <th></th>
					</tr>
				</thead>
			<div class="scroll">
				@forelse($detachment as $key => $detachment)
				<tr>
					<td>
						{{ $detachment['Detachment'] }}
					</td>
					<td>
						{{ $detachment['Location'] }}
					</td>
          <td>
						{{ $detachment['Region'] }}
					</td>
          <td>
						{{ $detachment['Wage'] }}
					</td>
          <td class="align-middle">
            <a href="/Admin/DetachmentsWages/{{ $detachment['Id'] }}/edit" class="btn btn-primary" onclick="return confirm('Edit detachment: <?php echo $detachment['Detachment'] ?>?')"><i class="fa fa-pencil" aria-hidden="true"></i></a>
          </td>
          <form action="/Admin/DetachmentsWages/{{ $detachment['Id'] }}" method="POST">
          @csrf
          @method('Delete')
          <td class="align-middle">
            <button class="btn btn-danger" onclick="return confirm('Delete detachment?: <?php echo $detachment['Detachment'] ?>')"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </td>
          </form>
        @empty
    		  <td colspan="5">
            <h1>No Data!</h1>
          </td>
			  @endforelse
				</tr>
			</div>
			</table>
			</div>
        </div>
    </div>
  </div>
<div>
@endsection