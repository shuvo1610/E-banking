@extends('home.base')
@section('homebase.content')
    @include('home.partial.topbar')
    @yield('content')
    @include('home.partial.footer')
@stop
