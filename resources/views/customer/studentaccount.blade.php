@extends('home.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-13">
                    <div class="card">
                        <form action=" " method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header">
                                <h5>Student Account Request</h5>
                            </div>
                            <div class="card-body">
                                <div class="row ">
                                <div class="col-sm-6 ">
                                    <label>User Id *</label>
                                    <input type="number" class="form-control" name="user_id" value="{{ old('user_id') }}">@if($errors->has('user_id'))
                                        <div class="text-danger">{{ $errors->first('user_id') }}</div>
                                    @endif
                                </div>
                                    <div class="col-sm-6 ">
                                        <label>NID *</label>
                                        <input type="number" class="form-control" name="nid" value="{{ old('nid') }}">@if($errors->has('nid'))
                                            <div class="text-danger">{{ $errors->first('nid') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">@if($errors->has('first_name'))
                                            <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Student ID *</label>
                                        <input type="text" class="form-control" name="student_id" value="{{ old('student_id') }}">
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Email *</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">@if($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-6   ">
                                        <label>Password *</label>
                                        <input type="password" class="form-control" name="password">@if($errors->has('password'))
                                            <div class="text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">@if($errors->has('password_confirmation'))
                                            <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                        @endif
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <label>Phone *</label>
                                        <input type="number" class="form-control" name="phone">@if($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6  ">
                                        <label>Age *</label>
                                        <input type="number" class="form-control" name="age">@if($errors->has('age'))
                                            <div class="text-danger">{{ $errors->first('age') }}</div>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label>Permanent Address</label>
                                    <input type="text" class="form-control" name="permanent_address">@if($errors->has('permanent_address'))
                                        <div class="text-danger">{{ $errors->first('permanent_address') }}</div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Institute Name *</label>
                                        <input type="text" class="form-control" name="institute_name">@if($errors->has('institute_name'))
                                            <div class="text-danger">{{ $errors->first('institute_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Institute Address *</label>
                                        <input type="text" class="form-control" name="Institute_address">@if($errors->has('Institute_address'))
                                            <div class="text-danger">{{ $errors->first('Institute_address') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <label>Date of Birth.</label>
                                        <input type="date" class="form-control" name="date_of_birth">
                                        <div class="text-danger">{{ $errors->first('date_of_birth') }}</div>
                                    </div>

                                <div class="col-sm-6">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">@if($errors->has('image'))
                                        <div class="text-danger">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

