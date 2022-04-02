@include('master.header')
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
@include('master.footer')
