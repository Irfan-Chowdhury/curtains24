@extends('layout.main')
@section('content')


<span id="form_result"></span>

<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center p-3">
                    <h4 >Curtain Size Section</h4>
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
                                <th>Width (Meter)</th>
                                <th>Height (Meter)</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($curtainSizes as $curtainSize)
                                <tr>
                                    <td>{{ $curtainSize->width }}</td>
                                    <td>{{ $curtainSize->height }}</td>
                                    <td>
                                        @if ($curtainSize->is_active)
                                            <span class="p-2 badge bg-success">Active</span>
                                        @else
                                            <span class="p-2 badge bg-warning">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <button class="btn btn-primary edit" data-id="{{ $curtainSize->id }}"><i class="dripicons-pencil"></i></button>
                                        <a href="{{ route('curtains.size.destroy', $curtainSize->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i class="dripicons-trash"></i></a>
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

@include('admin.pages.curtain-size.create_modal')
@include('admin.pages.curtain-size.edit_modal')

@endsection

@push('scripts')

    <script>
        const editURL = "{{ route('curtains.size.edit', ':id') }}";
        //--------- Edit -------
        $(document).on('click', '.edit', function() {
            $('#editModal').modal('show');

            let id = $(this).data("id");
            $.get({
                url: editURL.replace(':id', id),
                success: function(response) {
                    console.log(response);
                    $("#editModal input[name='curtain_size_id']").val(response.id);
                    $("#editModal input[name='width_m']").val(response.width_m);
                    $("#editModal input[name='width_cm']").val(response.width_cm);
                    $("#editModal input[name='height_m']").val(response.height_m);
                    $("#editModal input[name='height_cm']").val(response.height_cm);
                    $("#editModal input[name='is_active']").prop('checked', response.is_active);
                    $('#editModal').modal('show');
                }
            })
        });
    </script>
@endpush














