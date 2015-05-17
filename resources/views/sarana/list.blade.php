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
                <th>Jadwal</th>
                <th>Operasi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($saranas as $idx => $sarana)
                <tr>
                    <td>{{ $idx+1 }}</td>
                    <td>{{ $sarana->plate_number }}</td>
                    <td>{{ $sarana->tipeSarana->type }}</td>
                    @if ($sarana->jadwal)
                        <td><a href="{{ route('jadwal.show', $sarana->jadwal->id) }}">Lihat</a></td>
                    @else
                        <td>Tidak ada jadwal</td>
                    @endif
                    <td><a href="{{ route('sarana.edit', $sarana->id) }}">ubah</a> |
                        <a onclick="return verify();" href="{{ route('sarana.destroy', $sarana->id) }}">hapus</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop

@section ('script-section')
<script type="text/javascript">
    function verify() {
        return confirm("Apakah anda yakin ingin menghapus?");
    }
</script>
@stop