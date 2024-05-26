<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="../css/Dashboard.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="./Image2.png" type="image/x-icon">
    <!-- Internal CSS -->
    
</head>
<body>
    <div class="mane">
        <ul class="profail">
            <li>
                <div class="img">
                    <img src="../images/logo.png" alt="Not found">
                    <a href="{{route('login')}}"><h2>Dawaak</h2></a>
                </div>

            </li>
            <div class="r">
            <li class="">
                <a href="{{route('dashboard')}}">
                    <i class="fas fa-home"></i>
                    <p>Contorl Panel</p>
                </a>
            </li>
            <li>
                <a href="{{route('product')}}" class="D">
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
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <p>Setting</p>
                </a>
            </li>
            <li class="out">
                <a href="./LogIn.Html">
                    <i class="fas fa-sign-out"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </div>
        </ul>
    </div>

    <div class="content">
        <div class="dashboard-title">
            <i class="fas fa-box"></i> Best Seller
        </div>
        <div class="product-form">
            <form action="{{route('uploadbestseller')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <label for="title">Product Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter product title" required>

            <label for="price">Product Price:</label>
            <input type="text" id="price" name="price" placeholder="Enter product price" required>

            <label for="image">Product Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
                <!-- Inside the <form> tag in your dashboard.blade.php -->
               
            <label for="highlights">Highlights:</label>
         
            <textarea type="text" id="highlights" name="highlights" placeholder="Enter product highlights"></textarea>

            <label for="about">About:</label>
            <textarea id="about" name="about" placeholder="Enter about the product" rows="4"></textarea>

            <label for="dosage">Dosage:</label>
            <textarea type="text" id="dosage" name="dosage" placeholder="Enter product dosage"></textarea>

            <label for="indications">Indications:</label>
            <textarea id="indications" name="indications" placeholder="Enter product indications" rows="4"></textarea>

            <label for="specifications">Specifications:</label>
            <textarea id="specifications" name="specifications" placeholder="Enter product specifications" rows="4"></textarea>


                <button type="submit" name="upload">Upload Product</button>
            </form>
            <a href="{{route('login')}}">Show All Products</a>
        </div>
    </div>
</body>
</html>
