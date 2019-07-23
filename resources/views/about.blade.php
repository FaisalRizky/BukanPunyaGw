<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BeriGame</title>
	<link href="{{asset('css/layout.css')}}" rel="stylesheet" type="text/css">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<link rel="icon" type="image/png" href="{!! asset('img/desain berigame1.png') !!}"/>
	<link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=RobotoDraft:regular,bold,italic,thin,light,bolditalic,black,medium&lang=en" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
		<div class="tickerContainer" style=" overflow:auto;  width:100%; padding: 0;
		margin: 0;float:left; border-top:1px solid #333; border-bottom:1px solid #000; float:left; padding:0px; color:#ccc; background:#111; font-family:verdana;">
		<ul id="ticker22" style="padding: 0;
		margin: 0; text-overflow:ellipsis; float:left;">
		<p><marquee direction="up" SCROLLDELAY=1000>Welcome to Berigame.com</marquee></p>
		</ul>
		</div>
		<div class="badan">
		<div class="row">
			  <div class="col-md-8" style="background-color:black;">
				<h1><p>Tentang Kami</p></h1>
        <br>
        <br>
        <div class="aboutus" style="color:#bdc3c7;">
        <p>BeriGame adalah sebuah situs Portal Berita Game Ter-Update. Web ini dibuat dengan tujuan berbagi dan memberi informasi seputar game,
          oleh karena itu dinamakan BeriGame</p>
          <p>Situs ini Dikelola oleh 4 Admin dengan 1 adminnya sekaligus CEO</p>
          <br>
          <p>Profil Pengelola:</p>
        </div>

            @foreach($author as $penulis)
          <div class="author_boxs">
            <center>
              <img style="width:20%; border-radius:50%;" src="/authoravatar/{{ $penulis -> fotopenulis }}" />
              <br>
              <br>
              @if($penulis->penulis=='Naufal Syauqi')
              <p style="font-family:raleway; font-size:20px; color:white;">{{$penulis->penulis}} (CEO)</p>
              @else
              <p style="font-family:raleway; font-size:20px; color:white;">{{$penulis->penulis}}</p>
              @endif
            </center>

              <p style="font-style:italic; font-size:15px; color:#bdc3c7; font-family:robotodraft; font-weight:100;">{!!$penulis->datapenulis!!}</p>

            </div>
            @endforeach
            <br>
            <br>

			</div>
			<div class="col-md-4" style="background-color:black;">
				<aside id="sidebar-wrapper" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
<div id="socialcounter">
<ul class="social-counter">
	<li class="social_item-wrapper"><a class="social_item social_facebook" href="https://www.facebook.com/#" rel="nofollow" target="_blank"><i class="fa fa-facebook social_icon"></i><span class="social_num">Facebook</span></a>
	</li>
	<li class="social_item-wrapper"><a class="social_item social_twitter" href="https://twitter.com/#" rel="nofollow" target="_blank"><i class="fa fa-twitter social_icon"></i><span class="social_num">Twitter</span></a>
	</li>
	<li class="social_item-wrapper"><a class="social_item social_youtube" href="https://www.youtube.com/" rel="nofollow" target="_blank"><i class="fa fa-youtube social_icon"></i><span class="social_num">Youtube</span></a>
	</li>
	<li class="social_item-wrapper"><a class="social_item social_rss" href="https://blogokecs.blogspot.com/#" rel="nofollow" target="_blank"><i class="fa fa-rss social_icon"></i><span class="social_num">RSS</span></a>
	</li>
	<li class="social_item-wrapper"><a class="social_item social_google-plus" href="https://plus.google.com/+kolok27" rel="nofollow" target="_blank"><i class="fa fa-google-plus social_icon"></i><span class="social_num">Google+</span></a>
	</li>
	<li class="social_item-wrapper"><a class="social_item social_instagram" href="https://instagram.com/kolok27#" rel="nofollow" target="_blank"><i class="fa fa-instagram social_icon"></i><span class="social_num">Instagram</span></a>
</li>
</ul>
</div>
<div class="row">
<div class="popularposts">
	<p>Popular Post</p>
	@foreach($pops as $data)
	<a style="text-decoration:none;" href="news/{{$data -> id}}">
	<div class="thumbpagepop" title="{{$data -> judul}}">
				<img src="/img/{{ $data -> imgSrc }}"><h3 style="color:#3498db;"> {{$data -> judul}}</h3></a>
				<div class="snip" style="font-weight:lighter;">
					<?php
						echo strip_tags(str_limit($data -> isi, $limit = 299, $end = '...') ) ?>
					</div>
						<br>
						<br>
						<br>




			@endforeach
		</div>
</div>


</div>
			</aside>
				</div>

		    <div class="content"></div>
			  </div>
		</div>
		</div>

		</div>
		<div class="footer">
<div class="botnavContainer" style="width:auto; margin:0; position:relative; bottom:0; margin-left: 9%; display: flex">
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


</body>
</html>
