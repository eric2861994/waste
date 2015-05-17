@extends('master')


@section('main-section')
    <div class="col-md-4">
        <h2 class="sub-header">Pengawasan</h2>
        <a href="{{ route('dataTP.summary') }}"><button class="btn btn-style">Ringkas</button></a>
        <a href="{{ route('dataTP.detailed') }}"><button class="btn btn-style">Mingguan</button></a>
        <img src="{{ url('/images/magnify.png') }}" width="100%" alt="view"/>
    </div>
    <div class="col-md-8">
        @yield('main-section')
    </div>
@overwrite
