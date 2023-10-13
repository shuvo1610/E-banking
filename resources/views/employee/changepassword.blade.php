@extends('dashboard.master')
@section('content')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{asset(auth()->user()->image)}}" alt="{{ asset('default/user.jpg') }}" width="100" class="shadow-light rounded-circle">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header"><h4>Reset Password</h4></div>
                            <div class="card-body">
                                <p class="text-danger">{{ session()->get('error')}}</p>
                                <form action="{{route('store.password',['id'=>auth()->user()->user_id])}}" method="POST">@csrf
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input id="current_password" type="password" class="form-control" name="current_password">@if($errors->has('current_password'))
                                            <div class="text-danger">{{ $errors->first('current_password') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input id="new_password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="new_password">@if($errors->has('new_password'))
                                            <div class="text-danger">{{ $errors->first('new_password') }}</div>
                                        @endif
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirmation">Confirm Password</label>
                                        <input id="password-confirmation" type="password" class="form-control" name="new_password_confirmation">@if($errors->has('password_confirmation'))
                                            <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Reset Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
