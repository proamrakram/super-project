<div class="modal fade" id="editNeighborhood" tabindex="-1" aria-labelledby="editNewAddressTitle" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg" wire:ignore.self>
        <div class="modal-content" wire:ignore.self>
            <div class="modal-header bg-transparent" wire:ignore>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pb-5 px-sm-4 mx-50" wire:ignore.self>

                <h1 class="address-title text-center mb-1" id="editNewAddressTitle" wire:ignore.self>تعديل المدينة
                    {{ $neighborhood ? $neighborhood->name : null }} </h1>
                <p class="address-subtitle text-center mb-2 pb-75" wire:ignore.self></p>

                <form class="row gy-1 gx-2 form form-horizontal" id="addNewAddressForm" wire:ignore.self>

                    <div class="col-12 col-md-6">
                        <label class="form-label">اختيار المدينة</label>

                        <select class="select2 form-select" wire:model='city_id'>
                            @foreach (getCities() as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">اسم المدينة</label>
                        <input type="text" wire:model='neighborhood_name' class="form-control"
                            placeholder="مثال : QTF " />
                        @error('neighborhood_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-12 text-center mt-2 pt-50" wire:ignore.self>
                        <button type="button" class="btn btn-primary btn-submit me-1"
                            wire:click='editNeighborhood'>حفظ</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">الغاء </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
