@extends('frontend.layouts.master')

@push('frontend-css')
    <title>{{ $settings->site_name }} | Terms and Condition</title>
@endpush

@section('content')
    <!--============================BREADCRUMB START==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>terms and condition</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">terms and condition</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================BREADCRUMB END==============================-->


    <!--============================PAYMENT PAGE START==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="wsus__pay_info_area">
                <div class="row">
                    <div class="card">
                        <div class="card-body p-5">
                            {!! @$terms->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================PAYMENT PAGE END==============================-->
@endsection
