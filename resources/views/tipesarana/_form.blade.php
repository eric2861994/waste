<div class="form-group">
    {!! Form::label('type', 'Tipe Sarana:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('count', 'Jumlah Sarana:') !!}
    {!! Form::text('count', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('OK', ['class' => 'btn btn-primary form-control']) !!}
</div>