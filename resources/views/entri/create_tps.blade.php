@extends('master')

@section('main-section')
    <div class="col-md-4">
        <div class="contact_info">
            <h2>Tambah Volume Sampah TPS</h2>
            <a href="{{ route('entry.create_tpa') }}"><button style="margin-top:10px;" class="btn_style">TPA</button></a>
            <img src="{{ url('/images/add.png') }}" width="100%" alt="add"/>
        </div>
    </div>
    <div class="col-md-8">
        <div class="contact-form">
            <h3>Tambahkan volume sampah di form ini.</h3>

            {!! Form::open(['route' => 'entry.store_tps']) !!}

            <div>
                <span>TPS</span>
                <span>
                    <select class="form-control" name="tps_id" id="tps_id">
                        @foreach ($tpsampahs as $tpsampah)
                            <option value="{{ $tpsampah->id }}">{{ $tpsampah->name }}</option>
                        @endforeach
                    </select>
                </span>
            </div>
            <div>
                <span>Volume (dalam meter kubik)</span>
                <span><input name="volume" type="text" class="form-control" id="volume"></span>
            </div>
            <div>
                <span><input type="submit" value="submit"></span>
            </div>
            {!! Form::close() !!}

            @include ('errors.list')
        </div>
    </div>
    <div class="clearfix"></div>
@stop