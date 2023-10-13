@extends('dashboard.base')

@section('base_content')

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
        @include('dashboard.partial.topbar')
        @include('dashboard.partial.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('dashboard.partial.footer')
    </div>
    </div>
@stop
