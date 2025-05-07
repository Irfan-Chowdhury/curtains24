@extends('layout.main')

@section('content')
    <span id="form_result"></span>

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{ __('General Setting') }}</h4>
                        </div>
                        <div class="card-body">
                            <p class="italic">
                                <small>{{ __('The field labels marked with * are required input fields') }}.</small></p>
                            <form method="POST" id="general_settings_form" action="{{ route('general_settings.update', 1) }}"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Site Title') }} *</strong></label>
                                            <input type="text" name="site_title" class="form-control"
                                                value="{{ $generalSetting->site_title ?? '' }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Phone') }} *</strong></label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ $generalSetting->phone ?? '' }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Company Logo') }}</strong></label>

                                            {{-- Preview Image --}}
                                            <div class="mb-2">
                                                <img id="logoPreview"
                                                     src="{{ $generalSetting->site_logo }}"
                                                     alt="Company Logo"
                                                     class="img-thumbnail"
                                                     style="max-height: 150px;">
                                            </div>
                                            {{-- File Input --}}
                                            <input type="file" name="site_logo" id="siteLogoInput" class="form-control">
                                        </div>
                                        @if ($errors->has('site_logo'))
                                            <span>
                                                <strong>{{ $errors->first('site_logo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Payment Logo') }}</strong></label>
                                            {{-- Preview Image --}}
                                            <div class="mb-2">
                                                <img id="paymentLogoPreview"
                                                     src="{{ $generalSetting->payment_logo }}"
                                                     alt="Payment Logo"
                                                     class="img-thumbnail"
                                                     style="max-height: 150px;">
                                            </div>
                                            <input type="file" name="payment_logo" id="paymentLogoInput" class="form-control" value="" />
                                        </div>
                                        @if ($errors->has('payment_logo'))
                                            <span>
                                                <strong>{{ $errors->first('payment_logo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Time Zone') }}</strong></label>

                                            <select name="time_zone" class="selectpicker form-control"
                                                data-live-search="true" title="{{ __('Time Zone') }}...">
                                                @foreach ($zones_array as $zone)
                                                    <option value="{{ $zone['zone'] }}"
                                                        {{ $generalSetting->time_zone == $zone['zone'] ? 'selected' : '' }}>
                                                        {{ $zone['diff_from_GMT'] . ' - ' . $zone['zone'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ trans('file.Currency') }} *</strong></label>
                                            <input type="text" name="currency" class="form-control"
                                                value="{{ $generalSetting->currency ?? '' }}" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>{{ __('Currency Format') }} *</strong></label><br>
                                            @if ($generalSetting->currency_format == 'prefix')
                                                <label class="radio-inline">
                                                    <input type="radio" name="currency_format" value="prefix" checked>
                                                    {{ trans('file.Prefix') }}
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="currency_format" value="suffix">
                                                    {{ trans('file.Suffix') }}
                                                </label>
                                            @else
                                                <label class="radio-inline">
                                                    <input type="radio" name="currency_format" value="prefix">
                                                    {{ trans('file.Prefix') }}
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="currency_format" value="suffix" checked>
                                                    {{ trans('file.Suffix') }}
                                                </label>
                                            @endif
                                        </div>
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


@push('scripts')
    <script type="text/javascript">
        (function($) {
            "use strict";

            $("ul#setting").siblings('a').attr('aria-expanded', 'true');
            $("ul#setting").addClass("show");
            $("ul#setting #general-setting-menu").addClass("active");

            $('select[name=date_format]').val(($('#date_format_hidden')).val());

            if ($("input[name='timezone_hidden']").val()) {
                $('select[name=timezone]').val($("input[name='timezone_hidden']").val());
                $('.selectpicker').selectpicker('refresh');
            }

            $('.selectpicker').selectpicker({
                style: 'btn-link',
            });

            $('#siteLogoInput').on('change', function (event) {
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#logoPreview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
            $('#paymentLogoInput').on('change', function (event) {
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#paymentLogoPreview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        })(jQuery);
    </script>


@endpush
