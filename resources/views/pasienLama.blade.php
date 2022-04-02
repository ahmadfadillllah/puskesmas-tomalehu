@include('master.header')
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
@include('master.footer')
