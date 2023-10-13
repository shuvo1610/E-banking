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
                            <div class="card-header justify-content-between">
                                <h3 class="card-title">Employee Attendance Details</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-stripe">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>User ID</td>
                                        <td>Name</td>
                                        <td>Date</td>
                                        <td>Login Time</td>
                                        <td>Logout time</td>
                                    </tr>
                                    </thead>
                                    @foreach($employees as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->user_id }}</td>
                                            <td>{{ $user->user_name }}</td>
                                            <td>{{ $user->date }}</td>
                                            <td>{{ $user->login_time }}</td>
                                            <td>{{ $user->logout_time }}</td>
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
