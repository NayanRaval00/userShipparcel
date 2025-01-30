@extends('layouts.admin')

@section('title', 'Create Warehouse')

@section('content')
<div class="container">
    <div class="card card-custom gutter-b example example-compact">
        <div class="row">
            <div class="col-md-12">
                <div class="11313">
                    <div class="card card-custom">
                        <!--begin::Header-->
                        <div class="card-header card-header-tabs-line">
                            <h3 class="card-title">Create Warehouse 123</h3>
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                        </div>

                        <form class="form" method="POST" id="form-builder" action="{{route('create.order')}}">
                            @csrf
                            <div class="card-body">
                                <div class="tab-content pt-3">
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane active" id="kt_builder_extras">
                                        <div class="row">
                                            <div class="col-2">
                                                <!--begin::Tab Inner-->
                                                <ul class="nav nav-bold nav-light-primary nav-pills flex-column" data-remember-tab="tab_extra_id">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_builder_extras_search">
                                                            <span>Pickup Address</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_builder_extras_notifications">
                                                            Consignee Details
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_extras_quick_actions">Shipment Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_extras_user">Package Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_extras_languages">Courier</a>
                                                    </li>
                                                </ul>
                                                <!--end::Tab Inner-->
                                            </div>
                                            <div class="col-10">
                                                <!--begin::Tab Content Inner-->
                                                <div class="tab-content mt-5">
                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane active" id="kt_builder_extras_search">
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Select Pickup Address*</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                                <div class="dropdown bootstrap-select form-control dropup">
                                                                    <select class="form-control selectpicker" name="pickup_address" data-size="7" data-live-search="true" tabindex="null">
                                                                        <option value="">Select</option>
                                                                        @foreach($warehouses as $warehouse)
                                                                        <option value="{{$warehouse->pick_address_id}}">{{$warehouse->address_title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Return Address (if any)</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="is_return_address" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" id="toggleReturnAddress" name="is_return_address">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Enable notifications</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" id="returnAddressDropdown">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Select Return Address*</label>
                                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                                <div class="dropdown bootstrap-select form-control dropup">
                                                                    <select class="form-control selectpicker" data-size="7" name="return_address" data-live-search="true" tabindex="null">
                                                                        <option value="">Select</option>
                                                                        @foreach($warehouses as $warehouse)
                                                                        <option value="{{$warehouse->pick_address_id}}">{{$warehouse->address_title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane" id="kt_builder_extras_notifications">
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 form-group mb-0">
                                                                <div class="col mb-3">
                                                                    <label for="consignee_name">Consignee Name<span class="text-danger">*</span></label>
                                                                    <input type="text" id="consignee_name" value="" name="consignee_name" class="form-control ui-wizard-content" placeholder="Enter consignee fullname">
                                                                </div>

                                                                <div class="col mb-3">
                                                                    <label for="consignee_mobile">Contact<span class="text-danger">*</span></label>
                                                                    <input type="text" id="consignee_mobile" value="" name="consignee_mobile" class="form-control ui-wizard-content" placeholder="Enter Consignee contact..." minlength="10" maxlength="10">
                                                                </div>

                                                                <div class="col mb-3">
                                                                    <label for="consignee_phone">Alt. Num.</label>
                                                                    <input type="text" id="consignee_phone" value="" name="consignee_phone" class="form-control ui-wizard-content" placeholder="Enter alt contact...">
                                                                </div>
                                                            </div>

                                                            <div class="form-group mb-0">
                                                                <div class="row">
                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="consignee_address1">Address Line 1<span class="text-danger">*</span></label>
                                                                        <input type="text" id="consignee_address1" value="" name="consignee_address1" class="form-control ui-wizard-content" placeholder="Enter Address Line 1...">
                                                                    </div>

                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="consignee_address2">Address Line 2</label>
                                                                        <input type="text" id="consignee_address2" value="" name="consignee_address2" class="form-control ui-wizard-content" placeholder="Enter Address Line 2...">
                                                                    </div>
                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="address_type">Address Type</label>
                                                                        <select name="address_type" id="address_type" class="form-control ui-wizard-content" data-placeholder="Select Address Type...">
                                                                            <option value="">-- Select --</option>
                                                                            <option value="Home" selected="">Home</option>
                                                                            <option value="Office">Office</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="consignee_emailid">Email</label>
                                                                        <input type="email" id="consignee_emailid" value="" name="consignee_emailid" class="form-control ui-wizard-content" placeholder="Enter Consignee email...">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group mb-0">
                                                                <div class="row">
                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="consignee_pin">Pin Code<span class="text-danger">*</span></label>
                                                                        <input type="text" id="consignee_pincode" value="" name="consignee_pincode" class="form-control ui-wizard-content" placeholder="Enter pincode..."  minlength="6" maxlength="6">
                                                                    </div>

                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="consignee_city">City<span class="text-danger">*</span></label>
                                                                        <input type="text" id="consignee_city" value="" name="consignee_city" class="form-control ui-wizard-content" placeholder="Enter city...">
                                                                    </div>
                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="consignee_state">State<span class="text-danger">*</span></label>
                                                                        <input type="text" id="consignee_state" value="" name="consignee_state" class="form-control ui-wizard-content" placeholder="Enter state...">
                                                                    </div>
                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="consignee_country">Country<span class="text-danger">*</span></label>
                                                                        <input type="text" id="consignee_country" value="" name="consignee_country" class="form-control ui-wizard-content" placeholder="Enter country...">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane " id="kt_builder_extras_quick_actions">
                                                        <div class="col-lg-9 col-xl-9">
                                                            <!-- END Step Info -->
                                                            <div class="form-group mb-0">
                                                                <div class="row mb-3">
                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="invoice_number">Invoice #/Ref. Id</label>
                                                                        <input type="text" id="invoice_number" value="" name="invoice_number" class="form-control ui-wizard-content" placeholder="Enter invoice/ref id">
                                                                    </div>

                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="payment_mode">Payment Mode<span class="text-danger">*</span></label>
                                                                        <select name="payment_mode" id="payment_mode" class="form-control ui-wizard-content" data-placeholder="Select Payment mode...">
                                                                            <option value="">-- Select Mode --</option>
                                                                            <option value="prepaid">Prepaid</option>
                                                                            <option value="cod">COD</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="is_ndd">Next Day Delivery</label>
                                                                        <select name="is_ndd" id="is_ndd" class="form-control ui-wizard-content" data-placeholder="Select Express...">
                                                                            <!-- <option value="">-- Select NDD --</option> -->
                                                                            <option value="0" selected="">No</option>
                                                                            <!-- <option value="1" >Yes</option> -->
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-3 col-lg-3 col-xl-3 mb-3">
                                                                        <label for="pregen_waybill">Pre Generated Waybill</label>
                                                                        <input type="text" id="pregen_waybill" value="" name="pregen_waybill" class="form-control ui-wizard-content" placeholder="Enter Pre Generated Waybill">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h6>Product Details:</h6>
                                                            <div id="div_add_products" class="">
                                                                <div class="row div_add_products">
                                                                    <div class="col-md-4 form-group">
                                                                        <label for="product_name[]">Product Name<span class="text-danger">*</span></label>
                                                                        <input type="text" id="product_name" name="product_name[]" class="form-control ui-wizard-content" placeholder="Enter product name...">
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <label for="product_quantity[]">Quantity<span class="text-danger">*</span></label>
                                                                        <input type="text" id="product_quantity" name="product_quantity[]" class="form-control ui-wizard-content" placeholder="Qty..." min="1">
                                                                    </div>
                                                                    <div class="col-md-4 form-group">
                                                                        <label for="product_value[]"> Product Value<span class="text-danger">*</span></label>
                                                                        <input type="text" id="product_value" name="product_value[]" class="form-control valuesum ui-wizard-content" placeholder="Value..." value="0">
                                                                    </div>

                                                                    <div class="col-md-4 form-group">
                                                                        <label for="product_category[]">Category</label>
                                                                        <input type="text" id="product_category" name="product_category[]" class="form-control ui-wizard-content" placeholder="Product category...">
                                                                    </div>

                                                                    <div class="col-md-4 form-group">
                                                                        <label for="product_sku[]">SKU</label>
                                                                        <input type="text" id="product_sku" name="product_sku[]" class="form-control ui-wizard-content" placeholder="SKU">
                                                                    </div>
                                                                </div>

                                                                <hr>
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <div class="row align-items-center mb-3">
                                                                    <div class="col-4 mb-3">
                                                                        <div class="">
                                                                            <label for="is_ndd">Mps: </label>
                                                                            <select name="mps" id="mps" class="form-control ui-wizard-content" data-placeholder="Select Mps..." onchange="mps_status_fun(this.value)">
                                                                                <option value="">-- Select Mps --</option>
                                                                                <option value="0" selected="">No</option>
                                                                                <option value="1">Yes</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-8 text-right">
                                                                        <div class="" style="">
                                                                            <button type="button" class="btn   btn-success m-0 ui-wizard-content" data-toggle="tooltip" title="" id="btn_add_products" name="btn_add_products" data-original-title="Add Product"><i class="fa fa-plus"></i> Add New</button>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Insurance BOx code end here -->

                                                                </div>
                                                            </div>

                                                            <h6>Order Details:</h6>
                                                            <div class="form-group mb-0">
                                                                <div class="row">
                                                                    <div class="col-md-4 col-lg-4 col-xl-4 mb-3">
                                                                        <label for="order_amount">Order Amount<span class="text-danger">*</span></label>
                                                                        <input type="text" value="" id="order_amount" name="order_amount" class="form-control ui-wizard-content" placeholder="Enter order Amount">
                                                                    </div>

                                                                    <div class="col-md-4 col-lg-4 col-xl-4 mb-3">
                                                                        <label for="tax_amount">GST Amount<span class="text-danger">*</span></label>
                                                                        <input type="text" value="0" id="tax_amount" name="tax_amount" class="form-control ui-wizard-content" placeholder="Enter GST Amount">
                                                                    </div>

                                                                    <div class="col-md-4 col-lg-4 col-xl-4 mb-3">
                                                                        <label for="extra_charges">Extra Charges (if any)</label>
                                                                        <input type="text" value="0" id="extra_charges" name="extra_charges" class="form-control ui-wizard-content" placeholder="Enter any extra charges">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-4 col-lg-4 col-xl-4 mb-3">
                                                                        <label for="total_amount">Total Amount<span class="text-danger">*</span></label>
                                                                        <input type="text" value="" id="total_amount" name="total_amount" class="form-control ui-wizard-content" placeholder="Total Amount" readonly="">
                                                                    </div>

                                                                    <div class="col-md-4 col-lg-4 col-xl-4 mb-3">
                                                                        <label for="cod_amount">Collectible COD Amount<span class="text-danger">*</span></label>
                                                                        <input type="text" value="" id="cod_amount" name="cod_amount" class="form-control ui-wizard-content" placeholder="Enter Collectible COD Amount" readonly="readonly">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane " id="kt_builder_extras_user">
                                                        <div class="col-lg-9 col-xl-9">
                                                            <!-- END Step Info -->
                                                            <div class="form-group">
                                                                <div class="alert alert-warning">
                                                                    <i class="fa fa-fw fa-info-circle"></i>Please enter actual weight &amp; dimensions to avoid any weight discrepancies.
                                                                </div>

                                                                <!--  New By defalt add Define weight options and corresponding values for other fields -->
                                                                <div class="row px-4">
                                                                    <div class="form-group">
                                                                        <label>Large Size</label>
                                                                        <div class="radio-inline">
                                                                            <label class="radio radio-lg">
                                                                                <input type="radio" checked="checked" id="weight_0_5" name="weight_option" value="0.5">
                                                                                <span></span>0.5 KG
                                                                            </label>
                                                                            <label class="radio radio-lg">
                                                                                <input type="radio" id="weight_1" name="weight_option" value="1">
                                                                                <span></span>1 KG
                                                                            </label>
                                                                            <label class="radio radio-lg">
                                                                                <input type="radio" id="weight_2" name="weight_option" value="2">
                                                                                <span></span>2 KG
                                                                            </label>
                                                                            <label class="radio radio-lg">
                                                                                <input type="radio" id="weight_5" name="weight_option" value="5">
                                                                                <span></span>5 KG
                                                                            </label>
                                                                            <label class="radio radio-lg">
                                                                                <input type="radio" id="weight_other" name="weight_option" value="other">
                                                                                <span></span>Other
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                                <div class="row form-group mb-0">
                                                                    <div class="col-md-4 col-lg-4 col-xl-4 mb-3">
                                                                        <label for="shipment_weight">Actual Weight<span class="text-danger">*</span></label>
                                                                        <div class="input-group">
                                                                            <input type="text" id="shipment_weight" value="" name="shipment_weight[]" class="form-control" placeholder="Enter weight..." aria-describedby="basic-addon2">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text alert-info">KG</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-8 col-lg-8 col-xl-8 mb-3">
                                                                        <label for="shipment_length">Dimensions<span class="text-danger">*</span></label>
                                                                        <!--  <label class="col-md-offset-3" for="insurance_charges">Width<span class="text-danger">*</span></label>
                                        
                                                                                                <label class="col-md-offset-3" for="insurance_charges">Height<span class="text-danger">*</span></label> -->
                                                                        <div class="input-group align-items-center">
                                                                            <div class="row">
                                                                                <div class="position-relative col-md-4 col-lg-4 col-xl-4 mb-3">
                                                                                    <!-- <input type="text" id="shipment_length" value="" name="shipment_length[]" class="form-control ui-wizard-content" placeholder="Enter length..." onblur="calcvolwt();">
                                                                                    <span class="input-group-addon alert-info">cm</span> -->

                                                                                    <div class="input-group">
                                                                                        <input type="text" id="shipment_length" value="" name="shipment_length[]" class="form-control" placeholder="Enter weight..." aria-describedby="basic-addon2" placeholder="Enter length..." onblur="calcvolwt();">
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text alert-info">cm</span>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>

                                                                                <!--<div class="col-md-1 text-center mb-3 d-flex align-items-center justify-content-center">
                                                                                                            <span class="input-group-addon"><i class="fa fa-times"></i></span>
                                                                                                        </div>-->

                                                                                <div class="position-relative col-md-4 col-lg-4 col-xl-4 mb-3">
                                                                                    <div class="input-group">
                                                                                        <input type="text" id="shipment_width" value="" name="shipment_width[]" class="form-control" placeholder="Enter width..." onblur="calcvolwt();">
                                                                                        <div class="input-group-append">

                                                                                            <span class="input-group-text alert-info">cm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="position-relative col-md-4 col-lg-4 col-xl-4 mb-3">
                                                                                    <div class="input-group">
                                                                                        <input type="text" id="shipment_height" value="" name="shipment_height[]" class="form-control ui-wizard-content" placeholder="Enter height..." onblur="calcvolwt();">
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text alert-info">cm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div id="more_box_fieldss"></div>

                                                                <a href="javascript:void(0);" id="moreBoxDetails" style="display:none">More Box Details</a>

                                                                <div class="component-group" style="display: none;">
                                                                    <div class="col-md-2">
                                                                        <label for="volumetric_weight">Volumetric Weight<span class="text-danger">*</span></label>
                                                                        <input type="text" id="volumetric_weight" name="volumetric_weight" class="form-control ui-wizard-content" placeholder="0" readonly="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane " id="kt_builder_extras_languages">
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Display:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" name="" value="true" checked="">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Display languages dropdown</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->
                                                </div>
                                                <!--end::Tab Content Inner-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Tab Pane-->
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-9">
                                        <input type="hidden" id="tab_id" name="">
                                        <input type="hidden" id="tab_extra_id" name="">
                                        <button type="submit" name="builder_submit" data-demo="demo1" class="btn btn-primary font-weight-bold mr-2">
                                            Save
                                        </button>
                                        <button type="submit" name="builder_reset" data-demo="demo1" class="btn btn-clean font-weight-bold">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{ asset('new_templete/assets/js/vendor/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#toggleReturnAddress').change(function() {
            if ($(this).is(':checked')) {
                $('#returnAddressDropdown').show();
            } else {
                $('#returnAddressDropdown').hide();
            }
        }).trigger('change'); // Ensure it runs on page load
    });

    var i = 0;
    $('#btn_add_products').click(function() {
        i++;
        var append_text = '';

        append_text += '<hr>';
        append_text += '<div class="form-group mb-4" id="row' + i + '"><div class="row"><div class="col-md-4 col-lg-4 col-xl-4 form-group">';
        append_text += '<label for="product_name[]">Product Name<span class="text-danger">*</span></label>';
        append_text += '<input type="text" id="product_name[]" name="product_name[]" class="form-control" placeholder="Enter product name...">';

        append_text += '</div><div class="col-md-4 col-lg-4 col-xl-4 mb-4 form-group"><label for="product_quantity[]">Quantity<span class="text-danger">*</span></label>';
        append_text += '<input type="text" id="product_quantity" name="product_quantity[]" class="form-control" placeholder="Qty..." min="1">';

        append_text += '</div><div class="col-md-4 col-lg-4 col-xl-4 mb-4 form-group"><label for="product_value[]">Value<span class="text-danger">*</span></label>';
        append_text += '<input type="text" id="product_value" name="product_value[]" class="form-control valuesum" placeholder="Value..." value="0">';

        append_text += '</div><div class="col-md-4 col-lg-4 col-xl-4 form-group"><label for="product_category[]">Category</label>';
        append_text += '<input type="text" id="product_category" name="product_category[]" class="form-control" placeholder="Product category...">';

        append_text += '</div><div class="col-md-4 col-lg-4 col-xl-4 mb-4 form-group"><label for="product_sku[]">SKU</label>';
        append_text += '<input type="text" id="product_sku" name="product_sku[]" class="form-control" placeholder="SKU">';
        // append_text += '</div></div><div class="component-group"><div class="col-md-2"><label for="product_hsnsac[]">HSN/SAC</label>';
        // append_text += '<input type="text" id="product_hsnsac" name="product_hsnsac[]" class="form-control" placeholder="HSN/SAC...">';

        // append_text += '</div></div><div class="component-group"><div class="col-md-1"><label for="product_taxper[]">GST %<span class="text-danger">*</span></label>';
        // append_text += '<input type="text" id="product_taxper" name="product_taxper[]" class="form-control" placeholder="Tax %" value="0">';

        append_text += '</div><div class="col-md-3 col-lg-3 col-xl-3" style="">';
        append_text += '<label>&nbsp;</label><br><button type="button" class="btn   btn-danger btn_remove_product mt-2" data-toggle="tooltip" title="Remove Product" id="' + i + '" name="btn_remove_product"><i class="fa fa-trash-alt m-0"></i></button>';
        append_text += '</div></div></div>';

        // alert(i);
        $('#div_add_products').append(append_text);
    });

    $(document).on('click', '.btn_remove_product', function() {
        var button_id = $(this).attr("id");
        // alert(button_id);
        $('#row' + button_id + '').remove();
        calculateSum();
    });


    function calculateSum() {
        var sum = 0;
        $(".valuesum").each(function() {
            if (!isNaN(this.value) && this.value.length != 0)
                sum += parseFloat(this.value);
        });
        // alert(sum.toFixed(2));
        $("#order_amount").val(sum.toFixed(2));
        $("#total_amount").val((parseFloat(sum) + parseFloat($("#extra_charges").val())).toFixed(2));
        if (sum >= parseFloat(50000)) {
            $(".ewaybill").css("display", "block");
            $(".tipinfo").css("display", "block");
        } else {
            $(".ewaybill").css("display", "none");
            $(".tipinfo").css("display", "none");
        }
        calculatecod();
    }

    function calculatecod() {
        if ($("#payment_mode").val() == 'cod')
            $("#cod_amount").val($("#total_amount").val()).attr('readonly', false);
        else
            $("#cod_amount").val('0').attr('readonly', true);
    }
</script>
@endsection