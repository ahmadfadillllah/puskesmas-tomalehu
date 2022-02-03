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
</head>
<body>
	<div class="content-wrapper">
		<header class="wrapper bg-soft-primary">
			<nav class="navbar center-nav transparent navbar-expand-lg navbar-light">
				<div class="container flex-lg-row flex-nowrap align-items-center">
                <div class="navbar-brand w-100 rounded me-2"><a href="javascript:void(0);"><h2>Puskesmas Tomalehu</h2></a></div>
					<div class="navbar-collapse offcanvas-nav">
						<div class="offcanvas-header d-lg-none d-xl-none">
							<a href="index.html"><img src="src/img/logo-light.png" srcset="src/img/logo-light@2x.png 2x" alt="" /></a>
							<button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close" aria-label="Close"></button>
						</div>
						<ul class="navbar-nav">
							<li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">How It Works</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
						</ul>
						<!-- /.navbar-nav -->
					</div>
					<!-- /.navbar-collapse -->
                    <div class="navbar-other w-100 d-flex ms-auto">
						<ul class="navbar-nav flex-row align-items-center ms-auto" data-sm-skip="true">
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
