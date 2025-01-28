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
                            <h3 class="card-title">Create Warehouse</h3>
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                        </div>
                        <!--end::Header-->

                        <!--begin::Form-->
                        <form class="form" method="POST" id="form-builder" action="/metronic/index.php">
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="tab-content pt-3">
                                    <!--begin::Tab Pane-->
                                    <div class="tab-pane active" id="kt_builder_extras">
                                        <div class="row">
                                            <div class="col-2">
                                                <!--begin::Tab Inner-->
                                                <ul class="nav nav-bold nav-light-primary nav-pills flex-column" data-remember-tab="tab_extra_id">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#kt_builder_extras_search">Search</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#kt_builder_extras_notifications">Notifications</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_extras_quick_actions">Quick Actions</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_extras_user">User</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_extras_languages">Languages</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_extras_quick_panel">Quick Panel</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_extras_cart">Cart</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_extras_chat">Chat</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_extras_toolbar">Toolbar</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_extras_scrolltop">Scrolltop</a>
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
                                                            <label class="col-lg-2 col-form-label text-lg-right">Display:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="builder[layout][extras][search][display]" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" name="builder[layout][extras][search][display]" value="true" checked="">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Enable search feature</div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Layout:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <select class="form-control form-control-solid" name="builder[layout][extras][search][layout]">
                                                                    <option value="offcanvas">Offcanvas</option>
                                                                    <option value="dropdown" selected="">Dropdown</option>
                                                                </select>
                                                                <div class="form-text text-muted">Select search layout type.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane" id="kt_builder_extras_notifications">
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Display:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="builder[layout][extras][notifications][display]" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" name="builder[layout][extras][notifications][display]" value="true" checked="">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Enable notifications</div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Layout:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <select class="form-control form-control-solid" name="builder[layout][extras][notifications][layout]">
                                                                    <option value="offcanvas">Offcanvas</option>
                                                                    <option value="dropdown" selected="">Dropdown</option>
                                                                </select>
                                                                <div class="form-text text-muted">Select notifications panel layout type</div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Dropdown Style:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <select class="form-control form-control-solid" name="builder[layout][extras][notifications][dropdown][style]">
                                                                    <option value="light">Light</option>
                                                                    <option value="dark" selected="">Dark</option>
                                                                </select>
                                                                <div class="form-text text-muted">Select notifications dropdown style</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane " id="kt_builder_extras_quick_actions">
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Display:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="builder[layout][extras][quick-actions][display]" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" name="builder[layout][extras][quick-actions][display]" value="true" checked="">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Enable quick actions</div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Layout:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <select class="form-control form-control-solid" name="builder[layout][extras][quick-actions][layout]">
                                                                    <option value="offcanvas">Offcanvas</option>
                                                                    <option value="dropdown" selected="">Dropdown</option>
                                                                </select>
                                                                <div class="form-text text-muted">Select quick actions layout type</div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Dropdown Style:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <select class="form-control form-control-solid" name="builder[layout][extras][quick-actions][dropdown][style]">
                                                                    <option value="light">Light</option>
                                                                    <option value="dark" selected="">Dark</option>
                                                                </select>
                                                                <div class="form-text text-muted">Select quick actions dropdown style</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane " id="kt_builder_extras_user">
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Display:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="builder[layout][extras][user][display]" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" name="builder[layout][extras][user][display]" value="true" checked="">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Enable user panel</div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Layout:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <select class="form-control form-control-solid" name="builder[layout][extras][user][layout]">
                                                                    <option value="offcanvas" selected="">Offcanvas</option>
                                                                    <option value="dropdown">Dropdown</option>
                                                                </select>
                                                                <div class="form-text text-muted">Select user panel's layout type</div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">User Dropdown Style:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <select class="form-control form-control-solid" name="builder[layout][extras][user][dropdown][style]">
                                                                    <option value="light">Light</option>
                                                                    <option value="dark" selected="">Dark</option>
                                                                </select>
                                                                <div class="form-text text-muted">Select user dropdown layout style</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane " id="kt_builder_extras_languages">
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Display:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="builder[layout][extras][languages][display]" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" name="builder[layout][extras][languages][display]" value="true" checked="">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Display languages dropdown</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane " id="kt_builder_extras_quick_panel">
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Display:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="builder[layout][extras][quick-panel][display]" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" name="builder[layout][extras][quick-panel][display]" value="true" checked="">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Display quick panel</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane " id="kt_builder_extras_cart">
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Display:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="builder[layout][extras][cart][display]" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" name="builder[layout][extras][cart][display]" value="true" checked="">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Enable cart panel</div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Layout:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <select class="form-control form-control-solid" name="builder[layout][extras][cart][layout]">
                                                                    <option value="offcanvas" selected="">Offcanvas</option>
                                                                    <option value="dropdown">Dropdown</option>
                                                                </select>
                                                                <div class="form-text text-muted">Select cart panel's layout type</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane " id="kt_builder_extras_chat">
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Display:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="builder[layout][extras][chat][display]" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" name="builder[layout][extras][chat][display]" value="true" checked="">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Display chat modal</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane " id="kt_builder_extras_toolbar">
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Display:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="builder[layout][extras][toolbar][display]" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" name="builder[layout][extras][toolbar][display]" value="true" checked="">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Display toolbar at center right</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane Inner-->

                                                    <!--begin::Tab Pane Inner-->
                                                    <div class="tab-pane " id="kt_builder_extras_scrolltop">
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-lg-right">Display:</label>
                                                            <div class="col-lg-10 col-xl-4">
                                                                <input type="hidden" name="builder[layout][extras][scrolltop][display]" value="false">
                                                                <span class="switch switch-icon">
                                                                    <label>
                                                                        <input type="checkbox" name="builder[layout][extras][scrolltop][display]" value="true" checked="">
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                <div class="form-text text-muted">Display scrolltop at bottom right</div>
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
                            <!--end::Body-->

                            <!--begin::Footer-->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-9">
                                        <input type="hidden" id="tab_id" name="builder[tab][tab_id]">
                                        <input type="hidden" id="tab_extra_id" name="builder[tab][tab_extra_id]">
                                        <button type="submit" name="builder_submit" data-demo="demo1" class="btn btn-primary font-weight-bold mr-2">
                                            Save
                                        </button>
                                        <button type="submit" name="builder_reset" data-demo="demo1" class="btn btn-clean font-weight-bold">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection