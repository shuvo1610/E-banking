@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-13">
                    <div class="card">
                        <form action="" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header">
                                <h5>Deposit </h5>
                            </div>
                            <div class="card-body">
                                <p class="text-primary">{{ session()->get('success')}}</p>
                                <p class="text-danger">{{ session()->get('error')}}</p>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label>Type *</label>
                                        <select name="type" class="form-control">
                                            <option value="deposit" {{ old('type') == 'deposit' ? 'selected' : '' }}>Deposit</option>
                                            <option value="transfer" {{ old('type') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>Account No. *</label>
                                        <input type="number" class="form-control" name="account_no"
                                               value="{{ old('account_no') }}">
                                        <div class="text-danger">{{ $errors->first('account_no') }}</div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>Amount</label>
                                        <input type="text" class="form-control" name="amount"
                                               value="{{ old('amount') }}">
                                        <div class="text-danger">{{ $errors->first('amount') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

