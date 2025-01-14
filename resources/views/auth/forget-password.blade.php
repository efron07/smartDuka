<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/synadmin/demo/vertical/authentication-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Nov 2024 15:17:26 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/highcharts/css/highcharts.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{ asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{ asset('assets/css/header-colors.css')}}" />
	<title>Deport Manager - Forget Password</title>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-header"></div>
		<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card forgot-box rounded-4">
				<div class="card-body">
					<div class="p-4 rounded">
						<div class="text-center">
							<img src="assets/images/icons/lock.png" width="120" alt="" />
						</div>
						<h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
						<p class="text-muted">Enter your registered phone number to reset the password</p>
						<div class="my-4">
							<label class="form-label">Phone Number</label>
							<input type="text" class="form-control form-control-lg" placeholder="255715XXXXXX" />
						</div>
						<div class="d-grid gap-2">
							<button type="button" class="btn btn-primary btn-lg">Send</button> <a href="/signin" class="btn btn-white btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>


<!-- Mirrored from codervent.com/synadmin/demo/vertical/authentication-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Nov 2024 15:17:29 GMT -->
</html>
