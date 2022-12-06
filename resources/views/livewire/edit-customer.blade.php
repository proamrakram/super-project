<div class="modal fade" id="editCustomerForms" tabindex="-1" aria-labelledby="titleForms" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="modal-header bg-transparent" wire:ignore>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pb-3 px-sm-3" wire:ignore.self>
                <h1 class="text-center mb-1" id="titleForms">تحديث حساب العميل {{ $name }}</h1>
                <p class="text-center mb-2"></p>
                <div class="bs-stepper vertical wizard-modern create-app-wizard" wire:ignore.self>
                    <div class="bs-stepper-header" role="tablist" wire:ignore.self>

                        <div class="step {{ $basic_active }}" wire:click="step('basic_active')"
                            data-target="#create-app-details-main" role="tab" id="edit-customers">
                            <button type="button" class="step-trigger py-75">
                                <span
                                    class="bs-stepper-box
                                @if ($errors->has('name') ||
                                    $errors->has('phone') ||
                                    $errors->has('email') ||
                                    $errors->has('identification_number')) bg-danger @endif
                                    ">
                                    <span wire:ignore>
                                        <i data-feather="info" class="font-medium-3"></i>
                                    </span>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title @if ($errors->has('name') ||
                                        $errors->has('phone') ||
                                        $errors->has('email') ||
                                        $errors->has('identification_number')) text-danger @endif">

                                        معلومات العميل

                                    </span>

                                    <span class="bs-stepper-subtitle"></span>

                                </span>
                            </button>
                        </div>


                        <div class="step {{ $work_active }}" wire:click="step('work_active')"
                            data-target="#create-app-frameworks-main" role="tab"
                            id="create-app-frameworks-trigger-main">
                            <button type="button" class="step-trigger py-75">
                                <span
                                    class="bs-stepper-box
                                @if ($errors->has('employee_type') || $errors->has('employer_name') || $errors->has('is_support')) bg-danger @endif
                                ">
                                    <span wire:ignore>
                                        <i data-feather="file-text" class="font-medium-3"></i>
                                    </span>
                                </span>
                                <span class="bs-stepper-label">
                                    <span
                                        class="bs-stepper-title  @if ($errors->has('employee_type') || $errors->has('employer_name') || $errors->has('is_support')) text-danger @endif ">معلومات
                                        جهة
                                        العمل</span>
                                    <span class="bs-stepper-subtitle"></span>
                                </span>
                            </button>
                        </div>

                        <div class="step {{ $eskan_active }}" wire:click="step('eskan_active')"
                            data-target="#create-app-database-main" role="tab"
                            id="create-app-database-trigger-main">
                            <button type="button" class="step-trigger py-75">
                                <span
                                    class="bs-stepper-box
                                    @if ($errors->has('city_id') ||
                                        $errors->has('building_number') ||
                                        $errors->has('street_name') ||
                                        $errors->has('neighborhood_name') ||
                                        $errors->has('zip_code') ||
                                        $errors->has('additional_number') ||
                                        $errors->has('unit_number')) bg-danger @endif
                                    ">
                                    <span wire:ignore>
                                        <i data-feather="home" class="font-medium-3"></i>
                                    </span>
                                </span>
                                <span class="bs-stepper-label">
                                    <span
                                        class="bs-stepper-title
                                    @if ($errors->has('city_id') ||
                                        $errors->has('building_number') ||
                                        $errors->has('street_name') ||
                                        $errors->has('neighborhood_name') ||
                                        $errors->has('zip_code') ||
                                        $errors->has('additional_number') ||
                                        $errors->has('unit_number')) text-danger @endif

                                    ">العنوان
                                        الوطني</span>
                                    <span class="bs-stepper-subtitle"></span>
                                </span>
                            </button>
                        </div>

                    </div>


                    <div class="bs-stepper-content shadow-none" wire:ignore.self>

                        <div id="create-app-details-main" role="tabpanel" aria-labelledby="edit-customers"
                            wire:ignore.self>

                            @if ($basic_active)
                                <div class="col-12 col-md-6">
                                    <label class="form-label">معلومات العميل</label>
                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-1">
                                        <label class="form-label">الاسم</label>
                                        <input type="text" wire:model='name' class="form-control"
                                            placeholder="الاسم" />
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-6 mb-1">
                                        <label class="form-label">رقم الجوال</label>
                                        <input type="tel" wire:model='phone' class="form-control"
                                            placeholder="رقم الجوال" />
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12 col-md-6 mb-1">
                                        <label class="form-label">البريد الالكترونى</label>
                                        <input type="email" wire:model='email' class="form-control "
                                            placeholder="البريد الالكترونى" />
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label">رقم الهوية</label>
                                        <input type="number" class="form-control" wire:model='identification_number'
                                            placeholder="رقم الهوية" />
                                        @error('identification_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6 mb-1">
                                        <label class="form-label">حالة العميل</label>

                                        <select class="form-control" wire:model='status'>
                                            <option value="1">نشط</option>
                                            <option value="2">غير نشط</option>
                                        </select>

                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <button class="btn btn-primary btn-next" wire:click="step('work_active')">
                                        <span class="align-middle d-sm-inline-block d-none">التالي</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            @endif

                            @if ($work_active)
                                <div class="col-12 col-md-6 ">
                                    <label class="form-label">جهة العمل</label>
                                </div>

                                <div class="col-12 mb-2">
                                    <input type="text" class="form-control" wire:model='employer_name'
                                        placeholder="جهة العمل" />
                                    @error('employer_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-12 ">
                                        <label class="form-label">هل أنت موظف قطاع عام أم خاص ؟</label>

                                        <select class="form-control" wire:model='employee_type'>
                                            <option value="public">عام</option>
                                            <option value="private">خاص</option>
                                        </select>

                                        @error('employee_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-12 mb-1">
                                        <label class="form-label">هل أنت مؤهل للحصول على دعم وزارة
                                            الاسكان ؟</label>
                                        <select class="form-control" wire:model='is_support'>
                                            <option value="1">نعم</option>
                                            <option value="0">لا</option>
                                        </select>
                                        @error('is_support')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <button class="btn btn-primary btn-prev" wire:click="step('basic_active')">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </button>
                                    <button class="btn btn-primary btn-next" wire:click="step('eskan_active')">
                                        <span class="align-middle d-sm-inline-block d-none">التالي</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            @endif

                            @if ($eskan_active)

                                <div class="col-12 mb-2">
                                    <label class="form-label" for="city-id">المدينة</label>
                                    <select wire:model='city_id' class="select2 form-select">
                                        <option value="">اختيار المدينة</option>
                                        @foreach (getCities() as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="building-number-id">رقم
                                            المبنى</label>
                                        <input type="number" wire:model='building_number' class="form-control"
                                            placeholder="رقم المبنى" />
                                        @error('building_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="street-name-id">اسم
                                            الشارع</label>
                                        <input type="text" wire:model='street_name' class="form-control"
                                            placeholder="اسم الشارع" />
                                        @error('street_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-2">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="neighborhood-name-id">اسم
                                            الحي</label>
                                        <input type="text" wire:model='neighborhood_name' class="form-control"
                                            placeholder="اسم الحي" />

                                        @error('neighborhood_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="zip-code-id">الرمز
                                            البريدي</label>
                                        <input type="number" wire:model='zip_code' class="form-control"
                                            placeholder="الرمز البريدي" />
                                        @error('zip_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-2">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="additional-number-id">الرقم
                                            الإضافي</label>
                                        <input type="number" wire:model='additional_number' class="form-control"
                                            placeholder="الرقم الاضافي" />
                                        @error('additional_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label">رقم
                                            الوحدة</label>
                                        <input type="number" wire:model='unit_number' class="form-control"
                                            placeholder="رقم الوحدة" />
                                        @error('unit_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <button class="btn btn-primary btn-prev" wire:click="step('work_active')">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </button>
                                    <button type="button" wire:click='updateCustomer' id="customer-submit-button"
                                        class="btn btn-success ">
                                        <span class="align-middle d-sm-inline-block d-none">إرسال</span>
                                        <i data-feather="check" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
