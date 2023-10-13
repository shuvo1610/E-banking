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
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap-tagsinput.css')}}">

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

@yield('base_content')

<body>
<!-- General JS Scripts -->
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
<script src="{{ url('assets/js/bootstrap-tagsinput.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{ url('assets/js/index.js')}}"></script>
<script src="{{ url('assets/js/index.js')}}"></script>

<!-- Template JS File -->
<script src="{{ url('assets/js/scripts.js')}}"></script>
<script src="{{ url('assets/js/custom.js')}}"></script>
@stack('js')
</body>
</html>
