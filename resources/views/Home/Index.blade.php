@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/Home.css" >
@endsection
@section('title', 'Home')
@section('content')
<div class="container c">
    <div class="col-md-12 text-center">
      <h3 class="animate-charcter">APEIROS</h3>
    </div>
    <div class="col text-center c">
        <div class="btn-group">
        <a href="/Admin/Login" class="btn btn-danger btn-lg">Admin</a>
        <a href="/HumanResources/Login" class="btn btn-warning btn-lg" style="color:white">Human Resources</a>
        <a href="/Accounting/Login" class="btn btn-success btn-lg">Accounting</a>
        <a href="/Employee/Login" class="btn btn-primary btn-lg">Employee</a>
        </div>
  </div>
</div>

@endsection