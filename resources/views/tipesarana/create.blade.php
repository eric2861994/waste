@extends ('sarana_master')

@section ('main-section')
    <h1>Tambah Tipe Sarana</h1>

    {!! Form::open(['route' => 'dataSarana.store']) !!}

    @include ('tipesarana._form')

    {!! Form::close() !!}

    @include ('errors.list')
@stop