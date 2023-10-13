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
                                    <h3 class="card-title">Cheque Book Request List</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-stripe" >
                                    <thead>
                                    <tr>
                                        <td>#</td>
{{--                                        <td>Name</td>--}}
                                        <td>Account No</td>
                                        <td>Account Type</td>
                                        <td>Branch</td>
                                        <td>City</td>
                                        <td>Date</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    @foreach($request_list as $request)
                                        <tr>
                                            <td>{{$request->id}}</td>
{{--                                            <td>{{$request->account_no}}</td>--}}
                                            <td>{{$request->account_no}}</td>
                                            <td>{{$request->account_type}}</td>
                                            <td>{{$request->branch}}</td>
                                            <td>{{$request->city}}</td>
                                            <td>{{$request->date}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item has-icon" href="{{route('delete.list',['id' => $request->id])}}">Delete</a>
                                                            <a class="dropdown-item has-icon" href=""><i class='bx bx-check-shield'></i>Accept</a>
                                                            <a class="dropdown-item has-icon" href=""><i class='bx bx-shield-x'></i>Reject</a>
                                                        </div>
                                                    </div>
                                                </td>
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


