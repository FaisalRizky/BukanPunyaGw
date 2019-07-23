<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BeriGame</title>
	<link href="{{asset('css/layout.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">

	<link rel="icon" type="image/png" href="{!! asset('img/desain berigame1.png') !!}"/>
	<link href="https://fonts.googleapis.com/css?family=RobotoDraft:regular,bold,italic,thin,light,bolditalic,black,medium&lang=en" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="wrap">
		<div class="logo">
			<a href="\">
				<img src="{!! asset('img/desain berigame1.png') !!}" width="18%"/></a>
				<div class="sbox" style="float:right; padding-top:2.5%; padding-right:20%;">
@foreach($profil as $aktif)
	<p class style="font-family:Verdana; color:white; text-decoration:none;">Logged in as {{$aktif->penulis}}<a class style="text-decoration:none; color:#3498db;" href="{{url('/logout')}}">&nbsp;(Logout)</a></p>
@endforeach

	</div>

</div>

		<div class="marg">
		<div class="header">
		<div class="menu">

			<ul>
<div class="linknavigasi">
				<li><a href="{{ url('/adminpage') }}">Home</a></li>

				<li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
				<li><a href="{{ url('/komentarulasadmin') }}">Comment Review</a></li>
</div>
			</ul>
		  </div>
		</div>
		<div class="tickerContainer" style=" overflow:auto;  width:100%; padding: 0;
		margin: 0;float:left; border-top:1px solid #333; border-bottom:1px solid #000; float:left; padding:0px; color:#ccc; background:#111; font-family:verdana;">
		<ul id="ticker22" style="padding: 0;
		margin: 0; text-overflow:ellipsis; float:left;">
		<p>News Dashboard</p>
    <p><a style="color:#fff; text-decoration:none;" href="{{url('/post')}}">New Post</a></p>
		</ul>
		</div>
		<div class="badan">
		<div class="row">
			  <div class="col-md-12" style="background-color:black;">
					@foreach($users as $data)
					<div class="thumbpage" style="width:40%;" title="{{$data -> judul}}">

            <a href="{{ url('news/'.$data->id) }}"><img src="/img/{{ $data -> imgSrc }}"></img>
					<div class="newsblogImgTitleWrapper" >
						<div class="news-page-title" >
		      {{$data -> judul}}




	</div>

	<div class="kat" ><p> Kategori: &nbsp; </p> {{$data -> kategori}}<p style="color:white; float:right; padding-left:50%;"> Author: {{$data->penulis}}</p></div>
</a>
  <div class="kat" style="font-style:normal; color:#fff; font-family:roboto; font-size:18px;" ><p><a style="color:white;" href="editpost/{{$data -> id}}"> Edit</a>  &nbsp; &nbsp;&nbsp;</p>
  <p><a style="color:white;" href="dashboard/deleteconfirmation/{{$data->id}}">Delete</a></p><div class="viewcount" style="float:right; font-family:robotodraft; padding-left:60%;"><p>Dilihat: {{$data->view}}</p></div></div>


					</div>

					</div>
					<br>
					@endforeach
					<center>
					{{ $users->links() }}
				</center>
			</div>


				<div class="content">
				</div>
			    <div class="content"></div>
				  </div>
			</div>
			</div>
			<div class="footer">
	<div class="botnavContainer" style="width:auto; margin:0; margin-left: 9%; display: flex">
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
