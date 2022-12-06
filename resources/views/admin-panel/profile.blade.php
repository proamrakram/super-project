@extends('partials.admin-panel.layout')
@section('title', 'الصفحة الشخصية')
@section('content')

    <div class="app-content content ">

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row"></div>
            <div class="content-body">

                <section class="app-user-view-account">

                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="row match-height">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="card card-congratulation-medal">
                                        <div class="card-body">

                                            <h2>رقم المستخدم</h2>

                                            <h3 class="mb-75 mt-2 pt-50">
                                                <a href="#">USR-{{ $user->id }}</a>
                                            </h3>


                                            {{-- @if ($user->user_status == 'active')
                                                <a class="btn bg-light-danger waves-effect waves-float waves-light"
                                                    wire:click='changeUserStatus'>
                                                    <span>
                                                        <i data-feather='plus-square'></i>
                                                        إلغاء تنشيط المستخدم
                                                    </span>
                                                </a>
                                            @endif

                                            @if ($user->user_status == 'inactive')
                                                <a class="btn bg-light-success waves-effect waves-float waves-light"
                                                    wire:click='changeUserStatus'>
                                                    <span>
                                                        <i data-feather='plus-square'></i>
                                                        تنشيط المستخدم
                                                    </span>
                                                </a>
                                            @endif --}}

                                            <img src="{{ asset('app-assets/images/illustration/badge.svg') }}"
                                                class="congratulation-medal" alt="Medal Pic">
                                        </div>
                                    </div>
                                </div>
                                <!--/ Medal Card -->

                                <!-- Statistics Card -->
                                <div class="col-xl-8 col-md-6 col-12">
                                    <div class="card card-statistics">



                                        <div class="card-header">
                                            <h4 class="card-title">معلومات المستخدم</h4>
                                            {{-- <div class="d-flex align-items-center">
                                    <p class="card-text font-small-2 me-25 mb-0">{{ $last_update_time }}</p>
                                </div> --}}
                                        </div>



                                        <div class="card-boady card-statistics">
                                            <div class="row">

                                                <div class="col-md-3 mb-1 ms-4">
                                                    <label class="form-label fw-bold fs-5 text-primary"> الاسم :</label>
                                                    <label class="form-label fs-6">{{ $user->name }}</label>
                                                </div>


                                                <div class="col-md-3 mb-1 ms-4">
                                                    <label class="form-label fw-bold fs-5 text-primary"> رقم الجوال
                                                        :</label>
                                                    <label class="form-label fs-6">{{ $user->phone }}</label>
                                                </div>
                                                <div class="col-md-3 mb-1 ms-4">
                                                    <label class="form-label fw-bold fs-5 text-primary">نوع المستخدم:
                                                    </label>
                                                    @if ($user->user_type == 'superadmin')
                                                        <span class="badge badge-glow bg-danger">مدير رئيسي</span>
                                                    @endif

                                                    @if ($user->user_type == 'admin')
                                                        <span class="badge badge-glow bg-danger">مدير فرعي</span>
                                                    @endif

                                                    @if ($user->user_type == 'office')
                                                        <span class="badge badge-glow bg-warning">مكتب</span>
                                                    @endif

                                                    @if ($user->user_type == 'marketer')
                                                        <span class="badge badge-glow bg-info">مسوق</span>
                                                    @endif

                                                </div>
                                            </div>

                                        </div>
{{--
                                        <div class="col-md-12">
                                            <div class="mb-1 text-center">
                                                <a href="javascript:;" class="btn bg-light-warning"
                                                    data-bs-target="#addNote" data-bs-toggle="modal">
                                                    <i data-feather='plus-square'></i> إرسال إشعار</span></a>
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>


                <div class="col-lg-2 col-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="avatar bg-light-info p-50 mb-1">
                                <div class="avatar-content">
                                    <i data-feather='shopping-bag' class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder">{{ $user->orders->count() }}</h2>
                            <p class="card-text">عدد الطلبات</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="avatar bg-light-warning p-50 mb-1">
                                <div class="avatar-content">
                                    <i data-feather='shopping-bag' class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder">{{ getUserOpenOrdersCount($user->id) }}</h2>
                            <p class="card-text">عدد الطلبات المفتوحة</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="avatar bg-light-danger p-50 mb-1">
                                <div class="avatar-content">
                                    <i data-feather='shopping-bag' class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder">{{ getUserClosedOrdersCount($user->id) }}</h2>
                            <p class="card-text">عدد الطلبات المغلقة</p>
                        </div>
                    </div>
                </div>


                <!-- Line Chart - Profit -->
                <div class="col-lg-2 col-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="avatar bg-light-success p-50 mb-1">
                                <div class="avatar-content">
                                    <i data-feather='shopping-bag' class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder">{{ getUserCompleteOrdersCount($user->id) }}</h2>
                            <p class="card-text">عدد الطلبات المكتملة</p>
                        </div>
                    </div>
                </div>


                <div class="row match-height">
                    <div class="modal fade" id="addNote" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <a class="btn bg-light-danger waves-effect waves-float waves-light">
                                            <span>
                                                <h1 class="mb-1">قريبا...</h1>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
