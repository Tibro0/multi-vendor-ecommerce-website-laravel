@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Setting</title>
    <!-- select2 css-->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/select2/dist/css/select2.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Setting</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 mt-2">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-home-list"
                                            data-toggle="list" href="#list-home" role="tab">General Setting</a>
                                        <a class="list-group-item list-group-item-action" id="list-profile-list"
                                            data-toggle="list" href="#list-profile" role="tab">Email Configuration</a>
                                        <a class="list-group-item list-group-item-action" id="list-messages-list"
                                            data-toggle="list" href="#list-messages" role="tab">Logo And Favicon</a>

                                        <a class="list-group-item list-group-item-action" id="list-pusher-setting"
                                            data-toggle="list" href="#pusher-setting" role="tab">Pusher Setting</a>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="tab-content" id="nav-tabContent">
                                        {{-- General Setting include Link --}}
                                        @include('admin.setting.general-setting')
                                        {{-- Email Configuration Setting include Link --}}
                                        @include('admin.setting.email-configuration')
                                        {{-- Logo And Favicon include Link --}}
                                        @include('admin.setting.logo-setting')

                                        {{-- Pusher Setting include Link --}}
                                        @include('admin.setting.pusher-setting')
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

@push('admin-js')
    <!--select2 JS -->
    <script src="{{ asset('backend/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
@endpush
