@extends('home.master')
@section('content')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header"><h4>Forgot Password</h4></div>
                        <div class="card-body">
                            <p class="text-primary">{{ session()->get('Success')}}</p>
                            <form action="{{route('find.user')}}" method="POST">@csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email">@if($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div><br>
                                <div class="form-group">
                                    <button type="submit" class="btn-lg btn-block" style="background-color: #ee6a3e" tabindex="4">
                                        Forgot Password
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
