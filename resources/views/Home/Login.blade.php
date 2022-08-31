@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/main.css" >
@endsection
@section('title', 'Apeiros Login')
@section('content')
<div class="row">
    <div class="col-sm-4 abc">
        <!-- Default form login -->
        <form action="#!">
        <img src="https://media.discordapp.net/attachments/958687400203255808/958687472227868682/275714560_317115067181930_3442500599053539010_n.png?width=1025&height=180" alt="logo" width="300" height="60">
            <p>Login to continue</p>
			<input type="text" id="Email Address" class="form-control mb-4" placeholder="Enter Email Address"> 
			<input type="password" id="Password" class="form-control mb-4" placeholder="Enter Password">
            <div class="d-flex justify-content-left">
                <div>
                    <!-- Remember me -->
                    <div class="custom-control custom-checkbox text-left"> <input type="checkbox" class="custom-control-input"> <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label> </div>
                </div>
            </div> <!-- Sign in button --> <button class="btn btn-info btn-block " type="submit" style="background-image: url(https://i.imgur.com/6YuRxJA.png)">LOGIN</button> <button class="btn btn-info btn-block my" type="submit">Forgot Password?</button>
        </form>
    </div>
    <div class="col-sm-4 xyz">
    </div>
</div>
@endsection