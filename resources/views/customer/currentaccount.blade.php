@extends('home.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-13">
                    <div class="card">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session()->get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ session()->get('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="{{ route('user.registration') }}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header">
                                <h5>Opening Account Request</h5>
                            </div>
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" name="first_name"
                                               value="{{ old('first_name') }}">
                                        <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name"
                                               value="{{ old('last_name') }}">
                                        <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Email *</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    </div>

                                    <div class="col-sm-6   ">
                                        <label>Password *</label>
                                        <input type="password" class="form-control" name="password">
                                        <div class="text-danger">{{ $errors->first('password') }}</div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>

                                    <div class="col-sm-6 ">
                                        <label>Phone *</label>
                                        <input type="number" class="form-control" name="phone"  value="{{ old('phone') }}">
                                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Date of Birth.</label>
                                        <input type="date" class="form-control" name="dob" >
                                        <div class="text-danger">{{ $errors->first('date_of_birth') }}</div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Account Type</label>
                                        <select name="account_type" class="form-control">
                                            <option value="current_account">Current Account</option>
                                            <option value="savings_account">Savings Account</option>
                                            <option value="student_account">Student Account</option>
                                            <option value="salary_account">Salary Account</option>
                                        </select>
                                        <div class="text-danger">{{ $errors->first('account_type') }}</div>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Opening Balance</label>
                                        <input type="number" class="form-control" name="opening_balance"  value="{{ old('opening_balance') }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                        <div class="text-danger">{{ $errors->first('address') }}</div>
                                    </div>

                                    <div class="form-group  col-md-12">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <div class="text-danger">{{ $errors->first('image') }}</div>
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

