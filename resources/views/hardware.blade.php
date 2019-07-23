<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BeriGame</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bahianita&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">

	<link rel="icon" type="image/png" href="{!! asset('img/desain berigame1.png') !!}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="wrap">
		<div class="logo">
			<a href="\">
				<img src="{!! asset('img/desain berigame1.png') !!}" width="18.5%" height="18.5%"/></a>
				<div class="sbox" style="float:right; padding-top:2.5%; padding-right:11%;">
<form action="{{ url('/search') }}" method="GET">
	{{csrf_field()}}

	<input type="text" name="cari" placeholder="Find News, Article, and More...." style="font-family:RobotoDraft; color:white; border-radius: 9%; background-color:#1a1a1a; border:1px red solid; -webkit-appearance:none;" size="35">

 <button type="submit" class="btn btn-flat pink accent-3 waves-effect waves-light black-text right" style="color:white; font-family:Roboto; border-radius: 20%; background-color:red;">SEARCH</button>
</form>
		</div>

	</div>

		<div class="marg">
		<div class="header">
		<div class="menu">

			<ul>
				<div class="linknavigasi">
								<li><a href="\">Home</a></li>

								<li class="dropdown"><a class="dropdown-toggle" href="#"  data-toggle="dropdown" >News</a>
									<ul class="dropdown-menu" style="background:#1a1a1a; width:auto; position:absolute; margin-left: 50%; padding-right:37%; padding-left:37%;">
										<div class="buathover">
										<li><a class style="color:white;" href="{{ url('kategori/PC') }}">PC</a></li>
										<li><a class style="color:white;" href="{{ url('kategori/Android') }}">Android</a></li>
										<li><a class style="color:white;" href="{{ url('kategori/Console') }}">Console</a></li>
									</div>
									</ul>
								</li>
								<li><a href="{{ url('/about') }}">About</a></li>
				</div>
			</ul>
		  </div>
		</div>
		<div class="badan">
		<div class="row">
			<div id="focus-enclose" style="border:0;  margin-left: 0.95%; margin-right: 0.95%;background-color: #222;  overflow:hidden; height:90px;display:flex; align-items:center; justify-content:center;"></div>
      <div class="ratain" style="margin-left: 0.95%; margin-right:0.95%;">
        <div class="col-md-8" style="font-family:roboto; height: auto;


    background: #222;

	color: white;
	text-align:justify;
	border-top:1px #3a3a3a solid;
	z-index:500;
	border-radius: 0.4%;">
<div class="pemisah" style="border-bottom:2px #3a3a3a solid;">
	@foreach($soc as $soc)
          <h1 style="font-family:arvo; font-weight:bold;">{{$soc->soc_series}}&nbsp;{{$soc->soc_name}}&nbsp;{{$soc->soc_tipe}}</h1>

        </div>

         <div class="col-md-3">
<br>
            <div class="gambarhw" style="position:relative; left:0; max-height:800px; width:auto; border: 2px red solid;">
              <img style="width:100%;" itemprop="image" src="/soc/{{$soc->soc_gambar}}">
			  </div>
      </div>
        <div class="col-md-9" >
          <div class="stabilo" style="background: #640202; border-radius:5px;">
          <h1 style="font-family:Bahianita; font-weight:bolder;">Spesifikasi Detail</h1>
        </div>
          <div class="terangdikit" style="font-weight:200; font-family:robotodraft;">

          <div class="col-md-5" >
            <p style="background:#3a3a3a; border-radius:2px;">Nama SoC          </p>
            <p>Tipe Soc          </p>
            <p style="background:#3a3a3a; border-radius:2px;">Core              </p>
            <p>Kecepatan Prosesor</p>
            <p style="background:#3a3a3a; border-radius:2px;">Manufaktur        </p>
            <p>GPU               </p>
            <p style="background:#3a3a3a; border-radius:2px;">Tanggal Diumumkan </p>
          </div>
            <div class="col-md-1">
              <p>:</p>
              <p>:</p>
              <p>:</p>
              <p>:</p>
              <p>:</p>
              <p>:</p>
              <p>:</p>
            </div>
            <div class="col-md-6">
              <center>
                <p>{{$soc->soc_series}}&nbsp;{{$soc->soc_name}}</p>
                <p  style="background:#3a3a3a; border-radius:2px">{{$soc->soc_tipe}}</p>
                <p>{{$soc->soc_core}}</p>
                <p  style="background:#3a3a3a; border-radius:2px">{{$soc->soc_speed}}&nbsp;GHz</p>
                <p>{{$soc->soc_techp}}&nbsp;nm</p>
                <p  style="background:#3a3a3a; border-radius:2px">{{$soc->soc_gpu}}</p>
                <p>{{$soc->soc_announce}}</p>
              </center>
            </div>

