@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-13">
                    <div class="card">
                        <form action="{{route('fund.save')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header">
                                <h5>E-Bank Own Account Fund Transfer</h5>
                            </div>
                            <div class=" card-header">
                                <p class="text-danger">{{ session()->get('error')}}</p>
                                <p class="text-primary">{{ session()->get('Success')}}</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>From Account *</label>
                                        <input type="text" class="form-control" name="from" value="{{ old('from') ? : auth()->user()->account->account_number }}">
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>To Account</label>
                                        <input type="text" class="form-control" name="to" value="{{ old('to') }}">@if($errors->has('to'))
                                            <div class="text-danger">{{ $errors->first('to') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" name="status" value="1">
                                <div class="row">
                                    <div class="col-sm-6   ">
                                        <label>Available Amount *</label>
                                        <input type="text" class="form-control" name="balance" value="{{ old('balance') ? : auth()->user()->account->balance }}">@if($errors->has('balance'))
                                            <div class="text-danger">{{ $errors->first('balance') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Transfer Amount *</label>
                                        <input type="text" class="form-control" name="transfer_amount">@if($errors->has('transfer_amount'))
                                            <div class="text-danger">{{ $errors->first('transfer_amount') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6   ">
                                        <label>Branch *</label>
                                        <select name="branch" id="branch"  class="form-control">
                                            @foreach($branchlists as $branchlist )
                                            <option value="{{$branchlist->branch}}">{{$branchlist->branch}}</option>
                                            @endforeach
                                        </select>@if($errors->has('branch'))
                                            <div class="text-danger">{{ $errors->first('branch') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>City *</label>
                                        <select name="city" id="city"  class="form-control">
                                            @foreach($branchlists as $branchlist )
                                                <option value="{{$branchlist->district}}">{{$branchlist->district}}</option>
                                            @endforeach
                                        </select>@if($errors->has('city'))
                                            <div class="text-danger">{{ $errors->first('city') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label>Password *</label>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">@if($errors->has('password'))
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

