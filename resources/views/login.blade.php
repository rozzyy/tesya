<!DOCTYPE html>
<html lang="en">

<head>

	<title>TESYA | Tebing Syahbandar Katalog</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="{{ url('admin/assets/images/favicon.ico' )}}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ url('admin/assets/css/style.css') }}">
	
	


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						{{-- <img src="{{ url('admin/assets/images/logo-dark.png') }}" alt="" class="img-fluid mb-4"> --}}
						<h4 class="mb-3 f-w-400">TESYA</h4>
						<form method="POST" action="{{ route('login') }}"">
							@csrf
							<div class="form-group mb-3">
								<label class="floating-label" for="Email">Email</label>
								<input type="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="Email" placeholder="" name="email">
								@if ($errors->has('email'))
								<span class="text-danger">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-group mb-4">
								<label class="floating-label" for="Password">Password</label>
								<input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" id="Password" placeholder="" name="password">
								@if ($errors->has('password'))
								<span class="text-danger">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
							<button class="btn btn-block btn-primary mb-4" type="submit">Masuk</button>
						</form>
						{{-- <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
						<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ url('admin/assets/js/vendor-all.min.js') }}"></script>
<script src="{{ url('admin/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ url('admin/assets/js/ripple.js') }}"></script>
<script src="{{ url('admin/assets/js/pcoded.min.js') }}"></script>



</body>

</html>
