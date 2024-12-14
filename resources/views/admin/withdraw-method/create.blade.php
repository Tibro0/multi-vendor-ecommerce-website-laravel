@extends('admin.layouts.master')

@push('admin-css')
    <title>Withdraw Methods | Create</title>
    <!-- Summernote-->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Withdraw Methods</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Withdraw Methods</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.withdraw-method.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Minimum Amount</label>
                                    <input type="text" name="minimum_amount" value="{{ old('minimum_amount') }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Maximum Amount</label>
                                    <input type="text" name="maximum_amount" value="{{ old('maximum_amount') }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Withdraw Charge (%)</label>
                                    <input type="text" name="withdraw_charge" value="{{ old('withdraw_charge') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control summernote"></textarea>
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

@push('admin-js')
    <!-- Summernote js-->
    <script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
@endpush
