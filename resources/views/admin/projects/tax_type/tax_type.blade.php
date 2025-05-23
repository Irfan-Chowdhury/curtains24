@extends('layout.main')
@section('content')

    <section>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">

<div class="card-header"><h3 class="card-title">{{__('Add Tax Type')}}</h3></div>
<form method="post" id="tax_type_form" class="form-horizontal" >
    @csrf
    <div class="col-md-4 form-group">
        <label>{{__('Tax Name')}} *</label>
        <input type="text" name="name" id="name"  required class="form-control required"
               placeholder="{{__('Tax Name')}}">
    </div>
    <div class="col-md-4 form-group">
        @if(config('variable.currency_format')=='suffix')
            <label>{{__('Tax Rate')}} ({{config('variable.currency')}}) *</strong>
            </label>
        @else
            <label>({{config('variable.currency')}}) {{__('Tax Rate')}}</strong>
            </label>
        @endif

        <input type="text" name="rate" id="rate"  required class="form-control required"
               placeholder="{{__('Tax Rate')}}">
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>{{trans('file.Description')}}</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
    </div>
    <div class="col-md-6 form-group">
        <label>{{__('Tax Type')}}</label>
        <select name="type" id="type" class="form-control selectpicker "
                data-live-search="true" data-live-search-style="contains"
                title='{{__('Tax Type')}}'>
            {{-- <option value="fixed">{{trans('file.Fixed')}}</option> --}}
            <option value="percentage">{{trans('file.Percentage')}}</option>
        </select>
    </div>
    <div class="col-md-4 form-group">
        <input type="submit" name="tax_type_submit" id="tax_type_submit" class="btn btn-success" value={{trans("file.Save")}}>
    </div>
</form>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <span class="tax_result"></span>
            <div class="table-responsive">
                <table id="tax_type-table" class="table ">
                    <thead>
                    <tr>
                        <th>{{__('Tax Name')}}</th>
                        <th>{{__('Tax Rate')}}</th>
                        <th>{{__('Tax Type')}}</th>
                        <th>{{trans('file.Description')}}</th>
                        <th>{{trans('file.Default')}}</th>
                        <th class="not-exported">{{trans('file.action')}}</th>
                    </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>


<div id="TaxEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 id="TaxModalLabel" class="modal-title">{{trans('file.Edit')}}</h5>

                <button type="button" data-dismiss="modal" id="tax_close" aria-label="Close" class="close"><span
                            aria-hidden="true">×</span></button>
            </div>
            <span class="tax_result_edit"></span>

            <div class="modal-body">
                <form method="post" id="tax_type_form_edit" class="form-horizontal" >

                    @csrf
                    <div class="col-md-4 form-group">
                        <label>{{__('Tax Name')}} *</label>
                        <input type="text" name="name_edit" id="name_edit" required class="form-control"
                               placeholder="{{__('Tax Name')}}">
                    </div>
                    <div class="col-md-4 form-group">
                        @if(config('variable.currency_format')=='suffix')
                            <label>{{__('Tax Rate')}} ({{config('variable.currency')}}) *</strong>
                            </label>
                        @else
                            <label>({{config('variable.currency')}}) {{__('Tax Rate')}}</strong>
                            </label>
                        @endif
                        <input type="text" name="rate_edit" id="rate_edit" required class="form-control"
                               placeholder="{{__('Tax Rate')}}">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{trans('file.Description')}}</label>
                            <textarea class="form-control" id="description_edit" name="description_edit" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{__('Tax Type')}}</label>
                        <select name="type_edit" id="type_edit" class="form-control selectpicker "
                                data-live-search="true" data-live-search-style="contains"
                                title='{{__('Tax Type')}}'>
                            {{-- <option value="fixed">{{trans('file.Fixed')}}</option> --}}
                            <option value="percentage">{{trans('file.Percentage')}}</option>
                        </select>
                    </div>
                    <div class="ml-3 col-md-6 form-group form-check">
                        <input type="checkbox" name="is_default" class="form-check-input">
                        <label class="form-check-label">Is deafult for items</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="hidden" name="hidden_tax_id" id="hidden_tax_id" />
                        <input type="submit" name="tax_type_edit_submit" id="tax_type_edit_submit" class="btn btn-success" value={{trans("file.Edit")}} />
                    </div>
                </form>
            </div>
        </div>
    </div>
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
        $(document).ready(function() {
            @include('admin.projects.tax_type.tax_type_js')
        });
    })(jQuery);
</script>
@endpush
