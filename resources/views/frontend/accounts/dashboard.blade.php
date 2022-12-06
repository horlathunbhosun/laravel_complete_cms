@extends('frontend.layouts.app')


@section('title', 'Dashboard')



@section('content')

    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#" class="active">my-account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- entry-header-area-start -->
    <div class="entry-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="entry-header-title">
                        <h2>My-Account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- entry-header-area-end -->
    <!-- my account wrapper start -->
    <div class="my-account-wrapper mb-70">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                            Dashboard</a>
                                            @if (auth()->user()->user_type == 'admin')
                                            <a href="#books" data-toggle="tab"><i class="fa fa-book"></i>
                                                Books</a>
                                             @endif 
                                        <a href="#library" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                            My Library</a>
                                        <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>
                                            Payment
                                            history</a>
                                        <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account
                                            Details</a>
{{--                                        <a href="login.html"><i class="fa fa-sign-out"></i> Logout</a>--}}
                                        <a href="{{url('/logout')}}"
{{--                                           class="btn btn-default btn-flat"--}}
                                           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit()"><i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{url('/logout')}}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5>Dashboard</h5>
                                                <div class="welcome">
                                                    <p>Hello, <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}</strong></p>
                                                </div>
                                                <p class="mb-0">Welcome to JustEroticaHub</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="books" role="tabpanel">
                                            @include('frontend.accounts.include.books')
                                         </div>
                                         <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="library" role="tabpanel">
                                            @include('frontend.accounts.include.library')
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                           @include('frontend.accounts.include.payment_history')
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                           @include('frontend.accounts.include.update_account')
                                        </div> <!-- Single Tab Content End -->
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->

@endsection
