<!DOCTYPE HTML>
<html>
<head>
<title>WASTE - Waste Acquisition System Technological Enhancement</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!--  webfonts  -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<!-- // webfonts  -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<link href="css/dashboard.css" rel="stylesheet" type="text/css" media="all" />
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
		      <a class="navbar-brand" href="index"><img src="images/logo.png" alt="" class="img-responsive"/> </a>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="menu nav navbar-nav ">
		        <li><a href="index">home</a></li>
		        <li><a href="entry">Entri Sampah</a></li>
		        <li class="active"><a href="volumeTPA">Pengawasan Sampah</a></li>
		        <li><a href="dataTP">Administrasi Sampah</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		</div>
		<ol class="breadcrumb">
		  <li><a href="index">Home</a></li>
		  <li class="active">Pengawasan Sampah</li>
		</ol>
	</div>
</div>
<div class="main"><!-- start main -->
<div class="container">
	<div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
		  <h2 class="sub-header">Pengawasan</h2>
		  <a href="volumeTPS"><button style="margin-top:10px;" class="btn_style">Volume TPS</button></a>
		  <a href="volumeTPA"><button style="margin-top:10px;" class="btn_style">Volume TPA</button></a>
		  <img src="images/magnify.png" width="100%" alt="view"/>
        </div>
        <div class="col-md-8">
          <!--<h1 class="page-header">Dashboard</h1>-->
          <h2 class="sub-header">Volume di TPA</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Volume</th>
                </tr>
              </thead>
<?php $entry_num = 0; ?>
              <tbody>
				@foreach ($tpakhirs as $tpakhir)
				<?php $entry_num += 1; ?>
				<tr>
                  <td>{{ $entry_num }}</td>
                  <td>{{ $tpakhir->name }}</td>
				  <?php $total_volume = 0; ?>
				  @foreach ($tpakhir->entries as $entry)
					<?php $total_volume += $entry->volume; ?>
				  @endforeach
				  <td>{{ $total_volume }}</td>
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
</body>
</html>