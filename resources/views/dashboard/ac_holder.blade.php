@extends('dashboard.master')
@section('content')
    <style>
        .small, small {
            font-size: 67%;
            font-weight: 400;
        }
    </style>
    <!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Account Type</h4>
                        </div>
                        <div class="card-body text-capitalize">
                            <small>{{ str_replace('_',' ',auth()->user()->account->account_type) }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Account Number</h4>
                        </div>
                        <div class="card-body">
                            <small>{{ auth()->user()->account->account_number }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Balance</h4>
                        </div>
                        <div class="card-body">
                            {{ auth()->user()->account->balance }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
