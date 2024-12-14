@extends('frontend.dashboard.layouts.master')

@push('frontend-dashboard-css')
    <title>{{ $settings->site_name }} | Became a Vendor Today</title>
@endpush

@section('content')
    <!--=============================DASHBOARD START==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('frontend.dashboard.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Vendor Request</h3>
                        <div class="wsus__dashboard_profile mb-4">
                            <div class="wsus__dash_pro_area">
                                {!! @$content->content !!}
                            </div>
                        </div>


                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <form action="{{ route('user.vendor-request.create') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="wsus__dash_pro_single" bis_skin_checked="1">
                                        <i class="fas fa-images" aria-hidden="true"></i>
                                        <input type="file" name="shop_image" placeholder="Shop Banner Image">
                                    </div>

                                    <div class="wsus__dash_pro_single" bis_skin_checked="1">
                                        <i class="fas fa-user-tie" aria-hidden="true"></i>
                                        <input type="text" name="shop_name" placeholder="Shop Name">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="wsus__dash_pro_single" bis_skin_checked="1">
                                                <i class="fal fa-envelope-open" aria-hidden="true"></i>
                                                <input type="text" name="shop_email" placeholder="Shop Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="wsus__dash_pro_single" bis_skin_checked="1">
                                                <i class="far fa-phone-alt" aria-hidden="true"></i>
                                                <input type="text" name="shop_phone" placeholder="Shop Phone">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wsus__dash_pro_single" bis_skin_checked="1">
                                        <i class="fas fa-address-card" aria-hidden="true"></i>
                                        <input type="text" name="shop_address" placeholder="Shop Address">
                                    </div>
                                    <div class="wsus__dash_pro_single" bis_skin_checked="1">
                                        <textarea name="about" placeholder="About You"></textarea>
                                    </div>
                                    <button type="submit" class="common_btn mt-2">Submit</button>
                                </form>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================DASHBOARD START==============================-->
@endsection

{{-- @push('frontend-dashboard-js')
@endpush --}}
