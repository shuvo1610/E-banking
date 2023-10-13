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
                                <h3 class="card-title">Transaction Request List</h3>
                                <p class="text-primary">{{ session()->get('Success')}}</p>
                                <p class="text-danger">{{ session()->get('error')}}</p>
                                <a href="{{route('transaction.done')}}" class="btn btn-primary">Transaction List</a>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-stripe">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Bank Name</td>
                                        <td>Branch Name</td>
                                        <td>Transaction Amount</td>
                                        <td>From</td>
                                        <td>To</td>
                                        <td>Date</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    @foreach($transactions as $trasaction)
                                        <tr>
                                            <td>{{$trasaction->id}}</td>
                                            <td>{{$trasaction->bank_name}}</td>
                                            <td>{{$trasaction->branch}}</td>
                                            <td>{{$trasaction->transfer_amount}}</td>
                                            <td>{{$trasaction->from}}</td>
                                            <td>{{$trasaction->to}}</td>
                                            <td>{{$trasaction->date}}</td>
                                            <td>@if($trasaction->status	== 1)
                                                    <div class="badge badge-success">approved</div>
                                                @elseif($trasaction->status	== 2)
                                                    <div class="badge badge-danger">Canceled</div>
                                                @else
                                                    <div class="badge badge-primary">pending</div>
                                                @endif
                                                <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item has-icon" href="{{route('transaction.Verified',['id'=>$trasaction->id])}}">Approved</a>
                                                        <a class="dropdown-item has-icon" href="{{route('transaction.canceled',['id'=>$trasaction->id])}}">Canceled</a>
                                                    </div>
                                                </div>
                                                </td>
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

