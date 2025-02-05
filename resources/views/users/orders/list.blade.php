@extends('layouts.admin')

@section('title', 'Create Warehouse')

@section('content')
<div class="dashboard-main-body">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">List User Orders</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table basic-border-table mb-0">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Invoice</th>
                            <th>AWB Number</th>
                            <th>Customer Name</th>
                            <th>Issued Date</th>
                            <th>Amount</th>
                            <th>Payment Mode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->client_order_id }}</td>
                            <td>
                                <a href="javascript:void(0)" class="text-primary-600">#{{ $order->invoice_number }}</a>
                            </td>
                            <td>{{ $order->awb_number ?? 'N/A' }}</td>
                            <td>{{ $order->consignee_name }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>${{ number_format($order->order_amount, 2) }}</td>
                            <td>{{ ucfirst($order->payment_mode) }}</td>
                            <td>
                                <a href="{{ route('orders.view', $order->id) }}" class="text-primary-600">View More ></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div><!-- card end -->
</div>
@endsection