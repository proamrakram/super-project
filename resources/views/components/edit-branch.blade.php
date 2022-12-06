<div class="d-inline-flex" wire:click='openModel({{ $branch->id }})'>
    <a class="item-edit active" data-bs-target="#editBranch{{ $branch->id }}" data-bs-toggle="modal">
        <i class="fas fa-edit"></i>
    </a>
</div>

<div class="modal fade" id="editBranch{{ $branch->id }}" tabindex="-1" aria-labelledby="addNewAddressTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-4 mx-50">
                <h1 class="address-title text-center mb-1" id="addNewAddressTitle">إضافة فرع
                </h1>
                <p class="address-subtitle text-center mb-2 pb-75"></p>

                <form class="row gy-1 gx-2">

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="name">اسم الفرع</label>
                        <input type="text" id="name" wire:model='name' value="{{ $branch->name }}"
                            class="form-control" placeholder="اسم الفرع" />
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="code">كود الفرع</label>
                        <input type="" id="code" wire:model='code' value="{{ $branch->code }}"
                            class="form-control" placeholder="مثال : QTF " />
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="city_id">المدينة</label>
                        <select id="city_id" wire:model='city_id' class="select2 form-select">
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" @if ($branch->city_id == $city->id) selected @endif>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="button" wire:click="update($branch->id)" class="btn btn-primary btn-submit me-1"
                            id="type-success">حفظ</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">الغاء </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
