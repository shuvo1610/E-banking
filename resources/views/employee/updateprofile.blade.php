@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-10 col-md-12 col-lg-16" style="display: grid; place-content: center">
                    <div class="card">
                        <form action="{{route('userprofile.update',[$users->id])}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header justify-content-between">
                                <h5>Update Information</h5>
{{--                                <a href="{{route('employee.list')}}" class="btn btn-primary">Back</a>--}}
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" class="form-control" name="first_name" value="{{$users->first_name}}">@if($errors->has('first_name'))
                                        <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group ">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" value="{{$users->last_name}}">
                                </div>
                                <div class="form-group ">
                                    <label>Email *</label>
                                    <input type="text" class="form-control" name="email" value="{{$users->email}}">@if($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group ">
                                    <label>Phone *</label>
                                    <input type="number" class="form-control" name="phone" value="{{$users->phone}}">@if($errors->has('phone'))
                                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                                <div class="form-group ">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="{{$users->address}}">@if($errors->has('address'))
                                        <div class="text-danger">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                                <div class="form-group ">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">@if($errors->has('image'))
                                        <div class="text-danger">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
