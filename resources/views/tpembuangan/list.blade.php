@extends ('administrasi_master')

@section('main-section')
    <h2 class="sub-header">Daftar TPS dan TPA</h2>

    <a href="{{ route('dataTP.create_tps') }}">
        <button style="margin-top:10px;" class="btn_style">Tambah TPS</button>
    </a>

    <a href="{{ route('dataTP.create_tpa') }}">
        <button style="margin-top:10px;" class="btn_style">Tambah TPA</button>
    </a>

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

            <tbody>
            <?php $entry_num = 0; ?>
            @foreach ($tpsampahs as $tpsampah)
                <?php $entry_num++; ?>
                <tr>
                    <td id="{{ 'real_id' . $entry_num }}" my_value="{{ $tpsampah->id }}">{{ $entry_num }}</td>
                    <td id="{{ 'tipe' . $entry_num }}">TPS</td>
                    <td id="{{ 'nama' . $entry_num }}">{{ $tpsampah->name }}</td>
                    <td id="{{ 'lokasi' . $entry_num }}">{{ $tpsampah->location }}</td>
                    <td><a href="#" class="editButt" id="{{ $entry_num }}">edit</a> | <a href="#" id="{{ $entry_num }}"
                                                                                         class="delButt">delete</a></td>
                </tr>
            @endforeach

            @foreach ($tpakhirs as $tpakhir)
                <?php $entry_num++; ?>
                <tr>
                    <td id="{{ 'real_id' . $entry_num }}" my_value="{{ $tpakhir->id }}">{{ $entry_num }}</td>
                    <td id="{{ 'tipe' . $entry_num }}">TPA</td>
                    <td id="{{ 'nama' . $entry_num }}">{{ $tpakhir->name }}</td>
                    <td id="{{ 'lokasi' . $entry_num }}">{{ $tpakhir->location }}</td>
                    <td><a href="#" class="editButt" id="{{ $entry_num }}">edit</a> | <a href="#" id="{{ $entry_num }}"
                                                                                         class="delButt">delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('floating-section')
    <div class="floatEdit">
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3 col-md-6 col-md-offset-3 popup">
                        <div class="contact-form">
                            <h3>Edit TPS/TPA</h3>

                            <form method="post" action="contact-post.html" id="submissionform">
                                <input type="hidden" class="form-control" id="id" value="-diambil dynamically pake JS-"
                                       style="display:none;">
                                <input type="hidden" class="form-control" id="prevType" value="-diambil dynamically pake JS-"
                                       style="display:none;">

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
                                    <span><input type="text" class="form-control" id="nama"
                                                 value="-diambil dynamically pake JS-"></span>
                                </div>
                                <div>
                                    <span>Lokasi</span>
                                    <span><input type="text" class="form-control" id="lokasi"
                                                 value="-diambil dynamically pake JS-"></span>
                                </div>
                                <div>
                                    <span><input type="submit" value="submit" id="doSubmit"><input type="submit"
                                                                                                   value="cancel"
                                                                                                   id="cancelSubmit"
                                                                                                   style="margin-right: 20px;"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script-section')
    <script>
        $(document).ready(function () {
            $(".editButt").click(function () { //when edit button is pressed
                $("input#id").attr("value", $("#real_id" + $(this).attr('id')).attr('my_value'));
                var jenis = $("#tipe" + $(this).attr('id')).html().toLowerCase();
                $("input#prevType").attr("value", jenis);
                if (jenis === "tpa") {
                    $("select#TPtype").val("tpa");
                } else {
                    $("select#TPtype").val("tps");
                }
                $("input#lokasi").attr("value", $("#lokasi" + $(this).attr('id')).html());
                $("input#nama").attr("value", $("#nama" + $(this).attr('id')).html());
                $(".popup").attr("style", "display:block !important;"); // show popup
            });

            $("#cancelSubmit").click(function (event) { //cancel button on popup pressed
                event.preventDefault();
                $(".popup").attr("style", "display:none !important;");
            });

            $("#doSubmit").click(function (event) { //submit button pressed
                event.preventDefault();

                //DO AJAX SUBMIT HERE (form#submissionform) K THX. - dalva
                var pSebelum = $("input#prevType").val();
                var pSekarang = $("select#TPtype").val();
                var vDelete = (pSebelum == pSekarang) ? '' : pSebelum;
                $.ajax({
                    url: 'dataTP/update',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        _poster: pSekarang,
                        _delete: vDelete,
                        id: $("input#id").val(),
                        name: $("input#nama").val(),
                        location: $("input#lokasi").val()
                    },
                    success: function (result) {
                        // Do something with the result
                        window.location.href = result;
                    }
                });

                $(".floatEdit").attr("style", "display:none !important;"); // then hide the popup
            });

            $(".delButt").click(function (event) { //when delete button is pressed
                event.preventDefault();

                //DO AJAX DELETE HERE (form#submissionform) K THX. - dalva
                var yakin = confirm("Apakah anda yakin ingin menghapus?");
                if (!yakin)
                    return false;

                var id = $("#real_id" + $(this).attr('id')).attr('my_value');
                var jenis = $("#tipe" + $(this).attr('id')).html().toLowerCase();

                if (jenis == 'tps')
                    $.ajax({
                        url: 'dataTP/tps/' + id,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (result) {
                            // Do something with the result
                            alert("TPS ID " + id + " deleted.");
                            window.location.href = result;
                        }
                    });
                else if (jenis == 'tpa')
                    $.ajax({
                        url: 'dataTP/tpa/' + id,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (result) {
                            // Do something with the result
                            alert("TPA ID " + id + " deleted.");
                            window.location.href = result;
                        }
                    });
            });
        });
    </script>
@stop