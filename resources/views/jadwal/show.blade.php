@extends('administrasi_master')

@section('main-section')
    <h2 class="sub-header">Detail jadwal {{ $jadwal->id }}: {{ $jadwal->summary }}</h2>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Waktu</th>
                <th>Deskripsi</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($jadwal->details as $detailJadwal)
                <tr>
                    <td>{{ $detailJadwal->start_time->toTimeString() . ' - ' . $detailJadwal->end_time->toTimeString() }}</td>
                    <td>{{ $detailJadwal->description }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop