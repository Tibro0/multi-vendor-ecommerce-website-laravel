@extends('admin.layouts.master')

@push('admin-css')
    <title>Category | Edit</title>
    <!-- Bootstrap Iconpicker CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap-iconpicker.min.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Icon</label><br>
                                    <button name="icon" data-icon="{{ $category->icon }}" class="btn btn-primary"
                                        data-selected-class="btn-danger" data-unselected-class="btn-info"
                                        role="iconpicker"></button>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option {{ $category->status == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $category->status == 0 ? 'selected' : '' }} value="0">Inactive
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
    </section>
@endsection

@push('admin-js')
    <script src="{{ asset('backend/assets/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
@endpush