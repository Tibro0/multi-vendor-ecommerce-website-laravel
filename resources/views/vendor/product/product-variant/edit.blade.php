@extends('vendor.layouts.master')

@push('vendor-dashboard-css')
    <title>{{ $settings->site_name }} | Product Veriant Edit</title>
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
                    <a href="{{ route('vendor.products-variant.index', ['product' => $variant->product_id]) }}"
                        class="btn btn-warning text-white mb-4"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Product Veriant Edit</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('vendor.products-variant.update', $variant->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group wsus__input">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ $variant->name }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option {{ $variant->status == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ $variant->status == 0 ? 'selected' : '' }} value="0">Inactive
                                            </option>
                                        </select>
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
