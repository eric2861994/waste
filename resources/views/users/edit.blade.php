@extends ('administrasi_master')

@section('main-section')
    <h2 class="sub-header">Ubah Pengguna sistem</h2>

    {!! Form::model($user) !!}
    <div class="form-group">
        {!! Form::label('nik', 'NIK:') !!}
        {!! Form::text('nik', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role', 'Peran:') !!}
        {!! Form::select('role', ['waste_petugas' => 'Petugas Lapangan', 'waste_tps' => 'Petugas TPS', 'waste_pemantau'
        => 'Pemantau Sampah'], $user->role, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('OK', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

    @include('errors.list')
@stop