<!---start header--->
	
<div class="header">
		
    <div class="container">
        
        <a href="{{route('login')}}"><img class="logo" src="../images/logo.png" alt=""></a>
        <div class="link-center">
            <a href="{{route('login')}}">Home</a>
            <a href="{{route('category')}}">medicine</a>
            <a href="{{route('cart')}}" class="cart"aria-hidden="true"><i class="fa-solid fa-cart-shopping"></i> card<span class="badge badge-pill badge-danger">{{count((array) session('cart')) }}</span></a>
            <a href="#">Order</a>
        </div>
        
        <div class="links">
            <span class="icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
            <ul>
                <li> <a href='#' class='name'>@auth{{auth()->user()->username}}@endauth&nbsp;&nbsp;&nbsp;<i class="fa-regular fa-user"></i></a></li>
                <li> <a href='{{route('profile')}}' class='profile'> personal profile&nbsp;&nbsp;&nbsp;<i class="fa-regular fa-user"></i></a></li>
                <li> <a href='{{route('dashboard')}}' class='control'>control-panel&nbsp;&nbsp;&nbsp;<i class='fa-solid fa-screwdriver-wrench'></i></a></li>
                <li> <a href="{{route('chatify')}}" class="chat">Dawaak Chat&nbsp;&nbsp;&nbsp;<i class="fa-brands fa-rocketchat"></i></a></li>
                <li> <a href="{{route('chatbot')}}" class="chat">chatBot&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-robot"></i></a></li>
                <li> <a href='{{route('donation')}}'>Donations&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-handshake-angle"></i></a></li>
                <li> <a href='{{route('rosheta')}}'>Order with Rosheta&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-clipboard-list " ></i></a></li>
                <li> <a href="{{route('logout')}}" class="logout">logout&nbsp;&nbsp; &nbsp; <i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </div>
    
    </div>
    
</div>
<!---End header--->