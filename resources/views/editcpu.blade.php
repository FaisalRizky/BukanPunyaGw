<!DOCTYPE html>
<html>
<head>
	<title>Post Hardware Baru</title>
	<script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">

	<link rel="icon" type="image/png" href="{!! asset('img/desain berigame1.png') !!}"/>
</head>
<body>
	<div class="wrap">
	<div class="logo" style="width:100%;
	padding-left: 9%;
    border-bottom: 2px solid red;
	position:fixed;
	background-color:black;
	height:99px;">
	<img src="{!! asset('img/desain berigame1.png') !!}" width="18%"/></a>
	<div class="sbox" style="float:right; padding-top:2.5%; padding-right:20%;">
	@foreach($profile as $aktif)
	<p class style="font-family:Verdana; color:white; text-decoration:none;">Logged in as {{$aktif->penulis}}<a class style="text-decoration:none; color:#3498db;" href="{{url('/logout')}}">&nbsp;(Logout)</a></p>
	@endforeach

	</div>
</div>
@if(session()->has('Sessionactive'))
<div class="alert" style="position: fixed;
	margin-left: 40%;
	z-index: 1000;
	padding: 20px auto;
	background-color: green;
	color: white;">
 <span class="closebtn" style="
 margin-left: 15px;
 color: white;
 font-weight: bold;
 float: right;
 font-size: 22px;
 line-height: 20px;
 cursor: pointer;
 transition: 0.3s;
 color: black;
" onclick="this.parentElement.style.display='none';">&times;</span>
 <strong>Session Aktif</strong>
		 {{ session()->get('Sessionactive') }}
</div>
</center>
@endif
       <div class="kotak">
				  <p><a style="text-decoration: none;"href="{{ url('/dashboardcpu') }}"><span style="color:black;"><< Back to CPU Dashboard</span></a></p>
		<h1>
		Edit CPU<br/>

		</h1>
		<form  method ="POST" action="/editcpu/submit" enctype="multipart/form-data">
			{{ csrf_field() }}
      @foreach($cpu as $cpu)
      <input type="hidden" name="id" value="{{$cpu->id_cpu}}"/>
      <input type="hidden" name="gambarp" value="{{$cpu->cpu_gambar}}"/>
      <input type="hidden" name="namep" value="{{$cpu->cpu_nama}}"/>
    <p><h>Nama CPU      : </h>	<input type="text" name="namep" value="{{$cpu->cpu_nama}}" disabled></p>
		<p><h>Seri           : </h> <input type="text" name="seriesp" value="{{$cpu->cpu_series}}" placeholder="i5,i7,ryzen 7, ryzen 5, etc" required/>
		<p><h>Tipe           : </h> <input type="text" name="tipep" value="{{$cpu->cpu_tipe}}" placeholder="8700k, 2700x, etc" required/>
		<p><h>Core           : </h> <select name="corep" required></p>
    <option value="{{$cpu->cpu_core}}">{{$cpu->cpu_core}} (sekarang)</option>
		<option value="2">2 Core</option>
	  <option value="4">4 Core</option>
		<option value="6">6 Core</option>
		<option value="8">8 Core</option>
	</select>
		<p><h>Kecepatan      : </h> <input type="text" value="{{$cpu->cpu_speed}}" name="speedp" required/> GHz</p>
	  <p><h>Manufaktur     : </h> <input type="text" value="{{$cpu->cpu_litografi}}" name="manufakturp" required/> nm</p>
		<p><h>GPU        		 : </h> <input type="text" value="{{$cpu->cpu_gpu}}" name="gpup" required/>
    <p><h>Maksimum RAM   : </h> <input type="text" value="{{$cpu->cpu_rammax}}" name="ramp" required/> GB</p>
    <p><h>Tanggal Rilis  : </h> <input type="date" value="{{$cpu->cpu_date}}" name="datep" />


		<p><h>Penulis : </h> <select name="penulis">
			@foreach($profile as $data)
<option value="{{$data->penulis}}">{{$data->penulis}}</option>
@endforeach
</select>


		<p><h>Masukkan Gambar: </h> <input type="file" name="gambarbaru" class="form-control" id="imgSrc" placeholder="imgSrc"></p>
@endforeach
		<br/>
		<button type="submit">Simpan</button>
	</form>

	</div>
</div>
</body>
</html>
