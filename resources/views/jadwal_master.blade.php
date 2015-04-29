@extends('master')


@section('main-section')
        <div class="col-md-4">
		  <h2 class="sub-header">Penjadwalan</h2>
		  <!-- TODO: belom tau hitung hitung ini buat apa -->
		  <a href="hitungSarana"><button style="margin-top:10px;" class="btn_style">Hitung Sarana</button></a><br/>
		  <a href="hitungPetugas"><button style="margin-top:10px;" class="btn_style">Hitung Petugas</button></a><br/>
		  <a href="jadwalkan"><button style="margin-top:10px;" class="btn_style">Jadwalkan</button></a>
		  <img src="images/jadwal.png" width="100%" alt="view"/>
        </div>
        <div class="col-md-8">
        @yield('main-section')
    </div>
@overwrite
