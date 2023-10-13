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
                                <h3 class="card-title">Employee Salary Details</h3>
                                <a href="{{route('employee.salary')}}" class="btn btn-primary">Back</a>
                            </div>
                            @php
                                $total_time = 0;
                            @endphp
                            <div class="card-body" id="printable_area">
                                <table class="table table-stripe">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>User Id</td>
                                        <td>Date</td>
                                        <td>Login Time</td>
                                        <td>Logout Time</td>
                                        <td>Hour</td>
                                    </tr>
                                    </thead>
                                    @foreach($user as $key)
                                        <tr>
                                            @php
                                                if ($key->login_time && $key->logout_time){
                                                    {
                                                    $sec = \Carbon\Carbon::parse($key->login_time)->diffInSeconds($key->logout_time);
                                                    $total_time += $sec;}
                                                    }
                                            @endphp
                                            <td>{{ $key->id }}</td>
                                            <td>{{ $key->user_id }}</td>
                                            <td>{{ $key->date }}</td>
                                            <td>{{ $key->login_time }}</td>
                                            <td>{{ $key->logout_time }}</td>
                                            @if($key->logout_time )
                                                <td>{{ gmdate( "H:i:s", $sec)}}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5">Total Hour</td>
                                        <td>{{ gmdate('H:i:s',$total_time) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">Total Salary</td>
                                        <td>{{ round(@$salary->amount) }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" id="print" type="button">Print</button>
                            </div>
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
