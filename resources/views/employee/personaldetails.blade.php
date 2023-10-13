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
                                <h3 class="card-title">Personal Salary Info</h3>
                                <a href="{{route('salary.details')}}" class="btn btn-primary">Back</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-stripe">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>User ID</td>
                                        <td>Fixed Salary</td>
                                        <td>Paid Amount</td>
                                        <td>Status</td>
                                    </tr>
                                    </thead>
{{--                                    @foreach($salary as $key)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ $key->id }}</td>--}}
{{--                                            <td>{{ $key->user_id }}</td>--}}
{{--                                            <td>{{ $key->date }}</td>--}}
{{--                                            <td></td>--}}
{{--                                            <td>--}}
{{--                                                <a class="btn btn-primary" href="">View</a>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
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

