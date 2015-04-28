@extends('master')

@section('main-section')
    <div class="col-md-4">
        <div class="contact_info">
            <h2>Tambah Volume Sampah TPS</h2>
            <img src="{{ url('/images/add.png') }}" width="100%" alt="add"/>
        </div>
    </div>
    <div class="col-md-8">
        <div class="contact-form">
            <h3>Tambahkan volume sampah di form ini.</h3>

            {{--entry/store--}}
            {!! Form::open(['route' => 'entry.store_tps']) !!}

            <div>
                <span>TPA</span>
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
        </div>
    </div>
    <div class="clearfix"></div>
@stop