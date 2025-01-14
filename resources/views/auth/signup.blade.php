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
	<title>Signup</title>
</head>

<body>
	<div class="wrapper">
		<div class="authentication-header"></div>
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 mx-auto">
						<div class="card rounded-4">
							<div class="card-body">
								<div class="p-4 rounded">
									<div class="text-center">
										<h3>Sign Up</h3>
										<p>Already have an account? <a href="/login">Sign in here</a></p>
									</div>
									<form method="POST" action="/signup" class="row g-3">
										@csrf

										<div class="col-12">
											<label for="name" class="form-label">Full Name</label>
											<input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
										</div>

										<div class="col-12">
											<label for="phone" class="form-label">Phone Number</label>
											<input type="text" class="form-control" id="phone" name="phone" placeholder="255++" required>
										</div>



										<div class="col-12">
											<label for="business" class="form-label">Business Name</label>
											<input type="text" class="form-control" id="business" name="business" placeholder="Your Business Name">
										</div>

										<div class="col-12">
											<label for="password" class="form-label">Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
												<a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
											</div>
										</div>

										<div class="col-12">
											<label for="password_confirmation" class="form-label">Confirm Password</label>
											<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
										</div>

										<div class="col-12">
											<button type="submit" class="btn btn-primary w-100">Sign Up</button>
										</div>
									</form>

									@if ($errors->any())
										<div class="mt-3 alert alert-danger">
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
			</div>
		</div>
	</div>

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
