@livewire('real-estates-helper-box')
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
{{-- <x-modals.real-estates-details></x-modals.real-estates-details> --}}

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0">
        <span class="float-md-start d-block d-md-inline-block mt-25">حقوق الملكية &copy; 2022
            <a class="ms-25" href="#" target="_blank"></a>
            <span class="d-none d-sm-inline-block">, جميع الحقوق محفوظة</span>
        </span>
        <span class="float-md-end d-none d-md-block">صُنع بحب
            <i data-feather="heart"></i>
        </span>
    </p>
</footer>

<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/sweetalerts/custom-sweetalert.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>

<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('app-assets/js/scripts/pages/app-user-list.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/extensions/ext-component-toastr.js') }}"></script>

<!-- END: Page JS-->

{{-- Custom Pages --}}
<script src="{{ asset('app-assets/js/scripts/pages/modal-add-new-cc.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/pages/page-pricing.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/pages/modal-add-new-address.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/pages/modal-create-app.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/pages/modal-two-factor-auth.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/pages/modal-edit-user.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/pages/modal-share-project.js') }}"></script>

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Vendor JS-->
<script src="app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->

<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>


<script>
    @if (Session::has('message'))
        toastr.success("{{ Session::get('message') }}", 'تمت المهمة!', {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
            rtl: true
        });
    @endif
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>

<script>
    $(function() {
        'use strict';

        var dt_basic_table = $('.datatables-basic');
        // DataTable with buttons
        // --------------------------------------------------------------------

        if (dt_basic_table.length) {
            var dt_basic = dt_basic_table.DataTable({

                dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthuser: [7, 10, 25, 50, 75, 100],
                buttons: [{
                        extend: 'collection',
                        className: 'btn btn-outline-secondary dropdown-toggle me-2',
                        text: feather.icons['share'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'تصدير',
                        buttons: [{
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'طباعة',
                            className: 'dropdown-item',
                        }, {
                            extend: 'csv',
                            text: feather.icons['file-text'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Csv',
                            className: 'dropdown-item',
                        }, {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Excel',
                            className: 'dropdown-item',
                        }, {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Pdf',
                            className: 'dropdown-item',
                        }, {
                            extend: 'copy',
                            text: feather.icons['copy'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'نسخ',
                            className: 'dropdown-item',
                        }],

                    },

                ],

                oLanguage: {
                    "sUrl": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json"
                },
            });
        }


    });
</script>


@stack('orders-scripts')
@stack('customers-scripts')
@stack('cities-scripts')
@stack('neighborhoods-scripts')
@stack('user-scripts')
@stack('real-estates-scripts')
@stack('branch-scripts')
@stack('livewire-alert-scripts')

</body>

</html>
