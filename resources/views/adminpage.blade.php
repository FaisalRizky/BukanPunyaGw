<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BeriGame</title>
	<link href="{{asset('css/layout.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
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
@if(session()->has('Unauthorized'))
<div class="alert" style="position: fixed;
	margin-left: 40%;
	z-index: 1000;
	padding: 20px auto;
	background-color: red;
	color: white;
	width:300px;">
 <span class="closebtn" style="
 margin-left: 15px;
 color: white;
 font-weight: bold;
 float: right;
 font-size: 44px;
 line-height: 44px;
 cursor: pointer;
 transition: 0.3s;
 color: black;
" onclick="this.parentElement.style.display='none';">&times;</span>
<div class="note" style="font-size:18px;">
	<center>
 <strong>Otoritas Dibutuhkan</strong>
		 {{ session()->get('Unauthorized') }}
	 </center>
	 </div>
</div>
</center>
@endif

		<div class="marg">
		<div class="header">
		<div class="menu">

			<ul>
<div class="linknavigasi">
	@if(session()->has('superadmin'))
	<li><a href="{{ url('/superadminpage') }}">Home (select admin)</a></li>
	@else
				<li><a href="{{ url('/adminpage') }}">Home</a></li>
				@endif

				<li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
				<li><a href="{{ url('/komentarulasadmin') }}">Comment Review</a></li>
</div>
			</ul>
		  </div>
		</div>
		<div class="badan">
		<div class="row">
			  <div class="col-md-12" style="background-color:black;">
					@foreach($profil as $profile)
					@if(session()->has('superadmin'))
          <p><h1 style="color:white; font-family:Verdana;">Welcome to Superadmin Special Page {{$profile->penulis}} :D</h1></p>
					@else

          <p><h1 style="color:white; font-family:Verdana;">Welcome to Admin Special Page {{$profile->penulis}} :D</h1></p>
					@endif
					@endforeach
					<br>
					<br>
				 <p style="color:white; font-size:14px;">Register New Admin?<a style="text-decoration: none; color:Yellow; font-size:18px;" href="{{ url('/addadmin')}}"><span style="text-decoration:none;"> Click Here</span></a></p>



      </div>
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
			</div>


	</body>
	</html>
