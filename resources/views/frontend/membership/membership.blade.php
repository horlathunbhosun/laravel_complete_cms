@extends('frontend.layouts.app')


@section('title', 'Membership')



@section('content')
    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#" class="active">membership</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
    <!-- membership-board-start -->
    <div class="compare-page-wrapper mb-70">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Compare Page Content Start -->
                        <div class="compare-page-content-wrap">
                            <div class="compare-table table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                    @foreach($payment_plans as $plan)
                                    <tr>
                                        <td class="first-column">Price</td>
                                        <td class="pro-price">{{$plan->amount_usd}}</td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Coin in value</td>
                                        <td class="pro-color">{{$plan->coin_value}}</td>
                                    </tr>
                                    <tr>
                                        <td class="first-column">Bonus</td>
                                        <td class="pro-stock">{{$plan->bonus}}</td>
                                    </tr>
                                    <tr>
                                        <td class="first-column"></td>
                                        <td><a href="cart.html" class="btn btn-sqr">Pay</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Compare Page Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- membership-board end -->

@endsection
