<div class="row" wire:ignore.self>
    <div class="col-12" wire:ignore.self>
        <div class="card" wire:ignore.self>

            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">


                <div class="card-header border-bottom p-1">
                    <div class="head-label"></div>
                    <div class="dt-action-buttons text-end">
                        {{-- <div class="dt-buttons">
                            <button class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle me-2"
                                tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true"
                                aria-expanded="false">
                                <span>
                                    تصدير
                                </span>
                            </button>
                        </div> --}}
                    </div>
                </div>


                <div class="d-flex justify-content-between align-items-center mx-0 row">


                    <div class="col-sm-12 col-md-3">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length">
                                <label>أظهر
                                    <select aria-controls="DataTables_Table_0" wire:model='rows_number'
                                        class="form-select">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> مدخلات
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-9">
                        <div id="DataTables_Table_0_filter" class="dataTables_filter">

                            <label>حالة الوسيط:
                                <select wire:model='mediator_status' class="form-select"
                                    style="margin-left: .5em; display: inline-block; width: auto;">
                                    <option value="all" selected>الكل</option>
                                    <option value="1" selected>نشط</option>
                                    <option value="2" selected>غير نشط</option>
                                </select>
                            </label>

                            <label> نوع الوسيط:
                                <select wire:model='mediator_type' class="form-select"
                                    style="margin-left: .5em; display: inline-block; width: auto;">
                                    <option value="all" selected>الكل</option>
                                    <option value="individual">فرد</option>
                                    <option value="office">مكتب</option>
                                </select>
                            </label>

                            <label>ابحث:<input type="search" wire:model='search' class="form-control"
                                    placeholder="الاسم/الهاتف/الكود ID"></label>
                        </div>
                    </div>

                </div>


                <table class="table dataTable no-footer text-center" role="grid"
                    aria-describedby="DataTables_Table_0_info" wire:ignore.self>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>اسم الوسيط</th>
                            <th>رقم الجوال</th>
                            {{-- <th>كود الوسيط</th> --}}
                            <th>صفة الوسيط</th>
                            <th>الحالة</th>
                            <th>تحكم</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($mediators as $mediator)
                            <tr>
                                <td>{{ $mediator->id }}</td>
                                <td>{{ $mediator->name }}</td>
                                <td>{{ $mediator->phone_number }}</td>

                                <td>
                                    @if ($mediator->type == 'individual')
                                        فرد
                                    @else
                                        مكتب
                                    @endif
                                </td>

                                <td>
                                    @if ($mediator->status == 1)
                                        <span class="badge bg-success">نشط</span>
                                    @else
                                        <span class="badge bg-danger"> غير نشط</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-inline-flex">
                                        <a class="item-edit" data-bs-target="#EditMediatorForm"
                                            wire:click='callMediatorModal({{ $mediator->id }})' data-bs-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn item-edit"
                                            wire:click='changeMediatorStatus({{ $mediator->id }})'
                                            style="padding:0;color:#EA5455 ">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination Pages --}}
                <div class="d-flex justify-content-between mx-0 row" wire:ignore.self>
                    <div class="col-sm-12 col-md-6" wire:ignore.self>
                        <div class="dataTables_info" role="status" aria-live="polite" wire:ignore.self> إظهار
                            {{ $mediators->perPage() }} من اصل {{ $mediators->total() }}
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6" wire:ignore.self>
                        <div class="dataTables_paginate paging_simple_numbers" wire:ignore.self>
                            <ul class="pagination" wire:ignore.self>
                                {{ $mediators->withQueryString()->onEachSide(0)->links() }}
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
