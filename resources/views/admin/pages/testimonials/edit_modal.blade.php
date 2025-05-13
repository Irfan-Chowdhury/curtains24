<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Testimonial Image Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('testimonials.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="testimonial_id">

                <div class="modal-body">

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <div class="mb-2">
                            <img id="testimonialImagePreviewEdit" alt="Testimonial Image" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                        <input type="file" name="testimonial_image" id="testimonialImageInputEdit" class="form-control">
                    </div>
                    @if ($errors->has('testimonial_image'))
                        <span>
                            <strong class="text-danger">{{ $errors->first('testimonial_image') }}</strong>
                        </span>
                    @endif


                    <div class="row mb-3">
                        <!-- Active Checkbox -->
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_active" class="form-check-input"  value="1" checked>
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
            $('#testimonialImageInputEdit').on('change', function(event) {
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#testimonialImagePreviewEdit').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        })(jQuery);
    </script>
@endpush
