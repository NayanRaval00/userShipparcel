@extends('layouts.admin')

@section('title', 'Create Shipment')

@section('content')
<div class="dashboard-main-body">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">List User Shipment</h5>
            <p>
                @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            </p>
            <!-- Alert Container -->
            <div id="alertContainer"></div>
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
                            <td>₹{{ number_format($order->order_amount, 2) }}</td>
                            <td>{{ ucfirst($order->payment_mode) }}</td>
                            <td>
                                <a href="{{ route('orders.view', $order->id) }}" title="View Order" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)" title="" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <!-- Button to Open Modal -->
                                <a href="javascript:void(0)" title="Cancel Order" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                    onclick="showCancelConfirmModal('{{ $order->awb_number }}')">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)" title="Cancel Order" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center"
                                    onclick="openLabelData('{{ $order->awb_number }}')">
                                    <iconify-icon icon="material-symbols:cloud-download"></iconify-icon>
                                </a>
                                <!-- Bootstrap Modal Start -->
                                <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="cancelOrderLabel">Confirm Cancellation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to cancel this order? This action cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                <button type="button" class="btn btn-danger" onclick="cancelOrder()">Yes, Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Bootstrap Modal End -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- card end -->
</div>
<script>
    var ORDER_CANCEL_URL = "{{ route('order.cancel') }}";
    var ORDER_LABEL_URL = "{{ route('order.label-data') }}";
    var CSRF_TOKEN = "{{ csrf_token() }}";
</script>
<script src="{{ asset('assets/js/order/app.js') }}"></script>
@endsection