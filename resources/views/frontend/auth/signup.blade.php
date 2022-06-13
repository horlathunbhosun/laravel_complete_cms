@extends('frontend.layouts.app')


@section('title', 'Signup')

@section('content')

<!-- breadcrumbs-area-start -->
	<div class="breadcrumbs-area mb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumbs-menu">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#" class="active">register</a></li>
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
                <form method="POST" action="{{route('user.register')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-title text-center mb-30">
                                <h2>Register </h2>
                            </div>
                        </div>
                        <div class="offset-lg-2 col-lg-8 col-md-12 col-12">
                            <div class="billing-fields">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="single-register">
                                                <label>Email Address<span>*</span></label>
                                                <input type="text" class="form-control" name="email" placeholder="Enter your email" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="single-register">
                                            <label>Gender<span>*</span></label>
                                            <select name="gender"  class="form-control" tabindex="1" style="width:100%;" data-placeholder="Default Sorting">
                                                <option value="" selected>Select a gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-register">
                                    <label>Account password<span>*</span></label>
                                    <input name="password" class="form-control" type="password" placeholder="Password" />

                                </div>

                                <div class="single-register">
                                    <button class="btn btn-primary" type="submit" >Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
		<!-- user-login-area-end -->

@endsection
