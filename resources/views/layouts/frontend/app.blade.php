<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- title of site -->
    <title>Justerotica | @yield('title')</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="{{asset('frontend/logo/favicon.png')}}"/>

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">

    <!--linear icon css-->
    <link rel="stylesheet" href="{{asset('frontend/css/linearicons.css')}}">

    <!--animate.css-->
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">

    <!-- bootsnav -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootsnav.css')}}" >

    <!--style.blade.php-->
    <link rel="stylesheet" href="{{asset('frontend/css/style.cs')}}s">

    <!--responsive.css-->
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">


</head>

<body>


<!--HEADER SECTION START -->
<header id="home" class="welcome-hero">

@include('layouts.frontend.header')


@include('layouts.frontend.nav')
</header>
<!-- HEADER SECTION ENDS -->

@yield('content');

<!-- SECTION FOR WEEKLY FEATURED START -->

<!-- FOOTER SECCTION START -->
<footer id="footer"  class="footer">
    <div class="container">
        <div class="hm-footer-copyright text-center">
            <div class="footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
            <p>
                &copy; <span id="year"></span> <span class="color-brand"><strong> JustErotica </strong></span>  copyright.
            </p>
        </div>
    </div>

    <div id="scroll-Top">
        <div class="return-to-top">
            <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
        </div>
    </div>
</footer>
<!-- FOOTER SECTION ENDS -->

<!-- Js section start  -->
<script src="{{asset('frontend/js/jquery.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>


<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>


<script src="{{asset('frontend/js/bootsnav.js')}}"></script>


<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


<script src="{{asset('frontend/js/custom.js')}}"></script>
<!-- Js section ends  -->
</body>

</html>
