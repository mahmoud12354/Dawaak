@extends('layouts.sign')

@section('title',"Dawaak")
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<link rel="stylesheet" type="text/css" href="../css/view.css"/>

<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> 
@section('content')
@extends('layouts.header')
<div class="container">
    <div class="product">
        <div class="product-image">
            <img src="/productimage/{{$category->image}}" alt="" draggable="false">
        </div>
        <div class="product-details">
            <h2 class="product-title">{{$category->title}}</h2>
            <p class="product-price">{{$category->price}} EGP</p>
            <h3 class="product-heading" style="font-weight: 600;">Highlights:</h3>
            <ul class="product-highlights">
                <li>{{$category->highlights}}</li>
            </ul>
            <h3 class="product-heading" style="font-weight: 600;">About:</h3>
            <p class="product-about">{{$category->about}}</p>
            <h3 class="product-heading" style="font-weight: 600;">Dosage:</h3>
            <p class="product-dosage">{{$category->dosage}}</p>
            <h3 class="product-heading" style="font-weight: 600;">Specifications:</h3>
            <ul class="product-specifications">
                <li>{{$category->specifications}}</li>
            </ul> 
            <div class='buttons'>
                <a href='{{route('add_to_cartg', $category->id)}}' class='addcard'><i  id="cart"class="fa-solid fa-cart-shopping"></i>&nbsp; Add to cart</a>
            </div> 
        </div>
    </div>
</div>

@endsection