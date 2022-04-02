@include('master.header')
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
@include('master.footer')
