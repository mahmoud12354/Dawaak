@extends('layouts.sign')

@section('title','register')
<link rel="stylesheet" type="text/css" href="css/register.css">

@section('content')
@extends('layouts.header')

    <div class="conitneer">
        <div class="wrapper">
            <h2>Registration</h2>
            <form action="{{route('register.post')}}" id="register" method="POST" autocomplete="off">
                @csrf
                <div class="input-box">
                    <input name="username" type="text" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <input name="email" type="text" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <input name="phone" type="text" placeholder="Enter your phone" required>
                </div>
                <div class="input-box">
                    <input name="password" type="password" placeholder="Create password" required>
                </div>
                <div class="policy">
                    <input type="checkbox" required>
                    <h3>I accept all terms & condition</h3>
                </div>
                <div class="input-box button">
                    <button name="submit" type="Submit">register</button>
                </div>
                <div class="text">
                    <h3>Already have an account? <a href="{{route('login')}}">Login now</a></h3>
                </div>
            </form>
        </div>
        <img src="images/land/Group (1).png">
        
    </div>
@endsection