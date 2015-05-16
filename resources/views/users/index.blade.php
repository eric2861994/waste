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
            </tr>
            </thead>

            <tbody>
            @foreach ($users as $idx => $user)
                <tr>
                    <td>{{ $idx+1 }}</td>
                    <td>{{ $user->nik }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@stop