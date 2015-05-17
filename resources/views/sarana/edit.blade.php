@extends('sarana_master')

@section('main-section')
    <h2>Ubah Sarana</h2>

    {!! Form::model($sarana, ['route' => ['sarana.update', $sarana->id], 'method' => 'put']) !!}

    @include('sarana._form')

    {!! Form::close() !!}

    @include ('errors.list')
@stop