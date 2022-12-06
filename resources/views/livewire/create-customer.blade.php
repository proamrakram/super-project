<div class="content-header-right  col-md-3 col-12 d-md-block d-none">

    <div class="mb-1 text-md-end breadcrumb-right">
        <a href="javascript:;" data-bs-target="#createAppModal" data-bs-toggle="modal" class="btn btn-primary">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus me-50 font-small-4">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>انشاء عميل جديد
            </span>
        </a>
    </div>


    <div class="modal fade" id="createAppModal" tabindex="-1" aria-labelledby="createAppTitle" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-3 px-sm-3">
                    <h1 class="text-center mb-1" id="createAppTitle">إنشاء حساب عميل</h1>
                    <p class="text-center mb-2"></p>
                    <div class="bs-stepper vertical wizard-modern create-app-wizard">


                        <div class="bs-stepper-header" role="tablist">

                            <div class="step" data-target="#create-app-details-main" role="tab"
                                id="create-app-details-trigger-main">
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
                                        <span
                                            class="bs-stepper-title @if ($errors->has('name') ||
                                                $errors->has('phone') ||
                                                $errors->has('email') ||
                                                $errors->has('identification_number')) text-danger @endif">

                                            معلومات العميل

                                        </span>

                                        <span class="bs-stepper-subtitle"></span>

                                    </span>
                                </button>
                            </div>


                            <div class="step" data-target="#create-app-frameworks-main" role="tab"
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

                            <div class="step" data-target="#create-app-database-main" role="tab"
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


                        <!-- content -->
                        <div class="bs-stepper-content shadow-none" wire:ignore.self>








                            <div id="create-app-details-main" class="content" role="tabpanel"
                                aria-labelledby="create-app-details-trigger-main" wire:ignore.self>

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
                                        <input type="tel" wire:model='phone' maxlength="10"
                                            class="form-control" placeholder="رقم الجوال" />
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
                                    <button class="btn btn-outline-secondary btn-prev" disabled>
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">التالي</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>

                            </div>


                            <div id="create-app-frameworks-main" class="content" role="tabpanel"
                                aria-labelledby="create-app-frameworks-trigger-main" wire:ignore.self>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">جهة العمل</label>
                                </div>

                                <div class="col-12 ">
                                    <input type="text" class="form-control" wire:model='employer_name'
                                        placeholder="جهة العمل" />
                                    @error('employer_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <label class="form-label">هل أنت موظف قطاع عام أم خاص ؟</label>

                                        <select class="form-control" wire:model='employee_type'>
                                            <option value="public" selected>عام</option>
                                            <option value="private">خاص</option>
                                        </select>

                                        @error('employee_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
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
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">التالي</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>

                            </div>






                            <div id="create-app-database-main" class="content" role="tabpanel"
                                aria-labelledby="create-app-database-trigger-main" wire:ignore.self>

                                <div class="col-12">
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

                                <div class="row">.</div>



                                <div class="row">
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


                                <div class="row">
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


                                <div class="row">
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
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </button>
                                    <button type="button" wire:click='store' id="customer-submit-button"
                                        class="btn btn-success ">
                                        <span class="align-middle d-sm-inline-block d-none">إرسال</span>
                                        <i data-feather="check" class="align-middle ms-sm-25 ms-0"></i>
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
