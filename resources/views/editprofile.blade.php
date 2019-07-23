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
					<img class="profile-circle" src="/avataruser/{{$data -> avatar}}" />
					@endif
				</a>
				<div class="submenu" style="display: none; width:auto; margin-right:30%;">
				<ul class="root">
				<li >
				<a href="/editprofile">Profile</a>
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
<div class="container">
  @foreach($useraccount as $useraccount)
    <h1>Edit Profile</h1>
	<div class="row">
      <!-- left column -->
      <form  class="form-horizontal" method ="POST" action="/editprofile/submit" enctype="multipart/form-data">
  			{{ csrf_field() }}
<input type="hidden" name="usernamep" value="{{$useraccount->username}}"/>
      <div class="col-md-3">
        <div class="text-center">
					<div class="author_box" style="border:0px;">
          @if(is_null($useraccount->avatar)||empty($useraccount->avatar))
            <img class="avatar img-circle" alt="avatar" width="45%" height="45%" src="https://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
          @else
          <img style="width:80%; height:auto; border-radius:50%;"  src="/avataruser/{{ $useraccount -> avatar}}" />
          @endif
          <h6 style="font-family:verdana">Unggah Avatar</h6>

          <input type="file" name="avatarp" class="form-control">
				</div>
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a>
          <i class="fa fa-coffee"></i>
					@if(session()->has('sukses'))
          {{ session()->get('sukses') }}
					@else
					Silahkan Ubah Data Anda.
					@endif
        </div>
        <h3>Data Pribadi</h3>

        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama:</label>
            <div class="col-lg-8">
              <input class="form-control" name="namap" type="text" value="{{$useraccount->nama}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="emailp" type="text" value="{{$useraccount->email}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" name="usernamep" type="text" value="{{$useraccount->username}}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="{{$useraccount->password}}" id="pass" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" name="passwordp" type="password" id="confirmpass">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan</button>
							<input type="button" class="btn btn-primary" value="Ubah Password" onclick="window.location.href='{{ url('editprofile/ubahpassword') }}'" />

              <span></span>

            </div>
          </div>
        </form>
      </div>

        </form>
  </div>

</div>
</div>
<div class="content"></div>
</div>
</div>
</div>
@endforeach
</div>

<div class="footer">
<div class="botnavContainer" style="width:auto; margin:0; position:relative; bottom:0; margin-left: 9%; display: flex;">
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
<script type="text/javascript">
var password = document.getElementById("pass")
, confirm_password = document.getElementById("confirmpass");

function validatePassword(){
if(password.value != confirm_password.value) {
confirm_password.setCustomValidity("Password Tidak Sama");
} else {
confirm_password.setCustomValidity('');
}
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>



<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
  $('.js-tilt').tilt({
    scale: 1.1
  })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
