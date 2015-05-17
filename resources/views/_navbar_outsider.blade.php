<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="menu nav navbar-nav "> <!-- NOTE: the active state changes depending on the page -->
        <li id="homelist" class="active"><a href="{{ route('user.notice')  }}">home</a></li>
        <li id="logoutLink"><a href="{{ url('/auth/logout') }}">Logout</a></li>
        <script type="text/javascript">
            $('#logoutLink').click(function (e) {
                console.log('LOGOUT JALAN KOK!');
                $.ajax({
                    type: 'get',
                    url: 'http://e-gov-bandung.tk/dukcapil/api/public/auth/logout',
                    success: function (data) {
                    },
                    error: function (data) {
                        // alert(data);
                    }
                });
            })
        </script>
    </ul>
</div>
<!-- /.navbar-collapse -->