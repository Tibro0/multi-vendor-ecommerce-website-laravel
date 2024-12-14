@extends('vendor.layouts.master')

@push('vendor-dashboard-css')
    <title>{{ $settings->site_name }} | Product Veriant Item Create</title>
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
                    {{-- <a href="{{ route('vendor.products-variant-item.index', ['productId' => $product->id, 'variantId' => $variant->id]) }}"
                        class="btn btn-warning text-white mb-4"><i class="fas fa-long-arrow-alt-left"></i> Back</a> --}}
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Product Veriant Item Create</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('vendor.products-variant-item.update', $variantItem->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group wsus__input">
                                        <label>Variant Name</label>
                                        <input type="text" name="variant_name"
                                            value="{{ $variantItem->productVariant->name }}" class="form-control" readonly>
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label>Item Name</label>
                                        <input type="text" name="name" value="{{ $variantItem->name }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label>Price <code>(Set 0 for make it free)</code></label>
                                        <input type="text" name="price" value="{{ $variantItem->price }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label>Is Default</label>
                                        <select name="is_default" class="form-control">
                                            <option value="">Select</option>
                                            <option {{ $variantItem->is_default == 1 ? 'selected' : '' }} value="1">Yes
                                            </option>
                                            <option {{ $variantItem->is_default == 0 ? 'selected' : '' }} value="0">No
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group wsus__input">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option {{ $variantItem->status == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ $variantItem->status == 0 ? 'selected' : '' }} value="0">
                                                Inactive
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
