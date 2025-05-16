@extends('layout.main')

@section('content')
    <span id="form_result"></span>

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{ __('Booking Storefront Setting') }}</h4>
                        </div>
                        <div class="card-body">
                            <p class="italic">
                                <small>{{ __('The field labels marked with * are required input fields') }}.</small></p>
                            <form method="POST" action="{{ route('booking-storefront-setting.update') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><strong>{{ __('Heading') }} <span class="text-danger">*</span></strong></label>
                                        <input required type="text" name="booking_heading" class="form-control" value="{{ $bookingStorefront->heading }}" />
                                        @error('booking_heading')
                                            <span>
                                                <span class="text-danger">{{ $message }}</span>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label><strong>{{ __('Description') }} <span class="text-danger">*</span></strong></label>
                                        <textarea required class="form-control" name="booking_description" rows="3" cols="10">{{ $bookingStorefront->description }}</textarea>
                                        @error('booking_description')
                                            <span>
                                                <span class="text-danger">{{ $message }}</span>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label><strong>{{ __('Banner Image') }}</strong></label>

                                        {{-- Preview Image --}}
                                        <div class="mb-2">
                                            <img id="bannerPreview"
                                                    src="{{ $bookingStorefront->banner_image }}"
                                                    alt="Company Logo"
                                                    class="img-thumbnail"
                                                    style="max-height: 150px;">
                                        </div>
                                        {{-- File Input --}}
                                         <input {{ !$bookingStorefront->banner_image ? 'required' : '' }} type="file" name="banner_image" id="bannerInput" class="form-control" value="" />

                                    </div>
                                    @error('banner_image')
                                        <span>
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>


                                </div>
                                <br><br>
                                <div class="d-flex justify-content-center">
                                    <input type="submit" id="submit" value="{{ trans('file.submit') }}"
                                        class="btn btn-primary btn-lg btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script type="text/javascript">
        (function($) {
            "use strict";


            $('#bannerInput').on('change', function (event) {
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#bannerPreview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });

        })(jQuery);
    </script>


@endpush
