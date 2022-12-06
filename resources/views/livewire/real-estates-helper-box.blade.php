<div class="modal fade" id="box" tabindex="-1" aria-labelledby="box" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="modal-header bg-transparent" wire:ignore.self>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-3 px-sm-3" wire:ignore.self>
                <h1 class="text-center mb-1" id="box" wire:ignore.self>تحديث تفاصيل العقارات</h1>
                <p class="text-center mb-2" wire:ignore.self>إضافة احدث انواع العقارات</p>

                <div class="bs-stepper vertical wizard-modern create-app-wizard" wire:ignore.self>


                    <div class="bs-stepper-header" role="tablist" wire:ignore.self>

                        <div class="step {{ $active_neighborhood }}" wire:click="changeTheme('neighborhood')"
                            data-target="#create-city-neighborhood" role="tab"
                            id="create-city-neighborhood-trigger">
                            <button type="button" class="step-trigger py-75">
                                <span class="bs-stepper-box" aria-selected="{{ $selected_neighborhood }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-book font-medium-3">
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                    </svg>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">المدن والأحياء</span>
                                    <span class="bs-stepper-subtitle">إضافة منطقة او حي جديد</span>
                                </span>
                            </button>
                        </div>

                        <div class="step {{ $active_order_note }}" wire:click="changeTheme('order_notes')"
                            data-target="#create-order-statues" role="tab"
                            id="create-order-statues-trigger">
                            <button type="button" class="step-trigger py-75">
                                <span class="bs-stepper-box" aria-selected="{{ $selected_order_note }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-book font-medium-3">
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                    </svg>
                                </span>

                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">ملاحظات الطلبات</span>
                                    <span class="bs-stepper-subtitle">إضافة ملاحظات جديدة للطلبات</span>
                                </span>

                            </button>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="bs-stepper-content shadow-none" wire:ignore.self>

                        {{-- city neighborhood --}}
                        <div id="create-city-neighborhood" role="tabpanel"
                            aria-labelledby="create-city-neighborhood-trigger">

                            @if ($selected_neighborhood)

                                <h5>إضافة مناطق</h5>

                                <form class="needs-validation  form-horizontal mb-1">



                                    <div>
                                        <label class="form-label" for="city-name">اسم المدينة</label>
                                        <input type="text" wire:model='city_name' class="form-control city"
                                            placeholder="ادخل اسم المدينة" aria-label="اسم المدينة"
                                            aria-describedby="city-name">
                                        @error('city_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="col-form-label" for="city-code">كود المدينة</label>
                                        <input type="text" class="form-control city" wire:model='city_code'
                                            placeholder="كود المدينة مثل QTF" aria-label="كود المدينة"
                                            aria-describedby="city-code">

                                        @error('city_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <button type="reset" wire:click='saveCity'
                                            class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">إضافة</button>
                                    </div>
                                </form>

                                <h5>إضافة احياء</h5>

                                <form class="needs-validation  form-horizontal mb-1">



                                    <div>
                                        <label class="form-label">اختيار المدينة</label>

                                        <select class="select2 form-control" wire:model='city_id'>
                                            @foreach (getCities() as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('city_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="col-form-label" for="neighborhood-name">اسم
                                            الحي</label>

                                        <input type="text" wire:model='neighborhood_name'
                                            class="form-control city" placeholder="ادخل اسم الحي">
                                        @error('neighborhood_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between mt-2">
                                        <button type="reset" wire:click='neighborhoodSave'
                                            class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">إضافة</button>
                                    </div>
                                </form>

                                {{-- <div class="d-flex justify-content-between mt-5">
                                    <button class="btn btn-outline-secondary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </button>
                                    <button class="btn btn-primary btn-next" wire:click="changeTheme('order_notes')">
                                        <span class="align-middle d-sm-inline-block d-none">التالي</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div> --}}
                            @endif

                            @if ($active_order_note)
                                <h5>إضافة ملاحظات الطلبات</h5>

                                <form class="needs-validation  form-horizontal mb-1">

                                    <div>
                                        <label class="form-label" for="order_note_status_name">اسم المدينة</label>
                                        <input type="text" wire:model='order_note_status_name'
                                            class="form-control city" placeholder="ادخل اسم الحالة"
                                            aria-label="ادخل اسم الحالة" aria-describedby="order_note_status_name">
                                        @error('order_note_status_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between mt-2">
                                        <button type="reset" wire:click='saveOrderNoteStatus'
                                            class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">إضافة</button>
                                    </div>
                                </form>

                                {{-- <div class="d-flex justify-content-between mt-5">

                                    <button class="btn btn-primary" wire:click="changeTheme('neighborhood')">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </button>

                                    <button class="btn btn-outline-secondary  btn-next" disabled>
                                        <span class="align-middle d-sm-inline-block d-none">التالي</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div> --}}
                            @endif
                        </div>


                        {{-- <div id="create-app-submit" class="content text-center" role="tabpanel"
                            aria-labelledby="create-app-submit-trigger" wire:ignore.self>
                            <h3>شكرا لك 🥳</h3>
                            <p>يمكنك رؤية البيانات المحدثة من خلال تفاصيل العقارات على القائمة الجانبية</p>
                            <img src="{{ asset('app-assets/images/illustration/pricing-Illustration.svg') }}"
                                height="218" alt="illustration" />
                            <div class="d-flex justify-content-between mt-3">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-success btn-submit">
                                    <span class="align-middle d-sm-inline-block d-none">Submit</span>
                                    <i data-feather="check" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / create app modal -->
