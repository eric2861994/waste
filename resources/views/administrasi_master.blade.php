@extends('master')


@section('main-section')
    <div class="col-md-4">
        <h2 class="sub-header">Administrasi</h2>
        <h4>Disini anda bisa mengubah data TPS dan TPA, Pengguna dan Jadwalan</h4>

        <h2 class="sub-header">Menu</h2>
        <a href="{{ route('dataTP.index') }}">
            <button style="margin-top:10px;width:150px" class="btn_style">TPS-TPA</button>
        </a><br/>
        <a href="{{ route('user.index') }}">
            <button style="margin-top:10px;width:150px" class="btn_style">Pengguna</button>
        </a><br/>
        <a href="{{ route('jadwal.index') }}">
            <button style="margin-top:10px;width:150px" class="btn_style">Penjadwalan</button>
        </a>
    </div>
    <div class="col-md-8">
        @yield('main-section')
    </div>
@overwrite
