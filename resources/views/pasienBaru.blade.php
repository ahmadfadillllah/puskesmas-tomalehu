@include('header')
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
                        <form method="post" id="ajaxModel" action="{{ route('tambahpasienBaru') }}">
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
