@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-13">
                    <div class="card">
                        <form action="{{ route('save.deposit') }}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header">
                                <h5>Deposit </h5>
                            </div>
                            <div class="card-body">
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> {{ session()->get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if(session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> {{ session()->get('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label>Type *</label>
                                        <select name="type" class="form-control purpose">
                                            <option value="deposit" {{ old('type') == 'deposit' ? 'selected' : '' }}>
                                                Deposit
                                            </option>
                                            <option value="transfer" {{ old('type') == 'transfer' ? 'selected' : '' }}>
                                                Transfer
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group account_select_div col-sm-4 d-none">
                                        <label>Select Account </label>
                                        <select name="favourite_accounts" class="form-control" id="favourite_accounts">
                                            <option value="">Select Account</option>
                                            @foreach($accounts as $account)
                                                <option value="{{ $account->account_id }}">{{ $account->name }} => {{ $account->account_id }}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger">{{ $errors->first('account_no') }}</div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>Account No. *</label>
                                        <input type="number" class="form-control account_no" name="account_no"
                                               placeholder="Account No"
                                               value="{{ old('account_no') ? : auth()->user()->account->account_number }}">
                                        <div class="text-danger">{{ $errors->first('account_no') }}</div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>Amount</label>
                                        <input type="text" class="form-control" name="amount"
                                               value="{{ old('amount') }}" placeholder="Enter Amount">
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
@push('js')
    <script>
        $(document).ready(function () {
            $(document).on('change', '.purpose', function () {
                let val = $(this).val();
                if (val == 'deposit') {
                    $('.account_select_div').addClass('d-none');
                    $('.account_no').val('{{ auth()->user()->account->account_number }}');
                } else {
                    $('.account_select_div').removeClass('d-none');
                    $('.account_no').val('');
                }
            });
            $(document).on('change', '#favourite_accounts', function () {
                let val = $(this).val();
                $('.account_no').val(val);
            });
        });
    </script>
@endpush
