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
                                <h3 class="card-title">Customers List</h3>
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
                                        <td>Email</td>
                                        <td>Address</td>
                                        <td>Account Type</td>
                                        @if(auth()->user()->user_type == 'admin')
                                            <td>Action</td>
                                        @endif
                                    </tr>
                                    </thead>
{{--                                    @foreach($users as $user)--}}
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
{{--                                            @if(auth()->user()->user_type == 'employee')--}}
                                                <td></td>
                                                <td></td>
{{--                                            @endif--}}
                                            <td></td>
                                            @if(auth()->user()->user_type == 'admin')
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item has-icon" href="">Delete</a>
                                                            <a class="dropdown-item has-icon" href="">View</a>
                                                            <a class="dropdown-item has-icon" href=""><i class="bx bx-log-in"></i>Login as Employee</a>
                                                            <a class="dropdown-item has-icon" href=""><i class='bx bx-check-shield'></i>Verify Employee</a>
                                                            <a class="dropdown-item has-icon" href=""><i class='bx bx-shield-x'></i>Unverify Employee</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
{{--                                    @endforeach--}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

