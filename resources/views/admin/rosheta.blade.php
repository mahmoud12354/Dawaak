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
    <meta http-equiv="icon" content="./Image 2.png">
    <link rel="shortcut icon" href="./Image 2.png" type="image/x-icon">
    <script>
        let docTitle = document.title;

        window.addEventListener("blur", () => {
            document.title = "Come Back  🥺";
        });

        window.addEventListener("focus", () => {
            document.title = docTitle;
        });
        </script>
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
                <a href="{{route('adminrosheta')}}"class="D">
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
        <div class="das">
            <p>Donors <i class="fa-brands fa-hire-a-helper"></i></p>
            <i class="fas fa-chart-bar "></i>
        </div>
        <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        
                        <th scope="col">description</th>
                        <th scope="col">city</th>
                        <th scope="col">Street_Name</th>
                        <th scope="col">bluiding_No</th>
                        <th scope="col">floor</th>
                        <th scope="col">apartment</th>
                        <th scope="col">land_mark</th>
                        <th scope="col">images</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roshetas as $rosheta)
                    <tr>
                        <td>{{$rosheta->full_name}}</td>
                        <td>{{$rosheta->email}}</td>
                        <td>{{$rosheta->phone}}</td>

                        <td>{{$rosheta->description}}</td>
                        <td>{{$rosheta->city}}</td>
                        <td>{{$rosheta->Street_Name}}</td>
                        <td>{{$rosheta->bluiding_No}}</td>
                        <td>{{$rosheta->floor}}</td>
                        <td>{{$rosheta->apartment}}</td>
                        <td>{{$rosheta->land_mark}}</td>
                        <td><img src="/roshetaimage/{{$rosheta->image}}" draggable="false" alt='' style="width:100px; height:100px;"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>


</body>
</html>