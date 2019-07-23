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
@if(session()->has('pesan'))
    <div class="alert alert-success" style="position: fixed;
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
        {{ session()->get('pesan') }}
    </div>
@endif
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
				  <p><a style="text-decoration: none;"href="{{ url('/dashboardgpu') }}"><span style="color:black;"><< Back to gpu Dashboard</span></a></p>
		<h1>
		Edit GPU<br/>

		</h1>
		<form  method ="POST" action="/editgpu/submit" enctype="multipart/form-data">
			{{ csrf_field() }}
      @foreach($gpu as $gpu)
      <input type="hidden" value="{{$gpu->id_gpu}}" name="id">
      <input type="hidden" value="{{$gpu->gpu_gambar}}" name="gambarp">
      <input type="hidden" name="namep" value="{{$gpu->gpu_nama}}"/>
		<p><h>Nama GPU       : </h>	<input type="text" name="namep" value="{{$gpu->gpu_nama}}" disabled>
		<p><h>Seri           : </h> <input type="text" name="seriesp" value="{{$gpu->gpu_series}}" placeholder="GTX, HD, UHD, Radeon, etc" required/>
		<p><h>Tipe           : </h> <input type="text" name="tipep" value="{{$gpu->gpu_tipe}}" placeholder="1060, 4000, etc" required/>
    <p><h>Arsitektur   : </h> <input type="text" name="archp" value="{{$gpu->gpu_arch}}" required/></p>
		<p><h>Kecepatan      : </h> <input type="text" name="speedp" value="{{$gpu->gpu_speed}}" required/> MHz</p>
    <p><h>Boost      : </h> <input type="text" name="boostp" value="{{$gpu->gpu_boost}}" required/> MHz</p>
	  <p><h>Manufaktur     : </h> <input type="text" name="manufakturp" value="{{$gpu->gpu_litografi}}" required/> nm</p>
		<p><h>Tipe Memori       		 : </h> <input type="text" name="memtypep" value="{{$gpu->gpu_memtype}}" required/>
    <p><h>Memori Grafik   : </h> <input type="text" name="memoryp" value="{{$gpu->gpu_memory}}" required/> GB</p>
    <p><h>Kecepatan Memori   : </h> <input type="text" name="memspeedp" value="{{$gpu->gpu_memspeed}}" required/> MHz</p>
    <p><h>Memori Bus   : </h> <input type="text" name="membusp" value="{{$gpu->gpu_membus}}" required/> Bit</p>
    <p><h>Directx   : </h> <input type="text" name="directxp" value="{{$gpu->gpu_directx}}" required/></p>
    <p><h>Tanggal Rilis  : </h> <input type="date" name="datep" value="{{$gpu->gpu_date}}" />


		<p><h>Penulis : </h> <select name="penulis">
			@foreach($profile as $data)
<option value="{{$data->penulis}}">{{$data->penulis}}</option>
@endforeach
</select>


		<p><h>Masukkan Gambar: </h> <input type="file" name="gambarbaru" class="form-control" id="imgSrc" placeholder="imgSrc"></p>

		<br/>
		<button type="submit">Simpan</button>
	</form>
@endforeach
	</div>
</div>
</body>
</html>
