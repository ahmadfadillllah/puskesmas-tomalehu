@include('master.header')
		<!-- /header -->
		<section class="wrapper bg-light angled upper-end">
			<div class="container py-14 py-md-12">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
						<p class="lead text-center mb-5">Masukkan Email dan Password Anda untuk masuk di halaman administrator</p>
						<form  method="post" action="{{ route('postlogin') }}">
                            {{ csrf_field() }}
							<div class="messages"></div>
                            @if (session('notif'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('notif') }}
                            </div>
                            @endif
							<div class="controls">
								<div class="row gx-4">
									<div class="col-md-6">
										<div class="form-label-group mb-4">
											<input id="form_name" type="email" name="email" class="form-control" placeholder="Jane" required="required" data-error="Email is required.">
											<label for="form_name">Email</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-md-6">
										<div class="form-label-group mb-4">
											<input id="form_lastname" type="password" name="password" class="form-control" placeholder="Doe" required="required" data-error="Password is required.">
											<label for="form_lastname">Password</label>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<!-- /column -->
									<div class="col-12 text-center">
										<input type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="Login">
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
@include('master.footer')
