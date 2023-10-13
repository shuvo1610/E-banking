<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>E-Banking Dashboard</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('assets/css/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/components.css')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
</head>
<body>
<div class="buttons add-button" style="text-align: right">
    <a href="{{route('dashboard.index')}}" class="btn btn-icon icon-right btn btn-primary">
        <i class='bx bx-arrow-back'></i>Back</a>
</div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{auth()->user()->image}}" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header"><h4>Punch In</h4></div>
                        <div class="card-body">
                            <p class="text-danger">{{ session()->get('error')}}</p>
                            <form method="POST" action="{{route('employee.attendance')}}" class="needs-validation" novalidate="">@csrf
                                <div class="form-group">
                                    <label for="email">User ID</label>
                                    <input id="user_id" type="number" class="form-control" name="user_id" tabindex="1" required autofocus>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="{{ url('assets/js/jquery.min.js')}}"></script>
<script src="{{ url('assets/js/popper.js')}}"></script>
<script src="{{ url('assets/js/tooltip.js')}}"></script>
<script src="{{ url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ url('assets/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{ url('assets/js/moment.min.js')}}"></script>
<script src="{{ url('assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<script src="{{ url('assets/js/jquery.sparkline.min.js')}}"></script>
<script src="{{ url('assets/js/chart.min.js')}}"></script>
<script src="{{ url('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ url('assets/js/summernote-bs4.js')}}"></script>
<script src="{{ url('assets/js/jquery.chocolat.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{ url('assets/js/index.js')}}"></script>

<!-- Template JS File -->
<script src="{{ url('assets/js/scripts.js')}}"></script>
<script src="{{ url('assets/js/custom.js')}}"></script>
</body>
</html>

