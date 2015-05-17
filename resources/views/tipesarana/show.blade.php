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
                <td>Lihat</td>
            </tr>
        @endforeach
    </table>

@endsection