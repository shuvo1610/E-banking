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
                                <h3 class="card-title">E-Bank Branch List</h3>
                                <a href="{{route('create.branch')}}" class="btn btn-primary">Add Branch</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-stripe">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Branch Name</td>
                                        <td>District</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    @foreach($e_branches as $e_branch)
                                        <tr>
                                            <td>{{$e_branch->id}}</td>
                                            <td>{{$e_branch->branch}}</td>
                                            <td>{{$e_branch->district}}</td>
                                            <td>
                                                <a class="btn btn-primary" href="">Delete</a>
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

