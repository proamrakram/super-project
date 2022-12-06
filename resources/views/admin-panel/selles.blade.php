@extends('partials.admin-panel.layout')
@section('title', 'المبيعات')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">المبيعات</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active">المبيعات
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">

                    <!-- list and filter start -->
                    <section id="basic-datatable">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <form class="dt_adv_search" method="POST" style="padding: 20px">
                                        <div class="row g-1 mb-md-1">
                                            <div class="col-md-3">
                                                <label class="form-label">البحث بالتاريخ:</label>
                                                <input type="text" id="fp-default"
                                                    class="form-control flatpickr-basic flatpickr-input active"
                                                    placeholder="يوم-شهر-عام">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">المدينة:</label>
                                                <input type="text" class="form-control dt-input"
                                                    placeholder="بحث بالمدينة" />
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">نوع العقار:</label>
                                                <select class="form-control">
                                                    <option>ارض</option>
                                                    <option>فيلا</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">نوع العملاء:</label>
                                                <select class="form-control">
                                                    <option>حكومى</option>
                                                    <option>خاص</option>
                                                </select>
                                            </div>
                                        </div>

                                    </form>
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th>رقم البيع</th>
                                                <th>التاريخ</th>
                                                <th>المدينة</th>
                                                <th>نوع العقار</th>
                                                <th>رقم الارض</th>
                                                <th>مساحة الأرض</th>
                                                <th>سعر الأرض</th>
                                                <th>نوع العملاء</th>
                                                <th>الفرع</th>
                                                <th>تحكم</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>QTF-SELL1011-USR9</td>
                                                <td> 10-10-2022</td>
                                                <td> الرياض </td>
                                                <td> ارض</td>
                                                <td>512</td>
                                                <td>100 متر</td>
                                                <td>1000 ريال</td>
                                                <td>حكومى</td>
                                                <td>مكة</td>
                                                <td>
                                                    <div class="d-inline-flex">
                                                        <a href="view-sell.html" class="item-view">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="javascript:;" class="item-edit" data-bs-target="#editUser"
                                                            data-bs-toggle="modal">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button class="btn item-edit" style="padding:0;color:#EA5455 ">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Modal to add new record -->

                    </section>
                    <!-- list and filter end -->
                </section>
                <!-- users list ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
