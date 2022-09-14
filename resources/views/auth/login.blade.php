@extends('layouts.mainlayout')
@section('head')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/login.css" >
@endsection
@section('title', 'Apeiros Login')
@section('content')
<div class="row">
    <div class="col-sm-4 abc">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img src="https://media.discordapp.net/attachments/958687400203255808/958687472227868682/275714560_317115067181930_3442500599053539010_n.png?width=1025&height=180" alt="logo" width="300" height="60">
            <div>
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control  mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="block mt-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                </div>
            </div>
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                @endif
            </div>
        </form>
    </div>
    <div class="col-sm-4 xyz">
    </div>
</div>
@endsection
