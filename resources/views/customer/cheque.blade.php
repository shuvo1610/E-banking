@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-13">
                    <div class="card">
                        <form action="{{route('request.store')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header" >
                                <h5>CHEQUE BOOK REQUEST</h5>
                            </div>
                            <p class="text-primary">{{ session()->get('Success')}}</p>
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-sm-6">
                                        <label>Branch *</label>
                                        <input type="text" class="form-control" name="branch" value="{{ old('branch') }}">@if($errors->has('branch'))
                                            <div class="text-danger">{{ $errors->first('branch') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Date *</label>
                                        <input type="date" class="form-control" name="date" value="{{ old('date') }}">@if($errors->has('date'))
                                            <div class="text-danger">{{ $errors->first('date') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Account Number *</label>
                                        <input type="text" class="form-control" name="account_no" value="{{ old('account_no') ? : auth()->user()->account->account_number }}">
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Account Type</label>
                                        <input type="text" class="form-control" name="account_type" value="{{ old('account_type') ? : auth()->user()->account->account_type }}">@if($errors->has('account_type'))
                                            <div class="text-danger">{{ $errors->first('account_type') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6   ">
                                        <label>Bank Name *</label>
                                        <input type="text" class="form-control" name="bank_name">@if($errors->has('bank_name'))
                                            <div class="text-danger">{{ $errors->first('bank_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>City *</label>
                                        <input type="text" class="form-control" name="city">@if($errors->has('city'))
                                            <div class="text-danger">{{ $errors->first('city') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Request</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