</div>

</div>

    <div class="col-md-12 col-md-offset-3" style="padding-right:25%;">
      <br>
        <h1 style="font-family:Bahianita; margin-right:1.5%; font-weight: bold; background:#1a1a1a; border-radius:5px;">Ringkasan</h1>
          <p style="font-family:roboto mono; font-weight:200;">{{$soc->soc_series}}&nbsp;{{$soc->soc_name}}&nbsp;{{$soc->soc_tipe}} Merupakan SoC yang memiliki {{$soc->soc_core}} CPU Core dengan kecepatan prosesor {{$soc->soc_speed}} GHz dan
          berteknologi proses sebesar {{$soc->soc_techp}}&nbsp;nm, serta dibekali GPU {{$soc->soc_gpu}}. </p>

          <br>
          <h1 style="font-family:Bahianita; margin-right:1.5%; font-weight: bold; background:#00284d; border-radius:5px;">Berikan Ulasan dan Nilai Anda</h1>
            @if(session()->has('useraccount'))


            <form  method ="POST" action="review/submit" enctype="multipart/form-data">
        			{{ csrf_field() }}
							<input type="hidden" name="id" value="{{$soc->id_soc}}"/>
              <div class="form-group">
    <label for="comment">Review</label>
    <textarea class="form-control" rows="5" style="background:#f2f2f2;" name="isip" id="comment"></textarea>
  </div>
              <p>Nilai:&nbsp;<select name="ratingp" style="color:black; font-family:roboto; border-radius:2px;" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
          <input type="hidden" value="soc" name="tipep"/>
          <input type="hidden" value="{{$id}}" name="id"/>
          @foreach($useraccount as $useraccount)
          <input type="hidden" value="{{$useraccount->username}}" name="namap"/>
          <input type="hidden" value="{{$useraccount->avatar}}" name="picp"/>
          @endforeach

          <div class="container-login100-form-btn">
<br>
          	<button type="submit" style="background:red; border-radius:3px; font-family:robotodraft;">Simpan</button>
          </div>
        </form>
        @else
        <a href="\userlogin" style="text-decoration:none;">Masuk Untuk berikan Ulasan</a>
        @endif
				@if(session()->has('pesan'))
				<br>
				<div class="alert alert-success" style="font-family:arvo;"><p>{{ session()->get('pesan') }}</p></div>
				@endif
        </div>

				@if(empty($review)||is_null($review))
				<h2 class="page-header">Review</h2>
				<div class="alert alert-success"><p>Belum ada Review</p></div>
				@else
				<h2 class="page-header">Review</h2>
				        <section class="comment-list">
				          <!-- First Comment -->
									@foreach($review as $review)
									<article class="row">
				            <div class="col-md-2 col-sm-2 hidden-xs">
				              <figure class="thumbnail">
												@if(is_null($review->avatar)||empty($review->avatar))
													<img class="img-responsive" src="https://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
												@else
				                <img class="img-responsive" src="/avataruser/{{ $review -> avatar }}" />
												@endif
				                <figcaption class="text-center">{{$review->nama}}</figcaption>
				              </figure>
				            </div>

				            <div class="col-md-10 col-sm-10">
				              <div class="panel panel-default arrow left">
				                <div class="panel-body">
				                  <header class="text-left">
				                    <div class="comment-user">{{$review->nama}} &nbsp; &nbsp; &nbsp;
				                    <time class="comment-date" style="font-size:12px; font-family:Times New Roman; color:rgba(0,0,0,.555);" datetime="{{$review->tanggal_review}}"><i style="top:0;"></i> {{$review->tanggal_review}}</time>
													</div>
													</header>
				                  <div class="comment-post">
														<h2 style="font-family:Bahianita;"><p>Nilai:&nbsp;{{$review->rating}}<span class="fa fa-star checked"></span></p></h2>
				                    <p>
				                      {{$review->isi_review}}
				                    </p>
				                  </div>
				                </div>
				              </div>
				            </div>
				          </article>
				@endforeach
				@endif
							    
