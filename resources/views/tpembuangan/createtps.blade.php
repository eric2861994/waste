@extends('administrasi_master')

@section('main-section')

	<h1>Menambahkan Tempat Pembuangan Sampah Baru</h1>
	
	{!! Form::open(['url' => url('dataTP/store_tps')]) !!}
	<div class="form-group">
	<h3>Nama</h3>
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
	<h3>Lokasi</h3>
	{!! Form::text('location', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
	{!! Form::submit('tambah', ['class' => 'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}

    @include('errors.list')

@stop
