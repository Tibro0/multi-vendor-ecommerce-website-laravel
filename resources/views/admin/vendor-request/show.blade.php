@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Vendor Request</title>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Vendor Request</h1>
        </div>

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tbody>
                                        <tr>
                                            <td><b>User Name:</b></td>
                                            <td>{{ $vendor->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>User Email:</b></td>
                                            <td>{{ $vendor->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Shop Name:</b></td>
                                            <td>{{ $vendor->shop_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Shop Email:</b></td>
                                            <td>{{ $vendor->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Shop Phone:</b></td>
                                            <td>{{ $vendor->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Shop Address:</b></td>
                                            <td>{{ $vendor->address }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Description:</b></td>
                                            <td>{{ $vendor->description }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4 col-ms-4">
                                    <form action="{{ route('admin.vendor-request.change-status', $vendor->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Action</label>
                                            <select name="status" class="form-control">
                                                <option {{ $vendor->status === 0 ? 'selected' : '' }} value="0">
                                                    Pending</option>
                                                <option {{ $vendor->status === 1 ? 'selected' : '' }} value="1">
                                                    Approve</option>
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
        </div>
    </section>
@endsection

@push('admin-js')
    <script>
        $(document).ready(function() {
            // order status change
            $('#order_status').on('change', function() {
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.order.status') }}",
                    data: {
                        status: status,
                        id: id
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            toastr.success(data.message)
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            })

            // payment status change
            $('#payment_status').on('change', function() {
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.payment.status') }}",
                    data: {
                        status: status,
                        id: id
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            toastr.success(data.message)
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            })

            $('.print_invoice').on('click', function() {
                let printBody = $('.invoice-print');
                let originalContents = $('body').html();

                $('body').html(printBody.html());

                window.print();

                $('body').html(originalContents);
            })
        })
    </script>
@endpush
