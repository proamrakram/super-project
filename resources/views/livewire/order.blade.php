<div>

    <section class="app-user-list">
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        {{-- Navbar Sections --}}
                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist" wire:ignore>

                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab-fill" data-bs-toggle="tab" href="#home-fill"
                                    role="tab" aria-controls="home-fill" aria-selected="true">طلبات مضافة من
                                    قبلي</a>
                            </li>


                            {{-- <li class="nav-item">
                                <a class="nav-link" id="home2-tab-fill" data-bs-toggle="tab" href="#home2-fill"
                                    role="tab" aria-controls="home2-fill" aria-selected="false">طلبات تم
                                    إسنادها إلي</a>
                            </li> --}}
                        </ul>
                        {{-- Navbar Sections --}}

                        <div class="tab-content pt-1">


                            <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill"
                                wire:ignore.self>
                                <div class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    {{-- Export Section --}}
                                    <div class="card-header border-bottom p-1">
                                        <div class="head-label"></div>
                                        <div class="dt-action-buttons text-end">
                                            {{-- <div class="dt-buttons">
                                                <button
                                                    class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle me-2"
                                                    tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <span><i data-feather='share'></i>تصدير </span>
                                                </button>
                                            </div> --}}
                                        </div>
                                    </div>
                                    {{-- Export Section --}}

                                    <div class="d-flex justify-content-between align-items-center mx-0 row">

                                        {{-- Number of Rows Sections --}}
                                        <div class="col-sm-12 col-md-3">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length">
                                                    <label>أظهر
                                                        <select wire:model='rows_number' class="form-select">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> مدخلات
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Search Sections --}}
                                        <div class="col-sm-12 col-md-9">
                                            <div class="dataTables_filter">
                                                <label>حالة الطلب:
                                                    <select wire:model='order_status_id' class="form-select"
                                                        style="margin-left: .5em; display: inline-block; width: auto; ">
                                                        <option value="all" selected>الكل</option>
                                                        @foreach (getOrderStatuses() as $order_status)
                                                            <option value="{{ $order_status->id }}">
                                                                {{ $order_status->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </label>

                                                <label>نوع العقار:
                                                    <select wire:model='property_type_id' class="form-select"
                                                        style="margin-left: .5em; display: inline-block; width: auto; ">
                                                        <option value="all" selected>الكل</option>
                                                        @foreach (getPropertyTypes() as $property_type)
                                                            <option value="{{ $property_type->id }}">
                                                                {{ $property_type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                                <label>الفرع:
                                                    <select wire:model='branch_type_id' class="form-select"
                                                        style="margin-left: .5em; display: inline-block; width: auto; ">
                                                        <option value="all" selected>الكل</option>
                                                        @foreach (getBranches() as $branch)
                                                            <option value="{{ $branch->id }}">{{ $branch->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </label>

                                                <label>المدينة:
                                                    <select wire:model='city_id' class="form-select" style="margin-left: .5em; display: inline-block; width: auto;">
                                                        <option value="all" selected>الكل</option>
                                                        @foreach (getCities() as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </label>

                                                <label>ابحث:<input type="search" wire:model='search'
                                                        class="form-control"
                                                        placeholder="رقم الجوال/ رقم الطلب"></label>

                                                <label>التاريخ من:
                                                    <input type="date" wire:change='dateFrom' wire:model='date_from'
                                                        class="form-control">
                                                </label>

                                                <label>التاريخ الى:
                                                    <input type="date" wire:change='dateTo' wire:model='date_to'
                                                        class="form-control">
                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <table class="table dataTable no-footer center text-center" role="grid">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting {{ $style_sort_direction }}"
                                                    wire:click="sortBy('id')" tabindex="0"
                                                    rowspan="1"colspan="1">كود الطلب </th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">
                                                    التاريخ
                                                </th>
                                                <th class="sorting {{ $style_sort_direction }}"
                                                    wire:click="sortBy('property_type_id')" tabindex="0"
                                                    rowspan="1" colspan="1">نوع العقار</th>
                                                <th class="sorting {{ $style_sort_direction }}"
                                                    wire:click="sortBy('city_id')" tabindex="0" rowspan="1"
                                                    colspan="1">المدينة </th>
                                                <th class="sorting {{ $style_sort_direction }}"
                                                    wire:click="sortBy('customer_id')" tabindex="0" rowspan="1"
                                                    colspan="1">اسم العميل</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">
                                                    الميزانية</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">
                                                    الحالة
                                                </th>

                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">
                                                    الطلب
                                                    مسند ل
                                                </th>

                                                <th class="sorting {{ $style_sort_direction }}"
                                                    wire:click="sortBy('branch_id')" tabindex="0" rowspan="1"
                                                    colspan="1">الفرع
                                                </th>
                                                @auth
                                                    @if (auth()->user()->permissions->can_show_orders == 1 ||
                                                        auth()->user()->permissions->can_edit_orders == 1 ||
                                                        auth()->user()->permissions->can_cancel_orders == 1)
                                                        <th class="sorting" tabindex="0" rowspan="1"
                                                            colspan="1">
                                                            تحكم
                                                        </th>
                                                    @endif
                                                @endauth
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($orders as $order)
                                                <tr class="odd">

                                                    <td class="sorting_1">{{ $order->order_code }}</td>
                                                    <td> {{ $order->created_at->format('Y-m-d') }} </td>

                                                    <td>
                                                        @if ($order->property_type_id == 1)
                                                            <span class="badge bg-primary">
                                                                {{ getPropertyTypeName($order->property_type_id) }}
                                                            </span>
                                                        @endif

                                                        @if ($order->property_type_id == 2)
                                                            <span class="badge bg-warning">
                                                                {{ getPropertyTypeName($order->property_type_id) }}
                                                            </span>
                                                        @endif

                                                        @if ($order->property_type_id == 3)
                                                            <span class="badge bg-danger">
                                                                {{ getPropertyTypeName($order->property_type_id) }}
                                                            </span>
                                                        @endif


                                                        @if ($order->property_type_id == 4)
                                                            <span class="badge bg-dark">
                                                                {{ getPropertyTypeName($order->property_type_id) }}
                                                            </span>
                                                        @endif

                                                        @if ($order->property_type_id == 5)
                                                            <span class="badge bg-success">
                                                                {{ getPropertyTypeName($order->property_type_id) }}
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <span class="badge bg-dark">
                                                            {{ getCityName($order->city_id) }}
                                                        </span>
                                                    </td>

                                                    <td>{{ getCustomerName($order->customer_id) }}</td>
                                                    <td>{{ number_format($order->price_from) }} -
                                                        {{ number_format($order->price_to) }}
                                                    </td>


                                                    <td>
                                                        @if ($order->order_status_id == 1)
                                                            <span class="badge bg-warning">
                                                                {{ getOrderStatusName($order->order_status_id) }}
                                                            </span>
                                                        @endif

                                                        @if ($order->order_status_id == 2)
                                                            <span class="badge bg-success">
                                                                {{ getOrderStatusName($order->order_status_id) }}
                                                            </span>
                                                        @endif

                                                        @if ($order->order_status_id == 3)
                                                            <span class="badge bg-danger">
                                                                {{ getOrderStatusName($order->order_status_id) }}
                                                            </span>
                                                        @endif


                                                        @if ($order->order_status_id == 4)
                                                            <span class="badge bg-dark">
                                                                {{ getOrderStatusName($order->order_status_id) }}
                                                            </span>
                                                        @endif

                                                        @if ($order->order_status_id == 5)
                                                            <span class="badge bg-warning">
                                                                {{ getOrderStatusName($order->order_status_id) }}
                                                            </span>
                                                        @endif


                                                        @if ($order->order_status_id == 6)
                                                            <span class="badge bg-warning">
                                                                {{ getOrderStatusName($order->order_status_id) }}
                                                            </span>
                                                        @endif
                                                    </td>

                                                    @if (whoType($order->who_add) == 'marketer')
                                                        <td>
                                                            <strong class="fs-4">--</strong>
                                                        </td>
                                                    @else
                                                        @if (getUserName($order->assign_to))
                                                            <td>
                                                                USR{{ $order->assign_to }}
                                                            </td>
                                                        @else
                                                            <td>
                                                                <span class="badge bg-danger">
                                                                    غير مسند
                                                                </span>
                                                            </td>
                                                        @endif
                                                    @endif

                                                    <td>
                                                        <span class="badge bg-primary">
                                                            {{ getBranchName($order->branch_id) }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <div class="d-inline-flex">


                                                            @auth
                                                                @if (auth()->user()->permissions->can_show_orders == 1)
                                                                    <a href="{{ route('panel.order', $order->id) }}"
                                                                        class="item-view">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                @endif

                                                                @if (auth()->user()->permissions->can_edit_orders == 1)
                                                                    <a class="item-edit" data-bs-target="#editOrderForms"
                                                                        data-bs-toggle="modal"
                                                                        wire:click='callOrderModal({{ $order->id }})'>
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                @endif

                                                                @if (auth()->user()->permissions->can_cancel_orders == 1)
                                                                    <a class="btn item-edit"
                                                                        wire:click='closeOrder({{ $order->id }})'
                                                                        style="padding:0;color:#EA5455 ">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </a>
                                                                @endif

                                                            @endauth

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    {{-- Pagination Pages --}}
                                    <div class="d-flex justify-content-between mx-0 row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_info" role="status" aria-live="polite"> إظهار
                                                {{ $orders->perPage() }} من اصل {{ $orders->total() }}
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="DataTables_Table_0_paginate">
                                                <ul class="pagination">
                                                    {{ $orders->withQueryString()->onEachSide(0)->links() }}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
