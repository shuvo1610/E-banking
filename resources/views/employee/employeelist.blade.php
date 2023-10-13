@extends('dashboard.master')
@section('content')
    <div class="main-content" style="min-height: 482px;">
        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                @if(url()->current() == url('customers-list')|| url()->current() == url('request-list'))
                                    <h3 class="card-title">Account Holder  List</h3>
                                    @elseif(url()->current() == url('a_holder_request-list'))
                                    <h3 class="card-title">Account Opening Request List</h3>
                                @else
                                    <h3 class="card-title">Employee List</h3>
                                @endif
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-stripe" >
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Image</td>
                                        <td>Name</td>
                                        <td>Status</td>
                                        <td>Phone</td>
                                        @if(auth()->user()->user_type == 'employee')
                                        <td>Email</td>
                                        <td>Address</td>
                                        @endif
                                        @if(auth()->user()->user_type == 'admin' || url()->current() == url('customers-list') || url()->current() == url('request-list'))
                                        <td>Action</td>
                                        @endif
                                    </tr>
                                    </thead>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                <figure class="avatar mr-2 avatar-xl">
                                                    @if($user->email_verification)
                                                        <i class="avatar-presence online"></i>
                                                    @else
                                                        <i class="avatar-presence offline"></i>
                                                    @endif
                                                    @if($user->image)
                                                        <img src="{{ asset($user->image) }}" height="100" width="100">
                                                        @else
                                                            <img src="{{ asset('default/user.jpg') }}" height="100" width="100">
                                                        @endif
                                                </figure>
                                            </td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>
                                                @if($user->verified_at)
                                                <div class="badge badge-success">Verified</div>
                                                @else
                                                    <div class="badge badge-danger">Unverified</div>
                                                @endif
                                            </td>
                                            <td>{{ $user->phone }}</td>
                                            @if(auth()->user()->user_type == 'employee')
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->address }}</td>
                                            @endif
                                            @if(auth()->user()->user_type == 'employee' || auth()->user()->user_type == 'admin' || url()->current() == url('customers-list') || url()->current() == url('request-list'))
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @if(auth()->user()->user_type == 'admin')
                                                        <a class="dropdown-item has-icon" href="{{route('user.delete',['id'=>$user->id])}}">Delete</a>
                                                        @endif
                                                        <a class="dropdown-item has-icon" href="{{route('user.profile',['id'=>$user->id])}}">View</a>
                                                        <a class="dropdown-item has-icon" href="{{route('employee.Verified',['id'=>$user->id])}}"><i class='bx bx-check-shield'></i>Verify</a>
                                                        <a class="dropdown-item has-icon" href="{{route('employee.unverified',['id' => $user->id])}}"><i class='bx bx-shield-x'></i>Unverify</a>
                                                        <a class="dropdown-item has-icon" href="{{route('Customer.report',['user_id' => $user->id])}}"><i class='bx bx-shield-x'></i>Report</a>
                                                    </div>
                                                </div>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

