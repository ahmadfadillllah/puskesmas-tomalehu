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
		<!-- /header -->
		<section class="wrapper bg-light angled upper-end">
			<div class="container py-14 py-md-12">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
						<p class="lead text-center mb-5">Masukkan Informasi anda dibawah ini untuk mengambil nomor antrian
                            <br>
                            @error('nik_ktp')<div class="alert alert-danger" role="alert">
                                {{ $message }}
                              </div>
                              @enderror
                        </p>
						@if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                          </div>
                        @endif
                        <form method="post" action="{{ route('tambahpasienBaru') }}">
                            {{ csrf_field() }}
							<div class="messages"></div>
							<div class="controls">
								<div class="row gx-4">
									<div class="col-md-6">
										<div class="form-label-group mb-4">
											<input id="form_name" type="text" name="nik_ktp" class="form-control" placeholder="Jane" required="required" data-error="NIK KTP harus diisi.">
											<label for="form_name">NIK KTP</label>
											<div class="help-block with-errors"></div>

										</div>
									</div>
									<!-- /column -->
									<div class="col-md-6">
										<div class="form-label-group mb-4">
											<input id="form_lastname" type="text" name="nama_lengkap" class="form-control" placeholder="Doe" required="required" data-error="Nama Lengkap harus diisi.">
											<label for="form_lastname">Nama Lengkap</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-label-group mb-4">
											<input id="form_name" type="number" name="umur" class="form-control" placeholder="Jane" required="required" data-error="Umur harus diisi.">
											<label for="form_name">Umur</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-md-6">
										<div class="form-label-group mb-4">
                                            <select name="jenis_kelamin" class="form-control" required="required" data-error="No. Handphone harus diisi.">
                                                <optgroup label="Pilih Jenis Kelamin">
                                                <option for="form_name" value="Laki-laki">Laki-laki</option>
                                                <option for="form_name" value="Perempuan">Perempuan</option>
                                                </optgroup>
                                              </select>
											<div class="help-block with-errors"></div>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-label-group mb-4">
											<input id="form_name" type="text" name="alamat" class="form-control" placeholder="Jane" required="required" data-error="Alamat harus diisi.">
											<label for="form_name">Alamat</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-md-6">
										<div class="form-label-group mb-4">
											<input id="form_lastname" type="number" name="no_hp" class="form-control" placeholder="Doe" required="required" data-error="Keluhan harus diisi.">
											<label for="form_lastname">No. Handphone</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-12 text-center">
										<button type="submit" class="btn btn-primary rounded-pill btn-send mb-3" >Registrasi</button>
                                        <br><a class="text-muted" href="{{ route("pasienLama") }}">Cek Antrian</a>
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
