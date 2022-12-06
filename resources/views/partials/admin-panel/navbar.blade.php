    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">


            <ul class="nav navbar-nav align-items-center ms-auto">

                @auth
                    @if ((auth()->user()->user_type == 'superadmin' || auth()->user()->user_type == 'admin') &&
                        auth()->user()->user_status == 'active')
                        <li class="nav-item d-none d-lg-block">
                            <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#box">
                                <i class="ficon" data-feather="box"></i>
                            </a>
                        </li>
                    @endif
                @endauth

                @livewire('website-mode')


                @livewire('notifications')

                <li class="nav-item dropdown dropdown-user">

                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span
                                class="user-name fw-bolder">{{ auth()->user() ? auth()->user()->name : 'سجل الدخول ' }}</span>

                            <span class="user-status">

                                @auth
                                    @if (auth()->user()->user_type == 'admin')
                                        ادمن فرعي
                                    @endif

                                    @if (auth()->user()->user_type == 'superadmin')
                                        ادمن سوبر
                                    @endif

                                    @if (auth()->user()->user_type == 'office')
                                        مكتب
                                    @endif

                                    @if (auth()->user()->user_type == 'marketer')
                                        مسوق
                                    @endif
                                @endauth

                                @guest
                                    اهلا بك
                                @endguest
                            </span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}"
                                alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

                        <a class="dropdown-item" href="{{ route('panel.profile') }}">
                            <i class="me-50" data-feather="user"></i>
                            الملف الشخصي
                        </a>

                        <a class="dropdown-item" href="{{ route('panel.change.password') }}">
                            <i class="me-50" data-feather="lock"></i>
                            تحديث كلمة المرور
                        </a>

                        {{-- <a class="dropdown-item" href="page-account-settings-account.html">
                            <i class="me-50" data-feather="settings"></i>
                            الاعدادات
                        </a> --}}

                        <div class="dropdown-divider"></div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item">
                                <i class="me-50" data-feather="power"></i> تسجيل الخروج
                            </button>
                        </form>

                    </div>
                </li>
            </ul>
        </div>
    </nav>
























    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center">
            <a href="#">
                <h6 class="section-label mt-75 mb-0">Files</h6>
            </a>
        </li>
        <li class="auto-suggestion">
            <a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('app-assets/images/icons/xls.png') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                            Manager</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;17kb</small>
            </a>
        </li>
        <li class="auto-suggestion">
            <a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('app-assets/images/icons/jpg.png') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;11kb</small>
            </a>
        </li>
        <li class="auto-suggestion">
            <a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('app-assets/images/icons/pdf.png') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;150kb</small>
            </a>
        </li>
        <li class="auto-suggestion">
            <a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('app-assets/images/icons/doc.png') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;256kb</small>
            </a>
        </li>
        <li class="d-flex align-items-center">
            <a href="#">
                <h6 class="section-label mt-75 mb-0">Members</h6>
            </a>
        </li>
        <li class="auto-suggestion">
            <a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('app-assets/images/portrait/small/avatar-s-8.jpg') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="auto-suggestion">
            <a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('app-assets/images/portrait/small/avatar-s-1.jpg') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="auto-suggestion">
            <a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('app-assets/images/portrait/small/avatar-s-14.jpg') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                            Manager</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="auto-suggestion">
            <a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('app-assets/images/portrait/small/avatar-s-6.jpg') }}" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between">
            <a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="me-75"
                        data-feather="alert-circle"></span><span>No results found.</span></div>
            </a>
        </li>
    </ul>
    <!-- END: Header-->
