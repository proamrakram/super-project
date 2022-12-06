<div class="modal fade" id="box" tabindex="-1" aria-labelledby="box" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-3 px-sm-3">
                <h1 class="text-center mb-1" id="box">تحديث تفاصيل العقارات</h1>
                <p class="text-center mb-2">إضافة احدث انواع العقارات</p>

                <div class="bs-stepper vertical wizard-modern create-app-wizard">


                    <div class="bs-stepper-header" role="tablist">

                        <div class="step" data-target="#create-city-neighborhood" role="tab"
                            id="create-city-neighborhood-trigger">
                            <button type="button" class="step-trigger py-75">
                                <span class="bs-stepper-box">
                                    <i data-feather="book" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">المدن والأحياء</span>
                                    <span class="bs-stepper-subtitle">إضافة منطقة او حي جديد</span>
                                </span>
                            </button>
                        </div>

                        <div class="step" data-target="#create-property-statuses-types" role="tab"
                            id="create-property-statuses-types-trigger">
                            <button type="button" class="step-trigger py-75">
                                <span class="bs-stepper-box">
                                    <i data-feather="package" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">انواع العقارات وحالاتها</span>
                                    <span class="bs-stepper-subtitle">إضافة نوع عقار او حالة عقار جديد</span>
                                </span>
                            </button>
                        </div>

                        {{-- <div class="step" data-target="#create-offer-price-types" role="tab"
                            id="create-offer-price-types-trigger">
                            <button type="button" class="step-trigger py-75">
                                <span class="bs-stepper-box">
                                    <i data-feather="package" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">انواع العروض والاسعار</span>
                                    <span class="bs-stepper-subtitle">إضافة نوع عرض او سعر جديد</span>

                                </span>
                            </button>
                        </div>

                        <div class="step" data-target="#create-streets-directions" role="tab"
                            id="create-streets-directions-trigger">
                            <button type="button" class="step-trigger py-75">
                                <span class="bs-stepper-box">
                                    <i data-feather="command" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">الاتجاهات والشوارع</span>
                                    <span class="bs-stepper-subtitle">إضافة اتجاه او شارع جديد</span>
                                </span>
                            </button>
                        </div>

                        <div class="step" data-target="#create-licenseds-land-types" role="tab"
                            id="create-licenseds-land-types-trigger">
                            <button type="button" class="step-trigger py-75">
                                <span class="bs-stepper-box">
                                    <i data-feather="command" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">انوع الاراضي والتراخيص</span>
                                    <span class="bs-stepper-subtitle">إضافة نوع ارض جديد او ترخيص</span>
                                </span>
                            </button>
                        </div>

                        <div class="step" data-target="#create-land" role="tab" id="create-land-trigger">
                            <button type="button" class="step-trigger py-75">
                                <span class="bs-stepper-box">
                                    <i data-feather="command" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">الأراضي</span>
                                    <span class="bs-stepper-subtitle">إضافة ارض جديدة</span>
                                </span>
                            </button>
                        </div>


                        <div class="step" data-target="#create-app-submit" role="tab"
                            id="create-app-submit-trigger">
                            <button type="button" class="step-trigger py-75">
                                <span class="bs-stepper-box">
                                    <i data-feather="check" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">النهاية</span>
                                    <span class="bs-stepper-subtitle">بيانات العقارات</span>
                                </span>
                            </button>
                        </div> --}}

                    </div>

                    <!-- content -->
                    <div class="bs-stepper-content shadow-none">

                        {{-- city neighborhood --}}
                        <div id="create-city-neighborhood" role="tabpanel"
                            aria-labelledby="create-city-neighborhood-trigger">

                            <h5>إضافة مناطق</h5>

                            <form class="needs-validation  form-horizontal mb-1" novalidate>

                                <label class="form-label" for="city-name">اسم المدينة</label>

                                <input type="text" id="city-name" class="form-control city"
                                    placeholder="ادخل اسم المدينة" aria-label="اسم المدينة"
                                    aria-describedby="city-name">

                                <label class="col-form-label" for="city-code">كود المدينة</label>

                                <input type="text" id="city-code" class="form-control city" name="city_code"
                                    placeholder="كود المدينة مثل QTF" aria-label="كود المدينة"
                                    aria-describedby="city-code">

                                <div class="d-flex justify-content-between mt-2">
                                    <button type="reset" id="city-submit"
                                        class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">إضافة</button>
                                </div>
                            </form>

                            <h5>إضافة احياء</h5>
                            <form class="needs-validation  form-horizontal mb-1" novalidate>

                                <label class="form-label" for="city-id">اختيار المدينة</label>
                                <select class="select2 form-select select2-hidden-accessible" id="city-id"
                                    data-select2-id="city-id" name="city_id" tabindex="-1" aria-hidden="true">
                                    @foreach (getCities() as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>

                                <label class="col-form-label" for="neighborhood-name">اسم الحي</label>

                                <input type="text" id="neighborhood-name" class="form-control city"
                                    name="neighborhood_name" placeholder="ادخل اسم الحي"="">

                                <div class="d-flex justify-content-between mt-2">
                                    <button type="reset" id="neighborhood-submit"
                                        class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">إضافة</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-between mt-5">
                                <button class="btn btn-outline-secondary btn-prev" disabled>
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Property Statues Types --}}
                        <div id="create-property-statuses-types" class="content" role="tabpanel"
                            aria-labelledby="create-property-statuses-types-trigger">

                            <h5>إضافة نوع عقار جديد</h5>

                            <form class="needs-validation  form-horizontal mb-1" novalidate>

                                <label class="form-label" for="property-type-id">أنواع العقارات المتوفرة</label>
                                <select class="select2 form-select select2-hidden-accessible" id="property-type-id"
                                    data-select2-id="property-type-id" name="property_type_id" tabindex="-1"
                                    aria-hidden="true">
                                    @foreach (getPropertyTypes() as $property_type)
                                        <option value="{{ $property_type->id }}" data-select2-id="2">
                                            {{ $property_type->name }}</option>
                                    @endforeach
                                </select>

                                <label class="col-form-label" for="property-type-name">اسم نوع العقار الجديد</label>

                                <input type="text" id="property-type-name" class="form-control city"
                                    name="property_type_name" placeholder="ادخل اسم نوع العقار الجديد">

                                <div class="d-flex justify-content-between mt-2">
                                    <button type="reset" id="property-type-submit"
                                        class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">تحديث</button>
                                </div>
                            </form>

                            <h5>إضافة حالة عقار جديد</h5>

                            <form class="needs-validation form-horizontal">

                                <label class="form-label" for="property-status">حالات العقارات المتوفرة</label>
                                <select class="select2 form-select select2-hidden-accessible" id="property-status"
                                    data-select2-id="property-status" name="property_status_id" tabindex="-1"
                                    aria-hidden="true">
                                    @foreach (getPropertyStatues() as $property_status)
                                        <option value="{{ $property_status->id }}">{{ $property_status->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <label class="col-form-label" for="property-type-name">اسم حالة عقار جديدة</label>

                                <input type="text" id="property-status-name" class="form-control city"
                                    name="property_status_name" placeholder="ادخل اسم حالة عقار جديدة">

                                <div class="d-flex justify-content-between mt-2">
                                    <button type="reset" id="property-status-submit"
                                        class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">تحديث</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-between mt-5">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>

                            </div>
                        </div>

                        {{-- Offer Price Types --}}
                        {{-- <div id="create-offer-price-types" class="content" role="tabpanel"
                            aria-labelledby="create-offer-price-types-trigger">

                            <h5>إضافة نوع عرض جديد</h5>

                            <form class="needs-validation  form-horizontal mb-1" novalidate>

                                <label class="form-label" for="offer-type">انواع العروض المتوفرة</label>
                                <select class="select2 form-select select2-hidden-accessible" id="offer-type"
                                    data-select2-id="offer-type" name="offer_type_id" tabindex="-1"
                                    aria-hidden="true">
                                    @foreach (offerTypes() as $offer_type)
                                        <option value="{{ $offer_type->id }}" data-select2-id="2">
                                            {{ $offer_type->name }}</option>
                                    @endforeach
                                </select>

                                <label class="col-form-label" for="offer-type-name">اسم نوع العرض الجديد</label>

                                <input type="text" id="offer-type-name" class="form-control city"
                                    name="offer_type_name" placeholder="ادخل اسم نوع العرض الجديد" >

                                <div class="d-flex justify-content-between mt-2">
                                    <button type="reset" id="offer-type-submit"
                                        class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">تحديث</button>
                                </div>
                            </form>

                            <h5>إضافة نوع سعر جديد</h5>

                            <form class="needs-validation  form-horizontal" novalidate>

                                <label class="form-label" for="price-type">انواع الاسعار المتوفرة</label>
                                <select class="select2 form-select select2-hidden-accessible" id="price-type"
                                    data-select2-id="price-type" name="price_type_id" tabindex="-1"
                                    aria-hidden="true">
                                    @foreach (priceTypes() as $price_type)
                                        <option value="{{ $price_type->id }}" data-select2-id="2">
                                            {{ $price_type->name }}</option>
                                    @endforeach

                                </select>

                                <label class="col-form-label" for="price-type-name">اسم نوع سعر الجديد</label>

                                <input type="text" id="price-type-name" class="form-control city"
                                    name="price_type_name" placeholder="ادخل اسم نوع سعر الجديد" >

                                <div class="d-flex justify-content-between mt-2">
                                    <button type="reset" id="price-type-submit"
                                        class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">تحديث</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-between mt-5">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div> --}}

                        {{-- Streets && Directions --}}
                        {{-- <div id="create-streets-directions" class="content" role="tabpanel"
                            aria-labelledby="create-streets-directions-trigger">

                            <h5>إضافة اتجاه جديد</h5>

                            <form class="needs-validation  form-horizontal mb-1" novalidate>

                                <label class="form-label" for="direction">الاتجاهات المتوفرة</label>
                                <select class="select2 form-select select2-hidden-accessible" id="direction"
                                    data-select2-id="direction" name="direction_id" tabindex="-1"
                                    aria-hidden="true">
                                    @foreach (directions() as $direction)
                                        <option value="{{ $direction->id }}" data-select2-id="2">
                                            {{ $direction->name }}</option>
                                    @endforeach
                                </select>

                                <label class="col-form-label" for="direction-name">اسم الاتجاه الجديد</label>

                                <input type="text" id="direction-name" class="form-control city"
                                    name="direction_name" placeholder="ادخل اسم الاتجاه الجديد" >

                                <div class="d-flex justify-content-between mt-2">
                                    <button type="reset" id="direction-submit"
                                        class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">تحديث</button>
                                </div>
                            </form>

                            <h5>إضافة شارع جديد</h5>

                            <form class="needs-validation  form-horizontal" novalidate>

                                <label class="form-label" for="street">الشوارع المتوفرة</label>
                                <select class="select2 form-select select2-hidden-accessible" id="street"
                                    data-select2-id="street" name="street_id" tabindex="-1" aria-hidden="true">
                                    @foreach (streets() as $street)
                                        <option value="{{ $street->id }}" data-select2-id="2">{{ $street->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <label class="col-form-label" for="street-name">اسم الشارع الجديد</label>

                                <input type="text" id="street-name" class="form-control city" name="street_name"
                                    placeholder="ادخل اسم الشارع الجديد" >

                                <div class="d-flex justify-content-between mt-2">
                                    <button type="reset" id="street-submit"
                                        class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">تحديث</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-between mt-5">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div> --}}

                        {{-- Licenseds && Land Types --}}
                        {{-- <div id="create-licenseds-land-types" class="content" role="tabpanel"
                            aria-labelledby="create-licenseds-land-types-trigger">

                            <h5>إضافة نوع ارض جديد</h5>

                            <form class="needs-validation  form-horizontal mb-1" novalidate>

                                <label class="form-label" for="land_types">أنواع الاراضي المتوفرة</label>
                                <select class="select2 form-select select2-hidden-accessible" id="land-type"
                                    data-select2-id="land_types" name="land_type_id" tabindex="-1"
                                    aria-hidden="true">
                                    @foreach (landTypes() as $land_type)
                                        <option value="{{ $land_type->id }}" data-select2-id="2">
                                            {{ $land_type->name }}</option>
                                    @endforeach
                                </select>

                                <label class="col-form-label" for="land-type-name">اسم نوع الارض الجديد</label>

                                <input type="text" id="land-type-name" class="form-control city"
                                    name="land_type_name" placeholder="ادخل اسم نوع الارض الجديد" >

                                <div class="d-flex justify-content-between mt-2">
                                    <button type="reset" id="land-type-submit"
                                        class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">تحديث</button>
                                </div>
                            </form>


                            <h5>إضافة ترخيص جديد</h5>

                            <form class="needs-validation  form-horizontal" novalidate>

                                <label class="form-label" for="licensed">التراخيص المتوفرة</label>
                                <select class="select2 form-select select2-hidden-accessible" id="licensed"
                                    data-select2-id="licensed" name="licensed_id" tabindex="-1" aria-hidden="true">
                                    @foreach (licensedes() as $licensed)
                                        <option value="{{ $licensed->id }}" data-select2-id="2">
                                            {{ $licensed->name }}</option>
                                    @endforeach
                                </select>

                                <label class="col-form-label" for="licensed-name">اسم الترخيص الجديد</label>

                                <input type="text" id="licensed-name" class="form-control city"
                                    name="licensed_name" placeholder="ادخل اسم الترخيص الجديد" >

                                <div class="d-flex justify-content-between mt-2">
                                    <button type="reset" id="licensed-submit"
                                        class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">تحديث</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-between mt-5">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div> --}}

                        {{-- Land --}}
                        {{-- <div id="create-land" class="content" role="tabpanel" aria-labelledby="create-land-trigger">

                            <h5>إضافة ارض جديدة</h5>

                            <form class="needs-validation  form-horizontal mb-1" novalidate>

                                <label class="form-label" for="licensed">اختيار نوع الترخيص</label>
                                <select class="select2 form-select select2-hidden-accessible" id="licensed"
                                    data-select2-id="licensed" name="licensed_type_id" tabindex="-1"
                                    aria-hidden="true">
                                    @foreach (licensedes() as $licensed)
                                        <option value="{{ $licensed->id }}" data-select2-id="2">
                                            {{ $licensed->name }}</option>
                                    @endforeach
                                </select>

                                <label class="col-form-label" for="land-type-space">مساحة الارض</label>

                                <input type="number" id="land-type-space" class="form-control city"
                                    name="land_space" placeholder="ادخل مساحة الارض" >

                                <label class="col-form-label" for="price-peer-meter">سعر متر الارض</label>
                                <input type="number" id="price-peer-meter" class="form-control city"
                                    name="price_peer_meter" placeholder="ادخل سعر متر الارض" >


                                <label class="col-form-label" for="land-notes">ملاحظات</label>
                                <textarea class="form-control city" name="land_notes" id="land-notes"
                                    placeholder="ادخل بعض الملاحظات ان وجد!!" cols="30"></textarea>


                                <div class="d-flex justify-content-between mt-2">
                                    <button type="reset" id="land-submit"
                                        class="btn btn-success btn-sm me-1 waves-effect waves-float waves-light">تحديث</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-between mt-5">
                                <button class="btn btn-primary btn-prev">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                </button>
                            </div>
                        </div> --}}

                        <div id="create-app-submit" class="content text-center" role="tabpanel"
                            aria-labelledby="create-app-submit-trigger">
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
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- <button type="button"  hidden id="type-success"></button>
    <button type="button"  hidden id="type-error"></button>
    <button type="button"  hidden id="type-warning"></button>
    <button type="button"  hidden id="type-info"></button> --}}
    <button type="button" hidden id="progress-bar"></button>
    {{-- <button type="button"  hidden id="clear-toast-btn"></button> --}}
</div>
<!-- / create app modal -->


@push('real-estates-scripts')
    <script>
        $(document).ready(function() {

            // City
            var city_name = $("#city-name");
            var city_code = $("#city-code");
            var city_submit = $("#city-submit");
            // Neighborhood
            var city_id = $("#city-id");
            var neighborhood_name = $("#neighborhood-name");
            var neighborhood_submit = $("#neighborhood-submit");
            // Property Type
            var select_property_type = $("#property-type-id");
            var property_type_name = $("#property-type-name");
            var property_type_submit = $("#property-type-submit");

            var property_status = $("#property-status");
            var property_status_name = $("#property-status-name");
            var property_status_submit = $("#property-status-submit");

            var offer_type = $("#offer-type");
            var offer_type_name = $("#offer-type-name");
            var offer_type_submit = $("#offer-type-submit");

            var price_type = $("#price-type");
            var price_type_name = $("#price-type-name");
            var price_type_submit = $("#price-type-submit");

            var direction = $("#direction");
            var direction_name = $("#direction-name");
            var direction_submit = $("#direction-submit");

            var street = $("#street");
            var street_name = $("#street-name");
            var street_submit = $("#street-submit");

            var land_type = $("#land-type");
            var land_type_name = $("#land-type-name");
            var land_type_submit = $("#land-type-submit");

            var licensed = $("#licensed");
            var licensed_name = $("#licensed-name");
            var licensed_submit = $("#licensed-submit");

            var licensed_land = $("#licensed");
            var land_type_space = $("#land-type-space");
            var price_peer_meter = $("#price-peer-meter");
            var land_notes = $("#land-notes");
            var land_submit = $("#land-submit");

            if (!city_name.val() || !city_code.val()) {
                city_submit.prop('disabled', true);
            }

            if (!land_type_space.val() || !price_peer_meter.val() || !land_notes.val()) {
                land_submit.prop('disabled', true);
            }

            if (!neighborhood_name.val()) {
                neighborhood_submit.prop('disabled', true);
            }

            if (!property_type_name.val()) {
                property_type_submit.prop('disabled', true);
            }

            if (!property_status_name.val()) {
                property_status_submit.prop('disabled', true);
            }

            if (!offer_type_name.val()) {
                offer_type_submit.prop('disabled', true);
            }

            if (!price_type_name.val()) {
                price_type_submit.prop('disabled', true);
            }

            if (!direction_name.val()) {
                direction_submit.prop('disabled', true);
            }

            if (!street_name.val()) {
                street_submit.prop('disabled', true);
            }

            if (!land_type_name.val()) {
                land_type_submit.prop('disabled', true);
            }

            if (!licensed_name.val()) {
                licensed_submit.prop('disabled', true);
            }

            $('.city').on('change', function() {

                if (city_name.val() && city_code.val()) {
                    city_submit.prop('disabled', false);
                }

                if (!city_name.val() || !city_code.val()) {
                    city_submit.prop('disabled', true);
                }

                if (land_type_space.val() || price_peer_meter.val() || land_notes.val()) {
                    land_submit.prop('disabled', false);
                }

                if (!land_type_space.val() || !price_peer_meter.val() || !land_notes.val()) {
                    land_submit.prop('disabled', true);
                }

                if (neighborhood_name.val()) {
                    neighborhood_submit.prop('disabled', false);
                }

                if (!neighborhood_name.val()) {
                    neighborhood_submit.prop('disabled', true);
                }

                if (property_type_name.val()) {
                    property_type_submit.prop('disabled', false);
                }

                if (!property_type_name.val()) {
                    property_type_submit.prop('disabled', true);
                }

                if (property_status_name.val()) {
                    property_status_submit.prop('disabled', false);
                }

                if (!property_status_name.val()) {
                    property_status_submit.prop('disabled', true);
                }

                if (offer_type_name.val()) {
                    offer_type_submit.prop('disabled', false);
                }

                if (!offer_type_name.val()) {
                    offer_type_submit.prop('disabled', true);
                }

                if (price_type_name.val()) {
                    price_type_submit.prop('disabled', false);
                }

                if (!price_type_name.val()) {
                    price_type_submit.prop('disabled', true);
                }

                if (direction_name.val()) {
                    direction_submit.prop('disabled', false);
                }

                if (!direction_name.val()) {
                    direction_submit.prop('disabled', true);
                }

                if (street_name.val()) {
                    street_submit.prop('disabled', false);
                }

                if (!street_name.val()) {
                    street_submit.prop('disabled', true);
                }

                if (land_type_name.val()) {
                    land_type_submit.prop('disabled', false);
                }

                if (!land_type_name.val()) {
                    land_type_submit.prop('disabled', true);
                }

                if (licensed_name.val()) {
                    licensed_submit.prop('disabled', false);
                }

                if (!licensed_name.val()) {
                    licensed_submit.prop('disabled', true);
                }
            });



            city_submit.click(function() {

                $.ajax({
                    url: "{{ route('admin.store.city') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        city_name: city_name.val(),
                        city_code: city_code.val(),
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        if (result.status) {
                            var select_city = $("#city-id");
                            select_city.empty();
                            result.cities.forEach(element => {
                                select_city.append(
                                    `<option value='${element.id}'>${element.name}</option>`
                                );
                            });

                            toastr.success(result.message, 'تمت المهمة!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: true
                            });
                        }
                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });

            neighborhood_submit.click(function() {
                $.ajax({
                    url: "{{ route('admin.store.neighborhood') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        city_id: city_id.val(),
                        neighborhood_name: neighborhood_name.val(),
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        if (result.status) {
                            console.log(result);

                            toastr.success(
                                result.message,
                                'تمت المهمة!', {
                                    closeButton: true,
                                    tapToDismiss: false,
                                    progressBar: true,
                                    rtl: true
                                }
                            );
                        }
                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });

            property_type_submit.click(function() {

                $.ajax({
                    url: "{{ route('admin.store.property.type') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        property_type_name: property_type_name.val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {

                        if (result.status) {
                            var select_property_type = $("#property-type-id");
                            select_property_type.empty();
                            result.property_types.forEach(element => {
                                select_property_type.append(
                                    `<option value='${element.id}'>${element.name}</option>`
                                );
                            });

                            toastr.success(result.message, 'تمت المهمة!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: true
                            });
                        }
                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });

            property_status_submit.click(function() {

                $.ajax({
                    url: "{{ route('admin.store.property.status') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        property_status_name: property_status_name.val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {

                        if (result.status) {
                            var select_property_status = $("#property-status");
                            select_property_status.empty();
                            result.property_statuses.forEach(element => {
                                select_property_status.append(
                                    `<option value='${element.id}'>${element.name}</option>`
                                );
                            });

                            toastr.success(result.message, 'تمت المهمة!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: true
                            });
                        }
                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });

            offer_type_submit.click(function() {

                $.ajax({
                    url: "{{ route('admin.store.offer.types') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        offer_type_name: offer_type_name.val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {

                        if (result.status) {
                            var offer_type = $("#offer-type");
                            offer_type.empty();
                            result.offer_types.forEach(element => {
                                offer_type.append(
                                    `<option value='${element.id}'>${element.name}</option>`
                                );
                            });

                            toastr.success(result.message, 'تمت المهمة!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: true
                            });
                        }
                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });

            price_type_submit.click(function() {

                $.ajax({
                    url: "{{ route('admin.store.price.types') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        price_type_name: price_type_name.val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {

                        if (result.status) {
                            var price_type = $("#price-type");
                            price_type.empty();
                            result.price_types.forEach(element => {
                                price_type.append(
                                    `<option value='${element.id}'>${element.name}</option>`
                                );
                            });

                            toastr.success(result.message, 'تمت المهمة!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: true
                            });
                        }
                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });

            direction_submit.click(function() {
                $.ajax({
                    url: "{{ route('admin.store.direction') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        direction_name: direction_name.val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {

                        if (result.status) {
                            var direction = $("#direction");
                            direction.empty();
                            result.directions.forEach(element => {
                                direction.append(
                                    `<option value='${element.id}'>${element.name}</option>`
                                );
                            });

                            toastr.success(result.message, 'تمت المهمة!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: true
                            });
                        }
                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });

            street_submit.click(function() {
                $.ajax({
                    url: "{{ route('admin.store.street') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        street_name: street_name.val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {

                        if (result.status) {
                            var street = $("#street");
                            street.empty();
                            result.streets.forEach(element => {
                                street.append(
                                    `<option value='${element.id}'>${element.name}</option>`
                                );
                            });

                            toastr.success(result.message, 'تمت المهمة!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: true
                            });
                        }
                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });

            land_type_submit.click(function() {
                $.ajax({
                    url: "{{ route('admin.store.land.type') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        land_type_name: land_type_name.val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {

                        if (result.status) {
                            var land_type = $("#land-type");
                            land_type.empty();
                            result.land_types.forEach(element => {
                                land_type.append(
                                    `<option value='${element.id}'>${element.name}</option>`
                                );
                            });

                            toastr.success(result.message, 'تمت المهمة!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: true
                            });
                        }
                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });

            licensed_submit.click(function() {
                $.ajax({
                    url: "{{ route('admin.store.licensed') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        licensed_name: licensed_name.val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {

                        if (result.status) {
                            var licensed = $("#licensed");
                            licensed.empty();
                            result.licenseds.forEach(element => {
                                licensed.append(
                                    `<option value='${element.id}'>${element.name}</option>`
                                );
                            });

                            toastr.success(result.message, 'تمت المهمة!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: true
                            });
                        }
                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });



            land_submit.click(function() {
                $.ajax({
                    url: "{{ route('admin.store.land') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        licensed_id: licensed_land.val(),
                        land_type_space: land_type_space.val(),
                        price_peer_meter: price_peer_meter.val(),
                        land_notes: land_notes.val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {

                        if (result.status) {
                            var licensed = $("#licensed");
                            licensed.empty();
                            result.licenseds.forEach(element => {
                                licensed.append(
                                    `<option value='${element.id}'>${element.name}</option>`
                                );
                            });

                            toastr.success(result.message, 'تمت المهمة!', {
                                closeButton: true,
                                tapToDismiss: false,
                                progressBar: true,
                                rtl: true
                            });
                        }
                    },
                    error: function(result) {
                        console.log(result.error);
                    }
                });
            });














        });
    </script>
@endpush
