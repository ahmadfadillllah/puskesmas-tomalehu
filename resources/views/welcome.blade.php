@include('master.header')
		<!-- /header -->
		<section class="wrapper bg-soft-primary">
			<div class="container pt-5 pb-15 py-lg-17 py-xl-19 pb-xl-20 position-relative">
				<img class="position-lg-absolute col-12 col-lg-10 col-xl-11 col-xxl-10 px-lg-5 px-xl-0 ms-n5 ms-sm-n8 ms-md-n10 ms-lg-0 mb-md-4 mb-lg-0" src="{{ asset('home') }}/src/img/photos/devices.png" srcset="{{ asset('home') }}/src/img/puskesmas.png" data-cue="fadeIn" alt="" style="top: -1%; left: -21%;" />
				<div class="row gx-0 align-items-center">
					<div class="col-md-10 offset-md-1 col-lg-5 offset-lg-7 offset-xxl-6 ps-xxl-12 mt-md-n9 text-center text-lg-start" data-cues="slideInDown" data-group="page-title" data-delay="600">
						<h1 class="display-2 mb-4 mx-sm-n2 mx-md-0">Welcome to Puskesmas Tomalehu</h1>
						<p class="lead fs-lg mb-7 px-md-10 px-lg-0">Ini adalah sebuah aplikasi untuk memudahkan pasien dalam mengambil antrian.</p>
						<div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown" data-group="page-title-buttons" data-delay="900">
							<span><a class="btn btn-primary btn-icon btn-icon-start rounded me-2" href="{{ route('pasienBaru') }}"> Pasien Baru</a></span>
							<span><a class="btn btn-green btn-icon btn-icon-start rounded" href="{{ route('pasienLama') }}"> Pasien Lama</a></span>
						</div>
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
@include('master.footer')
