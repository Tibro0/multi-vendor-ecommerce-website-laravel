@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Terms and Conditions Page</title>
    <!-- Summernote-->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Terms and Conditions Page</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.terms-and-condition.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" class="form-control summernote">{!! @$content->content !!}</textarea>
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
    <!-- Summernote js-->
    <script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
@endpush
