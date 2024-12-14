@extends('vendor.layouts.master')

@push('vendor-dashboard-css')
    <title>{{ $settings->site_name }} | Shop Profile</title>
    <!-- Summernote js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" />
@endpush

@section('content')
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                            DASHBOARD START
                                                                                                                                                                                                                                                                                                                                                          ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Shop profile</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <form action="{{ route('vendor.shop-profile.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group wsus__input">
                                        <label>Preview</label><br>
                                        <img src="{{ asset($profile->banner) }}" width="200px">
                                    </div>
                                    <div class="form-group wsus__input">
                                        <label>Banner</label>
                                        <input type="file" name="banner" value="{{ old('banner') }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group wsus__input">
                                        <label>Shop Name</label>
                                        <input type="text" name="shop_name" value="{{ $profile->shop_name }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group wsus__input">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="{{ $profile->phone }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group wsus__input">
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{ $profile->email }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group wsus__input">
                                        <label>Address</label>
                                        <input type="text" name="address" value="{{ $profile->address }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group wsus__input">
                                        <label>Description</label>
                                        <textarea name="description" class="summernote">{!! $profile->description !!}</textarea>
                                    </div>
                                    <div class="form-group wsus__input">
                                        <label>Facebook Link</label>
                                        <input type="text" name="fb_link" value="{{ $profile->fb_link }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group wsus__input">
                                        <label>Twitter Link</label>
                                        <input type="text" name="tw_link" value="{{ $profile->tw_link }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group wsus__input">
                                        <label>Instagram Link</label>
                                        <input type="text" name="insta_link" value="{{ $profile->insta_link }}"
                                            class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                            DASHBOARD START
                                                                                                                                                                                                                                                                                                                                                          ==============================-->
@endsection

@push('vendor-dashboard-js')
    <!-- Summernote js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
    <script>
        $('.summernote').summernote({
            height: 150
        })
    </script>
@endpush
