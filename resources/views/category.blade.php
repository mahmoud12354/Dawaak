@extends('layouts.sign')

@section('title',"Dawaak")
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
	body{
		background: linear-gradient(#B8E6E9,#FFFFFF,#FFFFFF) transparent;
	}
</style>
@section('content')
@extends('layouts.header')
	<!---start category--->
	<div class="category">
		<div class="container">
			<h2 class="special-heading">category</h2>
			<div class="field">
				<div class="type">
					<a href='{{route('Stomach')}}'><img src='images/stomach.png' alt='#'></a>
					<h2>Stomach and colon</h2>
				</div>
				<div class="type" >
					<a href='{{route('Cold')}}'><img src='images/common cold.png' alt=''></a>
					<h2>Common Cold</h2>
				</div>
				<div class="type" >
					
					<a href='{{route('Ear_Eye')}}'><img src='images/Eye.png' alt=''></a>
					<h2>Ear , Eye</h2>
				</div>
				<div class="type" >
					<a href='{{route('Painkillers')}}'><img src='images/painkillers.png' alt=''></a>
					<h2>Painkillers</h2>
				</div>
				<div class="type" >
					
					<a href='{{route('Dermatologic')}}'><img src='images/dermatologic.png' alt=''></a>
					<h2>Dermatologic</h2>
				</div>
				
				<div class="type" >
					<a href='{{route('Dones')}}'><img src='images/dones.png' alt=''></a>
					<h2>Dones</h2>
				</div>
				<div class="type">
					<a href='{{route('Diabetes')}}'><img src='images/diabetes.png' alt='#'></a>
					<h2>Diabetes</h2>
				</div>
				<div class="type">
					<a href='{{route('Teeth')}}'><img src='images/teeth.png' alt=''></a>
					<h2>Teeth</h2>
				</div>
				<div class="type">
					<a href='{{route('medicine_supllie')}}'><img src='images/1.png' alt=''></a>
					<h2>medicine supllie</h2>
				</div>
				<div class="type">
					<a href='{{route('vitamins')}}'><img src='images/2.png' alt='#'></a>
					<h2>vitamins</h2>
				</div>
				<div class="type">
					<a href="{{route('all')}}"><img src="images/3.png" alt=""></a>
					<h2>All-Medicine</h2>
				</div>

			</div>
		</div>
	</div>
	<!---End category--->
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