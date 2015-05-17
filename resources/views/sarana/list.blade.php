@extends ('sarana_master')

@section('main-section')
    <!--<h1 class="page-header">Dashboard</h1>-->
    <h2 class="sub-header">Daftar Sarana</h2>
    <a href="{{ route('sarana.create') }}">
        <button class="btn btn-style">Tambah Sarana</button>
    </a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nomor Polisi</th>
                <th>Jenis</th>
                <th>Operasi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($saranas as $idx => $sarana)
                <tr>
                    <td>{{ $idx+1 }}</td>
                    <td>{{ $sarana->plate_number }}</td>
                    <td>{{ $sarana->tipeSarana->type }}</td>
                    <td><a href="{{ route('sarana.edit', $sarana->id) }}">ubah</a> |
                        <a href="{{ route('sarana.destroy', $sarana->id) }}">hapus</a> |
                        lihat</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop