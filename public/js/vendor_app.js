

vendor_app = {
    showErrorNotificationMessage: function(error_message) {

        if (error_message != undefined) {

            $.notify({
                icon: "notifications",
                message: error_message

            }, {
                type: 'danger',
                timer: 4000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
        }
    },

    showSuccessNotificationMessage: function(success_message) {

        // var success_message = $("#success_message").val();
        if (success_message != undefined) {

            $.notify({
                icon: "notifications",
                message: success_message

            }, {
                type: 'success',
                timer: 4000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
        }
    },

    showSuccessNotification: function(from, align) {

        var success_message = $("#success_message").val();
        if (success_message != undefined) {

            $.notify({
                icon: "notifications",
                message: success_message

            }, {
                type: 'success',
                timer: 4000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
        }
    },

    showErrorNotification: function(from, align) {

        var error_message = $("#error_message").val();
        if (error_message != undefined) {

            $.notify({
                icon: "notifications",
                message: error_message

            }, {
                type: 'danger',
                timer: 4000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
        }
    },
    initFormExtendedDatetimepickers: function() {
        $('.datetimepicker').datetimepicker({
            icons: {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        })
    },

}
