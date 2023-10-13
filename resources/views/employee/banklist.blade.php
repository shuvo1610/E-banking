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
                                <h3 class="card-title">Bank List</h3>
                                <a href="{{route('add.bank')}}" class="btn btn-primary">Add Bank</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-stripe">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Bank Name</td>
                                        <td>Branch Name</td>
                                        <td>District</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    @foreach($banks as $bank)
                                        <tr>
                                    <td>{{$bank->id}}</td>
                                    <td>{{$bank->bank_name}}</td>
                                    <td>{{$bank->branch}}</td>
                                    <td>{{$bank->district}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item has-icon" href="{{route('bank.edit',$bank->id)}}">Edit Bank</a>
                                                <a class="dropdown-item has-icon" href="">Delete</a>
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

