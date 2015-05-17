@extends('master')


@section('main-section')
    <div class="col-md-4">
        <h2 class="sub-header">Sarana</h2>
        <a href="{{ route('sarana.index') }}">
            <button style="margin-top:10px;" class="btn_style">Semua</button>
        </a><br/>
        <a href="{{ route('dataSarana.index') }}">
            <button style="margin-top:10px;" class="btn btn_style">Tipe Sarana</button>
        </a>
    </div>
    <div class="col-md-8">
        @yield('main-section')
    </div>
@overwrite
