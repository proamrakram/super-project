<div class="modal fade" id="EditReservationForm" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="modal-header bg-transparent" wire:ignore.self>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50" wire:ignore.self>
                <div class="text-center mb-2" wire:ignore.self>
                    <h1 class="mb-1">تفاصيل الحجز</h1>
                </div>

                <form class="row gy-1 pt-75" wire:submit.prevent="update">
                    <div class="col-12 col-md-6" wire:ignore.self>
                        <label class="form-label">اسم العميل</label>
                        <input type="text" wire:model='customer_name' class="form-control"
                            placeholder="اسم العميل" />
                        @error('customer_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6" wire:ignore.self>
                        <label class="form-label">السعر</label>
                        <input type="text" class="form-control" wire:model='price' placeholder="السعر"
                            data-msg="برجاء ادخال السعر" />
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6" wire:ignore.self>
                        <label class="form-label" for="fp-range">التاريخ من</label>
                        <input type="date" wire:model='date_from' class="form-control" placeholder="YYYY-MM-DD" />
                        @error('date_from')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6" wire:ignore.self>
                        <label class="form-label" for="fp-range">التاريخ الى</label>
                        <input type="date" wire:model='date_to' class="form-control" placeholder="YYYY-MM-DD" />
                        @error('date_to')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12 col-md-6" wire:ignore.self>
                        <label class="form-label">ملاحظات:</label>
                        <textarea class="form-control" wire:model='note' rows="3" placeholder="ملاحظات"></textarea>
                        @error('note')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 text-center mt-2 pt-50" wire:ignore.self>
                        <button type="submit" class="btn btn-primary btn-submit me-1">حفظ</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
