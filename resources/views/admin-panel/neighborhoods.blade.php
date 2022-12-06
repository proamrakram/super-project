@extends('partials.admin-panel.layout')
@section('title', 'الأحياء')
@section('content')
    @push('neighborhoods-styles')
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
                            <h2 class="content-header-title float-start mb-0">الأحياء</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('panel.home') }}">لوحة التحكم</a>
                                    </li>
                                    <li class="breadcrumb-item active">الأحياء
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="app-user-list">
                    <section id="basic-datatable">
                        @livewire('neighborhood')
                    </section>
                </section>
                @livewire('edit-neighborhood')
            </div>
        </div>
    </div>
    @push('neighborhoods-scripts')
        @livewireScripts()
    @endpush
    <!-- END: Content-->
@endsection
