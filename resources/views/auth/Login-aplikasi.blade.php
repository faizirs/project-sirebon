<!DOCTYPE html>
<html lang="en">
<head>
	<title>SiRebon</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
    <link rel="shortcut icon" type="image/png" href="{{ asset('SEOdash/src/assets/images/logos/logo-sirebon-1.png') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('StyleLogin/Login/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('StyleLogin/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('StyleLogin/Login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('StyleLogin/Login/vendor/animate/animate.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('StyleLogin/Login/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('StyleLogin/Login/vendor/animsition/css/animsition.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('StyleLogin/Login/vendor/select2/select2.min.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('StyleLogin/Login/vendor/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('StyleLogin/Login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('StyleLogin/Login/css/main.css') }}">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{ route('postlogin') }}" method="post">
                    @csrf
					<span class="login100-form-title p-b-26">
						Login Sirebon
					</span>
					<span class="login100-form-title p-b-48">
						<img src="{{ asset('SEOdash/src/assets/images/logos/logo-sirebon-2.png') }}" alt="Profile Image" class="profile-img">
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-10">
						<a class="txt1" href="{{ route('password.request') }}">
							Lupa Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	
	<script src="{{ asset('StyleLogin/Login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('StyleLogin/Login/vendor/animsition/js/animsition.min.js') }}"></script>
	<script src="{{ asset('StyleLogin/Login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('StyleLogin/Login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('StyleLogin/Login/vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('StyleLogin/Login/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('StyleLogin/Login/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('StyleLogin/Login/vendor/countdowntime/countdowntime.js') }}"></script>
	<script src="{{ asset('StyleLogin/Login/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($errors->has('login_gagal'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ $errors->first('login_gagal') }}"
        });
    </script>
@endif
</body>
</html>