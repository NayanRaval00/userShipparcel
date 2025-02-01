@extends('layouts.admin')

@section('title', 'Create Warehouse')

@section('content')
<div class="dashboard-main-body">

    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-xl">Create Order By Following Step</h6>
            <p class="text-neutral-500">Fill up your details and proceed next steps.</p>

            <!-- Form Wizard Start -->
            <div class="form-wizard">
                <form action="#" method="post">
                    <div class="form-wizard-header overflow-x-auto scroll-sm pb-8 my-32">
                        <ul class="list-unstyled form-wizard-list style-two">
                            <li class="form-wizard-list__item active">
                                <div class="form-wizard-list__line">
                                    <span class="count">1</span>
                                </div>
                                <span class="text text-xs fw-semibold">Pickup Address </span>
                            </li>
                            <li class="form-wizard-list__item">
                                <div class="form-wizard-list__line">
                                    <span class="count">2</span>
                                </div>
                                <span class="text text-xs fw-semibold">Consignee Details</span>
                            </li>
                            <li class="form-wizard-list__item">
                                <div class="form-wizard-list__line">
                                    <span class="count">3</span>
                                </div>
                                <span class="text text-xs fw-semibold">Shipment Details</span>
                            </li>
                            <li class="form-wizard-list__item">
                                <div class="form-wizard-list__line">
                                    <span class="count">4</span>
                                </div>
                                <span class="text text-xs fw-semibold">Package Details</span>
                            </li>
                            <li class="form-wizard-list__item">
                                <div class="form-wizard-list__line">
                                    <span class="count">5</span>
                                </div>
                                <span class="text text-xs fw-semibold">Courier</span>
                            </li>
                        </ul>
                    </div>

                    <fieldset class="wizard-fieldset show">
                        <h6 class="text-md text-neutral-500">Personal Information</h6>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label">Select
                                    Pickup Address*</label>
                                <div class="position-relative">
                                    <select class="form-control"
                                        name="pickup_address" data-size="7"
                                        data-live-search="true" tabindex="null">
                                        <option value="">Select</option>
                                        @foreach($warehouses as $warehouse)
                                        <option value="{{$warehouse->pick_address_id}}">
                                            {{$warehouse->address_title}}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group ">

                                    <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                        <input class="form-check-input" name="is_return_address" type="checkbox" role="switch" id="toggleReturnAddress" checked>
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="toggleReturnAddress">Return
                                        Address (if any)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group text-end">
                                <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="wizard-fieldset">
                        <h6 class="text-md text-neutral-500">Account Information</h6>
                        <div class="row gy-3">
                            <div class="col-12">
                                <label class="form-label">User Name*</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control wizard-required" placeholder="Enter User Name" required>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Card Number*</label>
                                <div class="position-relative">
                                    <input type="number" class="form-control wizard-required" placeholder="Enter Card Number " required>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Card Expiration(MM/YY)*</label>
                                <div class="position-relative">
                                    <input type="number" class="form-control wizard-required" placeholder="Enter Card Expiration" required>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">CVV Number*</label>
                                <div class="position-relative">
                                    <input type="number" class="form-control wizard-required" placeholder="CVV Number" required>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password*</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control wizard-required" placeholder="Enter Password" required>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="wizard-fieldset">
                        <h6 class="text-md text-neutral-500">Bank Information</h6>
                        <div class="row gy-3">
                            <div class="col-sm-6">
                                <label class="form-label">Bank Name*</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control wizard-required" placeholder="Enter Bank Name" required>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Branch Name*</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control wizard-required" placeholder="Enter Branch Name" required>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Account Name*</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control wizard-required" placeholder="Enter Account Name" required>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Account Number*</label>
                                <div class="position-relative">
                                    <input type="number" class="form-control wizard-required" placeholder="Enter Account Number" required>
                                    <div class="wizard-form-error"></div>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-end gap-8">
                                <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                                <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="wizard-fieldset">
                        <div class="text-center mb-40">
                            <img src="assets/images/gif/success-img3.gif" alt="" class="gif-image mb-24">
                            <h6 class="text-md text-neutral-600">Congratulations </h6>
                            <p class="text-neutral-400 text-sm mb-0">Well done! You have successfully completed.</p>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-end gap-8">
                            <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                            <!-- <button type="button" class="form-wizard-submit btn btn-primary-600 px-32">Publish</button> -->
                            <button type="button" class="form-wizard-next-btn btn btn-primary-600 px-32">Next</button>

                        </div>
                    </fieldset>

                    <fieldset class="wizard-fieldset">
                        <div class="text-center mb-40">
                            <img src="assets/images/gif/success-img3.gif" alt="" class="gif-image mb-24">
                            <h6 class="text-md text-neutral-600">Congratulations </h6>
                            <p class="text-neutral-400 text-sm mb-0">Well done! You have successfully completed.</p>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-end gap-8">
                            <button type="button" class="form-wizard-previous-btn btn btn-neutral-500 border-neutral-100 px-32">Back</button>
                            <button type="button" class="form-wizard-submit btn btn-primary-600 px-32">Publish</button>

                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- Form Wizard End -->
        </div>
    </div>
</div>
<script src="{{ asset('new_templete/assets/js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/order/app.js') }}"></script>


@endsection