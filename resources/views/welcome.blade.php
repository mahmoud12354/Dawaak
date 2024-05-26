@extends('layouts.sign')

@section('title',"Dawaak")
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/land.css"/>
<script src="../js/card.js" defer></script> 
<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> 
@section('content')
@extends('layouts.header')
    <div class="search">
        <form class="form-inline" action="{{url('search')}}" method="get">
            @csrf
            <input class="form-control" type="search" name="search" value="">
            <input type="submit" value="Search" class="submit-search">
        </form>
    </div> 
{{-- start landing --}}
    <div class="slider">
        <div class="list">
            <div class="item">
                <img src="images/land/drugs1.png" alt="">
            </div>
            <div class="item">
                <img src="images/land/drugs2.png" alt="">
            </div>
            <div class="item">
                <img src="images/land/drugs4.png" alt="">
            </div>
            <div class="item">
                <img src="images/land/drugs5.png" alt="">
            </div>
            <div class="item">
                <img src="images/land/drugs6.png" alt="">
            </div>
            <div class="item">
                <img  src="images/land/donation.png" alt="">
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
            <li></li>
            <li></li>
        </ul>
    </div>
    <script src="js/land.js"></script>
    {{-- End landing  --}}
    <!---start features ---->
    <div class="features">
        <div class="container">
            <div class="feat">
                <i class="fa-solid fa-wand-magic-sparkles fa-3x"></i>
                <h3>Tell Us Your medincine</h3>
                <p>If you have any specific medical inquiries or need information on a particular topic, feel free to ask!</p>
            </div>
            
            <div class="feat">
                <i class="far fa-gem fa-3x"></i>
                <h3>We Will DO All The Work</h3>
                <p>If there's anything specific you'd like help with or if you have any questions, feel free to let me know, and I'll do my best to assist you!</p>
            </div>
            
            <div class="feat">
                <i class="fa-solid fa-earth-asia fa-3x"></i>
                <h3>Your Product is Worldwide</h3>
                <p>. However, for specific medical concerns or treatment, it's always best to consult with a qualified healthcare professional or medical provider</p>
            </div>
            
        </div>
    </div>
    <!---End features ---->
    <!---Start categories--->
    <div class="category">
        <div class="container">
            <div class="head">
                <h1>Categories</h1>
                <a href="{{route('category')}}">view all</a>
            </div>
            <div class="field">
                <div class="type" >
                    <a href="{{route('medicine_supllie')}}"><img src="images/1.png" alt=""></a>
                    <h2>Medical Supplies</h2>
                </div>
                <div class="type">
                    <a href="{{route('vitamins')}}"><img src="images/2.png" alt=""></a>
                    <h2>vitamins</h2>
                </div>
                <div class="type">
                    <a href="{{route('Diabetes')}}"><img src="images/diabetes.png" alt=""></a>
                    <h2>Diabetes</h2>
                </div>
                <div class="type">
                    <a href="{{route('all')}}"><img src="images/3.png" alt=""></a>
                    <h2>all Medicine</h2>
                </div>
                
            </div>
        </div>
    </div>
	<!---End Gategories ---->
    <!--- start bestseller --->
    
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    
    @endif
    <div class="wrapper">
        <div class="head">
            <p>Best seller</p> 
            
            <a class="view">view all</a>
        </div>
        <ul class="carousel">
            
            @foreach($product as $bestseller)
                
            <li class="card">
                <a class="room" href="{{route('viewMedicine',$bestseller->id)}}">    
                    <div class="img"><img src="/productimage/{{$bestseller->image}}" alt="" draggable="false"> </div> 
                    <h2 >{{$bestseller->title}} </h2> 
                    <span>{{$bestseller->price}} EGP</span>
                </a>        
                <br>
                <div class='buttons'>
                    <a href='{{route('add_to_cartg', $bestseller->id)}}' class='addcard'><i class="fa-solid fa-cart-shopping"></i>&nbsp; Add to cart</a>
                </div> 
            </li>
            @endforeach
        </ul> 
   
    </div>
	<!---End bestseller--->

    <!---Start new arrival--->
    <div class="wrapper" id="newarrival">
        <div class="head">
            <p>Home Essential Products</p>  
            <a class="view">view all</a>
        </div>
        <ul class="carousel">
            
            @foreach($product1 as $newarrival)
                
            <li class="card"> 
                <a class="room" href="{{route('viewMedicine', $newarrival->id)}}">
                    <div class="img"><img src="/productimage/{{$newarrival->image}}" alt="" draggable="false"> </div> 
                    <h2 >{{$newarrival->title}} </h2> 
                    <span>{{$newarrival->price}} EGP</span>
                </a>    
                <br>
                <div class='buttons'>
                    <a href='{{route('add_to_cartg', $newarrival->id)}}' class='addcard'><i class="fa-solid fa-cart-shopping"></i>&nbsp; Add to cart</a>
                </div> 
            </li>
            @endforeach
        </ul> 
    </div>		
    <!---End new arrival--->
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
