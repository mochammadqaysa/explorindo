@extends('pages.front.layout')

@section('main')
<!-- =======================
Main Banner START -->
<section class="pt-0">
	<div class="container">
		<!-- Background image -->
		<div class="p-3 p-sm-5 rounded-3" style="background-image: url('/front/images/04.jpg'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
			<!-- Banner title -->
			<div class="row"> 
				<div class="col-md-8 mx-auto my-5"> 
					<h1 class="text-center text-dark">Maldives</h1>
					<ul class="nav nav-divider h6 text-dark mb-0 justify-content-center">
						<li class="nav-item">1 Destination</li>
						<li class="nav-item">115 Package</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Search START -->
		<div class="row mt-n4 mt-sm-n7">
			<div class="col-11 mx-auto">
				
				<!-- Booking from START -->
				<div class="bg-mode shadow p-4 rounded-3">

					<!-- Main search START -->
					<form class="form-control-bg-transparent bg-mode rounded-3">
						<div class="row g-4 align-items-center">

							<div class="col-xl-10">
								<div class="row g-4">
									<!-- Location -->
									<div class="col-md-6 col-lg-4">
										<label class="h6 fw-normal mb-0"><i class="bi bi-geo-alt text-primary me-1"></i>Location</label>
										<!-- Input field -->
										<div class="form-border-bottom form-control-transparent form-fs-lg mt-2">
											<div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select js-choice choices__input" data-search-enabled="true" hidden="" tabindex="-1" data-choice="active"><option value="North Dakota, Canada" data-custom-properties="[object Object]">North Dakota, Canada</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="North Dakota, Canada" data-custom-properties="[object Object]" aria-selected="true">North Dakota, Canada</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="search" name="search_terms" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="Select location" placeholder=""><div class="choices__list" role="listbox"><div id="choices--5rje-item-choice-1" class="choices__item choices__item--choice choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Select location</div><div id="choices--5rje-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="San Jacinto, USA" data-select-text="Press to select" data-choice-selectable="">San Jacinto, USA</div><div id="choices--5rje-item-choice-3" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="3" data-value="North Dakota, Canada" data-select-text="Press to select" data-choice-selectable="">North Dakota, Canada</div><div id="choices--5rje-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="West Virginia, Paris" data-select-text="Press to select" data-choice-selectable="">West Virginia, Paris</div></div></div></div>
										</div>
									</div>
	
									<!-- Check in -->
									<div class="col-md-6 col-lg-4">
										<label class="h6 fw-normal mb-0"><i class="bi bi-calendar text-primary me-1"></i>Date</label>
										<!-- Input field -->
										<div class="form-border-bottom form-control-transparent form-fs-lg mt-2">
											<input type="text" class="form-control flatpickr flatpickr-input" value="20 Nov 2022" placeholder="Choose a date" data-date-format="d M Y" readonly="readonly">
										</div>
									</div>
	
									<!-- Guest -->
									<div class="col-md-6 col-lg-4">
										<label class="h6 fw-normal mb-0"><i class="fa-solid fa-person-skating text-primary me-1"></i>Tour type</label>
										<!-- Input field -->
										<div class="form-border-bottom form-control-transparent form-fs-lg mt-2">
											<div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select js-choice choices__input" data-search-enabled="true" hidden="" tabindex="-1" data-choice="active"><option value="Adventure" data-custom-properties="[object Object]">Adventure</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Adventure" data-custom-properties="[object Object]" aria-selected="true">Adventure</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="search" name="search_terms" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="Select type" placeholder=""><div class="choices__list" role="listbox"><div id="choices--0jqf-item-choice-1" class="choices__item choices__item--choice choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Select type</div><div id="choices--0jqf-item-choice-2" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Adventure" data-select-text="Press to select" data-choice-selectable="">Adventure</div><div id="choices--0jqf-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Beach" data-select-text="Press to select" data-choice-selectable="">Beach</div><div id="choices--0jqf-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Desert" data-select-text="Press to select" data-choice-selectable="">Desert</div><div id="choices--0jqf-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="History" data-select-text="Press to select" data-choice-selectable="">History</div></div></div></div>
										</div>
									</div>
								</div>
							</div>
	
							<!-- Button -->
							<div class="col-xl-2">
								<div class="d-grid">
									<a href="#" class="btn btn-lg btn-dark mb-0">Take a Tour</a>
								</div>
							</div>
						</div>
					</form>
					<!-- Main search END -->

					<!-- Collapse button -->
					<div class="d-grid mt-4">
						<input type="checkbox" class="btn-check" id="btn-check-soft">
						<label class="btn btn-primary-soft btn-primary-check mb-0" for="btn-check-soft" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-controls="collapseExample">
							<i class="bi fa-fe bi-sliders me-2"></i>Advance Filters
						</label>
					</div>
					
					<!-- Advance filter START -->
					<div class="collapse" id="collapseExample">
						<form class="row g-4 mt-3">

							<!-- Input item -->
							<div class="col-md-6 col-lg-4">
								<div class="form-control-borderless">
									<label class="form-label">Enter Tour Name</label>
									<input type="text" class="form-control form-control-lg bg-light">
								</div>
							</div>

							<!-- nouislider item -->
							<div class="col-md-6 col-lg-4">
								<label class="form-label">Price Range</label>
								<div class="position-relative">
									<div class="noui-wrapper">
										<div class="d-flex justify-content-between">
											<input type="text" class="text-body input-with-range-min">
											<input type="text" class="text-body input-with-range-max">
										</div>
										<div class="noui-slider-range mt-2 noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr" data-range-min="500" data-range-max="2000" data-range-selected-min="700" data-range-selected-max="1500"><div class="noUi-base"><div class="noUi-connects"><div class="noUi-connect" style="transform: translate(13.3333%, 0px) scale(0.533333, 1);"></div></div><div class="noUi-origin" style="transform: translate(-86.6667%, 0px); z-index: 5;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="500.0" aria-valuemax="1500.0" aria-valuenow="700.0" aria-valuetext="700.00"><div class="noUi-touch-area"></div></div></div><div class="noUi-origin" style="transform: translate(-33.3333%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="700.0" aria-valuemax="2000.0" aria-valuenow="1500.0" aria-valuetext="1500.00"><div class="noUi-touch-area"></div></div></div></div></div>
									</div>
								</div>
							</div>

							<!-- Select item -->
							<div class="col-md-6 col-lg-4">
								<label class="form-label">Duration (3D/4N)</label>
								<div class="position-relative">
									<div class="noui-wrapper">
										<div class="d-flex justify-content-between">
											<input type="text" class="text-body input-with-range-min">
											<input type="text" class="text-body input-with-range-max">
										</div>
										<div class="noui-slider-range mt-2 noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr" data-range-min="2" data-range-max="7" data-range-selected-min="3" data-range-selected-max="4"><div class="noUi-base"><div class="noUi-connects"><div class="noUi-connect" style="transform: translate(20%, 0px) scale(0.2, 1);"></div></div><div class="noUi-origin" style="transform: translate(-80%, 0px); z-index: 5;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="2.0" aria-valuemax="4.0" aria-valuenow="3.0" aria-valuetext="3.00"><div class="noUi-touch-area"></div></div></div><div class="noUi-origin" style="transform: translate(-60%, 0px); z-index: 6;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="3.0" aria-valuemax="7.0" aria-valuenow="4.0" aria-valuetext="4.00"><div class="noUi-touch-area"></div></div></div></div></div>
									</div>
								</div>
							</div>

							<!-- Flights -->
							<div class="col-md-6 col-lg-4">
								<label class="form-label">Flights</label>
								<div>
									<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
										<input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked="">
										<label class="btn btn-light btn-primary-soft-check mb-0" for="btnradio1">With Flights</label>
									
										<input type="radio" class="btn-check" name="btnradio" id="btnradio2">
										<label class="btn btn-light btn-primary-soft-check mb-0" for="btnradio2">Without Flights</label>
									</div>
								</div>	
							</div>

							<!-- Star rating -->
							<div class="col-md-6 col-lg-4">
								<label class="form-label">Star Rating</label>
								<ul class="list-inline mb-0 g-3">
									<!-- 1 -->
									<li class="list-inline-item">
										<input type="checkbox" class="btn-check" id="btn-check-9">
										<label class="btn btn-light btn-primary-soft-check" for="btn-check-9">1<i class="bi bi-star-fill"></i></label>
									</li>
									<!-- 2 -->
									<li class="list-inline-item">
										<input type="checkbox" class="btn-check" id="btn-check-10">
										<label class="btn btn-light btn-primary-soft-check" for="btn-check-10">2<i class="bi bi-star-fill"></i></label>
									</li>
									<!-- 3 -->
									<li class="list-inline-item">
										<input type="checkbox" class="btn-check" id="btn-check-11">
										<label class="btn btn-light btn-primary-soft-check" for="btn-check-11">3<i class="bi bi-star-fill"></i></label>
									</li>
									<!-- 4 -->
									<li class="list-inline-item">
										<input type="checkbox" class="btn-check" id="btn-check-12">
										<label class="btn btn-light btn-primary-soft-check" for="btn-check-12">4<i class="bi bi-star-fill"></i></label>
									</li>
									<!-- 4 -->
									<li class="list-inline-item">
										<input type="checkbox" class="btn-check" id="btn-check-13">
										<label class="btn btn-light btn-primary-soft-check" for="btn-check-13">5<i class="bi bi-star-fill"></i></label>
									</li>
								</ul>	
							</div>

							<!-- Select item -->
							<div class="col-md-6 col-lg-4">
								<div class="form-control-bg-light form-size-lg">
									<label class="form-label">Holiday Type</label>
									<div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select js-choice choices__input" hidden="" tabindex="-1" data-choice="active"><option value="" data-custom-properties="[object Object]">Select Option</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__placeholder choices__item--selectable" data-item="" data-id="1" data-value="" data-custom-properties="[object Object]" aria-selected="true">Select Option</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--1qno-item-choice-1" class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Select Option</div><div id="choices--1qno-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Most Popular" data-select-text="Press to select" data-choice-selectable="">Most Popular</div><div id="choices--1qno-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Experiential Stays" data-select-text="Press to select" data-choice-selectable="">Experiential Stays</div><div id="choices--1qno-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Featured" data-select-text="Press to select" data-choice-selectable="">Featured</div><div id="choices--1qno-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="Group Holiday" data-select-text="Press to select" data-choice-selectable="">Group Holiday</div><div id="choices--1qno-item-choice-6" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="6" data-value="Experiential" data-select-text="Press to select" data-choice-selectable="">Experiential</div><div id="choices--1qno-item-choice-7" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="7" data-value="Offbeat" data-select-text="Press to select" data-choice-selectable="">Offbeat</div><div id="choices--1qno-item-choice-8" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="8" data-value="Indulgence" data-select-text="Press to select" data-choice-selectable="">Indulgence</div><div id="choices--1qno-item-choice-9" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="9" data-value="Fully Loaded" data-select-text="Press to select" data-choice-selectable="">Fully Loaded</div><div id="choices--1qno-item-choice-10" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="10" data-value="Kid-friendly" data-select-text="Press to select" data-choice-selectable="">Kid-friendly</div></div></div></div>
								</div>
							</div>
						</form>
					</div>
					<!-- Advance filter END -->

				</div>
				<!-- Booking from END -->
			</div>
		</div>
		<!-- Search END -->

		<!-- Alert box START -->
		<div class="alert alert-danger d-flex align-items-center mt-5 rounded-3 mb-0" role="alert">
			<span class="h4 mb-0 alert-heading"><i class="bi bi-exclamation-octagon-fill me-2"></i> </span>
			<div class="ms-3">
				<h6 class="mb-0 alert-heading">Hurry! 51% off the tours are already fully booked</h6>
				<p class="mb-0">Many trips to various areas have been ordered, don't let you miss it</p>
			</div>
		</div>
		<!-- Alert box END -->

	</div>
</section>
<!-- =======================
Main Banner END -->

<!-- =======================
Tour grid START -->
<section class="pt-0">
	<div class="container">

		<!-- Filter and content START -->
		<div class="row g-4 align-items-center justify-content-between mb-4">
			<!-- Content -->
			<div class="col-12 col-xl-8">
				<h5 class="mb-0">Showing 1-7 of 32 result</h5>
			</div>

			<!-- Select option -->
			<div class="col-xl-2">
				<form class="form-control-bg-light">
					<div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select js-choice choices__input" hidden="" tabindex="-1" data-choice="active"><option value="" data-custom-properties="[object Object]">Most Viewed</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__placeholder choices__item--selectable" data-item="" data-id="1" data-value="" data-custom-properties="[object Object]" aria-selected="true">Most Viewed</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--m9zk-item-choice-1" class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Most Viewed</div><div id="choices--m9zk-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="Recently search" data-select-text="Press to select" data-choice-selectable="">Recently search</div><div id="choices--m9zk-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="Most popular" data-select-text="Press to select" data-choice-selectable="">Most popular</div><div id="choices--m9zk-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="Top rated" data-select-text="Press to select" data-choice-selectable="">Top rated</div></div></div></div>
				</form>
			</div>
		</div>
		<!-- Filter and content END -->

		<div class="row g-4">

			<!-- Card item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card card-hover-shadow pb-0 h-100">
					<!-- Overlay item -->
					<div class="position-relative">
						<!-- Image -->
						<img src="{{asset('front/images/04.jpg')}}" class="card-img-top" alt="Card image">
						<!-- Overlay -->
						<div class="card-img-overlay d-flex flex-column p-4 z-index-1">
							<!-- Card overlay top -->
							<div>
								<span class="badge text-bg-danger">30% Off</span>
								<span class="badge text-bg-dark">Adventure</span>
							</div>
							<!-- Card overlay bottom -->
							<div class="w-100 mt-auto">
								<span class="badge text-bg-white fs-6">6 days / 5 nights</span>
							</div>
						</div>
					</div>
					<!-- Image -->

					<!-- Card body START -->
					<div class="card-body px-3">
						<!-- Title -->
						<h5 class="card-title mb-0"><a href="tour-detail.html" class="stretched-link">Beautiful Bali with Malaysia</a></h5>
						<span class="small"><i class="far fa-calendar-alt me-2"></i>April 12-17</span>

						<!-- List -->
						<ul class="nav nav-divider mt-3 mb-0">
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-plane text-orange me-2"></i>1 Flight
							</li>
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-hotel text-info me-2"></i>1 Hotel
							</li>
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-person-skating text-danger me-2"></i>2 Activities
							</li>
						</ul>
					</div>
					<!-- Card body END -->

					<!-- Card footer START-->
					<div class="card-footer pt-0">
						<!-- Price and Button -->
						<div class="d-sm-flex justify-content-sm-between align-items-center flex-wrap">
							<!-- Price -->
							<div class="hstack gap-2">
								<h5 class="fw-normal text-success mb-0">$1500</h5>
								<small>/per person</small>
								<span class="text-decoration-line-through">$1800</span>
							</div>
							<!-- Button -->
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-sm btn-primary mb-0">View Details</a>    
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card card-hover-shadow pb-0 h-100">
					<!-- Overlay item -->
					<div class="position-relative">
						<!-- Image -->
						<img src="{{asset('front/images/05.jpg')}}" class="card-img-top" alt="Card image">
						<!-- Overlay -->
						<div class="card-img-overlay d-flex flex-column p-4 z-index-1">
							<!-- Card overlay top -->
							<div> <span class="badge text-bg-dark">Honeymoon</span> </div>
							<!-- Card overlay bottom -->
							<div class="w-100 mt-auto">
								<!-- Card category -->
								<span class="badge text-bg-white fs-6">6 days / 5 nights</span>
							</div>
						</div>
					</div>
					<!-- Image -->

					<!-- Card body START -->
					<div class="card-body px-3">
						<!-- Title -->
						<h5 class="card-title mb-0"><a href="tour-detail.html" class="stretched-link">Meeru Island Resort (Without Flight)</a></h5>
						<span class="small"><i class="far fa-calendar-alt me-2"></i>April 12-17</span>

						<!-- List -->
						<ul class="nav nav-divider mt-3 mb-0">
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-hotel text-info me-2"></i>1 Hotel
							</li>
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-person-skating text-danger me-2"></i>2 Activities
							</li>
						</ul>
					</div>
					<!-- Card body END -->

					<!-- Card footer START-->
					<div class="card-footer pt-0">
						<!-- Price and Button -->
						<div class="d-sm-flex justify-content-sm-between align-items-center flex-wrap">
							<!-- Price -->
							<div class="hstack gap-2">
								<h5 class="fw-normal text-success mb-0">$800</h5>
								<small>/per person</small>
							</div>
							<!-- Button -->
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-sm btn-primary mb-0">View Details</a>    
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card card-hover-shadow pb-0 h-100">
					<!-- Overlay item -->
					<div class="position-relative">
						<!-- Image -->
						<img src="{{asset('front/images/06.jpg')}}" class="card-img-top" alt="Card image">
						<!-- Overlay -->
						<div class="card-img-overlay d-flex flex-column p-4 z-index-1">
							<!-- Card overlay top -->
							<div> <span class="badge text-bg-dark">Beach</span> </div>
							<!-- Card overlay bottom -->
							<div class="w-100 mt-auto">
								<!-- Card category -->
								<span class="badge text-bg-white fs-6">5 days / 4 nights</span>
							</div>
						</div>
					</div>
					<!-- Image -->

					<!-- Card body START -->
					<div class="card-body px-3">
						<!-- Title -->
						<h5 class="card-title mb-0"><a href="tour-detail.html" class="stretched-link">Sun Siyam Iru Veli Vacation</a></h5>
						<span class="small"><i class="far fa-calendar-alt me-2"></i>April 22-28</span>

						<!-- List -->
						<ul class="nav nav-divider mt-3 mb-0">
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-plane text-orange me-2"></i>1 Flight
							</li>
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-hotel text-info me-2"></i>1 Hotel
							</li>
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-person-skating text-danger me-2"></i>2 Activities
							</li>
						</ul>
					</div>
					<!-- Card body END -->

					<!-- Card footer START-->
					<div class="card-footer pt-0">
						<!-- Price and Button -->
						<div class="d-sm-flex justify-content-sm-between align-items-center flex-wrap">
							<!-- Price -->
							<div class="hstack gap-2">
								<h5 class="fw-normal text-success mb-0">$725</h5>
								<small>/per person</small>
							</div>
							<!-- Button -->
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-sm btn-primary mb-0">View Details</a>    
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card card-hover-shadow pb-0 h-100">
					<!-- Overlay item -->
					<div class="position-relative">
						<!-- Image -->
						<img src="{{asset('front/images/07.jpg')}}" class="card-img-top" alt="Card image">
						<!-- Overlay -->
						<div class="card-img-overlay d-flex flex-column p-4 z-index-1">
							<!-- Card overlay top -->
							<div> <span class="badge text-bg-dark">Nature</span> </div>
							<!-- Card overlay bottom -->
							<div class="w-100 mt-auto">
								<!-- Card category -->
								<span class="badge text-bg-white fs-6">4 days / 3 nights</span>
							</div>
						</div>
					</div>
					<!-- Image -->

					<!-- Card body START -->
					<div class="card-body px-3">
						<!-- Title -->
						<h5 class="card-title mb-0"><a href="tour-detail.html" class="stretched-link">Lux South Ari Atoll Vacation</a></h5>
						<span class="small"><i class="far fa-calendar-alt me-2"></i>April 22-28</span>

						<!-- List -->
						<ul class="nav nav-divider mt-3 mb-0">
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-hotel text-info me-2"></i>1 Hotel
							</li>
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-person-skating text-danger me-2"></i>2 Activities
							</li>
						</ul>
					</div>
					<!-- Card body END -->

					<!-- Card footer START-->
					<div class="card-footer pt-0">
						<!-- Price and Button -->
						<div class="d-sm-flex justify-content-sm-between align-items-center flex-wrap">
							<!-- Price -->
							<div class="hstack gap-2">
								<h5 class="fw-normal text-success mb-0">$400</h5>
								<small>/per person</small>
							</div>
							<!-- Button -->
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-sm btn-primary mb-0">View Details</a>    
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card card-hover-shadow pb-0 h-100">
					<!-- Overlay item -->
					<div class="position-relative">
						<!-- Image -->
						<img src="{{asset('front/images/08.jpg')}}" class="card-img-top" alt="Card image">
						<!-- Overlay -->
						<div class="card-img-overlay d-flex flex-column p-4 z-index-1">
							<!-- Card overlay top -->
							<div> <span class="badge text-bg-dark">Adventure</span> </div>
							<!-- Card overlay bottom -->
							<div class="w-100 mt-auto">
								<!-- Card category -->
								<span class="badge text-bg-white fs-6">5 days / 4 nights</span>
							</div>
						</div>
					</div>
					<!-- Image -->

					<!-- Card body START -->
					<div class="card-body px-3">
						<!-- Title -->
						<h5 class="card-title mb-0"><a href="tour-detail.html" class="stretched-link">Romantic Seaside - Bentota and Colombo Taj Special</a></h5>
						<span class="small"><i class="far fa-calendar-alt me-2"></i>May 02-06</span>

						<!-- List -->
						<ul class="nav nav-divider mt-3 mb-0">
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-plane text-orange me-2"></i>1 Flight
							</li>
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-hotel text-info me-2"></i>1 Hotel
							</li>
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-person-skating text-danger me-2"></i>2 Activities
							</li>
						</ul>
					</div>
					<!-- Card body END -->

					<!-- Card footer START-->
					<div class="card-footer pt-0">
						<!-- Price and Button -->
						<div class="d-sm-flex justify-content-sm-between align-items-center flex-wrap">
							<!-- Price -->
							<div class="hstack gap-2">
								<h5 class="fw-normal text-success mb-0">$845</h5>
								<small>/per person</small>
							</div>
							<!-- Button -->
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-sm btn-primary mb-0">View Details</a>    
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card card-hover-shadow pb-0 h-100">
					<!-- Overlay item -->
					<div class="position-relative">
						<!-- Image -->
						<img src="{{asset('front/images/09.jpg')}}" class="card-img-top" alt="Card image">
						<!-- Overlay -->
						<div class="card-img-overlay d-flex flex-column p-4 z-index-1">
							<!-- Card overlay top -->
							<div> <span class="badge text-bg-dark">Heritage</span> </div>
							<!-- Card overlay bottom -->
							<div class="w-100 mt-auto">
								<!-- Card category -->
								<span class="badge text-bg-white fs-6">6 days / 7 nights</span>
							</div>
						</div>
					</div>
					<!-- Image -->

					<!-- Card body START -->
					<div class="card-body px-3">
						<!-- Title -->
						<h5 class="card-title mb-0"><a href="tour-detail.html" class="stretched-link">Colombo Vacay - Exotic Beaches of Bali</a></h5>
						<span class="small"><i class="far fa-calendar-alt me-2"></i>May 02-08</span>

						<!-- List -->
						<ul class="nav nav-divider mt-3 mb-0">
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-plane text-orange me-2"></i>1 Flight
							</li>
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-hotel text-info me-2"></i>1 Hotel
							</li>
							<li class="nav-item h6 fw-normal mb-0">
								<i class="fa-solid fa-person-skating text-danger me-2"></i>2 Activities
							</li>
						</ul>
					</div>
					<!-- Card body END -->

					<!-- Card footer START-->
					<div class="card-footer pt-0">
						<!-- Price and Button -->
						<div class="d-sm-flex justify-content-sm-between align-items-center flex-wrap">
							<!-- Price -->
							<div class="hstack gap-2">
								<h5 class="fw-normal text-success mb-0">$1250</h5>
								<small>/per person</small>
							</div>
							<!-- Button -->
							<div class="mt-2 mt-sm-0">
								<a href="#" class="btn btn-sm btn-primary mb-0">View Details</a>    
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- Card item END -->

		</div> <!-- Row END -->

		<!-- Pagination -->
		<div class="row">
			<div class="col-12">
				<nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
					<ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
						<li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fa-solid fa-angle-left"></i></a></li>
						<li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
						<li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
						<li class="page-item mb-0"><a class="page-link" href="#">..</a></li>
						<li class="page-item mb-0"><a class="page-link" href="#">6</a></li>
						<li class="page-item mb-0"><a class="page-link" href="#"><i class="fa-solid fa-angle-right"></i></a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Tour grid END -->
@endsection