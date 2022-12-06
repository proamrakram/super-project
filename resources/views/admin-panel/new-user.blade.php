@extends('partials.admin-panel.layout')
@section('title', 'انتظار تفعيل الحساب')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">

                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <h4 class="alert-heading text-success ms-2  fs-2">عمل جيد !</h4>

                        <div class="text-dark fs-3">
                            لقد وصلك طلب تسجيلك للإدارة، يرجى الانتظار الى ان يتم التحقق من بياناتك وسيتم تفعيل حسابك فورا
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END: Content-->
@endsection
