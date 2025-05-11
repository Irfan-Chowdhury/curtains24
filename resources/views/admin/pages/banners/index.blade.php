@extends('layout.main')

@section('content')
    <span id="form_result"></span>

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{ __('Banner Setting') }}</h4>
                        </div>
                        <div class="card-body">
                            <p class="italic">
                                <small>{{ __('The field labels marked with * are required input fields') }}.</small></p>
                            <form method="POST"  action="{{ route('banners.update') }}"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Banner Title') }} *</strong></label>
                                            <input required type="text" name="title" class="form-control"
                                                value="{{ $banner->title}}" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Banner Image-1') }}</strong></label>
                                            <div class="mb-2">
                                                <img id="bannerImageOnePreview"
                                                     src="{{ $banner->banner_image_1 }}"
                                                     alt="Banner Image-1"
                                                     class="img-thumbnail"
                                                     style="max-height: 150px;">
                                            </div>
                                            <input {{ $banner->banner_image_1 ? 'required' : '' }} type="file" name="banner_image_1" id="bannerImageOneInput" class="form-control">
                                        </div>
                                        @if ($errors->has('banner_image_1'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('banner_image_1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Banner Image-2') }}</strong></label>
                                            <div class="mb-2">
                                                <img id="bannerImageTwoPreview"
                                                     src="{{ $banner->banner_image_2 }}"
                                                     alt="Banner Image-2"
                                                     class="img-thumbnail"
                                                     style="max-height: 150px;">
                                            </div>
                                            <input {{ $banner->banner_image_2 ? 'required' : '' }} type="file" name="banner_image_2" id="bannerImageTwoInput" class="form-control" value="" />
                                        </div>
                                        @if ($errors->has('banner_image_2'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('banner_image_2') }}</strong>
                                            </span>
                                        @endif
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
            $('#bannerImageOneInput').on('change', function (event) {
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#bannerImageOnePreview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
            $('#bannerImageTwoInput').on('change', function (event) {
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#bannerImageTwoPreview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        })(jQuery);
    </script>


@endpush
