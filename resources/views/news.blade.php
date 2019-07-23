<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BeriGame</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">

	<link rel="icon" type="image/png" href="{!! asset('img/desain berigame1.png') !!}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/profile.js')}}"></script>

	</head>
	<body>

	<div class="wrap">
		<div class="logo">
			<a href="\">
				<img src="{!! asset('img/desain berigame1.png') !!}" width="18.5%" height="18.5%"/></a>
				@if(session()->has('loginuser'))
				@foreach($useraccount as $data)
				<div class="dropdown">
				<a href="#" class="account" >
					@if(is_null($data->avatar)||empty($data->avatar))
						<img class="profile-circle" src="https://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
					@else
					<img class="profile-circle" src="/avataruser/{{ $data -> avatar}}" />
					@endif
				</a>
				<div class="submenu" style="display: none;">
				<ul class="root">
				<li >
				<a href="/editprofile" >Profile</a>
				</li>
				<li>
				<a href="/logoutuser">Sign Out</a>
				</li>
				</ul>
				</div>
				</div>
				@endforeach
				<div class="sbox" style="float:right; padding-top:3%; padding-right:2.5%;">
				@else
				<div class="sbox" style="float:right; padding-top:3%; padding-right:9.5%;">
				@endif
	<form action="{{ url('/search') }}" method="GET">
	{{csrf_field()}}

	<input type="text" name="cari" placeholder="Find News, Article, and More...." style="font-family:RobotoDraft; color:white; border-radius: 9%; background-color:#1a1a1a; border:1px red solid; -webkit-appearance:none;" size="35">

	<button type="submit" class="btn btn-flat pink accent-3 waves-effect waves-light black-text right" style="color:white; font-family:Roboto; border-radius: 20%; background-color:red;">SEARCH</button>
	@if(session()->has('loginuser'))
	@else
	<a href="\userlogin">&nbsp; &nbsp; Sign in</a>
	@endif
	</form>

		</div>


	</div>


		<div class="marg">
		<div class="header">
		<div class="menu">
			<ul>
				<div class="linknavigasi">
								<li><a href="\">Home</a></li>

								<li class="dropdown"><a class="dropdown-toggle" href="#"  data-toggle="dropdown">News</a>
									<ul class="dropdown-menu" style="background:#1a1a1a; width:auto; position:absolute; margin-left: 50%; padding-right:37%; padding-left:37%;">
										<div class="buathover">
										<li><a class style="color:white;" href="{{ url('kategori/PC') }}">PC</a></li>
										<li><a class style="color:white;" href="{{ url('kategori/Android') }}">Android</a></li>
										<li><a class style="color:white;" href="{{ url('kategori/Console') }}">Console</a></li>
									</div>
									</ul>

								<li><a class="dropdown-toggle" href="#"  data-toggle="dropdown">Hardware</a>
									<ul class="dropdown-menu" style="background:#1a1a1a; width:auto; position:absolute; margin-left: 35%; padding-right:37%; padding-left:37%;">
										<div class="buathover">
										<li><a class style="color:white;" href="{{ url('hardware/soc') }}">SoC (Android)</a></li>
										<li><a class style="color:white;" href="{{ url('hardware/cpu') }}">CPU (PC)</a></li>
										<li><a class style="color:white;" href="{{ url('hardware/gpu') }}">GPU (PC)</a></li>
									</div>
								</ul>
							</li>
						</li>
				</div>
			</ul>

</div>
		  </div>
		<div class="badan">
		<div class="row">
			<div id="focus-enclose" style="border:0;  margin-left: 0.95%; margin-right: 0.95%;background-color: #222;  overflow:hidden; height:90px;display:flex; align-items:center; justify-content:center;"></div>
			  <div class="col-md-8">

			  <div class="tunbail">
			  <div class="judul">
			  <div class="news-page-title-berita">
          @foreach($news as $data)
          {{$data -> judul}}
<div class="datewritten">
					<p>Written by:&nbsp;{{$data->penulis}} at {{$data->postdate}}</p>
				</div>

