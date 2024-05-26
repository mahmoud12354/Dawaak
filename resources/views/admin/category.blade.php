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
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.0/classic/ckeditor.js"></script>
    <!-- Internal CSS -->
    <style>
        /* Add your custom styles here */
        body {
            
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .sidebar {
            background-color: #34495e;
            color: #fff;
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        .sidebar h2 {
            margin: 20px 0;
            text-align: center;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .sidebar li {
            padding: 15px 20px;
            border-bottom: 1px solid #2c3e50;
            transition: background-color 0.3s ease;
        }
        .sidebar li a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar li:hover {
            background-color: #2c3e50;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .dashboard-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #34495e;
        }
        .product-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product-form input,
        .product-form textarea,
        .product-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .product-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .product-form button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .product-form button:hover {
            background-color: #2980b9;
        }
        .content a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .content a:hover {
            color: #2980b9;
        }
    </style>
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
                <a href="{{route('product2')}}" class="D">
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
            <i class="fas fa-box"></i> Products
        </div>
        <div class="product-form">
            <form action="{{route('uploadcategory')}}" method="POST" enctype="multipart/form-data">
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

                <label for="type">Product Category:</label>
                <select id="type" name="type" required>
                <option value="Stomach">Stomach & colon</option>    
                <option value="Cold">Common Cold</option>
                <option value="Ear_Eye">Ear & Eye</option>
                <option value="Painkillers">Painkillers</option>
                <option value="Dermatologic">Dermatologic</option>
                <option value="Bones">Bones</option>
                <option value="Diabetes">Diabetes</option>
                <option value="Teeth">Teeth</option>
                <option value="medicine_supllie">medicine supllie</option>
                <option value="vitamins">vitamins</option>
                <option value="Teeth">Teeth</option>
                <option value="Heart">Heart</option>
                <option value="Baby_Care">Baby Care</option>
                <option value="Skin_Care">Skin Care</option>
                <option value="Daily_Care">Daily Care</option>
                    <!-- Add more options -->
                </select>

                <button type="submit" name="upload">Upload Product</button>
            </form>
            <br>
            <a href="{{route('login')}}">Show All Products</a>
        </div>
    </div>
</body>
</html>
