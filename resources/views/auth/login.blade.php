<!-- Start User Area -->
@extends('home.master')
@section('content')
    <div class="user-area ptb-100">
        <div class="container">

            <form class="user-form" action="{{route('user.login')}}" method="post">@csrf
                <h3>Login</h3>
                <p class="text-danger">{{ session()->get('error')}}</p>
                <p class="text-success">{{ session()->get('Success')}}</p>

{{--                <div class="row">--}}
{{--                    <div class="col-lg-6 col-md-6">--}}
{{--                        <a href="https://www.google.com/" target="_blank" class="or-login google">--}}
{{--                            Google--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-6 col-md-6">--}}
{{--                        <a href="https://www.facebook.com/" target="_blank" class="or-login facebook">--}}
{{--                            Facebook--}}
{{--                        </a>--}}
{{--                    </div>--}}

                    <div class="col-12">
                        <span class="or">Or</span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1">@if($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>@endif
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password">@if($errors->has('password'))
                                <div class="text-danger">{{ $errors->first('password') }}</div>@endif
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="login-action">
								<span class="forgot-login">
									<a href="{{route('forgotpassword.employee')}}">Forgot Password?</a>
								</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="default-btn" type="submit">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End User Area -->

    <!-- Start Started Area -->
    <div class="started-area bg-color-ee6a3e">
        <div class="container">
            <div class="started-bg">
                <div class="started-content">
                    <h3>Ready To Get Started?</h3>
                    <p>Explore BITR Payments, or create an account instantly and start accepting payments. You can also contact us to design a custom package for your new online business.</p>

                    <div class="started-btn">
                        <a href="" class="default-btn">
                            Start Now
                        </a>
                        <a href="" class="default-btn active">
                            Contact Us
                        </a>
                    </div>
                </div>

                <img src="page/assets/images/started-shape-1.png" class="shape shape-1" alt="Image">
                <img src="page/assets/images/started-shape-2.png" class="shape shape-2" alt="Image">
                <img src="page/assets/images/started-shape-3.png" class="shape shape-3" alt="Image">
            </div>
        </div>
    </div>
@endsection
<!-- End Started Area -->
