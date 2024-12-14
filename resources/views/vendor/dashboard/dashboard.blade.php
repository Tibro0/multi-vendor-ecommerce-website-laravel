@extends('vendor.layouts.master')

@push('vendor-dashboard-css')
    <title>{{ $settings->site_name }} | Dashboard</title>
@endpush

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content">
                        <div class="wsus__dashboard">
                            <div class="row">
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>Today's Orders</p>
                                        <h4 class="text-white">{{ $todaysOrder }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item green" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>Today's Pending Order</p>
                                        <h4 class="text-white">{{ $todaysPendingOrder }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item sky" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>Total Order</p>
                                        <h4 class="text-white">{{ $totalOrder }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item blue" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-star"></i>
                                        <p>Total Pending Order</p>
                                        <h4 class="text-white">{{ $totalPendingOrder }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item purple" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-star"></i>
                                        <p>Total Complete Order</p>
                                        <h4 class="text-white">{{ $totalCompleteOrder }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item orange" href="{{ route('vendor.products.index') }}">
                                        <i class="fas fa-user-shield"></i>
                                        <p>Total Products</p>
                                        <h4 class="text-white">{{ $totalProducts }}</h4>
                                    </a>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="javascript:;">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>Today's Earings</p>
                                        <h4 class="text-white">{{ $settings->currency_icon }}{{ $todaysEarnings }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item green" href="javascript:;">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>This Months Earings</p>
                                        <h4 class="text-white">{{ $settings->currency_icon }}{{ $monthEarnings }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item sky" href="javascript:;">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>This Year Earings</p>
                                        <h4 class="text-white">{{ $settings->currency_icon }}{{ $yearEarnings }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item blue" href="javascript:;">
                                        <i class="fas fa-star"></i>
                                        <p>Total Earings</p>
                                        <h4 class="text-white">{{ $settings->currency_icon }}{{ $totalEarnings }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item purple" href="{{ route('vendor.reviews.index') }}">
                                        <i class="fas fa-star"></i>
                                        <p>Total Reviews</p>
                                        <h4 class="text-white">{{ $totalReviews }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item orange" href="{{ route('vendor.shop-profile.index') }}">
                                        <i class="fas fa-user-shield"></i>
                                        <p>Shop Profile</p>
                                        <h4 class="text-white">-</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
