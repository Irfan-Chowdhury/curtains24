@extends('layout.main')
@section('content')


<span id="form_result"></span>

<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center p-3">
                    <h4 >Available Time Schedule</h4>
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
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timeSlots as $item)
                                <tr>
                                    <td>{{ $item->start_time }}</td>
                                    <td>{{ $item->end_time }}</td>
                                    <td>
                                        <button class="btn btn-primary edit" data-id="{{ $item->id }}"><i class="dripicons-pencil"></i></button>
                                        <a href="{{ route('available-times.destroy', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i class="dripicons-trash"></i></a>
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

@include('admin.pages.available-time.create_modal')
@include('admin.pages.available-time.edit_modal')

@endsection

@push('scripts')

    <script>
        const editURL = "{{ route('available-times.edit', ':id') }}";
        //--------- Edit -------
        $(document).on('click', '.edit', function() {
            $('#editModal').modal('show');

            let id = $(this).data("id");
            $.get({
                url: editURL.replace(':id', id),
                success: function(response) {
                    console.log(response);
                    $("#editModal input[name='available_time_id']").val(response.id);
                    $("#editModal input[name='start_time']").val(response.start_time);
                    $("#editModal input[name='end_time']").val(response.end_time);
                    $('#editModal').modal('show');
                }
            })
        });
    </script>
@endpush














