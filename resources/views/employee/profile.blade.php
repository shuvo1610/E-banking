@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, {{ Auth()->user()->first_name }}!</h2>
                <p class="section-lead">
                    Change information about yourself on this page.
                </p>
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="{{ asset(Auth()->user()->profile_image) }}"
                                     class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div><h4>{{ Auth()->user()->first_name.' '.Auth()->user()->last_name}}</h4>
                                        </div>
                                        <div>{{ Auth()->user()->email }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link @yield('profile')" href=""><i class="bx bx-user"></i>Profile</a>
                                    </li>
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link @yield('login-activity')" href=""><i class='bx bx-file'></i>Login--}}
{{--                                            Activities</a>--}}
{{--                                    </li>--}}
                                    <li class="nav-item">
                                        <a class="nav-link @yield('password-change')"
                                           href="{{route('change.password',['id'=>auth()->user()->user_id])}}"><i
                                                class='bx bxs-key'></i>Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);"
                                           onclick="logout_user_devices('/logout-other-devices', '')" class="nav-link"
                                           id="setting-tab"><i class='bx bx-log-out'></i>Logout From Other Devices</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-7">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h4>Personal Information</h4>
                                <div class="form-group">
                                    <a href="{{route('profile',['id'=>auth()->user()->id])}}" class="btn btn-primary"><i
                                            class="bx bx-edit"></i>Edit</a>
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
                                            <th scope="col" class="font-normal">{{ auth()->user()->first_name}}</th>
                                        </tr>
                                        <tr>
                                            <td scope="row">Email</td>
                                            <th scope="col" class="font-normal">{{ auth()->user()->email }}</th>
                                        </tr>
                                        <tr>
                                            <td scope="row">{{ __('Phone No') }}</td>
                                            <th scope="col" class="font-normal">{{ auth()->user()->phone }}</th>
                                        </tr>
                                        @if(auth()->user()->account)
                                            <tr>
                                                <td scope="row">{{ __('Account Number') }}</td>
                                                <th scope="col"
                                                    class="font-normal">{{ auth()->user()->account->account_number }}</th>
                                            </tr>
                                            <tr>
                                                <td scope="row">{{ __('Total Balance') }}</td>
                                                <th scope="col"
                                                    class="font-normal">{{ auth()->user()->account->balance }}</th>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td scope="row">{{ __('User Type') }}</td>
                                            <th scope="col"
                                                class="font-normal text-capitalize">{{ auth()->user()->user_type }}</th>
                                        </tr>
                                        <tr>
                                            <td scope="row">{{'Address'}}</td>
                                            <th scope="col"
                                                class="font-normal text-capitalize">{{ auth()->user()->address }}</th>
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
{{--@include('common-profile')--}}
