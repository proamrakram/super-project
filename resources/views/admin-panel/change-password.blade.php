@extends('partials.admin-panel.layout')
@section('title', 'تغير كلمة المرور')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">تحديث كلمة المرور</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active">تحديث كلمة المرور
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i
                                        class="me-1" data-feather="check-square"></i><span
                                        class="align-middle">Todo</span></a><a class="dropdown-item"
                                    href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span
                                        class="align-middle">Chat</span></a>
                                <a class="dropdown-item" href="app-email.html"><i class="me-1"
                                        data-feather="mail"></i><span class="align-middle">Email</span></a><a
                                    class="dropdown-item" href="app-calendar.html"><i class="me-1"
                                        data-feather="calendar"></i><span class="align-middle">Calendar</span></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">

                        <!-- security -->

                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">تحديث كلمة المرور</h4>
                            </div>
                            <div class="card-body pt-1">
                                <!-- form -->
                                <form action="{{ route('panel.update.password') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="account-old-password">كلمة المرور
                                                الحالية</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" id="account-old-password"
                                                    name="old_password" placeholder="أدخل كلمة المرور الحالية" />
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                            @if (session()->has('old_password'))
                                                <small class="text-danger">{{ session()->get('old_password') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="account-new-password">كلمة المرور
                                                الجديدة</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" id="account-new-password" name="new_password"
                                                    class="form-control" placeholder="أدخل كلمة المرور الجديدة" />
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                            @if (session()->has('new_password'))
                                                <small class="text-danger">{{ session()->get('new_password') }}</small>
                                            @endif
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="account-retype-new-password">تأكيد كلمة المرور
                                                الجديدة</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" id="account-retype-new-password"
                                                    name="confirm_new_password" placeholder="تأكيد كلمة المرور الجديده" />
                                                <div class="input-group-text cursor-pointer"><i data-feather="eye"></i>
                                                </div>
                                            </div>
                                            @if (session()->has('confirm_new_password'))
                                                <small
                                                    class="text-danger">{{ session()->get('confirm_new_password') }}</small>
                                            @endif
                                        </div>
                                        {{-- <div class="col-12">
                                            <p class="fw-bolder">متطلبات كلمة المرور:</p>
                                            <ul class="ps-1 ms-25">
                                                <li class="mb-50">يجب أن تحتوي كلمة المرور على الأقل 8 خانات.
                                                </li>
                                                <li class="mb-50">يجب أن تحتوي حرفا كبيرا على الأقل.
                                                </li>
                                                <li>يجب أن تحتوي على رقم على الأقل.
                                                </li>
                                            </ul>
                                        </div> --}}
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1 mt-1">حفط</button>
                                            {{-- <button type="reset" class="btn btn-outline-secondary mt-1">إلغاء</button> --}}
                                        </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


@endsection
