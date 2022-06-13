@extends('frontend.layouts.app')

@section('title','SignIn')


@section('content')
<!-- breadcrumbs-area-start -->
		<div class="breadcrumbs-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#" class="active">login</a></li>
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
                <form method="POST"  action="{{route('user.login')}}" >
                    @csrf
				<div class="row">
					<div class="col-lg-12">
						<div class="login-title text-center mb-30">
							<h2>Login</h2>
						</div>
					</div>


					<div class="offset-lg-3 col-lg-6 col-md-12 col-12">
						<div class="login-form">
							<div class="single-login">
								<label>Username or email<span>*</span></label>
								<input type="text" name="email" />
							</div>
							<div class="single-login">
								<label>Passwords <span>*</span></label>
								<input type="password" name="password"  />
							</div>
							<div class="single-login single-login-2">
								{{--  <a href="#">login</a>  --}}
                                <button type="submit" class="btn btn-warning">Login</button>
								{{--  <input id="rememberme" type="checkbox" name="rememberme" value="forever">
								<span>Remember me</span>  --}}
							</div>
							<a href="{{route('user.forget')}}">Lost your password?</a>
						</div>
					</div>

				</div>
            </form>
			</div>
		</div>
		<!-- user-login-area-end -->

@endsection
