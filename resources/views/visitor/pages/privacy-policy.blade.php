@extends('visitor.layout.master')

@push('visitor-css')
   <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
    .blog-content {
        font-family: 'Poppins', sans-serif;
        font-size: 18px;
        line-height: 1.6;
        color: #333;
    }
    </style>
@endpush

@section('content-visitor')
    <section class="mt-5 mb-5">
        <div class="mt-5 container">
            <h2>{{ $privacyAndPolicy->title }}</h2>
            <div class="mt-4 blog-content">
                {!! html_entity_decode($privacyAndPolicy->description) !!}
            </div>
        </div>
    </section>
@endsection

