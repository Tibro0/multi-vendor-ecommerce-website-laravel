@extends('admin.layouts.master')

@push('admin-css')
    <title>Admin | Withdraw Request Show</title>
    <!-- datatables css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Withdraw Request Show</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Withdraw Request Show</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td><b>Withdraw Method</b></td>
                                        <td>{{ $request->method }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Withdraw Charge</b></td>
                                        <td>{{ ($request->withdraw_charge / $request->total_amount) * 100 }}%</td>
                                    </tr>
                                    <tr>
                                        <td><b>Withdraw Charge Amount</b></td>
                                        <td>{{ $settings->currency_icon }}{{ $request->withdraw_charge }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Total Amount</b></td>
                                        <td>{{ $settings->currency_icon }}{{ $request->total_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Withdraw Amount</b></td>
                                        <td>{{ $settings->currency_icon }}{{ $request->withdraw_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Vendor Shop Name</b></td>
                                        <td>{{ $request->vendor->shop_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Status</b></td>
                                        <td>
                                            @if ($request->status === 'pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif ($request->status === 'paid')
                                                <span class="badge badge-success">Paid</span>
                                            @elseif ($request->status === 'decline')
                                                <span class="badge badge-danger">Decline</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Account Information</b></td>
                                        <td>{!! $request->account_info !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.withdraw.update', $request->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="from-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option {{ $request->status === 'pending' ? 'selected' : '' }} value="pending">
                                            Pending</option>
                                        <option {{ $request->status === 'paid' ? 'selected' : '' }} value="paid">Paid
                                        </option>
                                        <option {{ $request->status === 'decline' ? 'selected' : '' }} value="decline">
                                            Decline</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
