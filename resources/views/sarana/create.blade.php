@extends('sarana_master')

@section('main-section')
    <h2>Tambah Sarana</h2>

    {!! Form::open(['route' => 'sarana.store']) !!}

    @include('sarana._form')

    {!! Form::close() !!}

    @include ('errors.list')
@stop