@extends('administrasi_master')

@section('main-section')
    <h2 class="sub-header">Menu Penjadwalan</h2>
    <a href="{{ route('jadwal.jadwalSarana') }}"><button style="margin-top:10px;width:200px" class="btn btn-style">Jadwalkan Sarana</button></a><br/>
    <a href="{{ route('jadwal.hitungSarana') }}"><button style="margin-top:10px;width:200px" class="btn btn-style">Hitung Sarana</button></a><br/>
    <a href="{{ route('jadwal.jadwalPetugas') }}"><button style="margin-top:10px;width:200px" class="btn btn-style">Jadwalkan Petugas</button></a><br/>
    <a href="{{ route('jadwal.hitungPetugas') }}"><button style="margin-top:10px;width:200px" class="btn btn-style">Hitung Petugas</button></a>
@stop