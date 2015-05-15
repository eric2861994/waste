<!DOCTYPE HTML>
<html>
<head>
    <title>WASTE - Waste Acquisition System Technological Enhancement</title>
    <!-- Bootstrap -->
    <link href="{{ url('/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ url('/css/bootstrap.css') }}" rel='stylesheet' type='text/css'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--  webfonts  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <!-- // webfonts  -->
    <link href="{{ url('/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <!-- start plugins -->
    <script type="text/javascript" src="{{ url('/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/bootstrap.min.js') }}"></script>

    <link href="{{ url('/css/dashboard.css') }}" rel="stylesheet" type="text/css" media="all"/>
</head>


<body>
<div class="header_bg"><!-- start header -->
    <div class="container">
        <div class="row header">
            <nav class="navbar" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index"><img src="{{ url('/images/logo.png') }}" alt=""
                                                                  class="img-responsive"/> </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="menu nav navbar-nav "> <!-- NOTE: the active state changes depending on the page -->
                            <!-- BACKEND TODO: set class="active" depending on current page. -->
                            <li><a href="{{ url('/') }}">home</a></li>
                            <li><a href="{{ route('entry.create_tps') }}">Entri</a></li>
                            <li><a href="{{ url('/volumeTPS') }}">Pengawasan</a></li>
                            <li><a href="{{ route('dataTP.index') }}">Administrasi</a></li>
                            <li><a href="{{ route('sarana.index') }}">Sarana</a></li>
                            <li><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
                            @if (Auth::check())
                                <li id="logoutLink"><a href="{{ url('/auth/logout') }}">Logout</a></li>
                                <script type="text/javascript">
                                    $('#logoutLink').click(function(e) {
                                        console.log('LOGOUT JALAN KOK!');
                                        $.ajax({
                                            type: 'get',
                                            url: 'http://e-gov-bandung.tk/dukcapil/api/public/auth/logout',
                                            success: function(data) {
                                            },
                                            error: function(data) {
                                                // alert(data);
                                            }
                                        });
                                    })
                                </script>
                            @endif
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
        <ol class="breadcrumb"> <!-- TODO: this changes for each page -->
            <li><a href="index">Home</a></li>
            <li class="active">Pengawasan Sampah</li>
        </ol>
    </div>
</div>

<div class="main"><!-- start main -->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                @yield ('main-section')
            </div>
        </div>
    </div>
</div>

@yield ('floating-section')

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

@yield ('script-section')

</body>
</html>