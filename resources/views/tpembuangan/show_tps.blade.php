@extends ('administrasi_master')

@section('main-section')
    <h2 class="sub-header">Entri untuk {{ $tpsampah->name }}</h2>

    <h3 class="sub-header">Masukan</h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Waktu</th>
                <th>Volume (m<sup>3</sup>)</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($entry_tps as $idx => $entry)
                <tr>
                    <td>{{ $idx+1 }}</td>
                    <td>{{ $entry->created_at }}</td>
                    <td>{{ $entry->volume }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <h3 class="sub-header">Keluaran</h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Waktu</th>
                <th>Volume</th>
                <th>Tujuan</th>
            </tr>
            </thead>
            @foreach ($entry_tpa as $idx => $entry)
                <tr>
                    <td>{{ $idx+1 }}</td>
                    <td>{{ $entry->created_at }}</td>
                    <td>{{ $entry->volume }}</td>
                    <td>{{ $entry->tpa->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@stop