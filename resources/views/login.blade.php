@extends('layouts.sign')

@section('title','login')
<link rel="stylesheet" type="text/css" href="css/login.css">
@section('content')
@extends('layouts.header')
    <div class="conitneer">
        <div class="wrapper">
            <h2>Login</h2>
            <form class="" action="{{route('login.post')}}" method="POST" autocomplete="off">
                @csrf
                <div class="input-box">
                    <input name="email" id="email" type="text" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <input name="password" id="password" type="password" placeholder="Enter your password" required>
                </div>
                <div class="policy">
                    <input type="checkbox">
                    <h3>remember me</h3>
                </div>
                <div class="input-box button">
                    <button name="submit" type="Submit">login</button>
                </div>
                <p></p>
                <div class="input-box button">
                    <button class="google"><i class="fa-brands fa-google-plus-g"></i> Continue With Google</button>
                </div>
                <div class="text">
                    <h3>Create  account? <a href="{{route('register')}}">register now</a></h3>
                </div>
            </form>
        </div>
        <img src="images/land/Group (1).png">
    </div>
@endsection