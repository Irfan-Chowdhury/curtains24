<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Curtain Size Edit</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('curtains.size.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="curtain_size_id">

                <div class="modal-body">

                    <h4>Width</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Meter(m) *</strong></label>
                                <input type="number" min="0" name="width_m" class="form-control" placeholder="Ex: 10" required />
                            </div>
                            @error('width_m')
                                <span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Centimeter(cm) *</strong></label>
                                <input required type="number" min="0" name="width_cm" class="form-control" placeholder="00" />
                            </div>
                            @error('width_cm')
                                <span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <br>

                    <h4>Height</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Meter(m) *</strong></label>
                                <input type="number" min="0" name="height_m" class="form-control" placeholder="Ex: 10" required />
                            </div>
                            @error('height_m')
                                <span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Centimeter(cm) *</strong></label>
                                <input required type="number" min="0" name="height_cm" class="form-control" placeholder="00" />
                            </div>
                            @error('height_cm')
                                <span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
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
