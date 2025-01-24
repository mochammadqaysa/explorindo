@extends('pages.front.layout')

@section('main')
<!-- =======================
Main Banner START -->
<section class="pt-0">
    <div class="container position-relative">
        <!-- Bg image -->
        <div class="rounded-3 p-4 p-sm-5" style="background-image: url({{asset('front/images/02.jpg')}}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <!-- Banner title -->
            <div class="row justify-content-between pt-0 pb-5"> 
                <div class="col-md-7 col-lg-8 col-xxl-7 pb-5 mb-0 mb-lg-5"> 
                    <h1 class="text-white">Life Is Adventure Make The Best Of It</h1>
                    <p class="text-white mb-0">Planning for a trip? we will organize your best trip with the best destination and within the best budgets!</p>
                </div>

                <!-- Produce item START -->
                <div class="col-md-5 col-lg-4 col-xl-3 mb-3 mb-sm-0">
                    <div class="card shadow p-2 pb-0">
                        <!-- Offer badge -->
                        <div class="position-absolute top-0 start-0 mt-n3 ms-n3 z-index-9">
                            <img src="{{asset('front/images/05.svg')}}" class="position-relative h-70px" alt="">
                            <span class="h5 text-white position-absolute top-50 start-50 translate-middle">40%</span>
                        </div>

                        <div class="rounded-3 overflow-hidden position-relative">
                            <!-- Image -->
                            <img src="{{asset('front/images/05.jpg')}}" class="card-img" alt="">
                            <!-- Overlay -->
                            <div class="bg-overlay bg-dark opacity-4"></div>
                            
                            <!-- Hover element -->
                            <div class="card-img-overlay d-flex">
                                <h6 class="text-white fw-normal mt-auto mb-0">5 Days / 4 Nights</h6>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body px-2">
                            <!-- Badge and Rating -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <a href="#" class="badge bg-primary bg-opacity-10 text-primary">Adventure</a>
                                <!-- Rating -->
                                <h6 class="fw-light m-0"><i class="fa-solid fa-star text-warning me-2"></i>4.5</h6>
                            </div>

                            <!-- Title -->
                            <h6 class="card-title"><a href="{{ route('front.details') }}">Maldives Sightseeing & Adventure Tour</a></h6>
                            
                            <!-- Badge and Price -->
                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <!-- Price -->
                                <h6 class="text-success mb-0">$385 <span class="fw-light">/person</span></h6>
                                <span class="text-decoration-line-through mb-0 text-reset">$682</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Produce item END -->
            </div>
        </div>

        <!-- Search START -->
        <div class="row mt-n7">
            <div class="col-11 mx-auto">				
                <!-- Booking from START -->
                <form class="bg-mode shadow rounded-3 p-4">
                    <div class="row g-4 align-items-center">

                        <div class="col-xl-10">
                            <div class="row g-4">
                                <!-- Location -->
                                <div class="col-md-6 col-lg-4">
                                    <label class="h6 fw-normal mb-0"><i class="bi bi-geo-alt text-primary me-1"></i>Location</label>
                                    <!-- Input field -->
                                    <div class="form-border-bottom form-control-transparent form-fs-lg mt-2">
                                        <select class="form-select js-choice" data-search-enabled="true">
                                            <option value="">Select location</option>
                                            <option>San Jacinto, USA</option>
                                            <option>North Dakota, Canada</option>
                                            <option>West Virginia, Paris</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Check in -->
                                <div class="col-md-6 col-lg-4">
                                    <label class="h6 fw-normal mb-0"><i class="bi bi-calendar text-primary me-1"></i>Date</label>
                                    <!-- Input field -->
                                    <div class="form-border-bottom form-control-transparent form-fs-lg mt-2">
                                        <input type="text" class="form-control flatpickr py-2" data-date-format="d M Y" placeholder="Choose a date">
                                    </div>
                                </div>

                                <!-- Guest -->
                                <div class="col-md-6 col-lg-4">
                                    <label class="h6 fw-normal mb-0"><i class="fa-solid fa-person-skating text-primary me-1"></i>Tour type</label>
                                    <!-- Input field -->
                                    <div class="form-border-bottom form-control-transparent form-fs-lg mt-2">
                                        <select class="form-select js-choice" data-search-enabled="true">
                                            <option value="">Select type</option>
                                            <option>Adventure</option>
                                            <option>Beach</option>
                                            <option>Desert</option>
                                            <option>History</option>
                                        </select>
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
                <!-- Booking from END -->
            </div>
        </div>
        <!-- Search END -->

    </div>
