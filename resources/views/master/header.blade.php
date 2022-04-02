<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="{{ asset('home') }}/src/img/favicon.png">
	<title>Registrasi - Puskesmas Tomalehu</title>
	<link rel="stylesheet" href="{{ asset('home') }}/src/css/plugins.css">
	<link rel="stylesheet" href="{{ asset('home') }}/src/css/theme/aqua.css">
	<link rel="stylesheet" href="{{ asset('home') }}/src/css/font/thicccboi.css">
    {{-- SweetAlert2 --}}
    <script src="{{ asset('sweetalert2/dist') }}/sweetalert2.all.min.js"></script>
    <script src="{{ asset('sweetalert2/dist') }}/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist') }}/sweetalert2.min.css">
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
