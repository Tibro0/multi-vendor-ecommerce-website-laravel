@extends('frontend.layouts.master')

@push('frontend-css')
    <title>{{ $settings->site_name }} | Contact</title>
@endpush

@section('content')
    <!--============================BREADCRUMB START==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>contact us</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================BREADCRUMB END==============================-->


    <!--============================CONTACT PAGE START==============================-->
    <section id="wsus__contact">
        <div class="container">
            <div class="wsus__contact_area">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="row">
                            @if ($settings->contact_email)
                                <div class="col-xl-12">
                                    <div class="wsus__contact_single">
                                        <i class="fal fa-envelope"></i>
                                        <h5>mail address</h5>
                                        <a href="mailto:{{ $settings->contact_email }}">{{ $settings->contact_email }}</a>
                                        <span><i class="fal fa-envelope"></i></span>
                                    </div>
                                </div>
                            @endif
                            @if ($settings->contact_phone)
                                <div class="col-xl-12">
                                    <div class="wsus__contact_single">
                                        <i class="far fa-phone-alt"></i>
                                        <h5>phone number</h5>
                                        <a href="macallto:{{ $settings->contact_phone }}">{{ $settings->contact_phone }}</a>
                                        <span><i class="far fa-phone-alt"></i></span>
                                    </div>
                                </div>
                            @endif
                            @if ($settings->contact_address)
                                <div class="col-xl-12">
                                    <div class="wsus__contact_single">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <h5>contact address</h5>
                                        <a href="javascript:;">{{ $settings->contact_address }}</a>
                                        <span><i class="fal fa-map-marker-alt"></i></span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <div class="wsus__contact_question">
                            <h5>Send Us a Message</h5>
                            <form id="contact-form">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="text" name="name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="email" name="email" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="text" name="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <textarea name="message" cols="3" rows="5" placeholder="Message"></textarea>
                                        </div>
                                        <button type="submit" id="form-submit" class="common_btn">send now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if ($settings->map)
                        <div class="col-xl-12">
                            <div class="wsus__con_map">
                                <iframe src="{{ $settings->map }}" width="1600" height="450" style="border:0;"
                                    allowfullscreen="100" loading="lazy"></iframe>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--============================CONTACT PAGE END==============================-->
@endsection

@push('frontend-js')
    <script>
        $(document).ready(function() {
            $('#contact-form').on('submit', function(e) {
                e.preventDefault();
                let data = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('handle-contact-form') }}",
                    data: data,
                    beforeSend: function() {
                        $('#form-submit').text('sending...');
                        $('#form-submit').attr('disabled', true);
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            toastr.success(data.message);
                            $('#contact-form')[0].reset();
                            $('#form-submit').text('Send Now');
                            $('#form-submit').attr('disabled', false);
                        }
                    },
                    error: function(data) {
                        let errors = data.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value);
                        })
                        $('#form-submit').text('Send Now');
                        $('#form-submit').attr('disabled', false);
                    },
                })
            })
        })
    </script>
@endpush