@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-6 col-md-6 col-lg-7">
                    <div class="card">
                        <form action="{{ route('bank.update',$bank->id) }}" method="POST" enctype="multipart/form-data">@csrf
                            @method('put')
                            <div class="card-header">
                                <h5>Edit Bank</h5>
                            </div>
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <label>Bank Name *</label>
                                    <input type="text" class="form-control" name="bank_name"
                                           value="{{ $bank->bank_name }}">@if($errors->has('bank_name'))
                                        <div class="text-danger">{{ $errors->first('bank_name') }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <label>Branch *</label>
                                    <input type="text" class="form-control inputtags" name="branch"
                                           value="{{ $bank->branch }}">
                                    <div class="text-danger">{{ $errors->first('branch') }}</div>
                                </div>
                                <div class="col-sm-12">
                                    <label>District *</label>
                                    <input type="text" class="form-control" name="district"
                                           value="{{ $bank->district }}">@if($errors->has('district'))
                                        <div class="text-danger">{{ $errors->first('district') }}</div>
                                    @endif
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Add</button>
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
        $(".inputtags").tagsinput('items');
    </script>
@endpush

