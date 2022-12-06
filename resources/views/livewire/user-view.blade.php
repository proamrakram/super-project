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
                            <!-- Medal Card -->
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="card card-congratulation-medal">
                                    <div class="card-body">

                                        <h2>رقم المستخدم</h2>

                                        <h3 class="mb-75 mt-2 pt-50">
                                            <a href="#">USR-{{ $user->id }}</a>
                                        </h3>

                                        @if ($user->user_status == 'active')
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
                                        @endif

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
                                        <div class="d-flex align-items-center">
                                            <p class="card-text font-small-2 me-25 mb-0">{{ $last_update_time }}</p>
                                        </div>
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

                                    <div class="col-md-12">
                                        <div class="mb-1 text-center">
                                            <a href="javascript:;" class="btn bg-light-warning"
                                                data-bs-target="#addNote" data-bs-toggle="modal">
                                                <i data-feather='plus-square'></i> إرسال إشعار</span></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--/ Statistics Card -->
                        </div>
                    </div>

                    {{-- <div class="col-md-12 ">
                        <div class="card card-statistics">

                            <div class="card-header">
                                <h4 class="card-title">معلومات العقار</h4>
                                <div class="d-flex align-items-center">
                                    <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                                </div>
                            </div>

                            <div class="card-boady card-statistics">
                                <div class="row">

                                    <div class="col-md-3 mb-1 ms-4">
                                        <label class="form-label fw-bold fs-5 text-primary"> نوع العقار
                                            :</label>
                                        <label
                                            class="form-label fs-6">{{ getPropertyTypeName($order->property_type_id) }}</label>
                                    </div>


                                    <div class="col-md-3 mb-1 ms-4">
                                        <label class="form-label fw-bold fs-5 text-primary"> المساحة
                                            :</label>
                                        <label class="form-label fs-6">{{ $order->area }}</label>
                                    </div>

                                    <div class="col-md-3 mb-1 ms-4">
                                        <label class="form-label fw-bold fs-5 text-primary">الميزانية:</label>
                                        {{ $order->price_from }} - {{ $order->price_to }}
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-3 mb-1 ms-4">
                                        <label class="form-label fw-bold fs-5 text-primary">المدينة:</label>
                                        <label class="form-label fs-6">{{ getCityName($order->city_id) }}</label>
                                    </div>

                                    <div class="col-md-3 mb-1 ms-4">
                                        <label class="form-label fw-bold fs-5 text-primary">المبلغ المتوفر:
                                        </label>
                                        <label class="form-label fs-6">{{ $order->avaliable_amount }}</label>
                                    </div>

                                    <div class="col-md-3 mb-1 ms-4">
                                        <label class="form-label fw-bold fs-5 text-primary"> طريقة الشراء:
                                        </label>
                                        <label
                                            class="form-label fs-6">{{ getPurchMethodName($order->purch_method_id) }}</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-1 ms-4">
                                        <label class="form-label fw-bold fs-5 text-primary"> ملاحظات على الطلب:
                                        </label>
                                        <p>{{ $order->notes }}</p>
                                    </div>

                                    <div class="mb-1 text-center">

                                        @if ($order->desire_to_buy_id == 1)
                                            <a class="btn bg-light-success">العميل:
                                                {{ getDesireToBuyName($order->desire_to_buy_id) }}</span>
                                            </a>
                                        @endif

                                        @if ($order->desire_to_buy_id == 2)
                                            <a class="btn bg-light-warning">العميل جاهز للشراء:
                                                {{ getDesireToBuyName($order->desire_to_buy_id) }}</span>
                                            </a>
                                        @endif

                                        @if ($order->desire_to_buy_id == 3)
                                            <a class="btn bg-light-danger">العميل جاهز للشراء:
                                                {{ getDesireToBuyName($order->desire_to_buy_id) }}</span>
                                            </a>
                                        @endif

                                        @if ($order->desire_to_buy_id == 4)
                                            <a class="btn bg-light-dark">العميل جاهز للشراء:
                                                {{ getDesireToBuyName($order->desire_to_buy_id) }}</span>
                                            </a>
                                        @endif


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">


                        <div class="row">
                            <div class="col-lg-6 ">
                                <div class="card ">
                                    <div class="card-header">
                                        <h4 class="card-title ">تتبع حالة الطلب</h4>
                                    </div>
                                    <div class="card-body ">
                                        <ul class="timeline ">
                                            <li class="timeline-item ">
                                                <span class="timeline-point timeline-point-indicator "></span>
                                                <div class="timeline-event ">
                                                    <div
                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1 ">
                                                        <h6>سعيد القطان </h6>
                                                        <span class="timeline-event-time ">2022-09-15</span>

                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1 ">
                                                        <h6>تم إيجاد عرض الى العميل والعميل لم يرد </h6>

                                                    </div>


                                                </div>
                                            </li>

                                            <li class="timeline-item ">
                                                <span
                                                    class="timeline-point timeline-point-danger timeline-point-indicator "></span>
                                                <div class="timeline-event ">
                                                    <div
                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1 ">
                                                        <h6>تم إنشاء الطلب</h6>
                                                        <span class="timeline-event-time ">2022-09-10</span>

                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>


                            @auth
                                @if (auth()->user()->user_type == 'superadmin' || auth()->user()->user_type == 'admin')
                                    <div class="col-lg-6 ">
                                        <div class="card ">
                                            <div class="card-header ">
                                                <h4 class="card-title ">التعديلات</h4>
                                            </div>
                                            <div class="card-body ">
                                                <ul class="timeline ">
                                                    <li class="timeline-item ">
                                                        <span class="timeline-point timeline-point-indicator "></span>
                                                        <div class="timeline-event ">
                                                            <div
                                                                class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1 ">
                                                                <h6>قام علي التاروتي بالتعديل</h6>
                                                                <span class="timeline-event-time ">ساعة مضت</span>
                                                            </div>

                                                        </div>
                                                    </li>

                                                    <li class="timeline-item ">
                                                        <span
                                                            class="timeline-point timeline-point-danger timeline-point-indicator "></span>
                                                        <div class="timeline-event ">
                                                            <div
                                                                class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1 ">
                                                                <h6>قام محمد على بإلغاء العرض</h6>
                                                                <span class="timeline-event-time ">منذ 3 ساعات</span>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endauth


                        </div>
                    </div> --}}

                </div>
            </section>



            <!-- Line Chart - Profit -->
            <div class="col-lg-2 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-info p-50 mb-1">
                            <div class="avatar-content" wire:ignore>
                                <i data-feather='shopping-bag' class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder">{{ $user->orders->count() }}</h2>
                        <p class="card-text">عدد الطلبات</p>
                    </div>
                </div>
            </div>

            <!-- Line Chart - Profit -->
            <div class="col-lg-2 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-warning p-50 mb-1">
                            <div class="avatar-content" wire:ignore>
                                <i data-feather='shopping-bag' class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder">{{ getUserOpenOrdersCount($user->id) }}</h2>
                        <p class="card-text">عدد الطلبات المفتوحة</p>
                    </div>
                </div>
            </div>

            <!-- Line Chart - Profit -->
            <div class="col-lg-2 col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-danger p-50 mb-1">
                            <div class="avatar-content" wire:ignore>
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
                            <div class="avatar-content" wire:ignore>
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <a class="btn bg-light-danger waves-effect waves-float waves-light">
                                        <span>
                                            <h1 class="mb-1">قريبا...</h1>
                                        </span>
                                    </a>
                                </div>


                                {{-- <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false">


                                <div class="col-12 col-md-6 ">
                                    <label class="form-label" for="fp-range">التاريخ</label>
                                    <input type="text" id="fp-range" class="form-control flatpickr-basic"
                                        placeholder="{{ now() }}" disabled />
                                </div>
                                <div class="col-12 col-md-6 ">
                                    <label class="form-label"> الحالة :</label>
                                    <select class="form-select">
                                        @foreach (getOrderNoteStatuse() as $order_status)
                                            <option value="{{ $order_status->id }}">{{ $order_status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserEmail">ملاحظات:</label>
                                    <textarea class="form-control" id="notes" rows="3" placeholder="ملاحظات"></textarea>
                                </div>

                                <div class="col-12 text-center mt-2 pt-50">
                                    <button type="submit" class="btn btn-primary btn-submit me-1"
                                        id="type-success">حفظ</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        الغاء
                                    </button>
                                </div>
                            </form> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
