@extends ('administrasi_master')

@section('main-section')
    <h2 class="sub-header">Daftar Pengguna</h2>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>NIK</th>
                <th>Peran</th>
                <th>Jadwal</th>
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
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@stop