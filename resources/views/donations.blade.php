@extends('layouts.sign')

@section('title',"Donations")

<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/don.css">
<style>
    .body{
        background: linear-gradient(105.23deg, #6be5ed 4.59%, #FFFFFF 52.42%, #FFFFFF 100%);
    }
</style>
@section('content')
@extends('layouts.header')
    <center>
        <form action="{{route('up')}}" method="POST">
            @csrf
            <span><i class="fa-solid fa-handshake-angle"></i>   Help others with your donation</span>
            <div class="inputs">
                <h2>medicine Information</h2></br>

                <h1>Medical Name</h1>
                <input type="text" name="name" required style="border-radius: 5px;">
                
                <h1>Expired Data</h1>
                <input type="date" name="date" required style="border-radius: 5px;">
                
                <h1>Descrpition</h1>
                <textarea type="text" name="description" class="des" required style="border-radius: 10px;" ></textarea>
                
                <h2>Personal Information</h2></br>
            
                <h1>Full name: </h1>
                <input type="text" name="fullname" required style="border-radius: 5px;">
            </br>
        </br>
                <div class="address">
                    <label>City : </label>
                    <input type="text" name="city" class="city" style="border-radius: 5px;">
                    <label>Street Name : </label>
                    <input type="text" name="streetNo" class="street" style="border-radius: 5px;">
                    </br>
                    </br>
                    <label>bluiding No : </label>
                    <input type="text" name="bluidNo" class="bluidNo" style="border-radius: 5px;" >
                    <label>floor : </label>
                    <input type="text" name="floor"class="floor" style="border-radius: 5px;">
                    </br>
                    </br>
                    <label>Apartment : </label>
                    <input type="text" name="apartment"  class="apartment" style="border-radius: 5px;">
                    </br>
                    </br>
                    <label>land mark : </label>
                    <input type="text" name="landmark" class="landmark"style="border-radius: 5px;">
                    
                </div>  
            </div>
            <button name="upload"  class="confirm">confirm Danote the medicine</button>
        </form>
    </center>
    <!---start contact--->
    <section class="contact m-0">
        <div class="containerr">
            <div class="social">
                <div class="logo">
                    <img src="images/admin/dawaaklogo.png" alt="">
                </div>
                <div class="social-icon">
                    <span>Follow Us:</span>
                    <img src="images/admin/facebook.png" alt="">
                    <img src="images/admin/instagram.png" alt="">
                    <img src="images/admin/whatsapp.png" alt="">
                    <img src="images/admin/twiter.png" alt="">
                </div>
            </div>
            <div class="important">
                <span>Important</span>
                <a href="{{route('login')}}">Home</a>
                <a href="{{route('category')}}">Medicine</a>
                <a href="#alarm">Alarm</a>
                <a href="#order">Order</a>
            </div>
            <div class="important">
                <span>Help</span>
                <a href="#">Order information</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
            </div>
            <div class="important">
                <span>Contact us</span>
                <div class="box">
                    <img src="images/admin/ic_round_email.png" alt="">
                    <a href="#">Pharma6677@gmail.com</a>
                </div>
                <div class="box">
                    <img src="images/admin/solar_phone_bold.png" alt="">
                    <a href="#">01223456789</a>
                </div>
                <div class="box">
                    <img src="images/admin/carbon_location_filled.png" alt="">
                    <a href="#">Egypt - egypt</a>
                </div>
            </div>
        </div>
    </section>
    <!---end contact--->
    <!---start footer--->
    <div class="footer">
        @ 2023 <span>Dawaak</span> All Right Reserved 
    </div>
    <!--End footer-->

@endsection