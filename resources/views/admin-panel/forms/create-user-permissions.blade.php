@extends('partials.admin-panel.actions')
@section('title', 'إنشاء صلاحيات المستخدم')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">

                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="{{ route('panel.home') }}">
                            <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                        y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%"
                                        y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path"
                                                d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                style="fill: currentColor"></path>
                                            <path id="Path1"
                                                d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                                points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                            </polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                                points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                            </polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                                points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                            </polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <h2 class="brand-text text-primary ms-1">منصة المدار العقارية</h2>
                        </a>
                        <!-- /Brand logo-->

                        <!-- Left Text-->
                        <div class="col-lg-3 d-none d-lg-flex align-items-center p-0">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center">
                                <img class="img-fluid w-100"
                                    src="http://127.0.0.1:8000/app-assets/images/illustration/create-account.svg"
                                    alt="multi-steps" />
                            </div>
                        </div>
                        <!-- /Left Text-->

                        <!-- Register-->
                        <div class="col-lg-9 d-flex align-items-center auth-bg px-2 px-sm-3 px-lg-5 pt-3">
                            <div class="width-700 mx-auto">
                                <div class="bs-stepper register-multi-steps-wizard shadow-none">

                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                                            <strong>تنبيه</strong>{{ $error }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endforeach


                                    <div class="bs-stepper-header px-0" role="tablist">


                                        <div class="step" data-target="#account-details" role="tab"
                                            id="account-details-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="home" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">بيانات المستخدم</span>
                                                </span>
                                            </button>
                                        </div>

                                        <div class="line">
                                            <i data-feather="chevron-right" class="font-medium-2"></i>
                                        </div>

                                        <div class="step active" data-target="#account-details" role="tab"
                                            id="account-details-trigger">
                                            <button type="button" class="step-trigger" aria-selected="true">
                                                <span class="bs-stepper-box">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-user font-medium-3">
                                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                                    </svg>

                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">الصلاحيات</span>
                                                </span>
                                            </button>
                                        </div>

                                    </div>

                                    <div class="bs-stepper-content px-0 mt-4">
                                        <div>

                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">الصلاحيات</h2>
                                            </div>

                                            <form action="{{ route('admin.store.user.permissions') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="email" value="{{ $email }}">

                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table class="table table-flush-spacing">
                                                            <tbody>


                                                                <tr>

                                                                    <div class="col-md-6">
                                                                        <label class="form-label"
                                                                            for="select2-multiple">اختيار
                                                                            الفروع</label>
                                                                        <select class="select2 form-select"
                                                                            name="branches_ids[]" multiple>
                                                                            @foreach (getBranches() as $branch)
                                                                                <option value="{{ $branch->id }}">
                                                                                    {{ $branch->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </tr>


                                                                <tr>
                                                                    <div class="col-md-6 mt-1">
                                                                        <label class="form-label"
                                                                            for="select2-multiple">اختيار نوع
                                                                            المستخدم</label>
                                                                        <select class="select2 form-select"
                                                                            id="user-type-id" name="user_type">
                                                                            <option value="admin">مدير</option>
                                                                            <option value="office">مكتب</option>
                                                                            <option value="marketer">مسوق</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-input form-input-primary form-input col-md-6 mt-1"
                                                                        id="adv-div">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="رقم المعلن" id="advertiserNumber"
                                                                            name="advertiser_number">
                                                                        @error('advertiser_number')
                                                                            <small
                                                                                class="text-danger">{{ $message }}</small>
                                                                        @enderror

                                                                    </div>

                                                                </tr>


                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">الوسطاء</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_show_orders"
                                                                                    name="manage_mediators">
                                                                                <label class="form-check-label"
                                                                                    for="manageMediators"> تحكم </label>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">الرسائل الجماعية</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    id="can_send_sms_collection"
                                                                                    name="can_send_sms_collection">
                                                                                <label class="form-check-label"
                                                                                    for="can_send_sms_collection"> تحكم
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">الرسائل الفردية</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    id="can_send_sms_individually"
                                                                                    name="can_send_sms_individually">
                                                                                <label class="form-check-label"
                                                                                    for="can_send_sms_individually"> تحكم
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">الطلبات</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_show_orders"
                                                                                    name="can_show_orders">
                                                                                <label class="form-check-label"
                                                                                    for="canShow"> رؤية </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_add_orders"
                                                                                    name="can_add_orders">
                                                                                <label class="form-check-label"
                                                                                    for="canAdd"> اضافة </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_edit_orders"
                                                                                    name="can_edit_orders">
                                                                                <label class="form-check-label"
                                                                                    for="canEdit"> تعديل
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_cancel_orders"
                                                                                    name="can_cancel_orders">
                                                                                <label class="form-check-label"
                                                                                    for="canCancel">إلغاء</label>
                                                                            </div>

                                                                        </div>
                                                                    </td>
                                                                </tr>



                                                                {{-- <tr>
                                                                    <td class="text-nowrap fw-bolder">الطلبات</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_show_sells"
                                                                                    name="can_show_sells">
                                                                                <label class="form-check-label"
                                                                                    for="canShow"> رؤية </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_add_sells"
                                                                                    name="can_add_sells">
                                                                                <label class="form-check-label"
                                                                                    for="canAdd"> اضافة </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_edit_sells"
                                                                                    name="can_edit_sells">
                                                                                <label class="form-check-label"
                                                                                    for="canEdit"> تعديل
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_cancel_sells"
                                                                                    name="can_cancel_sells">
                                                                                <label class="form-check-label"
                                                                                    for="canCancel">إلغاء</label>
                                                                            </div>

                                                                        </div>
                                                                    </td>
                                                                </tr> --}}

                                                                {{--
                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">العروض</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_show_offers"
                                                                                    name="can_show_offers">
                                                                                <label class="form-check-label"
                                                                                    for="canShow"> رؤية </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_add_offers"
                                                                                    name="can_add_offers">
                                                                                <label class="form-check-label"
                                                                                    for="canAdd"> اضافة </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_edit_offers"
                                                                                    name="can_edit_offers">
                                                                                <label class="form-check-label"
                                                                                    for="canEdit"> تعديل
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_cancel_offers"
                                                                                    name="can_cancel_offers">
                                                                                <label class="form-check-label"
                                                                                    for="canCancel">إلغاء</label>
                                                                            </div>

                                                                        </div>
                                                                    </td>
                                                                </tr>




                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">القسائم</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_show_vouchers"
                                                                                    name="can_show_vouchers">
                                                                                <label class="form-check-label"
                                                                                    for="canShow"> رؤية </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_add_vouchers"
                                                                                    name="can_add_vouchers">
                                                                                <label class="form-check-label"
                                                                                    for="canAdd"> اضافة </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="can_edit_vouchers"
                                                                                    name="can_edit_vouchers">
                                                                                <label class="form-check-label"
                                                                                    for="canEdit"> تعديل
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    id="can_cancel_vouchers"
                                                                                    name="can_cancel_vouchers">
                                                                                <label class="form-check-label"
                                                                                    for="canCancel">إلغاء</label>
                                                                            </div>

                                                                        </div>
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">يستطيع اضافة حجز
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div
                                                                                class="form-check form-check-primary form-switch">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="canBooking" name="can_booking">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">يستطيع إرسال SMS
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div
                                                                                class="form-check form-check-primary form-switch">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="can_send_sms" name="can_send_sms">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>

--}}


                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">الحالة</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div
                                                                                class="form-check form-check-primary form-switch">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="user_status" name="user_status">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                                <div class="d-flex justify-content-between mt-1">
                                                    <button class="btn btn-primary btn-prev">
                                                        <i data-feather="chevron-left"
                                                            class="align-middle me-sm-25 me-0"></i>
                                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                                    </button>

                                                    <button class="btn btn-success btn-submit" type="submit">
                                                        <i data-feather="check" class="align-middle me-sm-25 me-0"></i>
                                                        <span class="align-middle d-sm-inline-block d-none">حفظ</span>
                                                    </button>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    @push('create-user-permissions-scripts')
        <script>
            var user_type_id = $("#user-type-id");
            var advertiserNumber = $("#adv-div");
            advertiserNumber.hide();
            user_type_id.on('change', function() {

                if (user_type_id.val() == "office") {
                    advertiserNumber.show();
                } else {
                    advertiserNumber.hide();
                }
            });
        </script>
        <!-- BEGIN: Page JS-->
        <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
        <!-- END: Page JS-->
    @endpush
@endsection
