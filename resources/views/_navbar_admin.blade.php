<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="menu nav navbar-nav "> <!-- NOTE: the active state changes depending on the page -->
        <li id="awaslist"><a href="{{ route('dataTP.summary') }}">Pengawasan</a></li>
        <li id="entrilist"><a href="{{ route('entry.create_tps') }}">Entri</a></li>
        <li id="saranalist"><a href="{{ route('sarana.index') }}">Sarana</a></li>
        <li id="adminlist"><a href="{{ route('dataTP.index') }}">Administrasi</a></li>

        <li><a onclick="return kirim();" href="{{ url('/auth/logout') }}">Logout</a></li>
        <script type="text/javascript">
            function kirim() {
                $.ajax({
                    type: 'get',
                    url: 'http://e-gov-bandung.tk/dukcapil/api/public/auth/logout',
                    success: function (data) {
                    },
                    error: function (data) {
                    }
                });
                return true;
            };
        </script>
    </ul>
    <script>
        var locationstring = window.location.pathname;
        console.log(locationstring);
        if (locationstring.indexOf('entry') != -1) {
            document.getElementById("entrilist").className = "active";

        } else if (locationstring.indexOf('pengawasan') != -1) {
            document.getElementById("awaslist").className = "active";

        } else if (locationstring.indexOf('dataTP') != -1) {
            document.getElementById("adminlist").className = "active";

        } else if (locationstring.indexOf('pengguna') != -1) {
            document.getElementById("adminlist").className = "active";

        } else if (locationstring.indexOf('jadwal') != -1) {
            document.getElementById("adminlist").className = "active";

        } else if (locationstring.indexOf('sarana') != -1) {
            document.getElementById("saranalist").className = "active";
        }
    </script>
</div>
<!-- /.navbar-collapse -->