@extends('layout.main')
@section('content')


<span id="form_result"></span>

<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header d-flex align-items-center p-3">
                    <h4 >Contact Us Section</h4>
                </div>
                <hr>
                <div class="card-body">
                    <p class="italic">
                        <small>{{ __('The field labels marked with * are required input fields') }}.</small>
                    </p>
                    <form method="POST" action="{{ route('contact-us-setting.update') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><strong>{{ __('Heading') }} <span class="text-danger">*</span></strong></label>
                                    <input required type="text" name="contact_heading" class="form-control" value="{{ $contactUs->contact_heading }}" />
                                    @error('contact_heading')
                                        <span>
                                            <span class="text-danger">{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label><strong>{{ __('Description') }} <span class="text-danger">*</span></strong></label>
                                    <textarea required class="form-control" name="contact_description" rows="3" cols="10">{{ $contactUs->contact_description }}</textarea>
                                    @error('contact_description')
                                        <span>
                                            <span class="text-danger">{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 form-group mt-3">
                                <button type="submit" id="submitButton" class="btn btn-success">@lang('file.Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
