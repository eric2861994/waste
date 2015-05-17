@extends ('administrasi_master')

@section('main-section')
    <h2 class="sub-header">Daftar Pengguna</h2>

    <a href="{{ route('user.create') }}"><button class="btn btn-style">Tambah Pengguna</button></a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>NIK</th>
                <th>Peran</th>
                <th>Jadwal</th>
                <th>Operasi</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($users as $idx => $user)
                <tr>
                    <td>{{ $idx+1 }}</td>
                    <td>{{ $user->nik }}</td>
                    <td>{{ $user->peran() }}</td>
                    @if ($user->penghubung)
                        <td><a href="{{ route('jadwal.show', $user->penghubung->jadwal->id) }}">lihat</a></td>
                    @else
                        <td>Tidak ada Jadwal</td>
                    @endif
                    <td><a href="{{ route('user.edit', $user->id) }}">Ubah</a> |
                        <a href="{{ route('user.destroy', $user->id) }}">Hapus</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@stop