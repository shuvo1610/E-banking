@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-13">
                    <div class="card">
                        <form action="{{route('fund.transfer')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header justify-content-between">
                                <h5>Fund Transfer in Other Bank</h5>
                            </div>
                            <div class=" card-header">
                                <p class="text-danger">{{ session()->get('error')}}</p>
                                <p class="text-primary">{{ session()->get('Success')}}</p>
                            </div>
                            <div class="card-body">
                                <div class="form-group ">
                                    <label>Transfer Type: *</label>
                                    <select name="status" id="transfer_mode" class="form-control">
                                        <option value="1">NPSB(Instant Transfer)</option>
                                        <option value="0">BEFTN(Regular Transfer)</option>
                                    </select>
                                </div>
                                <div class="row ">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" name="first_name"
                                               value="{{ old('first_name') }}">@if($errors->has('first_name'))
                                            <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name"
                                               value="{{ old('last_name') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>From Account *</label>
                                        <input type="text" class="form-control" name="from"
                                               value="{{ old('account_no') ? : auth()->user()->account->account_number }}">
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>To Account</label>
                                        <input type="text" class="form-control" name="to"
                                               value="{{ old('to') }}">@if($errors->has('to'))
                                            <div class="text-danger">{{ $errors->first('to') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6   ">
                                        <label>Available Amount *</label>
                                        <input type="text" class="form-control" name="balance"
                                               value="{{ old('balance') ? : auth()->user()->account->balance }}">@if($errors->has('balance'))
                                            <div class="text-danger">{{ $errors->first('balance') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>Transfer Amount *</label>
                                        <input type="text" class="form-control"
                                               name="transfer_amount">@if($errors->has('transfer_amount'))
                                            <div class="text-danger">{{ $errors->first('transfer_amount') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row npsb_section">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Bank Name *</label>
                                            <select name="bank_name" id="bank_name" class="form-control">
                                                <option value="">Select Bank Name</option>
                                                @foreach($banks as $bank)
                                                    <option value="{{$bank->branch}}" data-branch="{{ json_encode($bank->branch) }}">{{$bank->bank_name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('bank_name'))
                                                <div class="text-danger">{{ $errors->first('bank_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Branch *</label>
                                        <select name="branch" id="branch" class="form-control">
                                            <option value="">Select Branch</option>
                                        </select>
                                        @if($errors->has('branch'))
                                            <div class="text-danger">{{ $errors->first('branch') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label>City *</label>
                                        <select name="city" id="city" class="form-control">
                                            @foreach($banks as $bank)
                                                <option value="{{$bank->district}}">{{$bank->district}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('city'))
                                            <div class="text-danger">{{ $errors->first('city') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row d-none beftn_section">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Bank Name *</label>
                                            <input type="text" name="beftn_bank_name" class="form-control">
                                            @if($errors->has('bank_name'))
                                                <div class="text-danger">{{ $errors->first('bank_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Branch *</label>
                                        <input type="text" name="beftn_branch" class="form-control">
                                        @if($errors->has('branch'))
                                            <div class="text-danger">{{ $errors->first('branch') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label>City *</label>
                                        <input type="text" name="beftn_city" class="form-control">
                                        @if($errors->has('city'))
                                            <div class="text-danger">{{ $errors->first('city') }}</div>
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
@push('js')
    <script>
        $(document).ready(function (){
            $(document).on('change','#transfer_mode',function (){
                let val = $(this).val();
                if(val == 1)
                {
                    $('.npsb_section').removeClass('d-none');
                    $('.beftn_section').addClass('d-none');
                }
                else{
                    $('.npsb_section').addClass('d-none');
                    $('.beftn_section').removeClass('d-none');
                }
            });
            $(document).on('change','#bank_name',function (){
                let val = $(this).find(':selected').data('branch');
                let branches = val.replaceAll('"','').split(',');
                let html = '<option value="">Select Branch</option>';
                for (let i = 0; i < branches.length; i++) {
                    let branch = branches[i];
                    html += '<option value="'+branch+'">'+branch+'</option>';
                }
                $('#branch').html(html);
            });
        });
    </script>
@endpush
