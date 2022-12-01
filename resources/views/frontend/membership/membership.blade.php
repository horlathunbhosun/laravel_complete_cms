@extends('frontend.layouts.app')


@section('title', 'Membership')

<style>
    .pricing-card {
        border: 1px solid rgba(0, 0, 0, 0.5)
    }

    .pricing-card-header > h1 > span.price {
        color: #f07c29;
        font-size: 4rem;
    }

    .pricing-card-header > h1 > span.month {
        font-size: 2rem;
    }

    .pricing-card-button button,
    .pricing-card-button a {
        padding: 15px 25px;
        background: #f07c29;
        color: #fff;
        border-radius: 40px;
        min-width: 200px;
        border: none;
        outline: none;
        font-size: 16px;
    }

    .pricing-card-button a {
        text-align: center;
    }

    .pricing-card-body ul li {
        margin-bottom: 10px;
        font-size: 16px;
    }

    .pricing-card-body > ul > li > span.title {
        font-weight: bold;
        font-size: 18px;
        color: #000;
    }

    @media (max-width: 576px) {
        .pricing-card {
            text-align: center;
        }

        .pricing-card-header > h1 > span.price {
            font-size: 3rem;
        }

        .pricing-card-header > h1 > span.month {
            font-size: 2rem;
        }
    }
</style>

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
{{--                        <div class="compare-page-content-wrap">--}}
{{--                            <div class="compare-table table-responsive">--}}
{{--                                <table class="table table-bordered mb-0">--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($payment_plans as $plan)--}}
{{--                                    <tr>--}}
{{--                                        <td class="first-column">Price</td>--}}
{{--                                        <td class="pro-price">{{$plan->amount_usd}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="first-column">Coin in value</td>--}}
{{--                                        <td class="pro-color">{{$plan->coin_value}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="first-column">Bonus</td>--}}
{{--                                        <td class="pro-stock">{{$plan->bonus}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="first-column"></td>--}}
{{--                                        <td><a href="cart.html" class="btn btn-sqr">Pay</a></td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                         <div class="row g-5">
                             @foreach($payment_plans as $plan)
                             <div class="col-lg-4 mb-3 col-md-6 col-10 mx-auto pricing-card px-3 py-5 p-lg-5">
                                 <form action="{{route('user.subscription')}}" method="POST">
                                     @csrf
                                     <div>
                                         <div class="pricing-card-header">
                                             <h1><span class="price">${{$plan->amount_usd}}</span></h1>
                                         </div>
                                         <div class="pricing-card-body">
                                             <ul class="my-3">
                                                 <li><span class="title">Coin Value:</span> <span>{{$plan->coin_value}}</span></li>
                                                 <li><span class="title">Pay Bonus:</span> <span>{{$plan->bonus}}</span></li>
                                             </ul>
                                             <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                             @if(auth()->check())
                                             <div class="pricing-card-button">
                                                 <button type="submit">Subscribe</button>
                                             </div>
                                             @else
                                                 <div class="pricing-card-button">
                                                     <a href="{{route('user.signin')}}" type="button" style="color: #fff">Login</a>
                                                 </div>
                                             @endif
                                         </div>
                                     </div>
                                 </form>

                             </div>
                             @endforeach
                         </div>
                        <!-- Compare Page Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- membership-board end -->

@endsection
