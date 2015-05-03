@extends('master')


@section('main-section')
        <div class="col-md-4">
		  <h2 class="sub-header">Sarana</h2>
		  <a href="saranaAll"><button style="margin-top:10px;" class="btn_style">Lihat semua</button></a><br/>
		  <img src="images/sarana.png" width="100%" alt="view"/>
        </div>
        <div class="col-md-8">
        @yield('main-section')
    </div>
@overwrite
