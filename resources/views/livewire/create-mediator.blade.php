<div class="content-header-right col-md-3 col-12 d-md-block d-none" wire:ignore.self>


    <div class="mb-1 text-md-end breadcrumb-right" wire:ignore.self>
        <a data-bs-target="#CreateMediatorForm" data-bs-toggle="modal" class="btn btn-primary" wire:ignore.self>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus me-50 font-small-4">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>إضافة وسيط
            </span>
        </a>
    </div>

    <div class="modal fade" id="CreateMediatorForm" tabindex="-1" aria-labelledby="CreateMediatorFormTitle"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg" wire:ignore.self>
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header bg-transparent" wire:ignore.self>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-4 mx-50" wire:ignore.self>
                    <h1 class="address-title text-center mb-1" id="CreateMediatorFormTitle" wire:ignore.self>إضافة وسيط
                    </h1>
                    <p class="address-subtitle text-center mb-2 pb-75"></p>

                    <form id="addNewAddressForm" class="row gy-1 gx-2" wire:ignore.self>


                        <div class="col-12 col-md-6" wire:ignore.self>
                            <label class="form-label">اسم الوسيط</label>
                            <input type="text" wire:model='name' class="form-control" placeholder="اسم الوسيط" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{--
                        <div class="col-12 col-md-6" wire:ignore.self>
                            <label class="form-label">كود الوسيط</label>
                            <input type="text" wire:model='code' disabled class="form-control"
                                placeholder="example: 1011" />
                            @error('code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}


                        <div class="col-12 col-md-6" wire:ignore.self>
                            <label class="form-label">رقم الجوال</label>
                            <input type="tel" wire:model='phone_number' maxlength="10" class="form-control"
                                placeholder="رقم الجوال" />
                            @error('phone_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-12 col-md-6" wire:ignore.self>
                            <label class="form-label">صفة الوسيط</label>
                            <select wire:model='type' class="form-select">
                                <option value="office">مكتب</option>
                                <option value="individual">فرد</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-12 text-center mt-2 pt-50" wire:ignore.self>
                            <button type="button" class="btn btn-primary btn-submit me-1"
                                wire:click='store'>حفظ</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">الغاء</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
