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
                                            data-toggle="list" href="#list-home" role="tab">HomePage Banner Section
                                            One</a>
                                        <a class="list-group-item list-group-item-action" id="list-profile-list"
                                            data-toggle="list" href="#list-profile" role="tab">HomePage Banner Section
                                            Two</a>
                                        <a class="list-group-item list-group-item-action" id="list-messages-list"
                                            data-toggle="list" href="#list-messages" role="tab">HomePage Banner Section
                                            Three</a>
                                        <a class="list-group-item list-group-item-action" id="list-settings-list"
                                            data-toggle="list" href="#list-settings" role="tab">HomePage Banner Section
                                            Four</a>

                                        <a class="list-group-item list-group-item-action" id="list-product-list"
                                            data-toggle="list" href="#list-product" role="tab">Product Page Banner</a>

                                        <a class="list-group-item list-group-item-action" id="list-cart-list"
                                            data-toggle="list" href="#list-cart" role="tab">Cart Page Banner</a>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="tab-content" id="nav-tabContent">
                                        {{-- HomePage Banner Section One include Link --}}
                                        @include('admin.advertisement.homepage-banner-one')

                                        {{-- HomePage Banner Section Two include Link --}}
                                        @include('admin.advertisement.homepage-banner-two')

                                        {{-- HomePage Banner Section Three include Link --}}
                                        @include('admin.advertisement.homepage-banner-three')

                                        {{-- HomePage Banner Section Four include Link --}}
                                        @include('admin.advertisement.homepage-banner-four')

                                        {{-- Product Banner Section include Link --}}
                                        @include('admin.advertisement.product-page-banner')

                                        {{-- Cart Banner Section include Link --}}
                                        @include('admin.advertisement.cart-page-banner')

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
