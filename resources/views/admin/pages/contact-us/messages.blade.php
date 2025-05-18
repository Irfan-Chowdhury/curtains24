@extends('layout.main')
@section('content')


<span id="form_result"></span>

<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center p-3">
                    <h4 >Contact Messages</h4>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container-fluid">
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataListTable" class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->message }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('contact-us-messages.show', $item->id) }}" class="show btn btn-success btn-sm"><i class="dripicons-preview"></i></a>
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
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        $('#dataListTable').DataTable({
            pageLength: 10,
            responsive: true,
            ordering: true,
            autoWidth: false,
        });
    });
</script>

@endpush












