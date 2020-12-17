<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Login User</title>
	<!-- Favicon-->
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
	<!-- Plugins Core Css -->
	<link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
	<!-- Custom Css -->
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/pages/extra_pages.css') }}" rel="stylesheet" />
</head>
<body class="light">
	<div class="loginmain">
		<div class="loginCard">
			<div class="login-btn splits">
				<p>Already an user?</p>
				<button class="active">Login</button>
			</div>
			<div class="rgstr-btn splits">
				<p>Don't have an account?</p>
				<button>Register</button>
			</div>
			<div class="wrapper">
                <form id="login" tabindex="500" method="post" action="{{route('user.login.submit')}}">
                    @csrf
					<h3>Login</h3>
					<div class="mail">
                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                        value="{{ old('email') }}" name="email">
                        @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
						<label>Masukkan Email</label>
					</div>
					<div class="passwd">
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                        name="password">
                        @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
						<label>Password</label>
					</div>
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					<div class="submit">
						<button class="dark">Login</button>
					</div>
					
				</form>
                <form id="register" tabindex="502" method="post" action="{{route('user.register.submit')}}">
                    @csrf
					<h3>Register</h3>
					<div class="name">
						<input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                        value="{{ old('name') }}" name="name">
                        @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
						<label>Masukkan Nama Lengkap</label>
					</div>
					<div class="mail">
						<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                        value="{{ old('email') }}" name="email">
                        @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
						<label>Masukkan Email</label>
					</div>
					
					<div class="passwd">
						<input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                        name="password">
                        @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
						<label>Masukkan Password</label>
					</div>
					<div class="submit">
						<button class="dark">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Plugins Js -->
	<script src="{{ asset('assets/js/app.min.js') }}"></script>
	<!-- Extra page Js -->
	<script src="{{ asset('assets/js/pages/examples/login-register.js') }}"></script>
</body>
</html>