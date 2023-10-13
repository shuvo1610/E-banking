@extends('dashboard.master')
@section('content')
    <div class="main-content" style="min-height: 482px;">
        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary" id="printable_area">
                            <div class="card-header">
                                <h4>Activity List</h4>
                                <div class="card-header-form">
                                    <form action="{{ route('Customer.report') }}" method="GET">
                                        <div class="input-group">
                                            <input type="date" value="{{ $date ?? '' }}" class="form-control" name="search" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-stripe" >
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Name</td>
                                        <td>From</td>
                                        <td>To</td>
                                        <td>Date</td>
                                        <td>Amount</td>
                                        <td>Type</td>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $key=> $transaction)
                                        <tr>
                                            <td>{{ $transactions->firstItem() + $key }}</td>
                                            <td>{{ @$transaction->user->name }}</td>
                                            <td>{{ $transaction->from }}</td>
                                            <td>{{ $transaction->to }}</td>
                                            <td>{{ Carbon\Carbon::parse($transaction->created_at)->format('d M, Y H:i') }}</td>
                                            <td>{{ $transaction->transfer_amount }}</td>
                                            <td>
                                                {{$transaction->transfer_type}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="5">Total Balance</td>
                                        <td>{{ $transactions->sum('transfer_amount') }}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                                {{ $transactions->appends($_GET)->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" id="print" type="button">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function (){
            $(document).on('click','#print',function (){
                var printContents = document.getElementById('printable_area').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            });
        });
    </script>
@endpush

