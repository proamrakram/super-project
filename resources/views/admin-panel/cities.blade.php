@extends('partials.admin-panel.layout')
@section('title', 'المدن')
@section('content')
    @push('cities-styles')
        @livewireStyles()
    @endpush
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">المدن</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('panel.home') }}">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active">المدن
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <a href="{{ route('panel.create.user.info') }}" class="btn btn-primary"><span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>إضافة مدينة جديد</span></a>
                    </div>
                </div> --}}
            </div>
            <div class="content-body">
                <section class="app-user-list">
                    <section id="basic-datatable">
                        @livewire('city')
                    </section>
                </section>
                @livewire('edit-city')
            </div>
        </div>
    </div>
    @push('cities-scripts')
        @livewireScripts()
    @endpush
    <!-- END: Content-->
@endsection
