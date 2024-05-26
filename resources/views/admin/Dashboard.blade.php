<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/Dashboard.css">
    <meta http-equiv="refresh" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="icon" content="./Image2.png">
    <link rel="shortcut icon" href="./Image2.png" type="image/x-icon">
    
</head>
<body>
    <div class="mane">
        <ul class="profail">
            <li>
                <div class="img">
                    <img src="../images/logo.png" alt="Not found">
                    <a href="{{route('login')}}" ><h2>Dawaak</h2></a>
                </div>

            </li>
            <div class="r">
            <li class="">
                <a href="{{route('dashboard')}}"class="D">
                    <i class="fas fa-home"></i>
                    <p>Contorl Panel</p>
                </a>
            </li>
            <li>
                <a href="{{route('product')}}" >
                    <i class="fa-brands fa-product-hunt"></i>
                    <p>Best Seller products</p>
                </a>
            </li>
            <li>
                <a href="{{route('product1')}}">
                    <i class="fa-brands fa-product-hunt"></i>
                    <p class="p">New arrival Products</p>
                </a>
            </li>
            <li>
                <a href="{{route('product2')}}">
                    <i class="fa-solid fa-list"></i>
                    <p class="p">Products category</p>
                </a>
            </li>
            <li>
                <a href="{{route('Donors')}}" >
                    <i class="fa-brands fa-hire-a-helper"></i>
                    <p>Donors</p>
                </a>
            </li>
            <li>
                <a href="{{route('adminrosheta')}}">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <p>Order with rosheta</p>
                </a>
            </li>
            <li>
                <a href="{{route('allmedincine')}}" >
                    <i class="fa-solid fa-capsules"></i>
                    <p>Show All Medicine</p>
                </a>
            </li>
            <li>
                <a href="{{route('Users')}}" >
                    <i class="fa-solid fa-user"></i>
                    <p>Users</p>
                </a>
            </li>
            <li>
                <a href="{{route('admincart')}}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <p>Carts</p>
                </a>
            </li>
            <li class="out">
                <a href="{{route('logout')}}">
                    <i class="fas fa-sign-out"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </div>
        </ul>
    </div>
</body>
</html>
