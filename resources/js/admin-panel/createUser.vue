<template>

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
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                        x2="37.373316%" y2="100%">
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
                                        <div class="step" data-target="#personal-info" role="tab"
                                            id="personal-info-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="user" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">الصلاحيات</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="bs-stepper-content px-0 mt-4">
                                        <div id="account-details" class="content" role="tabpanel"
                                            aria-labelledby="account-details-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">بيانات المستخدم</h2>
                                            </div>
                                            <form>

                                                <div class="row">

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="username">الاسم</label>
                                                        <input type="text" class="form-control" placeholder="الاسم"
                                                            id="username" v-model="username" required />

                                                        <small class="text-danger">{{ username_message }}</small>
                                                    </div>

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="email">البريد الالكترونى</label>
                                                        <input type="email" class="form-control"
                                                            placeholder="البريد الالكترونى" id="email" v-model="email"
                                                            required />

                                                        <small class="text-danger">{{ email_message }}</small>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="phone">رقم الجوال</label>
                                                        <input type="text" class="form-control" placeholder="رقم الجوال"
                                                            id="phone" v-model="phone" required />


                                                        <small class="text-danger">{{ phone_message }}</small>
                                                    </div>

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="password">كلمة المرور</label>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" class="form-control"
                                                                placeholder="كلمة المرور" id="password"
                                                                v-model="password" required />
                                                            <span class="input-group-text cursor-pointer"><i
                                                                    data-feather="eye"></i></span>
                                                        </div>

                                                        <small class="text-danger">{{ password_message }}</small>
                                                    </div>

                                                </div>
                                            </form>

                                            <div class="d-flex justify-content-between mt-2">
                                                <button class="btn btn-outline-secondary btn-prev" disabled>
                                                    <i data-feather="chevron-left"
                                                        class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                                </button>
                                                <button class="btn btn-primary btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">التالى</span>
                                                    <i data-feather="chevron-right"
                                                        class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="personal-info" class="content" role="tabpanel"
                                            aria-labelledby="personal-info-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">الصلاحيات</h2>
                                            </div>
                                            <form>

                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table class="table table-flush-spacing">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">مدير ؟</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div
                                                                                class="form-check form-check-primary form-switch">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="isAdmin" v-model="is_admin"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">مكتب ؟</td>
                                                                    <td>
                                                                        <div class="d-flex">

                                                                            <div
                                                                                class="form-check form-check-primary form-switch">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    v-model="is_office" id="isOffice">
                                                                            </div>

                                                                            <div
                                                                                class="form-input form-input-primary form-input">
                                                                                <input type="number"
                                                                                    class="form-control"
                                                                                    placeholder="رقم المعلن"
                                                                                    id="advertiserNumber"
                                                                                    v-model="advertiser_number">
                                                                            </div>

                                                                        </div>
                                                                        <small class="text-danger">{{
                                                                                advertiser_number_message
                                                                        }}</small>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">عضو مراقب ؟</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div
                                                                                class="form-check form-check-primary form-switch">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="isMonitor" v-model="is_monitor">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">العقارات</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="canShow"
                                                                                    v-model="can_show">
                                                                                <label class="form-check-label"
                                                                                    for="canShow"> رؤية </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="canAdd"
                                                                                    v-model="can_add">
                                                                                <label class="form-check-label"
                                                                                    for="canAdd"> اضافة </label>
                                                                            </div>

                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="canEdit"
                                                                                    v-model="can_edit">
                                                                                <label class="form-check-label"
                                                                                    for="canEdit"> تعديل
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" id="canCancel"
                                                                                    v-model="can_cancel">
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
                                                                                    id="canBooking"
                                                                                    v-model="can_booking">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">الحالة</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div
                                                                                class="form-check form-check-primary form-switch">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="userstatus"
                                                                                    v-model="userstatus">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-nowrap fw-bolder">الفروع</td>
                                                                    <td>
                                                                        <div class="d-flex">

                                                                            <select class="form-select" id="branch"
                                                                                v-model="branches_ids">
                                                                                <option>الخبر</option>
                                                                                <option>القطيف</option>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </form>
                                            <div class="d-flex justify-content-between mt-1">

                                                <button class="btn btn-primary btn-prev">
                                                    <i data-feather="chevron-left"
                                                        class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                                </button>

                                                <button class="btn btn-success btn-submit" @click="saveproduct"
                                                    type="submit">
                                                    <!-- id="type-success" -->
                                                    <i data-feather="check" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">حفظ</span>
                                                </button>
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
    </div>
    <!-- END: Content-->

</template>




<script>
import axios from "axios";

export default {
    name: "createUser",
    props: [


    ],

    data() {
        return {
            username: '',
            email: '',
            phone: '',
            password: '',
            is_admin: true,
            is_office: false,
            advertiser_number: '',
            is_monitor: false,
            can_show: false,
            can_add: false,
            can_edit: false,
            can_cancel: false,
            can_booking: false,
            userstatus: false,
            branches_ids: [],

            disabled: true,
            password_message: "",
            username_message: "",
            phone_message: "",
            email_message: "",
            advertiser_number_message: "",
        };
    },

    created() {

    },

    methods: {

        async saveproduct() {

            try {

                const formData = new FormData();

                formData.append('username', this.username);
                formData.append('email', this.email);
                formData.append('phone', this.phone);
                formData.append('password', this.password);
                formData.append('is_admin', this.is_admin);
                formData.append('is_office', this.is_office);
                formData.append('advertiser_number', this.advertiser_number);
                formData.append('is_monitor', this.is_monitor);
                formData.append('can_show', this.can_show);
                formData.append('can_add', this.can_add);
                formData.append('can_edit', this.can_edit);
                formData.append('can_cancel', this.can_cancel);
                formData.append('can_booking', this.can_booking);
                formData.append('userstatus', this.userstatus);
                formData.append('branches_ids', this.branches_ids);


                const response = await axios.post(
                    "http://localhost:8000/api/admin/store-user",
                    formData,
                    {
                        headers: {
                            'Content-type': 'application/json'
                        }
                    }

                );

                console.log(response);


                if (response.status == 200) {

                    console.log(response);
                    console.log(response.data);
                    console.log(response.data.res);

                    this.username = '';
                    this.email = '';
                    this.phone = '';
                    this.password = '';
                    this.is_admin = true;
                    this.is_office = false;
                    this.advertiser_number = '';
                    this.is_monitor = false;
                    this.can_show = false;
                    this.can_add = false;
                    this.can_edit = false;
                    this.can_cancel = false;
                    this.can_booking = false;
                    this.userstatus = false;
                    this.branches_ids = [];
                }

            } catch (error) {

                var res_validation = error.response.data.errors;

                if (res_validation.username) {
                    this.username_message = res_validation.username[0];
                }

                if (res_validation.password) {
                    this.password_message = res_validation.password[0];
                }

                if (res_validation.phone) {
                    this.phone_message = res_validation.phone[0];
                }

                if (res_validation.email) {
                    this.email_message = res_validation.email[0];
                }

                if (res_validation.advertiser_number) {
                    this.advertiser_number_message = res_validation.advertiser_number[0];
                }

            }
        },


        check() {

            if (this.username && this.email && this.phone && this.password) {
                this.disabled = false;
            }

        }
    }

};
</script>

