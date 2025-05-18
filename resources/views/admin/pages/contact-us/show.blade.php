@extends('layout.main')
@section('content')



<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Message Details</h4>
                </div>
                <div class="card-body">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Name:</h5>
                            <p class="card-text">{{ $contact->name }}</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Phone:</h5>
                            <p class="card-text">{{ $contact->phone }}</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Message:</h5>
                            <p class="card-text">{{ $contact->message }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Received At:</h5>
                            <p class="card-text">
                                {{ $contact->created_at->translatedFormat('jS M, Y h:i A') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection













