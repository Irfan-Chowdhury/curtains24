@extends('layout.main')

@push('css')
<!-- GLightbox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<style>
    .gallery-image {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .gallery-image img {
        display: block;
        width: 100%;
        height: auto;
        transition: transform 0.3s ease, filter 0.3s ease;
    }

    .gallery-image:hover img {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        filter: brightness(0.8);
        transform: scale(1.03); /* slight zoom */
    }
</style>
@endpush


@section('content')


<span id="form_result"></span>

<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center p-3">
                    <h4 >Testimonials Section</h4>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-plus"></i> Create
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataListTable" class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>
                                        <a href="{{ $testimonial->url }}" class="glightbox gallery-image">
                                            <img src="{{ $testimonial->url }}" class="img-fluid" style="max-width: 100px;">
                                        </a>
                                    </td>

                                    <td>
                                        @if ($testimonial->isActive)
                                            <span class="p-2 badge bg-success">Active</span>
                                        @else
                                            <span class="p-2 badge bg-warning">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <button class="btn btn-primary edit" data-id="{{ $testimonial->id }}"><i class="dripicons-pencil"></i></button>
                                        <a href="{{ route('testimonials.destroy', $testimonial->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this slider?')"><i class="dripicons-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.pages.testimonials.create_modal')
@include('admin.pages.testimonials.edit_modal')

@endsection

@push('scripts')

    <!-- GLightbox JS -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        // Initialize GLightbox
        const lightbox = GLightbox({
            selector: '.glightbox'
        });
    </script>

    <script>
        const editURL = "{{ route('testimonials.edit', ':id') }}";
        //--------- Edit -------
        $(document).on('click', '.edit', function() {
            $('#editModal').modal('show');

            let id = $(this).data("id");
            $.get({
                url: editURL.replace(':id', id),
                success: function(response) {
                    console.log(response);
                    $("#editModal input[name='testimonial_id']").val(response.id);
                    $('#testimonialImagePreviewEdit').attr('src', response.url);
                    $("#editModal input[name='is_active']").prop('checked', response.isActive);
                    $('#editModal').modal('show');
                }
            })
        });
    </script>
@endpush
























    {{-- <span id="form_result"></span> --}}
    {{-- <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{ __('Sliders') }}</h4>
                        </div>
                        <div class="card-body">
                            <p class="italic">
                                <small>{{ __('The field labels marked with * are required input fields') }}.</small>
                            </p>
                            <form method="POST" action="{{ route('banners.update') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>{{ __('Heading') }} *</strong></label>
                                            <input required type="text" name="slider_heading" class="form-control"
                                                value="" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>{{ __('Description') }} *</strong></label>
                                            <textarea required class="form-control" name="slider_description" rows="3" cols="10"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Banner Image-1') }}</strong></label>
                                            <div class="mb-2">
                                                <img id="bannerImageOnePreview" alt="Banner Image-1"
                                                    class="img-thumbnail" style="max-height: 150px;">
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
                                                <img id="bannerImageTwoPreview" alt="Banner Image-2"
                                                    class="img-thumbnail" style="max-height: 150px;">
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
    </section> --}}

