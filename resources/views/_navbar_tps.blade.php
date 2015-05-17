<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="menu nav navbar-nav "> <!-- NOTE: the active state changes depending on the page -->
        <li id="entrilist" class="active"><a href="{{ route('entry.create_tps') }}">Entri</a></li>

        <li><a onclick="return kirim()" href="{{ url('/auth/logout') }}">Logout</a></li>
        <script type="text/javascript">
            function kirim() {
                $.ajax({
                    type: 'get',
                    url: 'http://e-gov-bandung.tk/dukcapil/api/public/auth/logout'
                });
                return true;
            }
        </script>
    </ul>

</div>
<!-- /.navbar-collapse -->