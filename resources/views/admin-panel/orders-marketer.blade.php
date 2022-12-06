@extends('partials.admin-panel.layout')
@section('title', 'الطلبات')
@section('content')

    @push('orders-style')
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/plugins/forms/form-wizard.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/pages/modal-create-app.css') }}">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
        <!-- END: Vendor CSS-->
        @livewireStyles()
    @endpush
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">

            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">الطلبات</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active">الطلبات
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                @auth
                    @if (auth()->user()->permissions->can_add_orders == 1)
                        @livewire('create-order')
                    @endif
                @endauth
            </div>

            <div class="content-body">
                @livewire('order-market')
            </div>

            @livewire('edit-order')
        </div>
    </div>
    <!-- END: Content-->
    @push('orders-scripts')
        @livewireScripts()
        <script src="{{ asset('app-assets/js/scripts/pages/modal-add-new-cc.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/pages/page-pricing.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/pages/modal-add-new-address.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/pages/modal-create-app.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/pages/modal-two-factor-auth.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/pages/modal-edit-user.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/pages/modal-share-project.js') }}"></script>

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
        <!-- END: Page Vendor JS-->
    @endpush

@endsection
