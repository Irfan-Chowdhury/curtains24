@extends('visitor.layout.master')

@push('visitor-css')
<!-- GLightbox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<style>
    .gallery-image {
        display: block;
        width: 100%;
        height: 300px; /* fixed thumbnail height */
        overflow: hidden;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
    }

    .gallery-image img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* ensures image covers the box without distortion */
        transition: transform 0.3s ease, filter 0.3s ease;
    }

    .gallery-image:hover img {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        filter: brightness(0.8);
        transform: scale(1.03);
    }

</style>
@endpush

@section('content-visitor')

    <!-- Tailored Curtains Section -->
    <section class="py-5" id="startWithBanner">
        <div class="container">
            <div class="row align-items-stretch">
                    <!-- Images -->
                    <div class="col-md-4 d-flex flex-wrap">
                        <img src="{{ $banner->banner_image_1 }}" class="img-fluid mr-2 mb-2" style="flex: 1 1 48%; object-fit: cover;" alt="Shadow">
                    </div>
                    <!-- Images -->
                    <div class="col-md-4 d-flex flex-wrap">
                        <img src="{{ $banner->banner_image_2 }}" class="img-fluid mr-2 mb-2" style="flex: 1 1 48%; object-fit: cover;" alt="Shadow">
                    </div>

                <!-- Text & Buttons -->
                <div class="col-md-4 position-relative mt-4 mt-md-0">
                    <!-- Faded Background Text -->
                    <h1 class="font-helvetica position-absolute text-uppercase" style="color: rgba(0,0,0,0.05); font-size: 130px; top: 5px; left: 0; z-index: 0; line-height: 1;"><strong>Save<br>Time</strong></h1>

                    <!-- Foreground Content -->
                    <div class="position-relative" style="z-index: 1; top:130px">
                        {{-- <h1 class="font-helvetica font-weight-bold mb-4 text-center" style="font-size: 30px;">TAILORED CURTAINS<br>IN 24 HOURS</h1> --}}
                        <h1 class="font-helvetica font-weight-bold mb-4 text-center" style="font-size: 30px;">{{ $banner->title }}</h1>

                        <button id="scrollToFreeMeasurements" class="btn btn-dark btn-block mb-3" style="padding: 12px 0;">BOOK FREE MEASUREMENTS</button>
                        <button id="scrollToCalculator" class="btn btn-outline-dark btn-block" style="padding: 12px 0;">
                            ONLINE CALCULATOR
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- How it Works -->
    <section class="py-5 mt-5" id="howItWorks">
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
    <section class="py-5" id="free-measurements">
        <div class="container px-0">
            <div class="row no-gutters">

                <div class="col-md-4">
                    {{-- <img src="https://static.wixstatic.com/media/e01eb4_cbc2018586df43c5bb0ec9c526795c77~mv2.png/v1/crop/x_0,y_92,w_1439,h_1795/fill/w_377,h_470,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/curtains24_1.png" --}}
                    <img src="{{ $storefrontSetting->banner_image }}"
                        class="img-fluid h-100 w-100"
                        alt="Curtains"
                        style="object-fit: cover;">
                </div>

                <div class="col-md-8" style="background-color: lightgray; padding: 40px;">
                    <div class="bg-white p-4 p-md-5 h-100 shadow-sm">
                        <h2 class="text-center mb-4 font-weight-bold">
                            {{-- BOOK FREE MEASUREMENTS --}}
                            {{ $storefrontSetting->heading }}
                        </h2>
                        <p class="text-center mb-4">
                            {{-- Our team will come with fabric samples. --}}
                            {{ $storefrontSetting->description }}
                        </p>

                        <form action="{{ route('bookingStore') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="building" class="font-weight-bold">BUILDING NAME *</label>
                                        <input type="text" name="building_name" class="form-control form-control-lg" id="building" required>
                                        @error('building_name')
                                            <span>
                                                <span class="text-danger">{{ $message }}</span>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="font-weight-bold">PHONE *</label>
                                        <input type="tel" name="phone" class="form-control form-control-lg" id="phone" required>
                                        @error('phone')
                                            <span>
                                                <span class="text-danger">{{ $message }}</span>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date" class="font-weight-bold">DATE *</label>
                                        <input type="text" name="date" class="form-control form-control-lg" id="date" required>
                                        @error('date')
                                            <span>
                                                <span class="text-danger">{{ $message }}</span>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="time" class="font-weight-bold">TIME *</label>
                                        <select name="time" class="form-control form-control-lg" id="time" required>
                                            <option value="">Select time</option>
                                            @foreach ($timeSlots as $item)
                                                <option>{{ $item->start_time }} - {{ $item->end_time }}</option>
                                            @endforeach
                                            {{-- <option>9:00 AM</option>
                                            <option>10:00 AM</option>
                                            <option>11:00 AM</option>
                                            <option>12:00 PM</option>
                                            <option>1:00 PM</option>
                                            <option>2:00 PM</option>
                                            <option>3:00 PM</option>
                                            <option>4:00 PM</option>
                                            <option>5:00 PM</option> --}}
                                        </select>
                                        @error('time')
                                            <span>
                                                <span class="text-danger">{{ $message }}</span>
                                            </span>
                                        @enderror
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
    <section class="py-5" id="howItLooks">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="font-weight-bold">{{ $slider->slider_heading }}</h2>
                <p class="lead">{{ $slider->slider_description }}</p>
            </div>
            <!-- Custom Carousel -->
            <div class="curtains-gallery">
                <div class="gallery-container">
                    <div class="gallery-track" id="galleryTrack">
                        <!-- Gallery Items -->
                        @foreach ($slider->images as $image)
                            <div class="gallery-item">
                                <a href="{{ $image->url }}" class="glightbox gallery-image" data-title="{{ $image->title }}">
                                    <img src="{{ $image->url }}" class="img-fluid rounded" >
                                </a>
                                @if ($image->isTitleVisible)
                                    <div class="caption">{{ $image->title }}</div>
                                @endif
                            </div>
                        @endforeach


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
    <section class="calculator-section container" id="calculator">
            <h2 class="font-weight-bold">ONLINE CALCULATOR</h2>
            <p class="text-uppercase"><strong>10% OFF</strong> for 2 or more windows</p>
            <div class="row mt-5">
                <div class="col-md-4">
                    <h1 class="display-4">01</h1>
                    <h5>CHOOSE SIZE</h5>
                    <div class="form-group mt-3">
                        <label for="height">HEIGHT</label>
                        <select id="height" class="form-control">
                            @foreach ($curtainSizes as $item)
                                <option value="{{ $item->height }}">{{ $item->height_details }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="width">WIDTH</label>
                        <select id="width" class="form-control">
                            @foreach ($curtainSizes as $item)
                                <option value="{{ $item->width }}">{{ $item->width_details }}</option>
                            @endforeach
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
                            @foreach ($curtainTypes as $item)
                                <option value="{{ $item->price }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <h1 class="display-4">PRICE</h1>
                    <div class="price-block mt-4">
                        <h3 id="price">AED 300</h3>
                        <p class="price-note">incl. curtains, railing, delivery, fixing</p>
                        <button id="scrollUpToFreeMeasurements" class="btn btn-dark btn-block mt-3">BOOK FREE MEASUREMENTS</button>
                        <button class="btn btn-outline-dark btn-block mt-2" id="scrollToContactUs">FREE CONSULTATION</button>
                    </div>
                </div>
            </div>
    </section>



    <!-- Clients Trust Us Section -->
    <section class="py-5">
        <div class="container-fluid testimonial-slider">
            <h2 class="text-center font-weight-bold mb-5">OUR CLIENTS TRUST US</h2>
            <div class="position-relative">
              <button class="nav-button previous-button">&#8249;</button>
              <button class="nav-button next-button">&#8250;</button>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="testimonial-track-wrapper overflow-hidden">
                        <div class="testimonial-track">
                          @foreach ($testimonials as $testimonial)
                            <div class="testimonial-item">
                                <div class="testimonial-card">
                                    <img src="{{ $testimonial->url }}" class="img-fluid rounded" alt="Testimonial Image">
                                </div>
                            </div>
                          @endforeach


                        </div>
                      </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            </div>
          </div>
    </section>


    <!-- Contact Us Section -->
    <section class="py-5" id="contactUs">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-form-container p-4 p-md-5 shadow-sm">
                        <h2 class="text-center mb-3 font-weight-bold">{{ $storefrontSetting->contact_heading }}</h2>
                        <p class="text-center mb-4">{{ $storefrontSetting->contact_description }}</p>

                        <form action="{{ route('contactUsSend') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="contactName" class="font-weight-bold">NAME *</label>
                                <input type="text" name="user_name" class="form-control form-control-lg" required>
                                @error('user_name')
                                    <span>
                                        <span class="text-danger">{{ $message }}</span>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="contactPhone" class="font-weight-bold">PHONE *</label>
                                <input type="tel" name="contact_phone" class="form-control form-control-lg" required>
                                @error('contact_phone')
                                    <span>
                                        <span class="text-danger">{{ $message }}</span>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="message" class="font-weight-bold">MESSAGE <small>(Optional)</small></label>
                                <textarea name="message" class="form-control form-control-lg"></textarea>
                                @error('message')
                                    <span>
                                        <span class="text-danger">{{ $message }}</span>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark btn-block btn-lg mt-4 py-3 font-weight-bold">SEND</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('visitor-scripts')
    <!-- GLightbox JS -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        // Initialize GLightbox
        const lightbox = GLightbox({
            selector: '.glightbox'
        });
    </script>

<script>
    const track = document.querySelector('.testimonial-track');
    const items = document.querySelectorAll('.testimonial-item');
    const prevBtn = document.querySelector('.previous-button');
    const nextBtn = document.querySelector('.next-button');

    let index = 0;

    function updateSlider() {
      const itemWidth = items[0].offsetWidth;
      track.style.transform = `translateX(-${index * itemWidth}px)`;

      // Add focused class to the middle card
      items.forEach((item, i) => {
        item.classList.remove('focused');
        if (i === index + 1) item.classList.add('focused');
      });

      // Toggle button visibility
      prevBtn.style.display = index > 0 ? 'block' : 'none';
      nextBtn.style.display = index < items.length - 3 ? 'block' : 'none';
    }

    prevBtn.addEventListener('click', () => {
      if (index > 0) {
        index--;
        updateSlider();
      }
    });

    nextBtn.addEventListener('click', () => {
      if (index < items.length - 3) {
        index++;
        updateSlider();
      }
    });

    // Initial update
    updateSlider();
  </script>
@endpush
