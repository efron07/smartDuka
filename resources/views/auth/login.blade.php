<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	<title>Deport Manager - Sign In</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<div class="authentication-header"></div>
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="{{ asset('assets/images/logo-img.png') }}" width="180" alt="Logo" />
						</div>
						<div class="card rounded-4">
							<div class="card-body">
								<div class="p-4 rounded">
									<div class="text-center">
										<h3>Sign In</h3>
										<p>Don't have an account? <a href="/signup">Sign up here</a></p>
									</div>
									<div class="login-separator text-center mb-4">
										<span>SIGN IN WITH PHONE</span>
										<hr />
									</div>
									<form method="POST" action="/login" class="row g-3">
										@csrf

										<div class="col-12">
											<label for="phone" class="form-label">Phone Number</label>
											<input type="text" name="phone" class="form-control" id="phone" placeholder="+123456789" required>
											@error('phone')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>

										<div class="col-12">
											<label for="password" class="form-label">Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" name="password" class="form-control border-end-0" id="password" placeholder="Enter Password" required>
												<a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
											</div>
											@error('password')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>

										<div class="col-md-6">
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
												<label class="form-check-label" for="rememberMe">Remember Me</label>
											</div>
										</div>

										<div class="col-md-6 text-end">
											<a href="/forget-password">Forgot Password?</a>
										</div>

										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-primary">
													<i class="bx bxs-lock-open"></i> Sign In
												</button>
											</div>
										</div>
									</form>

									@if ($errors->any())
										<div class="alert alert-danger mt-3">
											<ul class="mb-0">
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<!-- Password Show/Hide -->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const togglePassword = document.querySelector('#show_hide_password a');
			const passwordInput = document.querySelector('#password');
			const passwordIcon = document.querySelector('#show_hide_password i');

			togglePassword.addEventListener('click', function (event) {
				event.preventDefault();
				if (passwordInput.type === 'password') {
					passwordInput.type = 'text';
					passwordIcon.classList.remove('bx-hide');
					passwordIcon.classList.add('bx-show');
				} else {
					passwordInput.type = 'password';
					passwordIcon.classList.remove('bx-show');
					passwordIcon.classList.add('bx-hide');
				}
			});
		});
	</script>
</body>
</html>
