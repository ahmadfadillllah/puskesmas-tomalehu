@include('header')
		<!-- /header -->
		<section class="wrapper bg-light angled upper-end">
			<div class="container py-14 py-md-12">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
						<p class="lead text-center mb-5">Masukkan NIK KTP untuk mengetahui informasi antrian Anda saat ini...</p>
						@if (session('notification'))
                        <script>
                            Swal.fire({
                                title: 'Information',
                                text: '{{{ session('notification') }}}',
                                icon: 'Success',
                                confirmButtonText: 'Ok'
                            })
                        </script>
                        @endif
                        <form method="POST" action="{{ route('viewPasien') }}">
                            {{ csrf_field() }}
							<div class="messages"></div>
							<div class="controls">
								<div class="row gx-4">
									<div class="col-12">
										<div class="form-label-group mb-6">
											<input type="text" name="nik_ktp" class="form-control" required="required" data-error="Masukkan NIK">
											<label for="form_name">Masukkan NIK KTP</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-12 text-center">
										<input type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="Cek Antrian">
                                        <br><a class="text-muted" href="{{ route("home") }}">Kembali ke Home</a>
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
