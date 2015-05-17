@extends('administrasi_master')

@section('main-section')
    <h2 class="sub-header">Hitung Petugas</h2>

    <p>Petugas penyapu jalan yang diperlukan sebanyak <b>{{ $butuhPenyapu }}</b></p>
    <p>Petugas pengangkut sampah yang diperlukan sebanyak <b>{{ $butuhSupir }}</b></p>
@stop