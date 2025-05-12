<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Slider Image Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                            <img id="SliderImagePreview" alt="Slide Image" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                        <input type="file" name="image" id="sliderImageInput" class="form-control">
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
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')
    <script type="text/javascript">
        (function($) {
            "use strict";
            $('#sliderImageInput').on('change', function(event) {
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#SliderImagePreview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        })(jQuery);
    </script>
@endpush
