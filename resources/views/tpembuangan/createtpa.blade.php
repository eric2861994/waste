@extends('administrasi_master')

@section('main-section')

	<h1>Menambahkan Tempat Pembuangan Akhir Baru</h1>
	
	{!! Form::open(['route' => 'dataTP.store_tpa']) !!}
	<div class="form-group">
	<h3>Nama</h3>
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
	<h3>Lokasi</h3>
	{!! Form::text('location', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
	{!! Form::submit('Tambah', ['class' => 'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}

    @include('errors.list')

@stop
