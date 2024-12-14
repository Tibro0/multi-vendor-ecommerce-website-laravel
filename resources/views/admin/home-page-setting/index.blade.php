@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Home Page Setting</title>
    <!-- select2 css-->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/select2/dist/css/select2.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Home Page Setting</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 mt-2">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-profile-list"
                                            data-toggle="list" href="#list-profile" role="tab">Popular Category
                                            Section</a>
                                        <a class="list-group-item list-group-item-action" id="list-messages-list"
                                            data-toggle="list" href="#list-messages" role="tab">Product Slider
                                            Section One</a>
                                        <a class="list-group-item list-group-item-action" id="list-settings-list"
                                            data-toggle="list" href="#list-settings" role="tab">Product Slider
                                            Section Two</a>

                                        <a class="list-group-item list-group-item-action" id="list-settings-list"
                                            data-toggle="list" href="#list-slider-three" role="tab">Product Slider
                                            Section Three</a>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="tab-content" id="nav-tabContent">
                                        {{-- Popular Category Section links --}}
                                        @include('admin.home-page-setting.section.popular-category-section')
                                        {{-- Product Slider Section One links --}}
                                        @include('admin.home-page-setting.section.product-slider-section-one')
                                        {{-- Product Slider Section Two links --}}
                                        @include('admin.home-page-setting.section.product-slider-section-two')
                                        {{-- Product Slider Section Three links --}}
                                        @include('admin.home-page-setting.section.product-slider-section-three')
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
