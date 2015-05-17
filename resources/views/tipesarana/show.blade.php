@extends('sarana_master')

@section('main-section')

    <h1>Daftara sarana {{$tipesarana->type}}</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nomor</th>
            <th>Nomor Polisi</th>
            <th>Jadwal</th>
        </tr>
        </thead>
        @foreach($tipesarana->saranas as $idx => $sarana)
            <tr>
                <td>{{ $idx+1 }}</td>
                <td>{{ $sarana->plate_number }}</td>
                @if ($sarana->jadwal)
                    <td><a href="{{ route('jadwal.show', $sarana->jadwal->id) }}">Lihat</a></td>
                @else
                    <td>Tidak ada Jawal</td>
                @endif
            </tr>
        @endforeach
    </table>

@endsection