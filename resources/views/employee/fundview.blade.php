@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-6 col-lg-7">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h4>Transaction Information</h4>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="modal-data-validate">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <table class="table mt-1 profile-head">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Details</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td scope="row">Bank Name</td>
                                            <th scope="col" class="font-normal">{{ $funds->bank_name }}</th>
                                        </tr>
                                        <tr>
                                            <td scope="row">Branch Name</td>
                                            <th scope="col" class="font-normal">{{ $funds->branch }}</th>
                                        </tr>

                                        <tr>
                                            <td scope="row">From</td>
                                            <th scope="col" class="font-normal">{{ $funds->from }}</th>
                                        </tr>

                                        <tr>
                                            <td scope="row">To</td>
                                            <th scope="col" class="font-normal text-capitalize">{{ $funds->to }}</th>
                                        </tr>
                                        <tr>
                                            <td scope="row">Transfer Amount</td>
                                            <th scope="col" class="font-normal text-capitalize">{{ $funds->transfer_amount }}</th>
                                        </tr>
                                        <tr>
                                            <td scope="row">Date</td>
                                            <th scope="col" class="font-normal text-capitalize">{{ $funds->created_at }}</th>
                                        </tr>
                                        <tr>
                                            <td scope="row">Transfer Type</td>
                                            <th scope="col" class="font-normal text-capitalize">{{ $funds->transfer_type }}</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
