<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="{{ asset('home') }}/src/img/favicon.png">
	<title>Cek Antrian - Puskesmas Tomalehu</title>
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

                    @if ($dataAntrian->nomor_antrian == NULL)
                    <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
						<p class="lead text-center mb-5">Hai, {{ $dataPasien->nama_lengkap }}, Maaf anda belum mengantri hari ini
                            <br>Silahkan Mengambil Nomor Antrian terlebih dahulu untuk bisa konsultasi ke Dokter</p>
                            <form method="post" action="{{ route('tambahantrian') }}">
                                {{ csrf_field() }}
                                <div class="controls">
                                    <div class="row gx-4">
                                        <div class="col-md-6">
                                            <div class="form-label-group mb-4">
                                                <input id="form_name" type="number" name="nik_ktp" value="{{ $dataPasien->nik_ktp }}" class="form-control" hidden>
                                                <input id="form_name" type="number" name="nomor_antrian" value="{{ $nomor }}" class="form-control" hidden>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p>Masukkan Kode Verifikasi yang telah dikirim ke No. WhatsApp anda, No. WhatsApp anda {{ $dataPasien->no_hp }}</p>
                                            <div class="form-label-group mb-6">
                                                <input type="text" name="kode" class="form-control" required="required" data-error="Masukkan Kode Verifikasi">
                                                <label for="form_name">Masukkan Kode Verifikasi</label>
                                                <div class="help-block with-errors"></div>
                                                <small>*Sensitive Case</small>
                                            </div>
                                        </div>
                                        <!-- /column -->
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-success rounded-pill btn-send mb-3" >Ambil Nomor Antrian</button>
                                            <br>
                                        </div>


                                        <!-- /column -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.controls -->
                            </form>
                            <form action="{{ route("updateKode") }}" method="POST">
                                {{ csrf_field() }}
                                <input id="form_name" type="number" name="nik_ktp" value="{{ $dataPasien->nik_ktp }}" class="form-control" hidden>
                                <center><button type="submit" class="btn btn-secondary btn-sm">Kirim ulang Kode Activation</button></center>
                            </form>
						<!-- /form -->
					</div>
                    @else
                    <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                        @if (session('success'))
                        <script>
                            Swal.fire({
                                title: 'Upss',
                                text: `{{ session('success') }}`,
                                icon: 'info',
                                confirmButtonText: 'Ok'
                            })

                        </script>
                        @endif
						<p class="lead text-center mb-5">Hai, {{ $dataPasien->nama_lengkap }}, Silahkan menunggu antrian anda
                            <br>Berikut informasi tentang data diri anda</p>

                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="lead text-left">NIK KTP          : {{ $dataPasien->nik_ktp }}</p>
                                        <p class="lead text-left">Nama Lengkap     : {{ $dataPasien->nama_lengkap }}</p>
                                        <p class="lead text-left">Umur             : {{ $dataPasien->umur }}</p>
                                        <p class="lead text-left">Jenis Kelamin    : {{ $dataPasien->jenis_kelamin }}</p>
                                        <p class="lead text-left">Alamat           : {{ $dataPasien->alamat }}</p>
                                        <p class="lead text-left">No. Handphone    : {{ $dataPasien->no_hp }}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="lead text-left">No. Antrian      : {{ $dataAntrian->nomor_antrian }}</p>
                                    </div>
                                </div>

					</div>
                    @endif


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
    {{-- Menampilkan Data --}}
    <script src="{{ asset('server/assets/js/tampil.js') }}"></script>
</body>
</html>
