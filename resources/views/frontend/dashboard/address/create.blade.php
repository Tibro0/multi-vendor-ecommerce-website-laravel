@extends('frontend.dashboard.layouts.master')

@push('frontend-dashboard-css')
    <title>{{ $settings->site_name }} | Address Create</title>
@endpush

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('frontend.dashboard.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="fal fa-gift-card"></i>create address</h3>
                        <div class="wsus__dashboard_add wsus__add_address">
                            <form action="{{ route('user.address.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Name <b>*</b></label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>email</label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>phone <b>*</b></label>
                                            <input type="text" name="phone" value="{{ old('phone') }}"
                                                placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>country <b>*</b></label>
                                            <div class="wsus__topbar_select">
                                                <select name="country" class="select_2">
                                                    <option>Select</option>
                                                    @foreach (config('settings.country_list') as $country)
                                                        <option value="{{ $country }}">{{ $country }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>State <b>*</b></label>
                                            <input type="text" name="state" value="{{ old('state') }}"
                                                placeholder="State">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>City <b>*</b></label>
                                            <input type="text" name="city" value="{{ old('city') }}"
                                                placeholder="City">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>zip code <b>*</b></label>
                                            <input type="text" name="zip" value="{{ old('zip') }}"
                                                placeholder="Zip Code">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Address <b>*</b></label>
                                            <input type="text" name="address" value="{{ old('address') }}"
                                                placeholder="Address">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <button type="submit" class="common_btn">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
