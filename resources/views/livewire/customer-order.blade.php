<div class="vertical-wizard">
    <div class="bs-stepper vertical vertical-wizard-example">
        <div class="bs-stepper-header">

            <div class="step {{ $first }}" data-target="#account-details-vertical" role="tab"
                id="account-details-vertical-trigger">
                <button type="button" class="step-trigger" wire:click="sequencing('first')">
                    <span
                        class="bs-stepper-box
                    @if ($errors->has('customer_name') ||
                        $errors->has('customer_phone') ||
                        $errors->has('street_name') ||
                        $errors->has('employer_name') ||
                        $errors->has('employee_type') ||
                        $errors->has('additional_number') ||
                        $errors->has('order_status_id') ||
                        $errors->has('support_eskan')) bg-danger @endif
                    ">1</span>
                    <span class="bs-stepper-label">

                        <span class="bs-stepper-title @if ($errors->has('customer_name') ||
                            $errors->has('customer_phone') ||
                            $errors->has('street_name') ||
                            $errors->has('employer_name') ||
                            $errors->has('employee_type') ||
                            $errors->has('additional_number') ||
                            $errors->has('order_status_id') ||
                            $errors->has('support_eskan')) text-danger @endif ">بيانات
                            العميل</span>
                        <span class="bs-stepper-subtitle">ادخل الحقول في القسم</span>

                    </span>
                </button>
            </div>

            <div class="step {{ $second }}" data-target="#personal-info-vertical" role="tab"
                id="personal-info-vertical-trigger">
                <button type="button" class="step-trigger" wire:click="sequencing('second')">
                    <span
                        class="bs-stepper-box
                        @if ($errors->has('property_type_id') ||
                            $errors->has('city_id') ||
                            $errors->has('branch_id') ||
                            $errors->has('area') ||
                            $errors->has('price_from') ||
                            $errors->has('price_to') ||
                            $errors->has('desire_to_buy_id') ||
                            $errors->has('purch_method_id') ||
                            $errors->has('avaliable_amount')) bg-danger @endif">2</span>

                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title

                            @if ($errors->has('property_type_id') ||
                                $errors->has('city_id') ||
                                $errors->has('branch_id') ||
                                $errors->has('area') ||
                                $errors->has('price_from') ||
                                $errors->has('price_to') ||
                                $errors->has('desire_to_buy_id') ||
                                $errors->has('purch_method_id') ||
                                $errors->has('avaliable_amount')) text-danger @endif ">معلومات
                            العقار</span>

                        <span class="bs-stepper-subtitle">ادخل معلومات العقار الخاصة بك</span>
                    </span>
                </button>
            </div>

            <div class="step {{ $third }}" data-target="#address-step-vertical" role="tab"
                id="address-step-vertical-trigger">
                <button type="button" class="step-trigger" wire:click="sequencing('third')">
                    <span class="bs-stepper-box">3</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">الملاحظات</span>
                        <span class="bs-stepper-subtitle">ادخل ملاحظاتك ان وجد</span>
                    </span>
                </button>
            </div>

        </div>


        <div class="bs-stepper-content">
            <div id="account-details-vertical" role="tabpanel" aria-labelledby="account-details-vertical-trigger">


                @if ($first)
                    <div class="content-header">
                        <h5 class="mb-0">بيانات العميل</h5>
                        <small class="text-muted">ادخل البيانات المطلوبة في هذا القسم</small>
                    </div>


                    <div class="row">
                        <div class="mb-1 col-md-6">
                            <label class="form-label">الاسم</label>
                            <input type="text" class="form-control" wire:model='customer_name' placeholder="الاسم" />
                            @error('customer_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-1 col-md-6">
                            <label class="form-label">رقم الجوال</label>
                            <input type="tel" class="form-control" maxlength="10" wire:model='customer_phone'
                                placeholder="رقم الجوال" />
                            @error('customer_phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-md-6">
                            <label class="form-label">جهة العمل</label>
                            <input type="text" class="form-control" wire:model='employer_name'
                                placeholder="جهة العمل" />
                            @error('employer_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-1 col-md-6">
                            <label class="form-label">هل أنت موظف قطاع عام أم قطاع خاص ؟</label>
                            <select class="form-select" wire:model='employee_type'>
                                <option value="public" selected>عام</option>
                                <option value="private">خاص</option>
                            </select>
                            @error('employee_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-md-6">
                            <label class="form-label">هل أنت مؤهل للحصول على دعم وزارة الاسكان ؟</label>
                            <select class="form-select" wire:model='support_eskan'>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            </select>
                            @error('support_eskan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>

                    <div class="d-flex justify-content-between">

                        <button class="btn btn-primary btn-next" disabled>
                            <span class="align-middle d-sm-inline-block d-none">السابق</span>
                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                        </button>

                        <button class="btn btn-primary btn-next" wire:click="sequencing('second')">
                            <span class="align-middle d-sm-inline-block d-none">التالي</span>
                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                        </button>

                    </div>
                @endif

                @if ($second)

                    <div class="content-header">
                        <h5 class="mb-0">معلومات العقار</h5>
                        <small class="text-muted">ادخل معلومات العقار الخاص بك</small>
                    </div>

                    <div class="col-12 mb-1">
                        <label class="form-label">نوع العقار</label>
                        <select wire:model='property_type_id' class="select2 form-select">
                            @foreach (getPropertyTypes() as $property_type)
                                <option value="{{ $property_type->id }}">{{ $property_type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('property_type_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 mb-1">
                        <label class="form-label">المدينة</label>
                        <select wire:model='city_id' class="select2 form-select">
                            @foreach (getCities() as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 mb-1">
                        <label class="form-label">الفرع</label>
                        <select wire:model='branch_id' class="select2 form-select">
                            @foreach (getBranches() as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        @error('branch_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 mb-1">
                        <label class="form-label">المساحة</label>
                        <input type="text" class="form-control" wire:model='area' placeholder="المساحة" />
                        @error('area')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row mb-1">
                        <div class="col-12 col-md-6">
                            <label class="form-label">السعر من</label>
                            <input type="text" class="form-control" wire:model='price_from'
                                placeholder="السعر من" />
                            @error('price_from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">السعر الى</label>
                            <input type="text" class="form-control" wire:model='price_to'
                                placeholder="السعر إلى" />
                            @error('price_to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-12 col-md-6">
                            <label class="form-label">متى ترغب في الشراء</label>
                            <select class="select2 form-select" wire:model="desire_to_buy_id">
                                @foreach (getDesireToBuys() as $desire_to_buy)
                                    <option value="{{ $desire_to_buy->id }}">
                                        {{ $desire_to_buy->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('desire_to_buy_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">كيفية الشراء</label>
                            <select class="select2 form-select" wire:model='purch_method_id'>
                                @foreach (getPurchaseMethods() as $getPurchaseMethod)
                                    <option value="{{ $getPurchaseMethod->id }}">
                                        {{ $getPurchaseMethod->name }}</option>
                                @endforeach
                            </select>
                            @error('purch_method_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="col-12 mb-1">
                        <label class="form-label">المبلغ المتوفر</label>
                        <input type="text" class="form-control" wire:model='avaliable_amount'
                            placeholder="المبلغ المتوفر" />
                        @error('avaliable_amount')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <button class="btn btn-primary btn-prev" wire:click="sequencing('first')">
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">السابق</span>
                        </button>
                        <button class="btn btn-primary btn-next" wire:click="sequencing('third')">
                            <span class="align-middle d-sm-inline-block d-none">التالي</span>
                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                        </button>
                    </div>

                @endif

                @if ($third)
                    <div class="content-header">
                        <h5 class="mb-0">الملاحظات</h5>
                        <small class="text-muted">ادخل اي ملاحظات على العقار</small>
                    </div>

                    <div class="col-12 mb-1">
                        <label class="form-label">ملاحظات عامة:</label>
                        <textarea class="form-control" wire:model='notes' rows="3" placeholder="ملاحظات"></textarea>
                        @error('notes')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col-md-6"></div>
                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <button class="btn btn-primary btn-prev" wire:click="sequencing('second')">
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">السابق</span>
                        </button>
                        <button wire:click='store' class="btn btn-success btn-next" wire:click="save">
                            <span class="align-middle d-sm-inline-block d-none">حفظ</span>
                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                        </button>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