</section>
<!-- =======================
Main Banner END -->

<!-- =======================
Packages START -->
<section class="pt-0 pt-md-5">
    <div class="container">
        <!-- Title -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="mb-0">Our Best Packages</h2>
            </div>
        </div>

        <div class="row g-4">
            <!-- Package item -->
            <div class="col-sm-6 col-xl-3">
                <!-- Card START -->
                <div class="card card-img-scale overflow-hidden bg-transparent">
                    <div class="card-img-scale-wrapper rounded-3">
                        <!-- Card Image -->
                        <img src="{{asset('front/images/04.jpg')}}" class="card-img" alt="">
                        <!-- Overlay -->
                        <div class="card-img-overlay d-flex flex-column z-index-1 p-4">
                            <!-- Card overlay top -->
                            <div class="d-flex justify-content-between">
                                <span class="badge text-bg-dark">Adventure</span>
                                <span class="badge text-bg-white"><i class="fa-solid fa-star text-warning me-2"></i>4.3</span>
                            </div>
                            <!-- Card overlay bottom -->
                            <div class="w-100 mt-auto">
                                <!-- Card category -->
                                <span class="badge text-bg-white fs-6">6 days / 5 nights</span>
                            </div>
                        </div>
                    </div> 
                    
                    <!-- Card body -->
                    <div class="card-body px-2">
                        <!-- Title -->
                        <h5 class="card-title"><a href="tour-grid.html" class="stretched-link">Lombok, Indonesia</a></h5>
                        <!-- Content -->
                        <div class="hstack gap-2">
                            <span class="h5 mb-0 text-success">$1385</span>
                            <small>Starting price</small>
                        </div>
                    </div>
                </div>
                <!-- Card END -->
            </div>

            <!-- Package item -->
            <div class="col-sm-6 col-xl-3">
                <!-- Card START -->
                <div class="card card-img-scale overflow-hidden bg-transparent">
                    <div class="card-img-scale-wrapper rounded-3">
                        <!-- Card Image -->
                        <img src="{{asset('front/images/02_1.jpg')}}" class="card-img" alt="">
                        <!-- Overlay -->
                        <div class="card-img-overlay d-flex flex-column z-index-1 p-4">
                            <!-- Card overlay top -->
                            <div class="d-flex justify-content-between">
                                <span class="badge text-bg-dark">History</span>
                                <span class="badge text-bg-white"><i class="fa-solid fa-star text-warning me-2"></i>4.5</span>
                            </div>
                            <!-- Card overlay bottom -->
                            <div class="w-100 mt-auto">
                                <!-- Card category -->
                                <span class="badge text-bg-white fs-6">8 days / 7 nights</span>
                            </div>
                        </div>
                    </div> 
                    
                    <!-- Card body -->
                    <div class="card-body px-2">
                        <!-- Title -->
                        <h5 class="card-title"><a href="tour-grid.html" class="stretched-link">Northern Lights Escape</a></h5>
                        <!-- Content -->
                        <div class="hstack gap-2">
                            <span class="h5 mb-0 text-success">$2569</span>
                            <small>Starting price</small>
                        </div>
                    </div>
                </div>
                <!-- Card END -->
            </div>

            <!-- Package item -->
            <div class="col-sm-6 col-xl-3">
                <div class="card card-img-scale overflow-hidden bg-transparent">
                    <div class="card-img-scale-wrapper rounded-3">
                        <!-- Card Image -->
                        <img src="{{asset('front/images/03.jpg')}}" class="card-img" alt="">
                        <!-- Overlay -->
                        <div class="card-img-overlay d-flex flex-column z-index-1 p-4">
                            <!-- Card overlay top -->
                            <div class="d-flex justify-content-between">
                                <span class="badge text-bg-dark">Desert</span>
                                <span class="badge text-bg-white"><i class="fa-solid fa-star text-warning me-2"></i>4.2</span>
                            </div>
                            <!-- Card overlay bottom -->
                            <div class="w-100 mt-auto">
                                <!-- Card category -->
                                <span class="badge text-bg-white fs-6">9 days / 8 nights</span>
                            </div>
                        </div>
                    </div> 
                    
                    <!-- Card body -->
                    <div class="card-body px-2">
                        <!-- Title -->
                        <h5 class="card-title"><a href="tour-grid.html" class="stretched-link">Essential Egypt</a></h5>
                        <!-- Content -->
                        <div class="hstack gap-2">
                            <span class="h5 mb-0 text-success">$1885</span>
                            <small>Starting price</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Package item -->
            <div class="col-sm-6 col-xl-3">
                <div class="card card-img-scale overflow-hidden bg-transparent">
                    <div class="card-img-scale-wrapper rounded-3">
                        <!-- Card Image -->
                        <img src="{{asset('front/images/01_1.jpg')}}" class="card-img" alt="">
                        <!-- Overlay -->
                        <div class="card-img-overlay d-flex flex-column z-index-1 p-4">
                            <!-- Card overlay top -->
                            <div class="d-flex justify-content-between">
                                <span class="badge text-bg-dark">Beach</span>
                                <span class="badge text-bg-white"><i class="fa-solid fa-star text-warning me-2"></i>4.6</span>
                            </div>
                            <!-- Card overlay bottom -->
                            <div class="w-100 mt-auto">
                                <!-- Card category -->
                                <span class="badge text-bg-white fs-6">9 days / 8 nights</span>
                            </div>
                        </div>
                    </div> 
                    
                    <!-- Card body -->
                    <div class="card-body px-2">
                        <!-- Title -->
                        <h5 class="card-title"><a href="tour-grid.html" class="stretched-link">Phi Phi Islands</a></h5>
                        <!-- Content -->
                        <div class="hstack gap-2">
                            <span class="h5 text-success mb-0">$3585</span>
                            <small>Starting price</small>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Row END -->
    </div>
</section>
<!-- =======================
Packages END -->

<!-- =======================
Action box START -->
<section class="pt-0 pt-md-5">
    <div class="container position-relative">
        <!-- SVG decoration -->
        <figure class="position-absolute top-100 start-0 translate-middle d-none d-md-block z-index-1 mt-n4 ms-4">
            <svg class="fill-primary" width="148px" height="133px">
                <path d="M145.013,6.751 C143.905,6.733 143.022,5.819 143.041,4.712 C143.060,3.604 143.973,2.721 145.080,2.740 C146.188,2.759 147.071,3.672 147.052,4.779 C147.033,5.887 146.121,6.770 145.013,6.751 ZM144.552,34.160 C145.660,34.179 146.543,35.092 146.524,36.199 C146.506,37.307 145.592,38.190 144.485,38.171 C143.377,38.153 142.495,37.240 142.513,36.132 C142.532,35.024 143.445,34.141 144.552,34.160 ZM144.024,65.580 C145.132,65.599 146.015,66.512 145.996,67.619 C145.978,68.727 145.065,69.610 143.957,69.591 C142.849,69.572 141.966,68.659 141.985,67.552 C142.004,66.444 142.917,65.561 144.024,65.580 ZM143.496,97.000 C144.604,97.019 145.487,97.932 145.468,99.039 C145.450,100.147 144.537,101.030 143.429,101.011 C142.321,100.992 141.438,100.079 141.457,98.972 C141.476,97.864 142.389,96.981 143.496,97.000 ZM142.968,128.420 C144.076,128.439 144.959,129.351 144.940,130.460 C144.921,131.567 144.008,132.450 142.901,132.431 C141.793,132.413 140.910,131.500 140.929,130.392 C140.948,129.284 141.861,128.401 142.968,128.420 ZM116.936,6.279 C115.828,6.261 114.945,5.348 114.964,4.240 C114.982,3.132 115.895,2.250 117.003,2.268 C118.111,2.287 118.993,3.200 118.975,4.308 C118.956,5.415 118.043,6.298 116.936,6.279 ZM116.475,33.688 C117.582,33.707 118.465,34.620 118.447,35.727 C118.428,36.835 117.515,37.718 116.407,37.699 C115.300,37.681 114.417,36.768 114.436,35.660 C114.454,34.552 115.367,33.670 116.475,33.688 ZM115.947,65.108 C117.055,65.127 117.937,66.040 117.919,67.147 C117.900,68.255 116.987,69.138 115.880,69.119 C114.772,69.101 113.889,68.188 113.908,67.080 C113.926,65.973 114.839,65.090 115.947,65.108 ZM115.419,96.528 C116.527,96.547 117.409,97.460 117.391,98.567 C117.372,99.675 116.459,100.558 115.352,100.539 C114.244,100.521 113.361,99.608 113.380,98.500 C113.398,97.392 114.311,96.510 115.419,96.528 ZM114.891,127.948 C115.998,127.967 116.881,128.880 116.863,129.987 C116.844,131.095 115.931,131.978 114.823,131.959 C113.716,131.941 112.833,131.028 112.852,129.920 C112.870,128.812 113.783,127.930 114.891,127.948 ZM88.858,5.807 C87.750,5.789 86.868,4.876 86.886,3.768 C86.905,2.660 87.818,1.777 88.925,1.796 C90.033,1.815 90.916,2.728 90.897,3.835 C90.879,4.943 89.966,5.826 88.858,5.807 ZM88.397,33.216 C89.505,33.235 90.388,34.148 90.369,35.256 C90.351,36.363 89.438,37.246 88.330,37.227 C87.222,37.209 86.340,36.296 86.358,35.188 C86.377,34.081 87.290,33.198 88.397,33.216 ZM87.869,64.636 C88.977,64.655 89.860,65.568 89.841,66.676 C89.823,67.783 88.910,68.666 87.802,68.648 C86.694,68.629 85.812,67.716 85.830,66.608 C85.849,65.501 86.762,64.618 87.869,64.636 ZM87.341,96.056 C88.449,96.075 89.332,96.988 89.313,98.095 C89.295,99.203 88.382,100.086 87.274,100.067 C86.166,100.049 85.284,99.136 85.302,98.028 C85.321,96.921 86.234,96.038 87.341,96.056 ZM86.813,127.476 C87.921,127.495 88.804,128.408 88.785,129.516 C88.767,130.623 87.854,131.506 86.746,131.488 C85.638,131.469 84.756,130.556 84.774,129.448 C84.793,128.341 85.706,127.458 86.813,127.476 ZM60.781,5.336 C59.673,5.317 58.790,4.404 58.809,3.296 C58.827,2.189 59.740,1.306 60.848,1.324 C61.956,1.343 62.838,2.256 62.820,3.364 C62.801,4.471 61.888,5.354 60.781,5.336 ZM60.320,32.745 C61.428,32.763 62.310,33.676 62.292,34.784 C62.273,35.891 61.360,36.774 60.253,36.756 C59.145,36.737 58.262,35.824 58.281,34.717 C58.299,33.609 59.213,32.726 60.320,32.745 ZM59.792,64.165 C60.900,64.183 61.783,65.096 61.764,66.204 C61.745,67.311 60.832,68.194 59.725,68.175 C58.617,68.157 57.734,67.244 57.753,66.136 C57.771,65.029 58.684,64.146 59.792,64.165 ZM59.264,95.584 C60.372,95.603 61.255,96.516 61.236,97.624 C61.217,98.731 60.304,99.614 59.197,99.596 C58.089,99.577 57.206,98.664 57.225,97.556 C57.243,96.449 58.156,95.566 59.264,95.584 ZM58.736,127.005 C59.843,127.023 60.726,127.936 60.708,129.044 C60.689,130.151 59.776,131.034 58.669,131.016 C57.561,130.997 56.678,130.084 56.697,128.977 C56.715,127.869 57.628,126.986 58.736,127.005 ZM32.703,4.864 C31.595,4.845 30.713,3.932 30.731,2.825 C30.750,1.717 31.663,0.834 32.771,0.853 C33.878,0.871 34.761,1.784 34.742,2.892 C34.724,4.000 33.811,4.882 32.703,4.864 ZM32.243,32.273 C33.350,32.291 34.233,33.205 34.214,34.312 C34.196,35.420 33.283,36.303 32.175,36.284 C31.068,36.265 30.185,35.352 30.203,34.245 C30.222,33.137 31.135,32.254 32.243,32.273 ZM31.715,63.693 C32.822,63.712 33.705,64.624 33.686,65.732 C33.668,66.839 32.755,67.722 31.647,67.704 C30.539,67.685 29.657,66.772 29.675,65.665 C29.694,64.557 30.607,63.674 31.715,63.693 ZM31.187,95.113 C32.294,95.131 33.177,96.044 33.158,97.152 C33.140,98.260 32.227,99.142 31.119,99.124 C30.011,99.105 29.129,98.192 29.147,97.084 C29.166,95.977 30.079,95.094 31.187,95.113 ZM30.659,126.533 C31.766,126.551 32.649,127.465 32.630,128.572 C32.612,129.680 31.699,130.563 30.591,130.544 C29.484,130.525 28.601,129.612 28.619,128.505 C28.638,127.397 29.551,126.514 30.659,126.533 ZM4.626,4.392 C3.518,4.373 2.635,3.460 2.654,2.353 C2.672,1.245 3.585,0.362 4.693,0.381 C5.801,0.399 6.684,1.313 6.665,2.420 C6.646,3.528 5.733,4.411 4.626,4.392 ZM4.165,31.801 C5.273,31.820 6.156,32.732 6.137,33.840 C6.118,34.948 5.205,35.831 4.098,35.812 C2.990,35.793 2.107,34.880 2.126,33.773 C2.145,32.665 3.058,31.782 4.165,31.801 ZM3.637,63.221 C4.745,63.239 5.628,64.152 5.609,65.260 C5.590,66.368 4.677,67.251 3.570,67.232 C2.462,67.213 1.579,66.300 1.598,65.193 C1.616,64.085 2.529,63.202 3.637,63.221 ZM3.109,94.641 C4.217,94.659 5.100,95.573 5.081,96.680 C5.062,97.788 4.149,98.671 3.042,98.652 C1.934,98.633 1.051,97.720 1.070,96.613 C1.089,95.505 2.001,94.622 3.109,94.641 ZM2.581,126.061 C3.689,126.080 4.572,126.992 4.553,128.100 C4.534,129.208 3.621,130.091 2.514,130.072 C1.406,130.053 0.523,129.140 0.542,128.033 C0.561,126.925 1.474,126.042 2.581,126.061 Z"></path>
            </svg>
        </figure>
        
        <div class="bg-light rounded-3 position-relative p-3 p-sm-4">

            <!-- Svg decoration -->
            <figure class="position-absolute top-0 end-0 mt-6 d-none d-sm-block">
                <svg class="fill-primary" width="141px" height="23.9px" viewBox="0 0 141 23.9">
                    <polygon points="1.8,14.1 21.5,23.9 41.4,14 61.3,23.9 81.2,14 101.1,23.9 121,14 139,23 139,20.2 121,11.2 101.1,21.1 81.2,11.2 61.3,21.1 41.4,11.2 21.5,21.1 1.8,11.4 "></polygon>
                    <polygon points="1.8,2.9 21.5,12.7 41.4,2.8 61.3,12.7 81.2,2.8 101.1,12.7 121,2.8 139,11.7 139,9 121,0 101.1,9.9 81.2,0 61.3,9.9 41.4,0 21.5,9.9 1.8,0.1"></polygon>
                </svg>
            </figure>

            <div class="row">
                <div class="col-md-7 mx-auto text-center py-5">
                    <!-- Title -->
                    <h2 class="mb-4">Subscribe And Get a Special Discount </h2>
                    <p class="mb-4">Speedily say has suitable disposal add boy. On forth doubt miles of child. Exercise joy man children rejoiced.</p>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =======================
Action box END -->

<!-- =======================
Top category START -->
<section class="pt-0 pt-md-5">
    <div class="container">
        <!-- Title -->
        <div class="row mb-3 mb-sm-4">
            <div class="col-12 text-center">
                <h2 class="mb-0">Top Categories</h2>
            </div>
        </div>

        <div class="row g-4 g-xl-5">
            <!-- Category item -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="row g-2 g-md-3 align-items-center position-relative">
                    <!-- Image -->
                    <div class="col-md-6">
                        <img src="{{asset('front/images/20.jpg')}}" class="rounded-3" alt="">
                    </div>
                    <!-- Content -->
                    <div class="col-md-6">
                        <div class="p-2 p-md-0">
                            <h5 class="mb-1"><a href="#" class="stretched-link">Beach</a></h5>
                            <span>4,568 Places</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category item -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="row g-2 g-md-3 align-items-center position-relative">
                    <!-- Image -->
                    <div class="col-md-6">
                        <img src="{{asset('front/images/19.jpg')}}" class="rounded-3" alt="">
                    </div>
                    <!-- Content -->
                    <div class="col-md-6">
                        <div class="p-2 p-md-0">
                            <h5 class="mb-1"><a href="#" class="stretched-link">Heritage</a></h5>
                            <span>2,845 Places</span>
                        </div>	
                    </div>
                </div>
            </div>

            <!-- Category item -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="row g-2 g-md-3 align-items-center position-relative">
                    <!-- Image -->
                    <div class="col-md-6">
                        <img src="{{asset('front/images/18.jpg')}}" class="rounded-3" alt="">
                    </div>
                    <!-- Content -->
                    <div class="col-md-6">
                        <div class="p-2 p-md-0">
                            <h5 class="mb-1"><a href="#" class="stretched-link">Desert</a></h5>
                            <span>1,587 Places</span>
                        </div>	
                    </div>
                </div>
            </div>

            <!-- Category item -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="row g-2 g-md-3 align-items-center position-relative">
                    <!-- Image -->
                    <div class="col-md-6">
                        <img src="{{asset('front/images/17.jpg')}}" class="rounded-3" alt="">
                    </div>
                    <!-- Content -->
                    <div class="col-md-6">
                        <div class="p-2 p-md-0">
                            <h5 class="mb-1"><a href="#" class="stretched-link">Tower</a></h5>
                            <span>986 Places</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category item -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="row g-2 g-md-3 align-items-center position-relative">
                    <!-- Image -->
                    <div class="col-md-6">
                        <img src="{{asset('front/images/16.jpg')}}" class="rounded-3" alt="">
                    </div>
                    <!-- Content -->
                    <div class="col-md-6">
                        <div class="p-2 p-md-0">
                            <h5 class="mb-1"><a href="#" class="stretched-link">Mountain</a></h5>
                            <span>786 Places</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category item -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="row g-2 g-md-3 align-items-center position-relative">
                    <!-- Image -->
                    <div class="col-md-6">
                        <img src="{{asset('front/images/15.jpg')}}" class="rounded-3" alt="">
                    </div>
                    <!-- Content -->
                    <div class="col-md-6">
                        <div class="p-2 p-md-0">
                            <h5 class=""><a href="#" class="stretched-link">Safari</a></h5>
                            <span>568 Places</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category item -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="row g-2 g-md-3 align-items-center position-relative">
                        <!-- Image -->
                        <div class="col-md-6">
                            <img src="{{asset('front/images/14.jpg')}}" class="rounded-3" alt="">
                        </div>
                        <!-- Content -->
                        <div class="col-md-6">
                            <div class="p-2 p-md-0">
                                <h5 class="mb-1"><a href="#" class="stretched-link">Temple</a></h5>
                                <span>256 Places</span>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Category item -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="row g-2 g-md-3 align-items-center position-relative">
                    <!-- Image -->
                    <div class="col-md-6">
                        <img src="{{asset('front/images/13.jpg')}}" class="rounded-3" alt="">
                    </div>
                    <!-- Content -->
                    <div class="col-md-6">
                        <div class="p-2 p-md-0">
                            <h5 class="mb-1"><a href="#" class="stretched-link">Festival</a></h5>
                            <span>654 Places</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Row END -->
    </div>
</section>
<!-- =======================
Top category END -->

<!-- =======================
Stories START-->
<section class="pt-0 pt-md-5">
    <div class="container">

        <div class="row g-4 g-lg-5 align-items-center">

            <div class="col-lg-4">
                <!-- Title -->
                <h2 class="mb-0">Discover the best places to visit🔥</h2>

                <div class="d-sm-flex justify-content-sm-between align-items-center mt-4">
                    <!-- Avatar group -->
                    <ul class="avatar-group mb-sm-0">
                        <li class="avatar">
                            <img class="avatar-img rounded-circle" src="{{asset('front/images/01.jpg')}}" alt="avatar">
                        </li>
                        <li class="avatar">
                            <img class="avatar-img rounded-circle" src="{{asset('front/images/02_2.jpg')}}" alt="avatar">
                        </li>
                        <li class="avatar">
                            <img class="avatar-img rounded-circle" src="{{asset('front/images/03_1.jpg')}}" alt="avatar">
                        </li>
                        <li class="avatar">
                            <img class="avatar-img rounded-circle" src="{{asset('front/images/04_1.jpg')}}" alt="avatar">
                        </li>
                        <li class="avatar">
                            <div class="avatar-img rounded-circle bg-dark">
                                <span class="text-white position-absolute top-50 start-50 translate-middle small">16+</span>
                            </div>
                        </li>
                    </ul>

                    <!-- Rating -->
                    <h5 class="m-0"><i class="fa-solid fa-star text-warning me-2"></i>4.5</h5>
                </div>

                <!-- Button -->
                <a href="#" class="btn btn-lg btn-primary-soft mb-0 mt-4">Explore places <i class="bi fa-fw bi-arrow-right ms-2"></i></a>
            </div>

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Card item -->
                        <div class="card card-element-hover card-overlay-hover overflow-hidden">
                            <!-- Image -->
                            <img src="{{asset('front/images/06.jpg')}}" class="rounded-3" alt="">
                            <!-- Full screen button -->
                            <a class="hover-element position-absolute w-100 h-100" data-glightbox="" data-gallery="gallery" href="{{asset('front/assets/images/gallery/01.jpg')}}">
                                <i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                            </a>
                        </div>

                        <!-- Testimonials START -->
                        <div class="tiny-slider arrow-round arrow-blur arrow-hover arrow-xs my-4 mb-md-0">
                            <div class="tiny-slider-inner pb-1" data-autoplay="true" data-arrow="true" data-dots="false" data-items="1">
                                <!-- Testimonial item -->
                                <div class="card bg-transparent">
                                    <div class="row align-items-center">
                                        <!-- Image -->
                                        <div class="col-4">
                                            <img src="{{asset('front/images/01_2.jpg')}}" class="card-img" alt="">
                                        </div>
                                        <!-- Card body -->
                                        <div class="col-8">
                                            <div class="card-body p-0">
                                                <p class="mb-0">Farther-related bed and passage comfort civilly.</p>
                                                <h6 class="card-title mb-0 mt-2">Louis Ferguson</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial item -->
                                <div class="card bg-transparent">
                                    <div class="row align-items-center">
                                        <!-- Image -->
                                        <div class="col-4">
                                            <img src="{{asset('front/images/02_3.jpg')}}" class="card-img" alt="">
                                        </div>
                                        <!-- Card body -->
                                        <div class="col-8">
                                            <div class="card-body p-0">
                                                <p class="mb-0">Farther-related bed and passage comfort civilly.</p>
                                                <h6 class="card-title mb-0 mt-2">Lori Stevens</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>		
                        <!-- Testimonials END -->
                    </div>

                    <div class="col-md-6">
                        <!-- Card item -->
                        <div class="card card-element-hover card-overlay-hover overflow-hidden mb-4">
                            <!-- Image -->
                            <img src="{{asset('front/images/02_4.jpg')}}" class="rounded-3" alt="">
                            <!-- Full screen button -->
                            <a class="hover-element position-absolute w-100 h-100" data-glightbox="" data-gallery="gallery" href="https://www.youtube.com/embed/tXHviS-4ygo">
                                <span class="btn text-danger btn-round btn-white position-absolute top-50 start-50 translate-middle mb-0">
                                    <i class="fas fa-play"></i>
                                </span>
                            </a>
                        </div>
                        <!-- Card item -->
                        <div class="card card-element-hover card-overlay-hover overflow-hidden">
                            <!-- Image -->
                            <img src="{{asset('front/images/03_2.jpg')}}" class="rounded-3" alt="">
                            <!-- Full screen button -->
                            <a class="hover-element position-absolute w-100 h-100" data-glightbox="" data-gallery="gallery" href="{{asset('front/assets/images/gallery/03.jpg')}}">
                                <i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- Row END -->
            </div>
        </div> <!-- Row END -->
    </div>
</section>
<!-- =======================
Stories END-->
@endsection