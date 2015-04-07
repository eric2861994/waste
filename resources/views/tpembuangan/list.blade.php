<!DOCTYPE HTML>
<html>
<head>
<title>WASTE - Waste Acquisition System Technological Enhancement</title>
<!-- Bootstrap -->
<link href="{{ url('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ url('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!--  webfonts  -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<!-- // webfonts  -->
<link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>

<link href="{{ url('css/dashboard.css') }}" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="header_bg"><!-- start header -->
	<div class="container">
		<div class="row header">
		<nav class="navbar" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.html"><img src="{{ url('images/logo.png') }}" alt="" class="img-responsive"/> </a>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="menu nav navbar-nav ">
		        <li><a href="index.html">home</a></li>
		        <li><a href="entry.html">Entri Sampah</a></li>
		        <li><a href="volumeTPS.html">Pengawasan Sampah</a></li>
		        <li class="active"><a href="dataTP.html">Administrasi Sampah</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		</div>
		<ol class="breadcrumb">
		  <li><a href="index.html">Home</a></li>
		  <li class="active">Pengawasan Sampah</li>
		</ol>
	</div>
</div>
<div class="main"><!-- start main -->
<div class="container">
	<div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
		  <h2 class="sub-header">Administrasi</h2>
		  <h4>Disini anda bisa mengubah data TPS dan TPA, Petugas dan Admin</h4>
          <h2 class="sub-header">Menu</h2>
		  <a href="dataTP"><button style="margin-top:10px;" class="btn_style">TPS-TPA</button></a><br/>
		  <a href="dataPetugas"><button style="margin-top:10px;" class="btn_style">Petugas</button></a><br/>
		  <a href="dataAdmin.html"><button style="margin-top:10px;" class="btn_style">Admin</button></a><br/>
        </div>
        <div class="col-md-8">
          <!--<h1 class="page-header">Dashboard</h1>-->
          <h2 class="sub-header">Daftar TPS dan TPA</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tipe</th>
                  <th>Nama TP</th>
                  <th>Lokasi</th>
                  <th>Manage...</th>
                </tr>
              </thead>
<?php $entry_num = 0; ?>
              <tbody>
				@foreach ($tpsampahs as $tpsampah)
				<?php $entry_num += 1; ?>
				<tr>
					<td id="{{ 'real_id' . $entry_num }}" my_value="{{ $tpsampah->id }}">{{ $entry_num }}</td>
					<td id="{{ 'tipe' . $entry_num }}">TPS</td>
					<td id="{{ 'nama' . $entry_num }}">{{ $tpsampah->name }}</td>
					<td id="{{ 'lokasi' . $entry_num }}">{{ $tpsampah->location }}</td>
					<td><a href="#" class="editButt" id="{{ $entry_num }}">edit</a> | <a href="#" id="{{ $entry_num }}" class="delButt">delete</a></td>
				</tr>
				@endforeach
				
				@foreach ($tpakhirs as $tpakhir)
				<?php $entry_num += 1; ?>
				<tr>
					<td>{{ $entry_num }}</td>
					<td id="{{ 'tipe' . $entry_num }}">TPA</td>
					<td id="{{ 'nama' . $entry_num }}">{{ $tpakhir->name }}</td>
					<td id="{{ 'lokasi' . $entry_num }}">{{ $tpakhir->location }}</td>
					<td><a href="#" class="editButt" id="{{ $entry_num }}">edit</a> | <a href="#" id="{{ $entry_num }}" class="delButt">delete</a></td>
				</tr>
				@endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
<div class="floatEdit">
	<div class="container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-9 col-sm-offset-3 col-md-6 col-md-offset-3 popup">
				  <div class="contact-form">
				  	<h3>Edit TPS/TPA</h3>
					    <form method="post" action="contact-post.html" id="submissionform">
							<input type="hidden" class="form-control" id="id" value="-diambil dynamically pake JS-" style="display:none;">
							<div>
						    	<span>TPS/TPA</span>
						    	<span> 
									<select class="form-control" id="TPtype">
									  <option value="tps">Tempat Pembuangan Sampah</option>
									  <option value="tpa">Tempat Pembuangan Akhir</option>
									</select> 
								</span>
						    </div>
					    	<div>
						    	<span>Nama</span>
						    	<span><input type="text" class="form-control" id="nama" value="-diambil dynamically pake JS-"></span>
						    </div>
						    <div>
						    	<span>Lokasi</span>
						    	<span><input type="text" class="form-control" id="lokasi" value="-diambil dynamically pake JS-"></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="submit" id="doSubmit"><input type="submit" value="cancel" id="cancelSubmit" style="margin-right: 20px;"></span>
						  </div>
					    </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer_btm"><!-- start footer_btm -->
	<div class="container">
		<div class="row  footer1">
			<div class="col-md-5">
				<div class="soc_icons">
					<ul class="list-unstyled">
						<li><a class="icon1" href="#"></a></li>
						<li><a class="icon2" href="#"></a></li>
						<li><a class="icon3" href="#"></a></li>
						<li><a class="icon4" href="#"></a></li>
						<li><a class="icon5" href="#"></a></li>
						<div class="clearfix"></div>
					</ul>	
				</div>
			</div>
			<div class="col-md-7 copy">
				<p class="link text-right"><span>&#169; WASTE - All rights reserved</span></p>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
    $(".editButt").click(function(){ //when edit button is pressed
		$("input#id").attr("value",$("#real_id"+$(this).attr('id')).attr('my_value'));
		if ($("#tipe"+$(this).attr('id')).html() === "TPA") {
			$("select#TPtype").val("tpa");
		} else {
			$("select#TPtype").val("tps");
		}
		$("input#lokasi").attr("value",$("#lokasi"+$(this).attr('id')).html());
		$("input#nama").attr("value",$("#nama"+$(this).attr('id')).html());
        $(".popup").attr("style","display:block !important;"); // show popup
    });
	$("#cancelSubmit").click(function(event) { //cancel button on popup pressed
		event.preventDefault();
		$(".popup").attr("style","display:none !important;");
	});
	$("#doSubmit").click(function(event) { //submit button pressed
		event.preventDefault();
	
		//DO AJAX SUBMIT HERE (form#submissionform) K THX. - dalva
		$.ajax({
			url: 'dataTP/update',
			type: 'POST',
			data: {	_token:		$('meta[name="csrf-token"]').attr('content'),
					_poster:	$("select#TPtype").val(),
					id:			$("input#id").val(),
					name:		$("input#nama").val(),
					location:	$("input#lokasi").val() },
			success: function(result) {
				// Do something with the result
				window.location.href = result;
			}
		});
		
		$(".floatEdit").attr("style","display:none !important;"); // then hide the popup
	});
	$(".delButt").click(function(event){ //when delete button is pressed
		event.preventDefault();
		
		//DO AJAX DELETE HERE (form#submissionform) K THX. - dalva
		$.ajax({
			url: 'dataTP/destroy',
			type: 'POST',
			data: {	_token:		$('meta[name="csrf-token"]').attr('content'),
					_poster:	$("#tipe"+$(this).attr('id')).html().toLowerCase(),
					id:			$("#real_id"+$(this).attr('id')).attr('my_value') },
			success: function(result) {
				// Do something with the result
				window.location.href = result;
			}
		});
		
		alert("user ID " + $(this).attr('id') +" deleted.");
    });
});
</script>
</body>
</html>