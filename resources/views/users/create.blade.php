@extends ('administrasi_master')

@section('main-section')
    <h2 class="sub-header">Tambah Pengguna sistem</h2>

    {!! Form::open(['route' => 'user.store']) !!}
    <div class="form-group">
        {!! Form::label('nik', 'NIK:') !!}
        {!! Form::text('nik', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role', 'Peran:') !!}
        {!! Form::select('role', ['waste_penyapu' => 'Petugas Penyapu Jalan', 'waste_pengangkut' => 'Petugas Pengangkut Sampah',
                'waste_tps' => 'Petugas TPS', 'waste_pemantau' => 'Pemantau Sampah'], 'waste_penyapu', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('OK', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

    @include('errors.list')
@stop