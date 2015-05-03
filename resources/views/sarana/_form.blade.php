<div class="form-group">
    {!! Form::label('type_id', 'Tipe Sarana') !!}
    <select class="form-control" name="type_id" id="type_id">
        @foreach ($tipesaranas as $tipesarana)
            <option value="{{ $tipesarana->id }}">{{ $tipesarana->type }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('plate_number', 'Nomor Polisi') !!}
    {!! Form::text('plate_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('OK', ['class' => 'btn btn-primary']) !!}
</div>