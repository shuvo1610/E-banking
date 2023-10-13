@extends('dashboard.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ $users->first_name }}!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            @if($users->image)
                                <img src="{{ asset($users->image) }}" height="100" width="100" class="rounded-circle profile-widget-picture">
                            @else
                                <img src="{{ asset('default/user.jpg') }}" height="100" width="100" class="rounded-circle profile-widget-picture">
                            @endif
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div><h4>{{ $users->first_name.' '.$users->last_name}}</h4></div>
                                    <div>{{ $users->email }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-left">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a class="nav-link @yield('profile')" href=""><i class="bx bx-user"></i>Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('login-activity')" href=""><i class='bx bx-file'></i>Login Activities</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @yield('password-change')" href=""><i class='bx bxs-key'></i>Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" onclick="logout_user_devices('/logout-other-devices', '')" class="nav-link" id="setting-tab"><i class='bx bx-log-out'></i>Logout From Other Devices</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="col-12 col-md-6 col-lg-7">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h4>Personal Information</h4>
                        <div class="form-group" >
                            <a href="{{route('profile',['id'=>$users->id])}}" class="btn btn-primary"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="modal-data-validate">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <table class="table mt-1 profile-head">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Basics</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="row">Name</td>
                                    <th scope="col" class="font-normal">{{ $users->first_name.' '.$users->last_name }}</th>
                                </tr>
                                <tr>
                                    <td scope="row">Email</td>
                                    <th scope="col" class="font-normal">{{ $users->email }}</th>
                                </tr>

                                <tr>
                                    <td scope="row">Phone</td>
                                    <th scope="col" class="font-normal">{{ $users->phone }}</th>
                                </tr>

                                <tr>
                                    <td scope="row">User Type</td>
                                    <th scope="col" class="font-normal text-capitalize">{{ $users->user_type }}</th>
                                </tr>
                                <tr>
                                    <td scope="row">Account Number</td>
                                    <th scope="col" class="font-normal text-capitalize">{{ @$users->account->account_number }}</th>
                                </tr>
                                <tr>
                                    <td scope="row">Current Balance</td>
                                    <th scope="col" class="font-normal text-capitalize">{{ @$users->account->balance }}</th>
                                </tr>
                                <tr>
                                    <td scope="row">Address</td>
                                    <th scope="col" class="font-normal text-capitalize">{{ $users->address }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection
