@extends('administrasi_master')

@section('main-section')
    <h2>Hitung Sarana</h2>

    @foreach ($analisa as $analisis)
        <h3 class="sub-header">Analisis untuk {{ $analisis['tps']->name }}</h3>
        <p>Volume yang tidak berhasil ditangani: {{ $analisis['sisa'] }} m<sup>3</sup></p>
        Hal ini dapat ditangani dengan dengan salah satu di bawah ini:
        <ul>
            @foreach ($tipeSaranas as $tipeSarana)
                <li>{{ ceil($analisis['sisa']/$tipeSarana->volume/6) }} unit {{ $tipeSarana->type }}</li>
            @endforeach
        </ul>
    @endforeach
@stop