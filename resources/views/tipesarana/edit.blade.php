@extends ('master')

@section ('main-section')
    <h1>Ubah Tipe Sarana</h1>

    {!! Form::model($tipesarana, ['route' => ['dataSarana.update', $tipesarana->id], 'method' => 'put']) !!}

    @include ('tipesarana._form')

    {!! Form::close() !!}
@stop