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
                                <h3 class="card-title">Transaction List</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-stripe">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Bank Name</td>
                                        <td>Branch Name</td>
                                        <td>Transaction Amount</td>
                                        <td>Date</td>
                                        <td>Status</td>
                                        <td>District</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    @foreach($transactionsdone as $done)
                                        <tr>
                                            <td>{{$done->id}}</td>
                                            <td>{{$done->bank_name}}</td>
                                            <td>{{$done->branch}}</td>
                                            <td>{{$done->transfer_amount}}</td>
                                            <td>{{$done->date}}</td>
                                            <td>@if($done->status	== 1)
                                                    <div class="badge badge-success">approved</div>
                                                @elseif($done->status	== 2)
                                                    <div class="badge badge-danger">Canceled</div>
                                                @else
                                                    <div class="badge badge-primary">pending</div>
                                                @endif
                                            </td>
                                            <td>{{$done->city}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item has-icon" href="{{route('transaction.view',['id' => $done->id])}}">View</a>
                                                        <a class="dropdown-item has-icon" href="{{route('fund.delete',['id' => $done->id])}}">Delete</a>
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

