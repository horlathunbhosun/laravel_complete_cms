@extends('frontend.layouts.app')

@section('title', 'Verify Account')



@section('content')

<!-- breadcrumbs-area-start -->
<div class="breadcrumbs-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#" class="active">Verify Account</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs-area-end -->
<!-- user-login-area-start -->
<div class="user-login-area mb-70">
    <div class="container">
        <form method="POST" action="{{route('user.verify')}}">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-title text-center mb-30">
                        <h2>Verify Account</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6 col-md-12 col-12">
                    <div class="login-form">
                        <div class="single-login">
                            <label>Code<span>*</span></label>
                            <input type="text" name="verification" placeholder="Enter Code Here" />
                        </div>
                        <div class="single-login single-login-2">
                            <button class="btn btn-warning" type="submit" >Verify</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- user-login-area-end -->
@endsection
