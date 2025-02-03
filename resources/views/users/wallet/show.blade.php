@extends('layouts.admin')

@section('title', 'Create Warehouse')

@section('content')
<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Wallet</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Wallet</li>
        </ul>
    </div>

    <div class="card h-100 p-0 radius-12 overflow-hidden">
        <div class="card-header border-bottom-0 pb-0 pt-0 px-0">
            <ul class="nav border-gradient-tab nav-pills mb-0 border-top-0" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all"
                        type="button" role="tab" aria-controls="pills-all" aria-selected="true">
                        Add Money
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-ui-design-tab" data-bs-toggle="pill" data-bs-target="#pills-ui-design"
                        type="button" role="tab" aria-controls="pills-ui-design" aria-selected="false" tabindex="-1">
                        Recharge History
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-web-design-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-web-design" type="button" role="tab" aria-controls="pills-web-design"
                        aria-selected="false" tabindex="-1">
                        Wallet Duration
                    </button>
                </li>
            </ul>
        </div>
        <div class="card-body p-24">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="row gy-4">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form class="row gy-3 needs-validation" novalidate id="walletForm" action="{{ route('wallet.store') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">Enter your amount <span class="text-danger">*</span></label>
                                <input type="number" name="amount" class="form-control" id="amount" placeholder="for example: 1000" required>
                                <div class="invalid-feedback">
                                    Please enter a valid amount.
                                </div>
                            </div>

                            <div class="col-md-6 d-flex align-items-end gap-2">
                                <input type="text" name="promo_code" class="form-control" id="promo_code" placeholder="Enter Promocode..">
                                <button class="btn btn-success" type="button" onclick="applyPromo()">Apply</button>
                            </div>


                            <div class="col-md-4 col-sm-6">
                                <div class="hover-scale-img border radius-16 overflow-hidden">
                                    <img src="{{ asset('assets/images/qr/images.jpg') }}" alt="" class="hover-scale-img__img w-100 h-100 object-fit-cover">
                                    <div class="py-16 px-24">
                                        <h6 class="mb-4">This QR for payment</h6>
                                        <p class="mb-0 text-sm text-secondary-light">scan me</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary-600" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-ui-design" role="tabpanel" aria-labelledby="pills-ui-design-tab"
                    tabindex="0">
                    <div class="row gy-4">
                        <!-- table start -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Bordered Tables</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table basic-border-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Invoice</th>
                                                    <th>Name</th>
                                                    <th>Issued Date</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($transactions as $transaction)
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">#{{ $transaction->invoice_number }}</a>
                                                    </td>
                                                    <td>{{ $transaction->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($transaction->issued_date)->format('d M Y') }}</td>
                                                    <td>₹{{ number_format($transaction->amount, 2) }}</td>
                                                    <td>
                                                        <span class="badge {{ $transaction->status === 'Completed' ? 'bg-success' : 'bg-warning' }}">
                                                            {{ $transaction->status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">View More ></a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">No transactions found.</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- card end -->
                        </div>
                        <!-- table end -->
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-web-design" role="tabpanel" aria-labelledby="pills-web-design-tab"
                    tabindex="0">
                    <div class="row gy-4">
                        <!-- table start -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Bordered Tables</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table basic-border-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Invoice </th>
                                                    <th>Name</th>
                                                    <th>Issued Date</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">#526534</a>
                                                    </td>
                                                    <td>Kathryn Murphy</td>
                                                    <td>25 Jan 2024</td>
                                                    <td>$200.00</td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">View More ></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">#696589</a>
                                                    </td>
                                                    <td>Annette Black</td>
                                                    <td>25 Jan 2024</td>
                                                    <td>$200.00</td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">View More ></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">#256584</a>
                                                    </td>
                                                    <td>256584</td>
                                                    <td>10 Feb 2024</td>
                                                    <td>$200.00</td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">View More ></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">#526587</a>
                                                    </td>
                                                    <td>Eleanor Pena</td>
                                                    <td>10 Feb 2024</td>
                                                    <td>$150.00</td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">View More ></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">#105986</a>
                                                    </td>
                                                    <td>Leslie Alexander</td>
                                                    <td>15 Mar 2024</td>
                                                    <td>$150.00</td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-primary-600">View More ></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- card end -->
                        </div>
                        <!-- table end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let form = document.getElementById('walletForm');

        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        });
    });

    function applyPromo() {
        let promoCode = document.getElementById('promo_code').value;
        if (promoCode) {
            alert("Promo code applied: " + promoCode);
        } else {
            alert("Please enter a promo code.");
        }
    }
</script>

@endsection