</div>



        <div class="col-md-4" style="font-family:roboto;


    background: #222;

	color: white;
	text-align:justify;
	border-top:1px #3a3a3a solid;
  border-left:1px red solid;
	z-index:500;
	border-radius: 0.4%;">
	  <h1 style="font-family:arvo; font-weight:bold; background:#1a1a1a; border-radius:5px;">Rating pengguna</h1>
	<div class="ratingbox" style="color:white; font-family:roboto; position: relative;
  text-align: center;">
		<center><img class="img-responsive" style="height:35%; width:35%;" src="/img/star.png"></center><h1 style=" font-weight:bolder; position: absolute;
  top: 35%;
  left: 50%;
	font-size:3vw;
  transform: translate(-50%, -50%);">{{$soc->soc_rating}}</h1>
	@endforeach
	@foreach($rater as $rater)
  <h4 style="font-family:roboto mono; font-weight: bolder; background:#3a3a3a;  border-radius:5px;">Dari {{$rater->jumlah}} Pengguna</h4>
	@endforeach
</div>
<br>
<br>

<h1 style="font-family:Sofia; font-weight:lighter; background:#00284d; border-radius:5px;">SoC Populer</h1>
<br>
<div class="popularposts">
	@foreach($pops as $data)
	<a style="text-decoration:none;" href="{{ url('hardware/soc/'.$data->id_soc) }}">
	<div class="thumbpagepop" title="{{$data -> soc_series}}">
				<img src="/soc/{{ $data -> soc_gambar }}"><h3 style="color:#3498db;">{{$data->soc_series}}&nbsp;{{$data->soc_name}}&nbsp;{{$data->soc_tipe}}</h3></a>
				<div class="snip" style="font-weight:lighter;">
					<br>
					<br>
					<br>
					<?php
						echo strip_tags(str_limit("{$data->soc_series}&nbsp;{$data->soc_name}&nbsp;{$data->soc_tipe} Merupakan SoC yang memiliki {$data->soc_core} CPU Core dengan kecepatan prosesor {$data->soc_speed} GHz dan
	          berteknologi proses sebesar {$data->soc_techp}&nbsp;nm, serta dibekali GPU {$data->soc_gpu}.", $limit = 299, $end = '...') ) ?>
					</div>
						<br>
						<br>
						<br>




			@endforeach
		</div>
</div>
</div>
</div>




@if(session()->has('Success'))
    <div class="alert alert-success">
        {{ session()->get('Success') }}
    </div>
@endif
<br>
<br>

		</div>
</div>


			</aside>
				</div>

			<div class="content">
			</div>
		    <div class="content"></div>
			  </div>
		</div>
		</div>
		<div class="footer">
<div class="botnavContainer" style="width:auto; margin:0; margin-left: 9%; display: flex;">
<div class="logofoot">
	<a href="/">	<img src="{!! asset('img/desain berigame1.png') !!}" width="315" height="92"/></a>

<div class="cl"></div>
</div>
<div style="height:20px"></div>
<div class="BGCopyrightInfo" style="color:white; font-size:18px;padding-top:4%;">
<span style="padding-left:0.3em">Copyright @ 2018 BeriGame, All right reserved ·</span>
</div>
 <div style="clear:both"></div>
</div>
</div>


</div>
		</div>


</body>
</html>
