@extends('administrasi_master')

@section('main-section')
    <h1>Menambahkan Petugas Baru</h1>

    {!! Form::open(['route' => 'dataPetugas.store']) !!}
    <div class="form-group">
        {!! Form::label('nip', 'NIP') !!}
        {!! Form::text('nip', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Nama') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role', 'Peran') !!}
        {!! Form::text('role', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Tambah', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    @include('errors.list')
@stop