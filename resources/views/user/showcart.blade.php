<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <title>E-farm</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">


    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="css/custom.css">



</head>

<body>


    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="images/logo.png" class="logo"
                            alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('about')}}">About Us</a></li>
                        <li class="nav-item">
                            <a href="{{url('farm')}}" class="nav-link ">Our Farms</a>
                            {{-- <ul class="dropdown-menu">
                                <li><a href="shop.html">Sidebar Shop</a></li>
                                <li><a href="shop-detail.html">Shop Detail</a></li>
                                
                            </ul> --}}
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{url('gallery')}}">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('contact')}}">Contact Us</a></li>
                        <li class="nav-item">

                            @if (Route::has('login'))

                                @auth


                            <li class="nav-item"><a class="nav-link" href="{{ url('showcart') }}">
                                    <i class="fas fa-shopping-cart"></i>
                                    Cart[{{ $count }}]</a></li>


                            <x-app-layout>

                            </x-app-layout>



                        @else
                            <li><a class="nav-link" href="{{ route('login') }}"
                                    class="text-sm text-gray-700 underline">Log in</a>
                            </li>

                            @if (Route::has('register'))
                                <li><a class="nav-link" href="{{ route('register') }}"
                                        class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                            @endif
                        @endauth
                </div>
                @endif
                </li>

                </ul>
            </div>

            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb"
                                    alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb"
                                    alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb"
                                    alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>

        </nav>

        @if (session()->has('message'))

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">x</button>


                {{ session()->get('message') }}

            </div>



        @endif

    </header>



    <div style="padding: 100px;" align="center">

        <table>

            <tr style="background-color: gray;">

                <td style="padding: 10px; font-size:20px;color:white">Product Name</td>
                <td style="padding: 10px; font-size:20px;color:white">Quantity</td>
                <td style="padding: 10px; font-size:20px;color:white">Price</td>
                <td style="padding: 10px; font-size:20px;color:white">Action</td>
            </tr>

            <form action="{{url('order')}}" method="POST">
                @csrf

                @foreach ($cart as $carts)

                    <tr style="background-color: black">

                        <td style="padding: 10px;color:white;">
                            <input type="text" name="product_name[]" value="{{ $carts->product_title }}" hidden="">

                            {{ $carts->product_title }}
                        </td>

                        <td style="padding: 10px;color:white;">
                            <input type="text" name="quantity[]" value="{{ $carts->quantity }}" hidden="" >

                            {{ $carts->quantity }}</td>

                        <td style="padding: 10px;color:white;">
                            <input type="text" name="price[]" 
                            value="{{ $carts->price }}" hidden="">

                            {{ $carts->price }}</td>

                        <td style="padding: 10px; color:white;">

                            <a class="btn btn-danger" href="{{ url('delete', $carts->id) }}">Delete</a>



                        </td>
                    </tr>

                @endforeach

        </table>

        <button class="btn btn-success">Confirm Order</button>
        </form>

    </div>





    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
