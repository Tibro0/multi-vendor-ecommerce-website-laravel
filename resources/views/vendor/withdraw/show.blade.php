@extends('vendor.layouts.master')

@push('vendor-dashboard-css')
    <title>{{ $settings->site_name }} | withdraw Request</title>
    <!-- Summernote js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" />
@endpush

@section('content')
    <!--=============================DASHBOARD START==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> withdraw Request</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="row">
                                <div class="wsus__dash_pro_area col-md-6">

                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td><b>Withdraw Method</b></td>
                                                <td>{{ $request->method }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Withdraw Charge</b></td>
                                                <td>{{ ($request->withdraw_charge / $request->total_amount) * 100 }}%</td>
                                            </tr>
                                            <tr>
                                                <td><b>Withdraw Charge Amount</b></td>
                                                <td>{{ $settings->currency_icon }}{{ $request->withdraw_charge }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Total Amount</b></td>
                                                <td>{{ $settings->currency_icon }}{{ $request->total_amount }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Withdraw Amount</b></td>
                                                <td>{{ $settings->currency_icon }}{{ $request->withdraw_amount }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Status</b></td>
                                                <td>
                                                    @if ($request->status === 'pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif ($request->status === 'paid')
                                                        <span class="badge bg-success">Paid</span>
                                                    @elseif ($request->status === 'decline')
                                                        <span class="badge bg-danger">Decline</span>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><b>Account Information</b></td>
                                                <td>{!! $request->account_info !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================DASHBOARD START==============================-->
@endsection
