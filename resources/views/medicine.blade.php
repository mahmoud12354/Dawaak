@extends('layouts.sign')

@section('title',"Dawaak")
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/land.css">
<style>
    body{
        
	background: linear-gradient(105.23deg, #B8E6E9 4.59%, #FFFFFF 52.42%, #FFFFFF 100%);
    }
</style>
@section('content')
@extends('layouts.header')
    <div class="search">
        <form class="form-inline" action="{{url('search')}}" method="get">
            @csrf
            <input class="form-control" type="search" name="search" placeholder="">
            <input type="submit" value="Search" class="submit-search">
        </form>
    </div>
    <div class="slider">
        <div class="list">
            <div class="item">
                <img src="images/land/MicrosoftTeams-image11.png" alt="">
            </div>
            <div class="item">
                <img src="images/land/MicrosoftTeams-image21.png" alt="">
            </div>
            <div class="item">
                <img src="images/land/MicrosoftTeams-image1.png" alt="">
            </div>
        </div>
        <div class="buttons">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <script src="js/land.js"></script>
	<!--- start all medicine --->
    
    <div class='protfolio'>
        <div class='container'>
            <div class="protfolio-contant">

                @foreach($medicine as $category)

                <div class="card">
                    <a class="room" href="{{route('viewMedicine',$category->id)}}">
                        <img src="/productimage/{{$category->image}}" draggable="false" alt=''>
                        <div class='info'>
                            <h3>{{$category->title}}</h3>
                            </br>
                            <span>{{$category->price}}EGP</span>
                        </div> 
                    </a>
                    <div class='buttons'>
                        <a href='{{route('add_to_cartg', $category->id)}}' class='addcard'><i class="fa-solid fa-cart-shopping"></i>&nbsp; Add to cart</a>
                    </div> 
                </div>
                
                @endforeach
            </div>
        </div>
    </div>		
    <!---End all medicine--->
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