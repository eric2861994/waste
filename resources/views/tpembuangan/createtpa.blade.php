<!DOCTYPE HTML>
<html>
<head>
<title>WASTE - Waste Acquisition System Technological Enhancement</title>
<!-- Bootstrap -->
<link href="{{ url('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ url('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<!-- // webfonts  -->
<link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ url('css/dashboard.css') }}" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="container">
	<h1>Menambahkan Tempat Pembuangan Akhir Baru</h1>
	
	{!! Form::open(['url' => url('dataTP/store')]) !!}
	<input name="_poster" type="hidden" value="tpa">
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
</div>
</body>
</html>