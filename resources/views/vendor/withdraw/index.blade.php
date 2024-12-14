@extends('vendor.layouts.master')

@push('vendor-dashboard-css')
    <title>{{ $settings->site_name }} | Withdraw</title>
    <!-- datatables css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <!--=============================DASHBOARD START==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> All withdraw</h3>
                        <div class="wsus__dashboard">
                            <div class="row">
                                <div class="col-xl-4 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>Current Balance</p>
                                        <h4 class="text-white">{{ $settings->currency_icon }}{{ $currentBalance }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-4 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>Pending Amount</p>
                                        <h4 class="text-white">{{ $settings->currency_icon }}{{ $pendingAmount }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-4 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>Total withdraw</p>
                                        <h4 class="text-white">{{ $settings->currency_icon }}{{ $totalWithdraw }}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: right; margin-bottom: 10px;">
                            <a href="{{ route('vendor.withdraw.create') }}" class="btn btn-primary"><i
                                    class="fas fa-plus"></i> Create Request</a>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================DASHBOARD START==============================-->
@endsection

@push('vendor-dashboard-js')
    <!-- datatables js -->
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
