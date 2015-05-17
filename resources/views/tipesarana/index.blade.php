@extends ('sarana_master')

@section ('main-section')
    <h1>Daftar Tipe Sarana</h1>

    <a href="{{ route('dataSarana.create') }}"><button class="btn btn-style">Tambah Tipe Sarana</button></a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nomor</th>
            <th>Tipe</th>
            <th>Volume (m<sup>3</sup>)</th>
            <th>Jumlah</th>
            <th>Operasi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tipes as $tipe)
            <tr>
                <td>{{ $tipe->id }}</td>
                <td>{{ $tipe->type }}</td>
                <td>{{ $tipe->volume }}</td>
                <td>{{ $tipe->count }}</td>
                <td>
                    <a href="{{ route('dataSarana.edit', $tipe->id) }}">Ubah</a> |
                    <a href="{{ route('dataSarana.destroy', $tipe->id) }}">Hapus</a> |
                    <a href="{{ route('dataSarana.show', $tipe->id) }}">Lihat</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop