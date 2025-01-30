@extends('pages.front.layout-login')

@section('main')
<!-- =======================
Main Content START -->
<section class="vh-xxl-100">
	<div class="container h-100 d-flex px-0 px-sm-4">
		<div class="row justify-content-center align-items-center m-auto">
			<div class="col-12">
				<div class="bg-mode shadow rounded-3 overflow-hidden">
					<div class="row g-0">
						<!-- Vector Image -->
						<div class="col-lg-6 d-md-flex align-items-center order-2 order-lg-1">
							<div class="p-3 p-lg-5">
								<img src="{{asset('front/images/signin.svg')}}" alt="">
							</div>
							<!-- Divider -->
							<div class="vr opacity-1 d-none d-lg-block"></div>
						</div>
		
						<!-- Information -->
						<div class="col-lg-6 order-1">
							<div class="p-4 p-sm-6">
								<!-- Logo -->
								<a href="index.html">
									<img class="h-50px mb-4" src="{{asset('front/images/logo-icon.svg')}}" alt="logo">
								</a>
								<!-- Title -->
								<h1 class="mb-2 h3">Create new account</h1>
								<p class="mb-0">Already a member?<a href="sign-in.html"> Log in</a></p>
		
								<!-- Form START -->
								<form class="mt-4 text-start">
									<!-- Email -->
									<div class="mb-3">
										<label class="form-label">Enter email id</label>
										<input type="email" class="form-control">
									</div>
									<!-- Password -->
									<div class="mb-3 position-relative">
										<label class="form-label">Enter password</label>
										<input class="form-control fakepassword" type="password" id="psw-input">
										<span class="position-absolute top-50 end-0 translate-middle-y p-0 mt-3">
											<i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
										</span>
									</div>
									<!-- Confirm Password -->
									<div class="mb-3">
										<label class="form-label">Confirm Password</label>
										<input type="password" class="form-control">
									</div>
									<!-- Remember me -->
									<div class="mb-3">
										<input type="checkbox" class="form-check-input" id="rememberCheck">
										<label class="form-check-label" for="rememberCheck">Keep me signed in</label>
									</div>
									<!-- Button -->
									<div><button type="submit" class="btn btn-primary w-100 mb-0">Sign up</button></div>
		
									<!-- Copyright -->
									<div class="text-primary-hover text-body mt-3 text-center"> Copyrights ©2024 Booking. Build by <a href="https://www.Explorindo.com/" class="text-body">Explorindo</a>. </div>
								</form>
								<!-- Form END -->
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Main Content END -->
@endsection