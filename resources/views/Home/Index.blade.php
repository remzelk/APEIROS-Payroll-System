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
<header class="c">
  <div class="container px-5">
    <div class="row gx-5 align-items-center justify-content-center">
      <div class="col-lg-8 col-xl-7 col-xxl-6">
        <div class="my-5 text-center text-xl-start">
            <h1 class="display-5 fw-bolder animate-charcter mb-2">Pinnacle of reliability... &emsp;&emsp;</h1>
              <p class="lead fw-normal text-white-50 mb-4 left">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/login">Login</a>
                                    <a class="btn btn-outline-light btn-lg px-4" href="/Contact">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"></div>
                    </div>
                </div>
            </header>

@endsection