</div>
			  </div>
			  <img style="width:100%" itemprop="image" src="/img/{{ $data -> imgSrc }}">
			  </div>

			  <div class="kotak">
          {!!$data->isi!!}
					<br>
					<br>
					<br>

        </div>
        @endforeach

			<br>Silahkan Berkomentar:<br/>
			<form  method ="POST" action="/comment/submit" enctype="multipart/form-data">
				{{ csrf_field() }}
				@if(session()->has('loginuser'))
				@foreach($useraccount as $users)
				<input type="hidden" name="id_post" value="{{$id}}"/>
				<input type="hidden" name="statusp" value="1"/>
				<input type="hidden" name="userp" value="user"/>
				<input type="hidden" name="namakomen" value="{{$users->username}}">
				<input type="hidden" name="avatarkomen" value="{{$users->avatar}}">
<table>
	<tr><td>Nama  :</td><td><input type="text" name="namakomen" value="{{$users->username}}" style="color:black;" disabled></td></tr>
	<tr><td>Avatar:</td><td><input type="file" name="avatarkomen" value="{{$users->avatar}}" disabled></td></tr>
	<br>
	@endforeach
	@else
	<table>

		<input type="hidden" name="id_post" value="{{$id}}"/>
	<tr><td>Nama  :</td><td><input type="text" name="namakomen" style="color:black;"></td></tr>
	<tr><td>Avatar:</td><td><input type="file" name="avatarkomen"></td></tr>
	<br>
	@endif
                <tr><td>Tulis komentar:</td><td><textarea cols="50" style="color:black;" rows="5" name="isikomen" required></textarea></td></tr>
                <tr><td><input class="postkan" style="color:black; float:right;" type="submit" value="Postkan Komentar"/></td></tr>
</table>
</form>
@if(session()->has('Success'))
    <div class="alert alert-success">
        {{ session()->get('Success') }}
    </div>
@endif
<br>
<br>
@if(empty($komen)||is_null($komen))
<h2 class="page-header">Komentar</h2>
<div class="alert alert-success"><p>Belum anda komentar</p></div>
@else
<h2 class="page-header">Komentar</h2>
        <section class="comment-list">
          <!-- First Comment -->
					@foreach($komen as $dispcom)
					<article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
								@if(is_null($dispcom->avatarkomen)||empty($dispcom->avatarkomen))
									<img class="img-responsive" src="https://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
								@elseif($dispcom->user=='user')
                <img class="img-responsive" src="/avataruser/{{ $dispcom -> avatarkomen }}"/>
								@else
								<img class="img-responsive" src="/avatar/{{ $dispcom -> avatarkomen }}"/>
								@endif
                <figcaption class="text-center">{{$dispcom->namakomen}}</figcaption>
              </figure>
            </div>

            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user">{{$dispcom->namakomen}} &nbsp; &nbsp; &nbsp;
                    <time class="comment-date" style="font-size:12px; font-family:Times New Roman; color:rgba(0,0,0,.555);" datetime="{{$dispcom->commentdate}}"><i class="fa fa-clock-o" style="top:0;"></i> {{$dispcom->commentdate}}</time>
									</div>
									</header>
                  <div class="comment-post">
                    <p>
                      {{$dispcom->isikomen}}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </article>
@endforeach
@endif
			    </div>







			<div class="col-md-4" style="background-color:black;">
					<div class="author_box">
						@foreach($author as $penulis)
						<center>
							<p style="font-size:24px; font-family:Sofia; color:white;">Written by:</p>
							<img style="width:40%; height:40%; border-radius:50%;" src="/authoravatar/{{ $penulis -> fotopenulis }}" />
							<p style="font-family:raleway; font-size:20px; color:white;">{{$penulis->penulis}}</p>
							<p style="font-style:italic; font-size:15px; color:#bdc3c7; font-family:robotodraft; font-weight:100;">{!!$penulis->datapenulis!!}</p>
							@endforeach
						</div>
						<aside id="sidebar-wrapper" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

<br>

<div class="popularposts">
	<p>Popular Post</p>
	@foreach($pops as $data)
	<a style="text-decoration:none;" href="{{ url('news/'.$data->id) }}">
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
