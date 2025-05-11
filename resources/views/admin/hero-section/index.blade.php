@extends('layout.main')

@section('content')
    <span id="form_result"></span>

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{ __('Hero Section') }}</h4>
                        </div>
                        <div class="card-body">
                            <p class="italic">
                                <small>{{ __('The field labels marked with * are required input fields') }}.</small></p>
                            <form method="POST" id="general_settings_form" action="{{ route('hero-section.update') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>{{ __('Heading') }} *</strong></label>
                                            <input type="text" name="heading" class="form-control"
                                                value="{{ $hero->heading ?? '' }}" required />
                                        </div>
                                        @error('heading')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Title 1') }} *</strong></label>
                                            <input required type="text" name="title_1" class="form-control"
                                                value="{{ $hero->title_1 ?? '' }}" />
                                        </div>
                                        @error('title_1')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Description 1') }} *</strong></label>
                                            <textarea required name="description_1" id="description_1" cols="10" rows="3" class="form-control" > {{ $hero->description_1 ?? '' }}</textarea>
                                        </div>
                                        @error('description_1')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Title 2') }} *</strong></label>
                                            <input type="text" name="title_2" class="form-control"
                                                value="{{ $hero->title_2 ?? '' }}" required />
                                        </div>
                                        @error('title_2')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Description 2') }} *</strong></label>
                                            <textarea required name="description_2" id="description_2" cols="10" rows="3" class="form-control" > {{ $hero->description_2 ?? '' }}</textarea>
                                        </div>
                                        @error('description_2')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Title 3') }} *</strong></label>
                                            <input type="text" name="title_3" class="form-control"
                                                value="{{ $hero->title_3 ?? '' }}" required />
                                        </div>
                                        @error('title_3')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Description 3') }} *</strong></label>
                                            <textarea required name="description_3" id="description_3" cols="10" rows="3" class="form-control" > {{ $hero->description_3 ?? '' }}</textarea>
                                        </div>
                                        @error('description_3')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>




                                </div>
                                <br><br>
                                <div class="d-flex justify-content-center">
                                    <input type="submit" id="submit" value="{{ trans('file.submit') }}"
                                        class="btn btn-primary btn-lg btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
