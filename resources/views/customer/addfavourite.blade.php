@extends('dashboard.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-13">
                    <div class="card">
                        <form action="" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header">
                                <h5>Add Favourite</h5>
                            </div>
                            <div class="card-body">

                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

