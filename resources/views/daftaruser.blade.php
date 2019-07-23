<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daftar Pengguna Baru</title>

	<link rel="icon" type="image/png" href="{!! asset('img/desain berigame1.png') !!}"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
</head>
<body>
	@if(session()->has('authlogin'))
	<div class="alert" style="position: fixed;
	  margin-left: 40%;
	  z-index: 1000;
	  padding: 20px auto;
	  background-color: #f44336;
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
	 <strong>Authentication Required!</strong>
			 {{ session()->get('authlogin') }}
	</div>
	</center>
	@endif
	@if(session()->has('registered'))
	<div class="alert" style="position: fixed;
	  margin-left: 35%;
	  z-index: 1000;
	  padding: 20px auto;
	  background-color: #f44336;
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
	 <strong>Registrasi Gagal!</strong>
			 {{ session()->get('registered') }}
	</div>
	</center>
	@endif
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt><br>
					<br><a href="{{ url('/') }}"><img src="{!! asset('img/desain berigame1.png') !!}"/></a>
				</div>



          <form class="login100-form validate-form" method ="POST" action="/pendaftaran/submit" enctype="multipart/form-data">
            {{ csrf_field() }}
          <span class="login100-form-title">
            Daftar Pengguna Baru
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Nama lengkap dibutuhkan">
            <p style="color:white;">Nama Lengkap</p>
            <input class="input100" type="text" name="name" placeholder="Nama Lengkap">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Email Dibutuhkan">
            <p style="color:white;">Email</p>
            <input class="input100" type="text" name="imel" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            </span>
          </div>


          <div class="wrap-input100 validate-input" data-validate = "Username Dibutuhkan">
            <p style="color:white;">Username</p>
            <input class="input100" type="text" name="uname" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password Dibutuhkan">
            <p style="color:white;">Password</p>
            <input class="input100" type="password" name="pass" placeholder="Password" id="pass">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            </span>
          </div>

					<div class="wrap-input100 validate-input" data-validate = "Password Dibutuhkan">
						<p style="color:white;">Confirm Password</p>
						<input class="input100" type="password" name="confirm_password" placeholder="Confirm Password" id="confirmpass">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>



					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="btnSubmit">
							Daftar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	var password = document.getElementById("pass")
, confirm_password = document.getElementById("confirmpass");

function validatePassword(){
if(password.value != confirm_password.value) {
	confirm_password.setCustomValidity("Passwords Tidak Sama");
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
