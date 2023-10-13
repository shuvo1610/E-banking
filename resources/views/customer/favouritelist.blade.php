@extends('dashboard.master')
@section('content')
    <div class="main-content" style="min-height: 482px;">
        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
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

                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Favourite List</h3>
                                <a href="#" data-target="#add_account" data-toggle="modal" class="btn btn-primary">Add Account</a>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-stripe">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Name</td>
                                        <td>Account No.</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($account_lists as $key=> $account)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ @$account->name }}</td>
                                            <td>{{ @$account->account_id }}</td>
                                            <td>
                                                <form action="{{ route('saved_accounts.destroy',$account->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="add_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('saved_accounts.store') }}" method="post">@csrf
                    <div class="modal-body">
                        <div class="form-group ">
                            <label>Name *</label>
                            <input type="text" class="form-control" name="name">
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group ">
                            <label>Account No. *</label>
                            <input type="number" class="form-control" name="account_no">
                            <div class="text-danger">{{ $errors->first('account_no') }}</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection


