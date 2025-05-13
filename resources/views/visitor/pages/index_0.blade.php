@extends('visitor.layout.master')

@push('visitor-css')
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
@endpush

@section('content-visitor')

    <!-- Tailored Curtains Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- Images -->
                <div class="col-md-4 d-flex flex-wrap">
                    {{-- <img src="https://static.wixstatic.com/media/e01eb4_ac5ed8a5a25b4540bcb51a8eeadee781f000.jpg/v1/fill/w_314,h_392,al_c,q_80,usm_0.33_1.00_0.00,enc_avif,quality_auto/e01eb4_ac5ed8a5a25b4540bcb51a8eeadee781f000.jpg" class="img-fluid mr-2 mb-2" style="flex: 1 1 48%; object-fit: cover;" alt="Shadow"> --}}
                    <img src="{{ $banner->banner_image_1 }}" class="img-fluid mr-2 mb-2" style="flex: 1 1 48%; object-fit: cover;" alt="Shadow">
                </div>
                <!-- Images -->
                <div class="col-md-4 d-flex flex-wrap">
                    {{-- <img src="https://static.wixstatic.com/media/e01eb4_79aac579b5ca4f078272fe9f421a57b3~mv2.png/v1/crop/x_0,y_182,w_4284,h_5348/fill/w_377,h_470,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/IMG_1085_HEIC.png" class="img-fluid mr-2 mb-2" style="flex: 1 1 48%; object-fit: cover;" alt="Shadow"> --}}
                    <img src="{{ $banner->banner_image_2 }}" class="img-fluid mr-2 mb-2" style="flex: 1 1 48%; object-fit: cover;" alt="Shadow">
                </div>

                <!-- Text & Buttons -->
                <div class="col-md-4 position-relative mt-4 mt-md-0">
                    <!-- Faded Background Text -->
                    <h1 class="font-helvetica position-absolute text-uppercase" style="color: rgba(0,0,0,0.05); font-size: 150px; top: -100px; left: 0; z-index: 0; line-height: 1;"><strong>Save<br>Time</strong></h1>

                    <!-- Foreground Content -->
                    <div class="position-relative" style="z-index: 1; top:110px">
                        {{-- <h1 class="font-helvetica font-weight-bold mb-4 text-center" style="font-size: 30px;">TAILORED CURTAINS<br>IN 24 HOURS</h1> --}}
                        <h1 class="font-helvetica font-weight-bold mb-4 text-center" style="font-size: 30px;">{{ $banner->title }}</h1>

                        <button class="btn btn-dark btn-block mb-3" style="padding: 12px 0;">BOOK FREE MEASUREMENTS</button>
                        <button class="btn btn-outline-dark btn-block" style="padding: 12px 0;">ONLINE CALCULATOR</button>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Perfect Curtains Section -->
    <section class="py-5">
        <div class="container text-center">
            {{-- <h2 class="font-helvetica mb-5 font-weight-bold">HAVE YOUR PERFECT CURTAINS WITHOUT LIFTING A FINGER</h2> --}}
            <h2 class="font-helvetica mb-5 font-weight-bold">{{  $hero->heading }}</h2>
            <div class="row justify-content-center">

                <!-- Step 1 -->
                <div class="col-md-4 mb-4 font-helvetica">
                    <h1 style="color: rgba(0,0,0,0.05); font-size: 100px; font-weight: bold;">01</h1>
                    <h5 class="font-weight-bold mb-3">{{  $hero->title_1 }}</h5>
                    <p>{{  $hero->description_1 }}</p>

                    <div class="d-flex justify-content-center mt-4">
                        <button class="btn btn-dark mr-2" style="min-width: 180px;">BOOK NOW</button>
                        <button class="btn btn-outline-dark" style="min-width: 180px;">CONSULTATION</button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-md-4 mb-4 font-helvetica">
                    <h1 style="color: rgba(0,0,0,0.05); font-size: 100px; font-weight: bold;">02</h1>
                    <h5 class="font-weight-bold mb-3">{{  $hero->title_2 }}</h5>
                    <p>
                        {{ $hero->description_2 }}
                        <br>
                        <strong>We speak ENG & RUS.</strong>
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="col-md-4 mb-4 font-helvetica">
                    <h1 style="color: rgba(0,0,0,0.05); font-size: 100px; font-weight: bold;">03</h1>
                    <h5 class="font-weight-bold mb-3">{{  $hero->title_3 }}</h5>
                    <p>
                        {{ $hero->description_3 }}

                    </p>
                    <p class="mt-3">
                        <a href="#" class="font-weight-bold text-dark" style="text-decoration: underline;">HOW IT LOOKS</a>
                    </p>
                </div>

            </div>
        </div>
    </section>


    <!-- Black Centered Info Bar -->
    <section class="py-4" style="background-color: white;">
        <div class="container" style="background-color: black; padding: 15px 0;">
            <div class="row text-center text-white">

                <div class="col-md-4 mb-2 mb-md-0">
                    {{-- HUGE FABRIC RANGE --}}
                    {!! strip_tags(htmlspecialchars_decode($module->title_1)) !!}
                </div>

                <div class="col-md-4 mb-2 mb-md-0">
                    {{-- CLEAR PRICE --}}
                    {!! strip_tags(htmlspecialchars_decode($module->title_2)) !!}
                </div>

                <div class="col-md-4">
                    {{-- FAST SERVICE --}}
                    {!! strip_tags(htmlspecialchars_decode($module->title_3)) !!}
                </div>

            </div>
        </div>
    </section>


    <!-- Book Measurements Section -->
    <section class="py-5">
        <div class="container px-0">
            <div class="row no-gutters">

                <div class="col-md-4">
                    <img src="https://static.wixstatic.com/media/e01eb4_cbc2018586df43c5bb0ec9c526795c77~mv2.png/v1/crop/x_0,y_92,w_1439,h_1795/fill/w_377,h_470,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/curtains24_1.png"
                        class="img-fluid h-100 w-100"
                        alt="Curtains"
                        style="object-fit: cover;">
                </div>

                <div class="col-md-8" style="background-color: lightgray; padding: 40px;">
                    <div class="bg-white p-4 p-md-5 h-100 shadow-sm">
                        <h2 class="text-center mb-4 font-weight-bold">BOOK FREE MEASUREMENTS</h2>
                        <p class="text-center mb-4">Our team will come with fabric samples.</p>

                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="building" class="font-weight-bold">BUILDING NAME *</label>
                                        <input type="text" class="form-control form-control-lg" id="building" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="font-weight-bold">PHONE *</label>
                                        <input type="tel" class="form-control form-control-lg" id="phone" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date" class="font-weight-bold">DATE *</label>
                                        <input type="text" class="form-control form-control-lg" id="date" value="04/27/2025" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="time" class="font-weight-bold">TIME *</label>
                                        <select class="form-control form-control-lg" id="time" required>
                                            <option value="">Select time</option>
                                            <option>9:00 AM</option>
                                            <option>10:00 AM</option>
                                            <option>11:00 AM</option>
                                            <option>12:00 PM</option>
                                            <option>1:00 PM</option>
                                            <option>2:00 PM</option>
                                            <option>3:00 PM</option>
                                            <option>4:00 PM</option>
                                            <option>5:00 PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark btn-block btn-lg mt-4 py-3 font-weight-bold">CONFIRM</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- How It Looks Carousel Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                {{-- <h2 class="font-weight-bold">HOW IT LOOKS</h2> --}}
                <h2 class="font-weight-bold">{{ $slider->slider_heading }}</h2>
                {{-- <p class="lead">Discover how our curtains transform spaces: get inspired and imagine the perfect look for your own home.</p> --}}
                <p class="lead">{{ $slider->slider_description }}</p>
            </div>

            <!-- Custom Carousel -->
            <div class="curtains-gallery">
                <div class="gallery-container">
                    <div class="gallery-track" id="galleryTrack">
                        <!-- Gallery Items -->

                        {{-- @foreach ($slider->images as $image)
                            <div class="gallery-item">
                                <img src="{{ $image->path }}" class="img-fluid rounded" alt="Living Room">
                                @if ($image->isTitleVisible)
                                    <div class="caption">{{ $image->title }}</div>
                                @endif
                            </div>
                        @endforeach --}}
                        {{-- @foreach ($slider->images as $image)
                            <div class="gallery-item">
                                <a href="{{ $image->path }}" data-lightbox="slider-gallery" data-title="{{ $image->title }}">
                                    <img src="{{ $image->path }}" class="img-fluid rounded" alt="Image">
                                </a>
                                @if ($image->isTitleVisible)
                                    <div class="caption">{{ $image->title }}</div>
                                @endif
                            </div>
                        @endforeach --}}

                        @foreach ($slider->images as $image)
                            <div class="gallery-item">
                                <a href="{{ $image->path  }}"
                                data-lightbox="slider-gallery"
                                data-title="{{ $image->title }}">
                                    <img src="{{ $image->path}}" class="img-fluid rounded" alt="Image">
                                </a>
                                @if ($image->isTitleVisible)
                                    <div class="caption">{{ $image->title }}</div>
                                @endif
                            </div>
                        @endforeach



                        {{-- <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91" class="img-fluid rounded" alt="Living Room">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38" class="img-fluid rounded" alt="Bedroom">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba" class="img-fluid rounded" alt="Modern Design">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1583845112203-454c42f19691" class="img-fluid rounded" alt="Office">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace" class="img-fluid rounded" alt="Sheer Curtains">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1617806118233-18e1de247200" class="img-fluid rounded" alt="Blackout">
                            <div class="caption">Blackout</div>
                        </div> --}}
                    </div>
                </div>

                <button class="nav-btn prev-btn">&lt;</button>
                <button class="nav-btn next-btn">&gt;</button>
            </div>





            
        </div>
    </section>


    <!-- Black Centered Info Bar -->
    <section class="py-4" style="background-color: white;">
        <div class="container" style="background-color: black; padding: 15px 0;">
            <div class="row text-center text-white">

                <div class="col-md-4 mb-2 mb-md-0">
                    {{-- FREE DELIVERY & FIXING --}}
                    {!! strip_tags(htmlspecialchars_decode($module->title_4)) !!}
                </div>

                <div class="col-md-4 mb-2 mb-md-0">
                    {{-- UAE LARGEST RANGE --}}
                    {!! strip_tags(htmlspecialchars_decode($module->title_5)) !!}
                </div>

                <div class="col-md-4">
                    {{-- 1 YEAR WARRANTY --}}
                    {!! strip_tags(htmlspecialchars_decode($module->title_6)) !!}
                </div>

            </div>
        </div>
    </section>


    <!-- Online Calculator -->
    <section class="calculator-section">
        <div class="container">
            <h2 class="font-weight-bold">ONLINE CALCULATOR</h2>
            <p class="text-uppercase"><strong>10% OFF</strong> for 2 or more windows</p>

            <div class="row mt-5">
                <!-- Size -->
                <div class="col-md-4">
                    <h1 class="display-4">01</h1>
                    <h5>CHOOSE SIZE</h5>
                    <div class="form-group mt-3">
                        <label for="height">HEIGHT</label>
                        <select id="height" class="form-control">
                            <option value="1">2m 00cm</option>
                            <option value="1.2">2m 50cm</option>
                            <option value="1.4">3m 00cm</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="width">WIDTH</label>
                        <select id="width" class="form-control">
                            <option value="1">2m 00cm</option>
                            <option value="1.2">2m 50cm</option>
                            <option value="1.4">3m 00cm</option>
                        </select>
                    </div>
                </div>

                <!-- Type -->
                <div class="col-md-4">
                    <h1 class="display-4">02</h1>
                    <h5>CHOOSE TYPE</h5>
                    <div class="form-group mt-3">
                        <label for="type">TYPE</label>
                        <select id="type" class="form-control">
                            <option value="1">Sheer curtains</option>
                            <option value="1.3">Blackout curtains</option>
                            <option value="1.5">Layered curtains</option>
                        </select>
                    </div>
                </div>

                <!-- Price -->
                <div class="col-md-4">
                    <h1 class="display-4">PRICE</h1>
                    <div class="price-block mt-4">
                        <h3 id="price">AED 300</h3>
                        <p class="price-note">incl. curtains, railing, delivery, fixing</p>
                        <button class="btn btn-dark btn-block mt-3">BOOK FREE MEASUREMENTS</button>
                        <button class="btn btn-outline-dark btn-block mt-2">FREE CONSULTATION</button>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Clients Trust Us Section -->
    <section class="py-5" style="background-color: lightgray;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="font-weight-bold">OUR CLIENTS TRUST US</h2>
            </div>

            <div class="testimonial-carousel">
                <div class="carousel-inner">
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <p class="mb-3">Good service at home and will order more for sure. Thank you very kind, greetings</p>
                            <div class="testimonial-author">
                                <strong>Data</strong>
                                <span>11 months ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item active">
                        <div class="testimonial-content">
                            <p class="mb-3">Ordered curtains (blackout), 100% quality and customer-oriented approach. Took into account all the wishes and did everything remotely. Highly recommended</p>
                            <div class="testimonial-author">
                                <strong>Trips Jul</strong>
                                <span>11 months ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <p class="mb-3">Great Experience from start I actually stock the fabric I was there way to find similar. We holiday but all was seamless! delivery. Thank you will highly.</p>
                            <div class="testimonial-author">
                                <strong>Client Name</strong>
                                <span>Time ago</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-dots">
                    <span class="dot"></span>
                    <span class="dot active"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>
    </section>


    <section class="testimonials-section">
        <div class="container">
            <h2>OUR CLIENTS TRUST US</h2>

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <div class="user">
                                <img src="https://randomuser.me/api/portraits/men/10.jpg" alt="User" />
                                <div>
                                    <strong>Maksime K.</strong><br />
                                    <small>3 months ago</small>
                                </div>
                            </div>
                            <div class="stars">★★★★★</div>
                            <p>I am very happy with the service!!! Good quality of curtains and quick installation...</p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <div class="user">
                                <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="User" />
                                <div>
                                    <strong>A. Watches</strong><br />
                                    <small>3 months ago</small>
                                </div>
                            </div>
                            <div class="stars">★★★★★</div>
                            <p>They were super quick and the result was amazing! We were very happy with the final look!</p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <div class="user">
                                <img src="https://randomuser.me/api/portraits/men/25.jpg" alt="User" />
                                <div>
                                    <strong>James D.</strong><br />
                                    <small>2 months ago</small>
                                </div>
                            </div>
                            <div class="stars">★★★★★</div>
                            <p>Excellent service! Curtains were made and installed perfectly. Highly recommended!</p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="user">
                            <img src="https://randomuser.me/api/portraits/men/11.jpg" alt="User" />
                            <div>
                                <strong>James D.</strong><br />
                                <small>2 months ago</small>
                            </div>
                        </div>
                        <div class="stars">★★★★★</div>
                        <p>Excellent service! Curtains were made and installed perfectly. Highly recommended!</p>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="testimonial-card">
                    <div class="user">
                        <img src="https://randomuser.me/api/portraits/men/15.jpg" alt="User" />
                        <div>
                            <strong>James D.</strong><br />
                            <small>2 months ago</small>
                        </div>
                    </div>
                    <div class="stars">★★★★★</div>
                    <p>Excellent service! Curtains were made and installed perfectly. Highly recommended!</p>
                </div>
            </div>
        </div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        </div>
        </div>
    </section>



    <!-- Contact Us Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-form-container p-4 p-md-5 shadow-sm">
                        <h2 class="text-center mb-3 font-weight-bold">CONTACT US</h2>
                        <p class="text-center mb-4">We will get back in 5 minutes</p>

                        <form>
                            <div class="form-group">
                                <label for="contactName" class="font-weight-bold">NAME *</label>
                                <input type="text" class="form-control form-control-lg" id="contactName" required>
                            </div>

                            <div class="form-group">
                                <label for="contactPhone" class="font-weight-bold">PHONE *</label>
                                <input type="tel" class="form-control form-control-lg" id="contactPhone" required>
                            </div>

                            <button type="submit" class="btn btn-dark btn-block btn-lg mt-4 py-3 font-weight-bold">SEND</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('visitor-js')
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>
<script>
    // lightbox.option({
    //     'resizeDuration': 200,
    //     'wrapAround': true,
    //     'showImageNumberLabel': true
    // });
</script>
@endpush