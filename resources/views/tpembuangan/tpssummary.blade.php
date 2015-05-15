@extends('pengawasan_master')

@section('main-section')
    <!--<h1 class="page-header">Dashboard</h1>-->
    <h2 class="sub-header">Volume di Tempat Pembuangan</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Volume</th>
            </tr>
            </thead>
            <?php $entry_num = 0; ?>
            <tbody>
            @foreach ($tpsampahs as $tpsampah)
                <?php $entry_num += 1; ?>
                <tr>
                    <td>{{ $entry_num }}</td>
                    <td>{{ $tpsampah->name }}</td>
                    <?php $total_volume = 0; ?>
                    @foreach ($tpsampah->entries as $entry)
                        <?php $total_volume += $entry->volume; ?>
                    @endforeach
                    @foreach ($tpsampah->entrytpas as $entry)
                        <?php $total_volume -= $entry->volume; ?>
                    @endforeach
                    <td>{{ $total_volume }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop