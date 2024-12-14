@extends('vendor.layouts.master')

@push('vendor-dashboard-css')
    <title>Vendor | {{ $settings->site_name }} Veriant Create</title>
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
                        <h3><i class="far fa-user"></i> Product Veriant Create</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('vendor.products-variant.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product" value="{{ request()->product }}">

                                    <div class="form-group wsus__input">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
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
