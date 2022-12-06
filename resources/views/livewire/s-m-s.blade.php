<div class="row">
    <div class="col-12">
        <div class="card">

            {{-- Navbar Sections --}}
            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist" wire:ignore>

                @if (auth()->user()->permissions->can_send_sms_collection == 1)
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab-fill" data-bs-toggle="tab" href="#home-fill" role="tab"
                            aria-controls="home-fill" aria-selected="true">إرسالة رسالة جماعية</a>
                    </li>
                @endif
                @if (auth()->user()->permissions->can_send_sms_individually == 1)
                    <li class="nav-item">
                        <a class="nav-link" id="home2-tab-fill" data-bs-toggle="tab" href="#home2-fill" role="tab"
                            aria-controls="home2-fill" aria-selected="false">إرسال رسالة فردية</a>
                    </li>
                @endif

            </ul>
            {{-- Navbar Sections --}}


            <div class="tab-content pt-1">


                {{-- Collection SMS Messages --}}
                @if (auth()->user()->permissions->can_send_sms_collection == 1)
                    <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill"
                        wire:ignore.self>
                        <div class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="d-flex justify-content-between align-items-center mx-0 row">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h2>إرسال الرسالة</h2>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center pt-2 clear">

                                        <div class="col-md-4">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model='all_customers' />
                                            <label class="form-check-label">العملاء</label>
                                        </div>

                                        <div class="col-md-4">
                                            <input class="form-check-input" type="checkbox" wire:model='all_officers' />
                                            <label class="form-check-label">المكاتب</label>
                                        </div>

                                        <div class="col-md-4">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model='all_marketers' />
                                            <label class="form-check-label">المسوقين</label>
                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="d-flex justify-content-center pt-2 clear">
                                            <textarea id="txtarea" class="form-control" wire:model='message' rows="3" placeholder="محتوى الرسالة"></textarea>
                                        </div>

                                    </div>

                                    {{-- <div class="row">

                                        <div class="col-2">
                                            <h5 id="count">0/255</h5>
                                        </div>

                                        <div class="col-2">
                                            <h5 id="countSMS">عدد الرسائل : 0</h5>
                                        </div>

                                    </div> --}}


                                    <div class="info-container">

                                        <div class="d-flex justify-content-center pt-2 clear">
                                            <button class="btn btn-success me-1" wire:click='sendAll'>
                                                إرسال الرسالة
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @endif

                {{-- Indivdually SMS Messages --}}

                @if (auth()->user()->permissions->can_send_sms_individually == 1)

                    <div class="tab-pane " id="home2-fill" role="tabpanel" aria-labelledby="home2-tab-fill"
                        wire:ignore.self>
                        <div class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="d-flex justify-content-between align-items-center mx-0 row">

                                <div class="col-sm-12 col-md-3">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length">
                                            <label>أظهر
                                                <select class="form-select" wire:model='rows_number'>
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
                                        <label>ابحث:<input type="search" class="form-control" wire:model='search'
                                                placeholder="الاسم / رقم الجوال"></label>
                                        <a class="btn btn-sm btn-success" wire:click='send'>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-plus me-50 font-small-4">
                                                    <line x1="12" y1="5" x2="12" y2="19">
                                                    </line>
                                                    <line x1="5" y1="12" x2="19"
                                                        y2="12">
                                                    </line>
                                                </svg>ارسال الرسالة للاشخاص المحددين
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="d-flex justify-content-center pt-2 clear">
                                    <h4 class="btn btn-success">محتوى الرسالة</h4>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="d-flex justify-content-center pt-2 clear">
                                    <textarea id="txtarea" class="form-control" wire:model='indv_message' rows="3" placeholder="محتوى الرسالة"></textarea>
                                </div>
                            </div>

                            <table class="table dataTable no-footer text-center" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>
                                            <input type="checkbox" class="form-check-input" wire:model='select_all'>
                                        </th>
                                        <th>الاسم</th>
                                        <th>رقم الجوال</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr class="odd">

                                            <td wire:ignore.self>
                                                <span class="form-check-success" wire:ignore.self>
                                                    <input type="checkbox" class="form-check-input"
                                                        wire:model='customers_ids.{{ $customer->id }}'
                                                        wire:click='addRemove({{ $customer->id }})'>
                                                </span>
                                            </td>

                                            <td>{{ $customer->name }}</td>
                                            <td> {{ $customer->phone }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between mx-0 row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_info" role="status" aria-live="polite"> إظهار
                                        {{ $customers->perPage() }} من اصل
                                        {{ $customers->total() }}
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            {{ $customers->withQueryString()->onEachSide(0)->links() }}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
