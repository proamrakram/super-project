@extends('partials.admin-panel.layout')
@section('title', 'الإحصائيات')
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
                            <h2 class="content-header-title float-start mb-0">الصفحة الرئيسية</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active">الاحصائيات
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">

                <section id="statistics-card">
                    <div class="row match-height">

                        @auth
                            @if (auth()->user()->user_type == 'superadmin' || auth()->user()->user_type == 'admin')
                                <div class="col-lg-2 col-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="avatar bg-light-info p-50 mb-1">
                                                <div class="avatar-content">
                                                    <i data-feather='users' class="font-medium-5"></i>
                                                </div>
                                            </div>
                                            <h2 class="fw-bolder">{{ getUsersCount() }}</h2>
                                            <p class="card-text">عدد المستخدمين</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Bar Chart -->
                            @endif
                        @endauth

                        @auth
                            @if (auth()->user()->user_type == 'superadmin' || auth()->user()->user_type == 'admin')
                                <div class="col-lg-2 col-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="avatar bg-light-info p-50 mb-1">
                                                <div class="avatar-content">
                                                    <i data-feather='monitor' class="font-medium-5"></i>
                                                </div>
                                            </div>
                                            <h2 class="fw-bolder">{{ getUsersOfficersCount() }}</h2>
                                            <p class="card-text">عدد المكاتب</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Bar Chart -->
                            @endif
                        @endauth

                        @auth
                            @if (auth()->user()->user_type == 'superadmin' || auth()->user()->user_type == 'admin')
                                <div class="col-lg-2 col-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="avatar bg-light-info p-50 mb-1">
                                                <div class="avatar-content">
                                                    <i data-feather='users' class="font-medium-5"></i>
                                                </div>
                                            </div>
                                            <h2 class="fw-bolder">{{ getUsersMarketersCount() }}</h2>
                                            <p class="card-text">عدد المسوقين</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Bar Chart -->
                            @endif
                        @endauth


                        @auth
                            @if (auth()->user()->user_type == 'superadmin' || auth()->user()->user_type == 'admin')
                                <div class="col-lg-2 col-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="avatar bg-light-info p-50 mb-1">
                                                <div class="avatar-content">
                                                    <i data-feather='users' class="font-medium-5"></i>
                                                </div>
                                            </div>
                                            <h2 class="fw-bolder">{{ getUsersAdminsCount() }}</h2>
                                            <p class="card-text">عدد المدراء</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Bar Chart -->
                            @endif
                        @endauth
                    </div>

                    <div class="row match-height">

                        @auth
                            @if (auth()->user()->user_type == 'superadmin' || auth()->user()->user_type == 'admin')
                                <!-- Line Chart - Profit -->
                                <div class="col-lg-2 col-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="avatar bg-light-info p-50 mb-1">
                                                <div class="avatar-content">
                                                    <i data-feather="globe" class="font-medium-5"></i>
                                                </div>
                                            </div>
                                            <h2 class="fw-bolder">{{ getBranchesCount() }}</h2>
                                            <p class="card-text">عدد الفروع</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endauth


                        @auth
                            @if (auth()->user()->user_type == 'superadmin' || auth()->user()->user_type == 'admin')
                                <div class="col-lg-2 col-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="avatar bg-light-info p-50 mb-1">
                                                <div class="avatar-content">
                                                    <i data-feather="globe" class="font-medium-5"></i>
                                                </div>
                                            </div>
                                            <h2 class="fw-bolder">{{ getCitiesCount() }}</h2>
                                            <p class="card-text">عدد المدن</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endauth

                        @auth
                            @if (auth()->user()->user_type == 'superadmin' || auth()->user()->user_type == 'admin')
                                <div class="col-lg-2 col-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="avatar bg-light-info p-50 mb-1">
                                                <div class="avatar-content">
                                                    <i data-feather="globe" class="font-medium-5"></i>
                                                </div>
                                            </div>
                                            <h2 class="fw-bolder">{{ getNeighborhoodsCount() }}</h2>
                                            <p class="card-text">عدد الاحياء</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endauth

                    </div>

                    <div class="row match-height">
                        <!-- Line Chart - Profit -->
                        <div class="col-lg-2 col-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather='shopping-bag' class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ getOrdersCount() }}</h2>
                                    <p class="card-text">عدد الطلبات</p>
                                </div>
                            </div>
                        </div>



                        <!-- Line Chart - Profit -->
                        <div class="col-lg-2 col-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-warning p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather='shopping-bag' class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ getOpenOrdersCount() }}</h2>
                                    <p class="card-text">عدد الطلبات المفتوحة</p>
                                </div>
                            </div>
                        </div>




                        <!-- Line Chart - Profit -->
                        <div class="col-lg-2 col-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-danger p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather='shopping-bag' class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ getClosedOrdersCount() }}</h2>
                                    <p class="card-text">عدد الطلبات المغلقة</p>
                                </div>
                            </div>
                        </div>





                        <!-- Line Chart - Profit -->
                        <div class="col-lg-2 col-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-success p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather='shopping-bag' class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ getCompleteOrdersCount() }}</h2>
                                    <p class="card-text">عدد الطلبات المكتملة</p>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row match-height">
                        @auth
                            @if (auth()->user()->user_type == 'superadmin' || auth()->user()->user_type == 'admin')
                                <!-- Line Chart - Profit -->
                                <div class="col-lg-2 col-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <div class="avatar bg-light-info p-50 mb-1">
                                                <div class="avatar-content">
                                                    <i data-feather='users' class="font-medium-5"></i>
                                                </div>
                                            </div>
                                            <h2 class="fw-bolder">{{ getCustomersCount() }}</h2>
                                            <p class="card-text">عدد العملاء</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>
            </div>
            </section>

        </div>
    </div>
    </div>
@endsection
