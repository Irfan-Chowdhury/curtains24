<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Slider Image Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sliders.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="slider_id">
                <input type="hidden" name="type" value="slider">

                <div class="modal-body">

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <div class="mb-2">
                            <img id="SliderImagePreviewEdit" alt="Slide Image" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                        <input type="file" name="slider_image" id="sliderImageInputEdit" class="form-control">
                    </div>
                    @if ($errors->has('image'))
                        <span>
                            <strong class="text-danger">{{ $errors->first('image') }}</strong>
                        </span>
                    @endif


                    <div class="row mb-3">
                        <!-- Title Visible Checkbox -->
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_title_visible" class="form-check-input" id="is_title_visible" value="1" checked>
                                <label class="form-check-label" for="is_title_visible">Title Visible</label>
                            </div>
                        </div>

                        <!-- Active Checkbox -->
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" checked>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')
    <script type="text/javascript">
        (function($) {
            "use strict";
            $('#sliderImageInputEdit').on('change', function(event) {
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#SliderImagePreviewEdit').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        })(jQuery);
    </script>
@endpush
