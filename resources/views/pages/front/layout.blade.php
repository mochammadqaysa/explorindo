<!DOCTYPE html><html lang="en"><head>
	<title>Explorindo - Multipurpose Online Booking</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Explorindo.com">
	<meta name="description" content="Explorindo - Multipurpose Online Booking">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')
 
		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})
		
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{asset('front/favicon.ico')}}">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap-icons.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/tiny-slider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/glightbox.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/choices.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/flatpickr.min.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">


</head>

<body>

<!-- Header START -->
<header class="navbar-light header-sticky">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand" href="{{route('front.index')}}">
				<img class="light-mode-item navbar-brand-item" src="{{asset('front/images/logo.svg')}}" alt="logo">
				<img class="dark-mode-item navbar-brand-item" src="{{asset('front/images/logo-light.svg')}}" alt="logo">
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto ms-sm-0 p-0 p-sm-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
        <span class="d-none d-sm-inline-block small">Menu</span>
			</button>

			<!-- Responsive category toggler -->
			<button class="navbar-toggler ms-sm-auto mx-3 me-md-0 p-0 p-sm-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCategoryCollapse" aria-controls="navbarCategoryCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<i class="bi bi-grid-3x3-gap-fill fa-fw"></i><span class="d-none d-sm-inline-block small">Category</span>
			</button>


			<!-- Profile and Notification START -->
			<ul class="nav flex-row align-items-center list-unstyled ms-xl-auto">

				<li class="nav-item nav-search me-3 d-none d-sm-block">
					<a class="nav-notification btn btn-light mb-0 p-0" href="{{route('front.search')}}" id="searchDropdown">
						<i class="bi bi-search"> </i>
					</a>
				</li>

				<!-- Profile dropdown START -->
				<li class="nav-item ms-3 dropdown">
					<!-- Avatar -->
					<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-2" src="{{asset('front/images/01.jpg')}}" alt="avatar">
					</a>

					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3 mb-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle shadow" src="{{asset('front/images/01.jpg')}}" alt="avatar">
								</div>
								<div>
									<a class="h6 mt-2 mt-sm-0" href="#">Lori Ferguson</a>
									<p class="small m-0">example@gmail.com</p>
								</div>
							</div>
						</li>

						<!-- Links -->
						<li> <hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-bookmark-check fa-fw me-2"></i>My Bookings</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-heart fa-fw me-2"></i>My Wishlist</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Settings</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help Center</a></li>
						<li><a class="dropdown-item bg-danger-soft-hover" href="#"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
						<li> <hr class="dropdown-divider"></li>

						<!-- Dark mode options START -->
						<li>
							<div class="nav-pills-primary-soft theme-icon-active d-flex justify-content-between align-items-center p-2 pb-0">
								<span>Mode:</span>
								<button type="button" class="btn btn-link nav-link text-primary-hover mb-0 p-0" data-bs-theme-value="light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Light">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
										<path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
										<use href="#"></use>
									</svg>
								</button>
								<button type="button" class="btn btn-link nav-link text-primary-hover mb-0 p-0" data-bs-theme-value="dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Dark">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
										<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"></path>
										<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
										<use href="#"></use>
									</svg>
								</button>
								<button type="button" class="btn btn-link nav-link text-primary-hover mb-0 p-0 active" data-bs-theme-value="auto" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Auto">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
										<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
										<use href="#"></use>
									</svg>
								</button>
							</div>
						</li> 
						<!-- Dark mode options END-->
					</ul>
				</li>
				<!-- Profile dropdown END -->
			</ul>
			<!-- Profile and Notification START -->

		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
  @yield('main')
</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer>
	<div class="container">
		<div class="bg-light rounded-top p-4 pb-0">
			<div class="row g-4 justify-content-between">

				<!-- Widget 1 START -->
				<div class="col-md-5 col-lg-4">
					<!-- logo -->
					<a class="me-0" href="index.html">
						<img class="light-mode-item h-40px" src="{{asset('front/images/logo.svg')}}" alt="logo">
            <img class="dark-mode-item h-40px" src="{{asset('front/images/logo-light.svg')}}" alt="logo">
					</a>

					<p class="text-reset mt-4 mb-2">Subscribe to Our Newsletter</p>
					<!-- Newsletter -->
					<form class="bg-body rounded-2 p-2">
						<div class="input-group">
							<input class="form-control border-0 me-1" type="email" placeholder="Enter your email">
							<button type="button" class="btn btn-dark rounded-2 mb-0"><i class="bi bi-send"></i></button>
						</div>
					</form>
				</div>
				<!-- Widget 1 END -->

				<!-- Widget 2 START -->
				<div class="col-md-7 col-lg-4">
					<div class="row g-4 g-lg-5">
						<!-- Link block -->
						<div class="col-6">
							<h5 class="mb-2 mb-md-4">Page</h5>
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link pt-0" href="#">Blog</a></li>
								<li class="nav-item"><a class="nav-link" href="#">About</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Contact us</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Services</a></li>
							</ul>
						</div>

						<!-- Link block -->
						<div class="col-6">
							<h5 class="mb-2 mb-md-4">Links</h5>
							<ul class="nav flex-column">
								<li class="nav-item"><a class="nav-link pt-0" href="#">Sign up</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Sign in</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Cookie</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Supports</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Widget 2 END -->
			</div>

			<!-- Divider -->
			<hr class="mt-4 mb-0">

			<!-- Bottom footer -->
			<div class="container py-3 px-0">
				<div class="d-md-flex justify-content-between align-items-center text-center text-md-left">
					<!-- copyright text -->
					<div class="text-primary-hover text-body"> Copyrights ©2024 Booking. build by <a href="https://www.Explorindo.com/" class="text-body">Explorindo</a>. </div>
					<!-- copyright links-->
					<div class="mt-3 mt-md-0">
						<ul class="nav text-primary-hover justify-content-center justify-content-md-end">
							<li class="nav-item">
								<a class="nav-link text-body" href="#"><i class="fab fa-facebook-f"></i></a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-body" href="#"><i class="fab fa-twitter"></i></a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-body" href="#"><i class="fab fa-instagram"></i></a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-body" href="#"><i class="fab fa-linkedin-in"></i></a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-body" href="#"><i class="fab fa-github"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"></div>

<!-- Bootstrap JS -->
<script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>


@yield('scripts')
<!-- Vendors -->
<script src="{{asset('front/js/tiny-slider.js')}}"></script>
<script src="{{asset('front/js/glightbox.js')}}"></script>
<script src="{{asset('front/js/choices.min.js')}}"></script>
<script src="{{asset('front/js/flatpickr.min.js')}}"></script>

<!-- ThemeFunctions -->
<script src="{{asset('front/js/functions.js')}}"></script>


</body></html>