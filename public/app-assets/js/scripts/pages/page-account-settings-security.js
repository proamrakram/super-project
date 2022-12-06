$(function() {
    ('use strict');

    // variables
    var form = $('.validate-form'),
        select2 = $('.select2'),
        accountNumberMask = $('.account-number-mask');

    // jQuery Validation for all forms
    // --------------------------------------------------------------------
    if (form.length) {
        form.each(function() {
            var $this = $(this);

            $this.validate({
                rules: {

                },
                messages: {
                    'new-password': {
                        required: 'Enter new password',
                        minlength: 'Enter at least 8 characters'
                    },
                    'confirm-new-password': {
                        required: 'Please confirm new password',
                        minlength: 'Enter at least 8 characters',
                        equalTo: 'The password and its confirm are not the same'
                    }
                }
            });
            $this.on('submit', function(e) {
                e.preventDefault();
            });
        });
    }

    //phone
    if (accountNumberMask.length) {
        accountNumberMask.each(function() {
            new Cleave($(this), {
                phone: true,
                phoneRegionCode: 'US'
            });
        });
    }

    // For all Select2
    if (select2.length) {
        select2.each(function() {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this.select2({
                dropdownParent: $this.parent()
            });
        });
    }
});