@extends('layout.main')
@section('content')
@section('title','Admin | Developer Section')


@include('admin.includes.session_message')


<div class="container-fluid mb-3">
    <div class="row">
        <div class="col-4">
            <div class="card mb-0">
                <div id="collapse1" class="collapse show" aria-labelledby="generalSettings" data-parent="#accordion">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="general-setting" data-toggle="list" href="#generalSetting" role="tab" aria-controls="home">@lang('file.General Setting')</a>
                            {{-- <a class="list-group-item list-group-item-action" id="bug-update-setting" data-toggle="list" href="#bugUpdateSetting" role="tab" aria-controls="home">@lang('file.Bug Update Setting')</a> --}}
                            <a class="list-group-item list-group-item-action" id="version-upgrade-setting" data-toggle="list" href="#versionUpgradeSetting" role="tab" aria-controls="home">@lang('file.Version Upgrade Setting')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">

                <!--General Setting-->
                @include('admin.developer_section.general')

                <!-- Bug Setting -->
                @include('admin.developer_section.bug_update_setting')

                <!-- Version Upgrade Setting -->
                @include('admin.developer_section.version_upgrade_setting')
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script type="text/javascript">
    (function ($) {
        "use strict";

            $(document).on('click', '#addMoreFile', function(){
                console.log('ok');
                var rand = Math.floor(Math.random() * 90000) + 10000;
                $('.filesArea').append('<div class="row"><div class="col-8 form-group"><label>{{__('File Name')}}</label><input type="text" name="file_name[]" required class="form-control" placeholder="{{__('Type File Name')}}"></div><div class="form-group"><label>Delete</label><br><span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span></div></div>');
            })
            $(document).on('click', '.del-row', function(){
                $(this).parent().parent().html('');
            })

            // Log
            $(document).on('click', '#addMoreLog', function(){
                console.log('ok');
                var rand = Math.floor(Math.random() * 90000) + 10000;
                $('.logArea').append('<div class="row"><div class="col-8 form-group"><label>{{__('File Name')}}</label><input type="text" name="text[]" required class="form-control" placeholder="{{__('Type File Name')}}"></div><div class="form-group"><label>Delete</label><br><span class="btn btn-default btn-sm del-row-log"><i class="dripicons-trash"></i></span></div></div>');
            })
            $(document).on('click', '.del-row-log', function(){
                $(this).parent().parent().html('');
            })
    })(jQuery);
</script>
@endpush

