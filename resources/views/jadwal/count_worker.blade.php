@extends('administrasi_master')

@section('main-section')
    <h2 class="sub-header">Hitung Petugas</h2>

    <p>Petugas penyapu jalan yang diperlukan sebanyak <b>{{ $butuhPenyapu }}</b></p>
    <p>Petugas penyapu jalan yang ada sebanyak
        @if ($skrgPenyapu < $butuhPenyapu)
            <b style="color:red">{{ $skrgPenyapu }}</b>
        @else
            <b style="color:blue">{{ $skrgPenyapu }}</b>
        @endif
    </p>
    <p>Petugas pengangkut sampah yang diperlukan sebanyak <b>{{ $butuhSupir }}</b></p>
    <p>Petugas ppengangkut sampah yang ada sebanyak
        @if ($skrgSupir < $butuhSupir)
            <b style="color:red">{{ $skrgSupir }}</b>
        @else
            <b style="color:blue">{{ $skrgSupir }}</b>
        @endif
    </p>
@stop