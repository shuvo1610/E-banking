@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-6 col-md-6 col-lg-7">
                    <div class="card">
                        <form action="{{route('e_branch.save')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header" >
                                <h5>Add E-Bank Branch</h5>
                            </div>
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <label>Branch *</label>
                                    <input type="text" class="form-control" name="branch" value="{{ old('branch') }}">@if($errors->has('branch'))
                                        <div class="text-danger">{{ $errors->first('branch') }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <label>District *</label>
                                    <input type="text" class="form-control" name="district" value="{{ old('district')}}">@if($errors->has('district'))
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

