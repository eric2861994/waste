@extends ('pengawasan_master')

@section('main-section')
    <h2 class="sub-header">Entri untuk {{ $tpakhir->name }}</h2>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Waktu</th>
                <th>Asal</th>
                <th>Volume (m<sup>3</sup>)</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($entry_tpa as $idx => $entry)
                <tr>
                    <td>{{ $idx+1 }}</td>
                    <td>{{ $entry->created_at }}</td>
                    <td>{{ $entry->tps->name }}</td>
                    <td>{{ $entry->volume }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop