<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Curtain Type Edit</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('curtains.types.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="curtain_type_id">

                <div class="modal-body">

                    <h4>Width</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Name <span class="text-danger">*</span></strong></label>
                                <input type="text" name="name" class="form-control" placeholder="Ex: Sheer Curtains" required />
                            </div>
                            @error('name')
                                <span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Unit Price <span class="text-danger">*</span></strong></label>
                                <input required type="number" min="0" step="0.01" name="price" class="form-control" placeholder="Ex: 100" />
                            </div>
                            @error('price')
                                <span>
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    <div class="mt-3">
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

