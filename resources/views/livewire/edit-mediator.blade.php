<div class="modal fade" id="EditMediatorForm" tabindex="-1" aria-labelledby="EditMediatorFormTitle" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="modal-header bg-transparent" wire:ignore.self>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-4 mx-50" wire:ignore.self>
                <h1 class="address-title text-center mb-1" id="EditMediatorFormTitle" wire:ignore.self>إضافة وسيط</h1>
                <p class="address-subtitle text-center mb-2 pb-75"></p>

                <form class="row gy-1 gx-2" wire:ignore.self>

                    <div class="col-12 col-md-6" wire:ignore.self>
                        <label class="form-label">اسم الوسيط</label>
                        <input type="text" wire:model='name' class="form-control" placeholder="اسم الوسيط" />
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12 col-md-6" wire:ignore.self>
                        <label class="form-label">كود الوسيط</label>
                        <div>
                            <label class="form-label">{{ $code }}</label>
                        </div>
                        {{-- <input type="text" wire:model='code' disabled class="form-control"
                            placeholder="{{ $code }} : Almadar" /> --}}
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12 col-md-6" wire:ignore.self>
                        <label class="form-label">رقم الجوال</label>
                        <input type="tel" wire:model='phone_number' class="form-control" placeholder="رقم الجوال" />
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
                        <button type="button" class="btn btn-primary me-1" wire:click='update'>حفظ</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">الغاء</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
