<!DOCTYPE html>
<html>
<head>
	<title>Edit Berita</title>
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
	@foreach($profil as $aktif)
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
				 <p><a style="text-decoration: none;"href="{{ url('/dashboard') }}"><span style="color:black;"><< Back to News Dashboard</span></a></p>
		<h1>
		Edit Berita<br/>

		</h1>
    @foreach($news as $list)
		<form  method ="POST" action="/editpost/update" enctype="multipart/form-data">
			{{ csrf_field() }}

      <input type="hidden" name="id" value="{{$list->id}}"/>
		<p><h>Judul: </h>	<input type="text" name="judul" value="{{$list->judul}}" required></p>
		<p><h>Kategori: </h> <select name="kategori" value="{{$list->kategori}}" required>
  <option value="PC">PC</option>
  <option value="Android">Android</option>
  <option value="Console">Console</option>
</select>
<p><h>Penulis : </h> <select name="penulis">

<option value="{{$list->penulis}}">{{$list->penulis}}</option>

</select>


		<p><h>Masukkan Thumbnail: </h> <input type="file" name="imgSrc" class="form-control" id="imgSrc"  placeholder="imgSrc" required></p>
		<textarea class="ckeditor" name="isi" id="ckedtor" required>{!!$list->isi!!}</textarea>
		<br/>
    @endforeach
		<button type="submit">Simpan</button>
	</form>

	</div>
</div>
</body>
</html>
