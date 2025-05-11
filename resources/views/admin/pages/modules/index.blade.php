@extends('layout.main')

@section('content')
    <span id="form_result"></span>

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{ __('Modules') }}</h4>
                        </div>
                        <div class="card-body">
                            <p class="italic">
                                <small>{{ __('The field labels marked with * are required input fields') }}.</small></p>
                            <form method="POST" id="general_settings_form" action="{{ route('modules.update') }}" enctype="multipart/form-data">
                                @csrf

                                <h4 class="mb-3">{{ __('Section 1') }}</h4>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><strong>{{ __('Title 1') }} *</strong></label>
                                            <input required type="text" name="title_1" class="form-control"
                                                value="{{ $module->title_1 ?? '' }}" />
                                        </div>
                                        @error('title_1')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><strong>{{ __('Title 2') }} *</strong></label>
                                            <input type="text" name="title_2" class="form-control"
                                                value="{{ $module->title_2 ?? '' }}" required />
                                        </div>
                                        @error('title_2')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><strong>{{ __('Title 3') }} *</strong></label>
                                            <input type="text" name="title_3" class="form-control"
                                                value="{{ $module->title_3 ?? '' }}" required />
                                        </div>
                                        @error('title_3')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <h4 class="mt-3 mb-3">{{ __('Section 2') }}</h4>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><strong>{{ __('Title 4') }} *</strong></label>
                                            <input required type="text" name="title_4" class="form-control"
                                                value="{{ $module->title_4 ?? '' }}" />
                                        </div>
                                        @error('title_4')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><strong>{{ __('Title 5') }} *</strong></label>
                                            <input type="text" name="title_5" class="form-control"
                                                value="{{ $module->title_5 ?? '' }}" required />
                                        </div>
                                        @error('title_5')
                                            <span>
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><strong>{{ __('Title 6') }} *</strong></label>
                                            <input type="text" name="title_6" class="form-control"
                                                value="{{ $module->title_6 ?? '' }}" required />
                                        </div>
                                        @error('title_6')
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
