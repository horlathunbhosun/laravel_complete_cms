<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Karnalreads - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- title of site -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

    <script type="text/javascript">
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}",
            {{--jsPermissions: {!! auth()->check()?auth()->user()->jsPermissions():null !!}--}}
        }
    </script>

@include('frontend.partials.style')
</head>

<body class="home-2">

<!-- Layout wrapper -->

<header>
    <!-- header-top-area-start -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    {{--  <div class="language-area">
                        <ul>
                            <li>
                                <img src="/web/img/flag/1.jpg" alt="flag"/>
                                <a href="#">
                                    English
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            </li>
                        </ul>
                    </div>  --}}
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  @if (!auth()->check())
                  <div class="account-area text-right">
                    <ul>
                        <li><a href="{{route('user.signup')}}">Sign up</a></li>
                        <li><a href="{{route('user.signin')}}">Sign in</a></li>
                    </ul>
                 </div>
                    @else

                  @endif
                </div>
            </div>
        </div>
    </div>
    <!-- header-top-area-end -->
    <!-- header-mid-area-start -->
    <div class="header-mid-area ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-12">
                    <div class="header-search">
                        <form action="#">
                            <input type="text" placeholder="Search entire store here..." />
                            <a href="#"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-12">
                    <div class="logo-area text-center logo-xs-mrg">
                        <a href="/"><img src="/web/img/logo/logonew.png" alt="logo"  style="height: 100px; border-radius: 30px"/></a>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    @if (Auth::user())
                    <div class="my-cart">
                        <ul>
                            <li>
                                Welcome  {{\Illuminate\Support\Facades\Auth::user()->name}}!
                                <a href="{{route('user.dashboard')}}">
                                     Dashboard
                                </a>
                            </li>
                        </ul>
                    </div>

                    @else


                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- header-mid-area-end -->
    <!-- main-menu-area-start -->
    <div class="main-menu-area d-md-none d-none d-lg-block sticky-header-1" id="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-area">
                        <nav>
                            <ul>
                                <li class="active">
                                    <a href="{{url('/')}}">

                                        Home
                                    </a>
                                </li>


                                @php
                                    $categories = App\Category::paginate(3);
                                @endphp
                                @foreach($categories as $category)
                                <li>
                                    <a href="product-details.html">
                                        {{$category->title}}
                                    </a>
                                </li>
                                @endforeach
{{--                                <li>--}}
{{--                                    <a href="product-details.html">--}}
{{--                                        Category 1--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="product-details.html">--}}
{{--                                        Category 2--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li>
                                    <a href="{{route('user.membership')}}">
                                        Membership
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-menu-area-end -->
    <!-- mobile-menu-area-start -->
    <div class="mobile-menu-area d-lg-none d-block fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul id="nav">
                                <li>
                                    <a href="{{url('/')}}">Home</a>

                                @php
                                    $categories = App\Category::paginate(3);
                                @endphp
                                @foreach($categories as $category)
                                    <li>
                                        <a href="product-details.html">
                                            {{$category->title}}
                                        </a>
                                    </li>
                                @endforeach
{{--                                <li>--}}
{{--                                    <a href="product-details.html">--}}
{{--                                        New Arrival--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="product-details.html">--}}
{{--                                        Category 1--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="product-details.html">--}}
{{--                                        Category 2--}}
{{--                                    </a>--}}
{{--                                </li>--}}

                                <li>

                                    <a href="{{route('user.membership')}}">
                                        Membership
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area-end -->
</header>


@yield('content')



<!-- / Layout wrapper -->

@include('frontend.partials.scripts')

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<!-- Js section ends  -->
</body>

</html>
