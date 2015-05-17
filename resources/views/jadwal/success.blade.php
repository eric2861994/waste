@extends('administrasi_master')

@section('main-section')
    <h1>{{ $apa }} berhasil Dijadwalkan!</h1>
    <a href="{{ route('jadwal.index') }}"><button class="btn btn-style">Kembali</button></a>
@stop