@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/Main.css" >
@endsection
@section('title', 'Create')
@section('content')
@include('partials.navbar')
<div  id="main">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add Employee</h3>
            <form>

            <div class="row">
                <div class="col-md-6">
                    <label>First Name</label>
                    <input type="text" id="FirstName" class="form-control mb-4" placeholder="Enter First Name"> 
                </div>
                <div class="col-md-6">
                    <label>Last Name</label>
                    <input type="text" id="LastName" class="form-control mb-4" placeholder="Enter Last Name"> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label>Birthday</label>
                    <input type="date" id="Birthday" class="form-control mb-4"> 
                </div>
                <div class="col-md-6 mb-4">
                    <label>Gender</label><br>
                    <select class="form-control mb-4" name="Gender" id="Gender">
                        <option selected disabled>Option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-4">
                    <label>Post</label><br>
                    <select class="form-control mb-4" name="Gender" id="Gender">
                        <option selected disabled>Option</option>
                        <option value="Arlechino">Arlechino</option>
                        <option value="Arzo Hotel">Arzo Hotel</option>
                        <option value="Autohub & JIT">Autohub & JIT</option>
                        <option value="Bixby Knolls">Bixby Knolls</option>
                        <option value="Bizzu">Bizzu</option>
                        <option value="Care One">Care One</option>
                        <option value="Coastline Truck Center">Coastline Truck Center</option>
                        <option value="Dr. Ching">Dr. Ching</option>
                        <option value="Felina">Felina</option>
                        <option value="FFGMI - Lipa">FFGMI - Lipa</option>
                        <option value="Filipino Mall">Filipino Mall</option>
                        <option value="Five West">Five West</option>
                        <option value="Good Heart  - Lucena">Good Heart  - Lucena</option>
                        <option value="H-CHEM">H-CHEM</option>
                        <option value="KDDI">KDDI</option>
                        <option value="KDDI - CYBER BETA">KDDI - CYBER BETA</option>
                        <option value="KDDI - BATANGAS">KDDI - BATANGAS</option>
                        <option value="Libra Agro">Libra Agro</option>
                        <option value="Mega East(Bataan)">Mega East(Bataan)</option>
                        <option value="Mega East(Tarlac)">Mega East(Tarlac)</option>
                        <option value="MultiSys">MultiSys</option>
                        <option value="Norvic">Norvic</option>
                        <option value="Ohana">Ohana</option>
                        <option value="Ohana - Frozen">Ohana - Frozen</option>
                        <option value="Palm Coast">Palm Coast</option>
                        <option value="Penhurst">Penhurst</option>
                        <option value="Pest Science">Pest Science</option>
                        <option value="Rayner Lorenzo">Rayner Lorenzo</option>
                        <option value="RCW & Golvious">RCW & Golvious</option>
                        <option value="San Antonio">San Antonio</option>
                        <option value="Therosa">Therosa</option>
                    </select>
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
@endsection