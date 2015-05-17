@extends('pengawasan_master')

@section('main-section')
    <!--<h1 class="page-header">Dashboard</h1>-->
    <h2 class="sub-header">Volume di Tempat Pembuangan Sementara</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Volume</th>
                <th>Operasi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tpsampahs as $idx => $tpsampah)
                <tr>
                    <td>{{ $idx + 1 }}</td>
                    <td>{{ $tpsampah->name }}</td>
                    <td>{{ $tpsampah->volume() }}</td>
                    <td><a href="{{ route('dataTP.show_tps', $tpsampah->id) }}">lihat</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <h2 class="sub-header">Volume di Tempat Pembuangan Akhir</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Volume</th>
                <th>Operasi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tpakhirs as $idx => $tpakhir)
                <tr>
                    <td>{{ $idx + 1 }}</td>
                    <td>{{ $tpakhir->name }}</td>
                    <td>{{ $tpakhir->volume() }}</td>
                    <td><a href="{{ route('dataTP.show_tpa', $tpakhir->id) }}">lihat</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop