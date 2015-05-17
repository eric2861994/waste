@extends ('administrasi_master')

@section('main-section')
    <h2 class="sub-header">Ubah Pengguna sistem</h2>

    {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('nik', 'NIK:') !!}
        <input class="form-control" readonly name="nik" type="text" value="{{ $user->nik }}" id="nik">
    </div>

    <div class="form-group">
        {!! Form::label('role', 'Peran:') !!}
        {!! Form::select('role', ['waste_penyapu' => 'Petugas Penyapu Jalan', 'waste_pengangkut' => 'Petugas Pengangkut Sampah',
        'waste_tps' => 'Petugas TPS', 'waste_pemantau' => 'Pemantau Sampah'], $user->role, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('OK', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

    @include('errors.list')
@stop