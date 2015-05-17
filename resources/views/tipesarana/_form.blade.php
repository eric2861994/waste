<div class="form-group">
    {!! Form::label('type', 'Tipe Sarana:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="volume">Kapasitas Sarana (m<sup>3</sup>):</label>
    {!! Form::text('volume', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('OK', ['class' => 'btn btn-primary form-control']) !!}
</div>