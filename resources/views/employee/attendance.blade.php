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
                                <h3 class="card-title">Employee Attendance List</h3>
                                @if(auth()->user()->user_type !='admin' )
                                    @if(!$user->logout_time)
                                    <a href="{{route('employee.punchout')}}" class="btn btn-primary">Punch Out</a>
                                    @endif
                                @endif
                            </div>
                            <div class="card-body"  id="printable_area">
                                <table class="table table-stripe">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>User ID</td>
                                        <td>Name</td>
                                        <td>Date</td>
                                        <td>Login Time</td>
                                        <td>Logout time</td>
                                        <td>Total Hour</td>
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
                                            @if($user->logout_time )
                                            <td>{{ gmdate( "H:i:s", \Carbon\Carbon::parse($user->login_time)->diffInSeconds($user->logout_time)) }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
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
