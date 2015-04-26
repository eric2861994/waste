@extends ('master')

@section ('main-section')
    <h1>Sarana</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nomor</th>
            <th>Tipe</th>
            <th>Jumlah</th>
            <th>Operasi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tipes as $tipe)
            <tr>
                <td>{{ $tipe->id }}</td>
                <td>{{ $tipe->type }}</td>
                <td>{{ $tipe->count }}</td>
                <td>Edit|Hapus</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop