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
                                <h3 class="card-title">Salary Generate</h3>
{{--                                <a href="{{route('salary.details')}}" class="btn btn-primary">Paid Salary List </a>--}}
                            </div>
                            <div class="card-header justify-content-between" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="" method="">
                                            <input type="month" name="date" id="date" value="{{ $searchDate }}">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </form>
                                    </div>
                                </div>
                                <p class="text-primary">{{ session()->get('success')}}</p>
                                <div class="row">
                                    <div class="col-md-12">
{{--                                        @if(!$inputDate)--}}
                                        <a href="{{url("salary-generate?date=$searchDate")}}" class="btn btn-primary">Salary Generate For {{ Carbon\Carbon::parse($searchDate)->format('F Y') }}</a>
{{--                                        @endif--}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-stripe">
                                    <thead>
                                    <tr>
                                        <td>Employee Id</td>
                                        <td>Name</td>
                                        <td>Designation</td>
                                        <td>Salary</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    @foreach($employees as $user)
                                        <tr>
                                            <td>{{ $user->user_id }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->designation }}</td>
                                            <td>{{ $user->salary }}</td>
                                            <td>
                                                <a href="{{route('salary.details',['id' => $user->user_id,'date' => $searchDate])}}" class="btn btn-primary">View </a>
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

