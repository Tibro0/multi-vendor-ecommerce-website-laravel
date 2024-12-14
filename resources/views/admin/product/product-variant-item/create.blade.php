@extends('admin.layouts.master')

@push('admin-css')
    <title>Product Variant Item | Create</title>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Variant Item</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Product Variant Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products-variant-item.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="variant_id" value="{{ $variant->id }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">


                                <div class="form-group">
                                    <label>Variant Name</label>
                                    <input type="text" name="variant_name" value="{{ $variant->name }}"
                                        class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Price <code>(Set 0 for make it free)</code></label>
                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Is Default</label>
                                    <select name="is_default" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
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
    </section>
@endsection
