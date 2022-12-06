<div class="app-content content" wire:ignore.self>
    <div class="content-overlay" wire:ignore.self></div>
    <div class="header-navbar-shadow" wire:ignore.self></div>
    <div class="content-wrapper container-xxl p-0" wire:ignore.self>
        <div class="content-header row" wire:ignore.self></div>

        <div class="content-body" wire:ignore.self>
            <section class="app-user-view-account" wire:ignore.self>
                <div class="row" wire:ignore.self>
                    <div class="col-md-12" wire:ignore.self>
                        <div class="row match-height" wire:ignore.self>
                            <!-- Medal Card -->
                            <div class="col-xl-4 col-md-6 col-12" wire:ignore.self>
                                <div class="card card-congratulation-medal" wire:ignore.self>
                                    <div class="card-body" wire:ignore.self>
                                        <h2>رقم الطلب</h2>

                                        <h3 class="mb-75 mt-2 pt-50">
                                            <a href="#">{{ $order->order_code }}</a>
                                        </h3>

                                        @if ($order->order_status_id == 3)
                                            <div class="mb-2">
                                                <a class="btn bg-light-danger waves-effect waves-float waves-light"
                                                    wire:ignore.self>
                                                    <span wire:ignore>
                                                        الطلب مغلق
                                                    </span>
                                                </a>
                                            </div>
                                        @endif



                                        @if ($order->order_status_id == 1)
                                            <div class="mb-2">
                                                <a class="btn bg-light-warning waves-effect waves-float waves-light"
                                                    wire:ignore.self>
                                                    <span wire:ignore>
                                                        الطلب جديد
                                                    </span>
                                                </a>
                                            </div>
                                        @endif



                                        @if ($order->order_status_id == 2)
                                            <div class="mb-2">
                                                <a class="btn bg-light-success waves-effect waves-float waves-light"
                                                    wire:ignore.self>
                                                    <span wire:ignore>
                                                        تم ربط الطلب بالعرض
                                                    </span>
                                                </a>
                                            </div>
                                        @endif

                                        @if ($order->order_status_id == 4)
                                            <div class="mb-2">
                                                <a class="btn bg-light-success waves-effect waves-float waves-light"
                                                    wire:ignore.self>
                                                    <span wire:ignore>
                                                        جاري متابعة الطلب
                                                    </span>
                                                </a>
                                            </div>
                                        @endif


                                        @if ($order->order_status_id == 5)
                                            <div class="mb-2">
                                                <a class="btn bg-light-danger waves-effect waves-float waves-light"
                                                    wire:ignore.self>
                                                    <span wire:ignore>
                                                        لم يتم متابعة الطلب
                                                    </span>
                                                </a>
                                            </div>
                                        @endif

                                        @if ($order->order_status_id == 6)
                                            <div class="mb-2">
                                                <a class="btn bg-light-warning waves-effect waves-float waves-light"
                                                    wire:ignore.self>
                                                    <span wire:ignore>
                                                        الطلب معلق
                                                    </span>
                                                </a>
                                            </div>
                                        @endif


                                        @if (!($order->order_status_id == 3) && !($order->order_status_id == 6))
                                            <a class="btn bg-light-success waves-effect waves-float waves-light"
                                                data-bs-target="#connectToOffer" data-bs-toggle="modal"
                                                wire:ignore.self>
                                                <span wire:ignore>
                                                    <i data-feather='plus-square'></i>
                                                    ربط بالعرض
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
                            <div class="col-xl-8 col-md-6 col-12" wire:ignore.self>
                                <div class="card card-statistics" wire:ignore.self>



                                    <div class="card-header" wire:ignore.self>
                                        <h4 class="card-title" wire:ignore.self>معلومات العميل</h4>
                                        <div class="d-flex align-items-center" wire:ignore.self>
                                            <p class="card-text font-small-2 me-25 mb-0">{{ $last_update_time }}</p>
                                        </div>
                                    </div>



                                    <div class="card-boady card-statistics" wire:ignore.self>
                                        <div class="row" wire:ignore.self>

                                            <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
                                                <label class="form-label fw-bold fs-5 text-primary"> الاسم :</label>
                                                <label class="form-label fs-6">{{ $order->customer_name }}</label>
                                            </div>


                                            <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
                                                <label class="form-label fw-bold fs-5 text-primary"> رقم الجوال
                                                    :</label>
                                                <label class="form-label fs-6">{{ $order->customer_phone }}</label>
                                            </div>
                                            <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
                                                <label class="form-label fw-bold fs-5 text-primary">هل مدعوم من
                                                    الاسكان:</label>
                                                @if ($order->support_eskan)
                                                    <span class="badge badge-glow bg-success">نعم</span>
                                                @else
                                                    <span class="badge badge-glow bg-danger">لا</span>
                                                @endif
                                                {{-- <label class="form-label fs-6 text-danger">{{ }}</label> --}}
                                            </div>
                                        </div>

                                        <div class="row" wire:ignore.self>

                                            <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
                                                <label class="form-label fw-bold fs-5 text-primary"> جهة العمل :</label>
                                                <label class="form-label fs-6">{{ $order->employer_name }}</label>
                                            </div>

                                            <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
                                                <label class="form-label fw-bold fs-5 text-primary"> نوع القطاع
                                                    :</label>
                                                <label class="form-label fs-6">قطاع
                                                    {{ $order->employee_type == 'public' ? 'عام' : 'خاص' }}</label>
                                            </div>
                                        </div>

                                    </div>
                                    @if (!($order->order_status_id == 3) && !($order->order_status_id == 6))
                                        <div class="col-md-12" wire:ignore.self>
                                            <div class="mb-1 text-center" wire:ignore.self>
                                                <a href="javascript:;" class="btn bg-light-warning"
                                                    data-bs-target="#addNote" data-bs-toggle="modal">

                                                    <span wire:ignore>
                                                        <i data-feather='plus-square'></i> إضافة ملاحظة
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--/ Statistics Card -->
                        </div>
                    </div>

                    <div class="col-md-12" wire:ignore.self>
                        <div class="card card-statistics" wire:ignore.self>

                            <div class="card-header" wire:ignore.self>
                                <h4 class="card-title" wire:ignore.self>معلومات العقار</h4>
                                <div class="d-flex align-items-center" wire:ignore.self>
                                    <p class="card-text font-small-2 me-25 mb-0">{{ $last_update_time }}</p>
                                </div>
                            </div>

                            <div class="card-boady card-statistics" wire:ignore.self>
                                <div class="row">

                                    <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
                                        <label class="form-label fw-bold fs-5 text-primary"> نوع العقار
                                            :</label>
                                        <label
                                            class="form-label fs-6">{{ getPropertyTypeName($order->property_type_id) }}</label>
                                    </div>


                                    <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
                                        <label class="form-label fw-bold fs-5 text-primary"> المساحة
                                            :</label>
                                        <label class="form-label fs-6">{{ number_format($order->area) }}</label>
                                    </div>

                                    <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
                                        <label class="form-label fw-bold fs-5 text-primary">الميزانية:</label>
                                        {{ number_format($order->price_from) }} -
                                        {{ number_format($order->price_to) }}
                                    </div>
                                </div>

                                <div class="row" wire:ignore.self>

                                    <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
                                        <label class="form-label fw-bold fs-5 text-primary">المدينة:</label>
                                        <label class="form-label fs-6">{{ getCityName($order->city_id) }}</label>
                                    </div>

                                    <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
                                        <label class="form-label fw-bold fs-5 text-primary">المبلغ المتوفر:
                                        </label>
                                        <label
                                            class="form-label fs-6">{{ number_format($order->avaliable_amount) }}</label>
                                    </div>

                                    <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
                                        <label class="form-label fw-bold fs-5 text-primary"> طريقة الشراء:
                                        </label>
                                        <label
                                            class="form-label fs-6">{{ getPurchMethodName($order->purch_method_id) }}</label>
                                    </div>
                                </div>

                                <div class="row" wire:ignore.self>
                                    <div class="col-md-3 mb-1 ms-4" wire:ignore.self>
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

                    <div class="col-md-12" wire:ignore.self>
                        <div class="row" wire:ignore.self>
                            <div class="col-lg-6" wire:ignore.self>
                                <div class="card" wire:ignore.self>
                                    <div class="card-header" wire:ignore>
                                        <h4 class="card-title ">تتبع حالة الطلب</h4>
                                    </div>
                                    <div class="card-body" wire:ignore.self>
                                        <ul class="timeline" wire:ignore.self>

                                            @foreach ($order->orderNotes as $note)
                                                <li class="timeline-item" wire:ignore.self>
                                                    <span
                                                        class="timeline-point
                                                        @if ($note->status == 1) timeline-point-success @endif
                                                        @if ($note->status == 2) timeline-point-warning @endif
                                                        @if ($note->status == 3) timeline-point-danger @endif
                                                         timeline-point-indicator"
                                                        wire:ignore.self></span>
                                                    <div class="timeline-event" wire:ignore.self>

                                                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1"
                                                            wire:ignore.self>
                                                            <h6>{{ getUserName($note->user_id) }}</h6>
                                                            <span
                                                                class="timeline-event-time ">{{ $note->created_at->format('Y-m-d') }}</span>
                                                        </div>

                                                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1"
                                                            wire:ignore.self>
                                                            <h6>{{ $note->note }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>


                            @auth
                                @if (auth()->user()->user_type == 'superadmin' || auth()->user()->user_type == 'admin')
                                    <div class="col-lg-6" wire:ignore.self>
                                        <div class="card" wire:ignore.self>
                                            <div class="card-header" wire:ignore>
                                                <h4 class="card-title ">حالات التعديل والإضافة</h4>
                                            </div>
                                            <div class="card-body" wire:ignore.self>
                                                <ul class="timeline" wire:ignore.self>

                                                    @foreach ($order->orderEdits as $order_edit)
                                                        @if ($order_edit->action == 'edit')
                                                            <li class="timeline-item">
                                                                <span
                                                                    class="timeline-point timeline-point-warning timeline-point-indicator "></span>
                                                                <div class="timeline-event ">
                                                                    <div
                                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1 ">
                                                                        <h6> {!! $order_edit->note !!}</h6>
                                                                        <span
                                                                            class="timeline-event-time ">{{ $this->getLastUpateOrderEditTime($order_edit->id) }}</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endif

                                                        @if ($order_edit->action == 'add')
                                                            <li class="timeline-item">
                                                                <span
                                                                    class="timeline-point timeline-point-success timeline-point-indicator "></span>
                                                                <div class="timeline-event ">
                                                                    <div
                                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1 ">
                                                                        <h6>{!! $order_edit->note !!}</h6>
                                                                        <span
                                                                            class="timeline-event-time ">{{ $this->getLastUpateOrderEditTime($order_edit->id) }}</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endif

                                                        @if ($order_edit->action == 'cancel')
                                                            <li class="timeline-item">
                                                                <span
                                                                    class="timeline-point timeline-point-danger timeline-point-indicator "></span>
                                                                <div class="timeline-event ">
                                                                    <div
                                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1 ">
                                                                        <h6>{!! $order_edit->note !!}</h6>
                                                                        <span
                                                                            class="timeline-event-time ">{{ $this->getLastUpateOrderEditTime($order_edit->id) }}</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endif

                                                        @if ($order_edit->action == 'active')
                                                            <li class="timeline-item">
                                                                <span
                                                                    class="timeline-point timeline-point-warning timeline-point-indicator "></span>
                                                                <div class="timeline-event ">
                                                                    <div
                                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1 ">
                                                                        <h6>{!! $order_edit->note !!}</h6>
                                                                        <span
                                                                            class="timeline-event-time ">{{ $this->getLastUpateOrderEditTime($order_edit->id) }}</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="modal fade" id="addNote" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header bg-transparent" wire:ignore>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50" wire:ignore.self>


                    <div class="text-center mb-2" wire:ignore>
                        <h1 class="mb-1">إضافة ملاحظة</h1>
                    </div>


                    <div class="row gy-1 pt-75" wire:ignore.self>

                        <div class="col-12 col-md-6 " wire:ignore.self>
                            <label class="form-label" for="fp-range">التاريخ</label>
                            <input type="text" id="fp-range" class="form-control"
                                placeholder="{{ now()->format('Y-m-d') }}" disabled />
                        </div>

                        <div class="col-12 col-md-6" wire:ignore.self>
                            <label class="form-label"> الحالة :</label>
                            <select class="form-select" wire:model='status_note'>
                                @foreach (getOrderNoteStatuse() as $order_status)
                                    @if (auth()->user()->user_type == 'marketer')
                                        @if ($order_status->id != 3)
                                            <option value="{{ $order_status->id }}">{{ $order_status->name }}
                                            </option>
                                        @endif
                                    @else
                                        <option value="{{ $order_status->id }}">{{ $order_status->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12" wire:ignore.self>
                            <label class="form-label" for="modalEditUserEmail">ملاحظات:</label>
                            <textarea class="form-control" id="notes" wire:model='text' rows="3" placeholder="ملاحظات"></textarea>
                        </div>

                        <div class="col-12 text-center mt-2 pt-50" wire:ignore.self>
                            <button class="btn btn-primary btn-submit me-1" wire:click='addNote'>حفظ</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">الغاء</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="connectToOffer" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header bg-transparent" wire:ignore.self>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50" wire:ignore.self>
                    <div class="text-center mb-2" wire:ignore.self>
                        <h1 class="mb-1 ">قريبا...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
