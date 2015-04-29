@extends('plain_master')

@section('content')
    <h1>Debug Detail Jadwal</h1>

    {!! Form::open(['route' => 'detailJadwal.store']) !!}

    {{--'jadwal_id', 'start_time', 'end_time', 'description'--}}

    <div class="form-group">
        {!! Form::label('jadwal_id', 'ID Jadwal:') !!}
        {!! Form::text('jadwal_id', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('start_time', 'Waktu Mulai:') !!}
        {!! Form::text('start_time', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('end_time', 'Waktu Selesai:') !!}
        {!! Form::text('end_time', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Kegiatan:') !!}
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('OK', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    @include ('errors.list')
@stop