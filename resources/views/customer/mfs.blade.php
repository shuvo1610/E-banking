@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <ul>
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-13">
                    <div class="card">
                        <form action="{{route('fund.transfer')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header">
                                <h5>MFS Transfer</h5>
                            </div>
                            <div class="col-12 col-md-12 col-lg-13">
                                <p class="text-danger">{{ session()->get('error')}}</p>
                                <p class="text-primary">{{ session()->get('Success')}}</p>
                            </div>
                            <input type="hidden" name="beneficiary_type" value="mfs">
                            <input type="hidden" name="status" value="1">
                            <div class="card-body">
                                <div class="form-group ">
                                    <label>Transfer Type: *</label>
                                    <select name="transfer_type" id="transfer_type" class="form-control">
                                        <option value="bkash">Bkash</option>
                                        <option value="rocket">Rocket</option>
                                        <option value="nogod">Nogod</option>
                                    </select>
                                </div>

                                <div class="row ">
                                    <div class="col-sm-6">
                                        <label>First Name </label>
                                        <input type="text" class="form-control" name="first_name"
                                               value="{{ old('first_name') }}">
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name"
                                               value="{{ old('last_name') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>MFS Account *</label>
                                        <input type="text" class="form-control" name="to"
                                               value="{{ old('to') }}">@if($errors->has('to'))
                                            <div class="text-danger">{{ $errors->first('to') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>From Account</label>
                                        <input type="text" class="form-control" name="from"
                                               value="{{ old('account_no') ? : auth()->user()->account->account_number }}">@if($errors->has('account_no'))
                                            <div class="text-danger">{{ $errors->first('account_no') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Available Amount</label>
                                        <input type="text" class="form-control"
                                               value="{{ old('balance') ? : auth()->user()->account->balance }}">
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Transfer Amount *</label>
                                        <input type="text" class="form-control"
                                               name="transfer_amount">@if($errors->has('transfer_amount'))
                                            <div class="text-danger">{{ $errors->first('transfer_amount') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label>Password *</label>
                                    <input type="password" class="form-control" name="password"
                                           value="{{ old('password') }}">@if($errors->has('password'))
                                        <div class="text-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Sent</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
