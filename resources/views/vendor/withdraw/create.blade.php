@extends('vendor.layouts.master')

@push('vendor-dashboard-css')
    <title>{{ $settings->site_name }} | Create withdraw Request</title>
    <!-- Summernote js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" />
@endpush

@section('content')
    <!--=============================DASHBOARD START==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Create withdraw Request</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="row">
                                <div class="wsus__dash_pro_area col-md-6">
                                    <form action="{{ route('vendor.withdraw.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group wsus__input">
                                            <label>method</label>
                                            <select name="method" id="method" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($methods as $method)
                                                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group wsus__input">
                                            <label>Withdraw Amount</label>
                                            <input type="text" name="amount" value="{{ old('amount') }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group wsus__input">
                                            <label>Account Information</label>
                                            <textarea name="account_info" class="form-control"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </form>
                                </div>

                                <div class="col-md-6">
                                    <div class="wsus__dash_pro_area" id="account_info_area">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================DASHBOARD START==============================-->
@endsection

@push('vendor-dashboard-js')
    <!-- Summernote js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
    <script>
        $('.summernote').summernote({
            height: 150
        })
    </script>
    <!-- -->
    <script>
        $(document).ready(function() {
            $('#method').on('change', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.withdraw.show', ':id') }}".replace(':id', id),
                    success: function(response) {
                        $('#account_info_area').html(`
                        <h3>Payout Range: {{ $settings->currency_icon }}${response.minimum_amount} - {{ $settings->currency_icon }}${response.maximum_amount}</h3>
                        <h3>withdraw Charge: ${response.withdraw_charge}%</h3>
                        <p>${response.description}</p>
                        `)
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
