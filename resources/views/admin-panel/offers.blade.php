@extends('partials.admin-panel.layout')
@section('title', 'العروض')
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
                            <h2 class="content-header-title float-start mb-0">العروض</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active">العروض
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <a href="{{ route('panel.create.offer') }}" class="btn btn-primary"><span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>انشاء عرض جديد</span></a>
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
                                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab-fill" data-bs-toggle="tab"
                                                href="#home-fill" role="tab" aria-controls="home-fill"
                                                aria-selected="true">العروض المباشرة</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="home2-tab-fill" data-bs-toggle="tab" href="#home2-fill"
                                                role="tab" aria-controls="home2-fill" aria-selected="false">العروض الغير
                                                مباشرة</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-1">
                                        <div class="tab-pane active" id="home-fill" role="tabpanel"
                                            aria-labelledby="home-tab-fill">

                                            <table class="datatables-basic table">
                                                <thead>
                                                    <tr>
                                                        <th>رقم العرض</th>
                                                        <th>نوع العقار</th>
                                                        <th>بيان العقار</th>
                                                        <th>المدينة</th>
                                                        <th>الحي</th>
                                                        <th>السعر</th>
                                                        <th>الفرع</th>
                                                        <th>الحالة</th>

                                                        <th>تحكم</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>QTF-1001-USR9</td>
                                                        <td> <span class="badge bg-primary"> فيلا</span> </td>
                                                        <td>دورين وملحق منفصل</td>
                                                        <td><span> القطيف</span> </td>
                                                        <td> <span> الخزامي</span></td>
                                                        <td>1,500,000 ريال</td>
                                                        <td>القطيف</td>
                                                        <td><span class="badge bg-success"> شاغر</span></td>

                                                        <td>
                                                            <div class="d-inline-flex">
                                                                <a href="view-offer.html" class="item-view">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="create-offer.html" class="item-edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <button class="btn item-edit"
                                                                    style="padding:0;color:#EA5455 ">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>QTF-2011-USR3</td>
                                                        <td> <span class="badge bg-primary"> فيلا</span> </td>
                                                        <td>دورين وملحق منفصل</td>
                                                        <td><span> القطيف</span> </td>
                                                        <td> <span> الخزامي</span></td>
                                                        <td>1,300,000 ريال</td>
                                                        <td>القطيف</td>
                                                        <td><span class="badge bg-danger"> تم البيع</span></td>

                                                        <td>
                                                            <div class="d-inline-flex">
                                                                <a href="view-offer.html" class="item-view">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="create-offer.html" class="item-edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <button class="btn item-edit"
                                                                    style="padding:0;color:#EA5455 ">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>QTF-3091-USR4</td>
                                                        <td> <span class="badge bg-primary"> فيلا</span> </td>
                                                        <td>دورين وملحق منفصل</td>
                                                        <td><span> جزيرة تاروت</span> </td>
                                                        <td> <span> مسك تاروت</span></td>
                                                        <td>1,500,000 ريال</td>
                                                        <td>القطيف</td>
                                                        <td><span class="badge bg-info"> محجوز</span></td>

                                                        <td>
                                                            <div class="d-inline-flex">
                                                                <a href="view-offer.html" class="item-view">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="create-offer.html" class="item-edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <button class="btn item-edit"
                                                                    style="padding:0;color:#EA5455 ">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                        <div class="tab-pane" id="home2-fill" role="tabpanel"
                                            aria-labelledby="home2-tab-fill">

                                            <table class="datatables-basic table">
                                                <thead>
                                                    <tr>
                                                        <th>رقم العرض</th>
                                                        <th>نوع العقار</th>
                                                        <th>بيان العقار</th>
                                                        <th>المدينة</th>
                                                        <th>الحي</th>
                                                        <th>السعر</th>
                                                        <th>الفرع</th>
                                                        <th>الحالة</th>

                                                        <th>تحكم</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>QTF-1001-USR9</td>
                                                        <td> <span class="badge bg-primary"> فيلا</span> </td>
                                                        <td>دورين وملحق منفصل</td>
                                                        <td><span> القطيف</span> </td>
                                                        <td> <span> الخزامي</span></td>
                                                        <td>1,500,000 ريال</td>
                                                        <td>القطيف</td>
                                                        <td><span class="badge bg-success"> شاغر</span></td>

                                                        <td>
                                                            <div class="d-inline-flex">
                                                                <a href="view-offer.html" class="item-view">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="create-offer.html" class="item-edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <button class="btn item-edit"
                                                                    style="padding:0;color:#EA5455 ">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>QTF-2011-USR3</td>
                                                        <td> <span class="badge bg-primary"> فيلا</span> </td>
                                                        <td>دورين وملحق منفصل</td>
                                                        <td><span> القطيف</span> </td>
                                                        <td> <span> الخزامي</span></td>
                                                        <td>1,300,000 ريال</td>
                                                        <td>القطيف</td>
                                                        <td><span class="badge bg-danger"> تم البيع</span></td>

                                                        <td>
                                                            <div class="d-inline-flex">
                                                                <a href="view-offer.html" class="item-view">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="create-offer.html" class="item-edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <button class="btn item-edit"
                                                                    style="padding:0;color:#EA5455 ">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>QTF-3091-USR4</td>
                                                        <td> <span class="badge bg-primary"> فيلا</span> </td>
                                                        <td>دورين وملحق منفصل</td>
                                                        <td><span> جزيرة تاروت</span> </td>
                                                        <td> <span> مسك تاروت</span></td>
                                                        <td>1,500,000 ريال</td>
                                                        <td>القطيف</td>
                                                        <td><span class="badge bg-info"> محجوز</span></td>

                                                        <td>
                                                            <div class="d-inline-flex">
                                                                <a href="view-offer.html" class="item-view">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="create-offer.html" class="item-edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <button class="btn item-edit"
                                                                    style="padding:0;color:#EA5455 ">
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
