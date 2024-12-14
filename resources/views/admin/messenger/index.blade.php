@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | All Flash Sale</title>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Message</h1>
        </div>

        <div class="section-body">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-sm-6 col-lg-3 col-md-3">
                    <div class="card" style="height: 60vh">
                        <div class="card-header">
                            <h4>Who's Online?</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($chatUsers as $chatUser)
                                    <li class="media chat-user-profile" data-id="{{ $chatUser->senderProfile->id }}">
                                        <img alt="image" class="mr-3 rounded-circle" width="50"
                                            src="{{ asset($chatUser->senderProfile->image) }}">
                                        <div class="media-body">
                                            <div class="mt-0 mb-1 font-weight-bold chat-user-name">
                                                {{ $chatUser->senderProfile->name }}
                                            </div>
                                            {{-- <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i>
                                                Online</div> --}}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-9 col-md-9">
                    <div class="card chat-box" id="mychatbox" style="height: 60vh">
                        <div class="card-header">
                            <h4 id="chat-inbox-title">Chat with Rizal</h4>
                        </div>
                        <div class="card-body chat-content" tabindex="2" style="overflow: hidden; outline: none;">

                        </div>
                        <div class="card-footer chat-form">
                            <form id="message-form">
                                <input type="text" name="message" class="form-control message-box"
                                    placeholder="Type a message">
                                <input type="hidden" name="receiver_id" id="receiver_id">
                                <button class="btn btn-primary">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('admin-js')
    <script>
        const mainChatInbox = $('.chat-content');

        function formatDateTime(dateTimeString) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit'
            }
            const formatedDateTime = new Intl.DateTimeFormat('en-Us', options).format(new Date(dateTimeString));
            return formatedDateTime;
        }

        function scrollTobottom() {
            mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"));
        }


        $(document).ready(function() {
            $('.chat-user-profile').on('click', function() {
                let receiverId = $(this).data('id');
                let receiverImage = $(this).find('img').attr('src');
                let chatUserName = $(this).find('.chat-user-name').text();

                $('#receiver_id').val(receiverId);
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.get-messages') }}",
                    data: {
                        receiver_id: receiverId
                    },
                    beforeSend: function() {
                        mainChatInbox.html('');
                        // srt chat inbox title
                        $('#chat-inbox-title').text(`Chat With ${chatUserName}`);
                    },
                    success: function(response) {
                        $.each(response, function(index, value) {
                            if (value.sender_id == USER.id) {
                                var message = `
                            <div class="chat-item chat-right" style=""><img style="height:50px; object-fit: cover" src="${USER.image}">
                                <div class="chat-details">
                                    <div class="chat-text">${value.message}</div>
                                    <div class="chat-time">${formatDateTime(value.created_at)}</div>
                                </div>
                            </div>
                                    `
                            } else {
                                var message = `
                            <div class="chat-item chat-left" style=""><img style=""><img style="height:50px; object-fit: cover" src="${receiverImage}">
                                <div class="chat-details">
                                    <div class="chat-text">${value.message}</div>
                                    <div class="chat-time">${formatDateTime(value.created_at)}</div>
                                </div>
                            </div>
                            `
                            }

                            mainChatInbox.append(message);
                        });
                        // scroll to bottom
                        scrollTobottom();
                    },
                    error: function(xhr, status, error) {

                    },
                    complete: function() {

                    }
                })
            })


            $('#message-form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let messageData = $('.message-box').val();
                var formSubmitting = false;

                if (formSubmitting || messageData === "") {
                    return;
                }

                // set message in inbox

                let message = `
                <div class="chat-item chat-right"><img style="height:50px; object-fit: cover" src="${USER.image}">
                    <div class="chat-details">
                        <div class="chat-text">${messageData}</div>
                        <div class="chat-time">06:03</div>
                    </div>
                </div>
                `

                mainChatInbox.append(message);
                // scroll to bottom
                scrollTobottom();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('admin.send-message') }}",
                    data: formData,
                    beforeSend: function() {
                        $('.send-button').prop('disabled', true);
                        formSubmitting = true;
                    },
                    success: function(response) {
                        $('.message-box').val('');
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message);
                        $('.send-button').prop('disabled', false);
                        formSubmitting = false;
                    },
                    complete: function() {
                        $('.send-button').prop('disabled', false);
                        formSubmitting = false;
                    },
                })
            })
        })
    </script>
@endpush
