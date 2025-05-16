@extends('layout.main')
@section('content')


<span id="form_result"></span>

<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center p-3">
                    <h4 >Booking Schedules</h4>
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
                                <th>Building Name</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookingSchedules as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->building_name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->start_time }}</td>
                                    <td>{{ $item->end_time }}</td>
                                    <td>
                                        <a href="{{ route('booking-schedule.destroy', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i class="dripicons-trash"></i></a>
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












