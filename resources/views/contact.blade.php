<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="{{ asset('home') }}/src/img/favicon.png">
	<title>Contact - Puskesmas Tomalehu</title>
	<link rel="stylesheet" href="{{ asset('home') }}/src/css/plugins.css">
	<link rel="stylesheet" href="{{ asset('home') }}/src/css/theme/aqua.css">
	<link rel="stylesheet" href="{{ asset('home') }}/src/css/font/thicccboi.css">
</head>
<body>
	<div class="content-wrapper">
		<header class="wrapper bg-soft-primary">
			<nav class="navbar classic transparent navbar-expand-lg navbar-light">
				<div class="container flex-lg-row flex-nowrap align-items-center">
					<div class="navbar-brand w-100 rounded me-2"><a href="{{ route('home') }}"><h2>Puskesmas Tomalehu</h2></a></div>
					<div class="navbar-collapse offcanvas-nav">
						<div class="offcanvas-header d-lg-none d-xl-none">
							<a href="javascript:void(0);" style="color: white"><h2>Puskesmas Tomalehu</h2></a>
							<button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close" aria-label="Close"></button>
						</div>
						<ul class="navbar-nav">
							<li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
						</ul>
                        <ul class="navbar-nav">
							<li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
						</ul>
						<!-- /.navbar-nav -->
					</div>
					<!-- /.navbar-collapse -->
                    <div class="navbar-other w-100 d-flex ms-auto">
						<ul class="navbar-nav flex-row align-items-center ms-auto" data-sm-skip="true">
							<li class="nav-item d-none d-md-block">
								<a href="{{ route('login') }}" class="btn btn-sm btn-primary rounded">Login <small>(Server)</small></a>
							</li>
							<li class="nav-item d-lg-none">
								<div class="navbar-hamburger"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
							</li>
						</ul>
						<!-- /.navbar-nav -->
					</div>
				</div>
				<!-- /.container -->
			</nav>
			<!-- /.navbar -->
		</header>
		<!-- /header -->
		<section class="wrapper bg-light angled upper-end">
			<div class="container py-14 py-md-16">
				<div class="row">
                    <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                        <h2 class="display-4 mb-3 text-center">Hubungi Kami</h2>
						<p class="lead text-center mb-10">Silahkan menghubungi ke admin jika terkendala mengenai aplikasi ini.</p>
                        @if (session('notification'))
                        <div class="alert alert-dark" role="alert">
                            {{ session('notification') }}
                          </div>
                        @endif
						<form method="post" action="{{ route('postcontact') }}">
                            @csrf
							<div class="messages"></div>
							<div class="controls">
								<div class="row gx-4">
									<div class="col-md-6">
										<div class="form-label-group mb-4">
											<input id="form_name" type="text" name="name" class="form-control" placeholder="Jane" required="required" data-error="Nama Lengkap is required.">
											<label for="form_name">Nama Lengkap</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-md-6">
										<div class="form-label-group mb-4">
											<input id="form_lastname" type="text" name="nik" class="form-control" placeholder="Doe" required="required" data-error="NIK is required.">
											<label for="form_lastname">NIK</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-md-6">
										<div class="form-label-group mb-4">
											<input id="form_email" type="email" name="email" class="form-control" placeholder="jane.doe@example.com" required="required" data-error="Valid email is required.">
											<label for="form_email">Email *</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-md-6">
										<div class="form-label-group mb-4">
											<input id="form_phone" type="tel" name="no_hp" class="form-control" placeholder="Your phone number">
											<label for="form_phone">No. Handphone</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-12">
										<div class="form-label-group mb-4">
											<textarea id="form_message" name="message" class="form-control" placeholder="Your message" rows="5" required="required" data-error="Message is required."></textarea>
											<label for="form_message">Message *</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-12 text-center">
										<input type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="Send message">
										<p class="text-muted"><strong>*</strong> These fields are required.</p>
									</div>
									<!-- /column -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.controls -->
						</form>
						<!-- /form -->
					</div>
					<!-- /column -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</section>
		<!-- /section -->
		{{-- <section class="wrapper bg-light">
			<div class="container py-14 py-md-17">
				<div class="row text-center mt-xl-12">
					<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
						<h2 class="fs-15 text-uppercase text-muted mb-3">App Features</h2>
						<h3 class="display-4 mb-9 px-xxl-11">Tomalehu is the only app you need to track your goals for better health.</h3>
					</div>
					<!-- /column -->
				</div>
				<!-- /.row -->
				<div class="row gx-lg-8 gx-xl-12 gy-8 mb-14 mb-md-17" data-cues="slideInUp" data-group="services">
					<div class="col-md-6 col-lg-4">
						<div class="d-flex flex-row">
							<div>
								<img src="{{ asset('home') }}/src/img/icons/target.svg" class="svg-inject icon-svg icon-svg-sm text-aqua me-4" alt="" />
							</div>
							<div>
								<h4 class="mb-1">Fitness Goal</h4>
								<p class="mb-0">Duis mollis gravida commodo id luctus erat porttitor ligula, eget lacinia odio sem aget elit nullam quis risus eget.</p>
							</div>
						</div>
					</div>
					<!--/column -->
					<div class="col-md-6 col-lg-4">
						<div class="d-flex flex-row">
							<div>
								<img src="{{ asset('home') }}/src/img/icons/medal.svg" class="svg-inject icon-svg icon-svg-sm text-yellow me-4" alt="" />
							</div>
							<div>
								<h4 class="mb-1">Activity Tracking</h4>
								<p class="mb-0">Duis mollis gravida commodo id luctus erat porttitor ligula, eget lacinia odio sem aget elit nullam quis risus eget.</p>
							</div>
						</div>
					</div>
					<!--/column -->
					<div class="col-md-6 col-lg-4">
						<div class="d-flex flex-row">
							<div>
								<img src="{{ asset('home') }}/src/img/icons/clock-3.svg" class="svg-inject icon-svg icon-svg-sm text-red me-4" alt="" />
							</div>
							<div>
								<h4 class="mb-1">Sleep Analysis</h4>
								<p class="mb-0">Duis mollis gravida commodo id luctus erat porttitor ligula, eget lacinia odio sem aget elit nullam quis risus eget.</p>
							</div>
						</div>
					</div>
					<!--/column -->
					<div class="col-md-6 col-lg-4">
						<div class="d-flex flex-row">
							<div>
								<img src="{{ asset('home') }}/src/img/icons/check.svg" class="svg-inject icon-svg icon-svg-sm text-pink me-4" alt="" />
							</div>
							<div>
								<h4 class="mb-1">Workout Report</h4>
								<p class="mb-0">Duis mollis gravida commodo id luctus erat porttitor ligula, eget lacinia odio sem aget elit nullam quis risus eget.</p>
							</div>
						</div>
					</div>
					<!--/column -->
					<div class="col-md-6 col-lg-4">
						<div class="d-flex flex-row">
							<div>
								<img src="{{ asset('home') }}/src/img/icons/shop-2.svg" class="svg-inject icon-svg icon-svg-sm text-green me-4" alt="" />
							</div>
							<div>
								<h4 class="mb-1">Nutritional Analysis</h4>
								<p class="mb-0">Duis mollis gravida commodo id luctus erat porttitor ligula, eget lacinia odio sem aget elit nullam quis risus eget.</p>
							</div>
						</div>
					</div>
					<!--/column -->
					<div class="col-md-6 col-lg-4">
						<div class="d-flex flex-row">
							<div>
								<img src="{{ asset('home') }}/src/img/icons/team.svg" class="svg-inject icon-svg icon-svg-sm text-purple me-4" alt="" />
							</div>
							<div>
								<h4 class="mb-1">Activity Sharing</h4>
								<p class="mb-0">Duis mollis gravida commodo id luctus erat porttitor ligula, eget lacinia odio sem aget elit nullam quis risus eget.</p>
							</div>
						</div>
					</div>
					<!--/column -->
				</div>
			</div>
			<!-- /.container -->
		</section> --}}
		<!-- /section -->
	</div>
	<!-- /.content-wrapper -->
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
	<script src="{{ asset('home') }}/src/js/plugins.js"></script>
	<script src="{{ asset('home') }}/src/js/scripts.js"></script>
</body>
</html>
