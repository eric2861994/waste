@extends('master')

@if (Auth::user()->penghubung)
    <?php $jadwal = Auth::user()->penghubung->jadwal ?>
@else
    <?php $jadwal = null; ?>
@endif

@section('main-section')
    @if ($jadwal)
        <h2 class="sub-header">{{ $jadwal->summary }}</h2>

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
    @else
        <h1 align="center">Anda tidak memiliki jadwal!</h1>
    @endif
@stop