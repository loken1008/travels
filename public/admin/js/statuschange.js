$(function() {
    $('.switcher-input').change(function(e) {
        e.preventDefault();
        var status = $(this).prop('checked') == true ? 1 : 0;
        var country_id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Change Status!',

        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/country/changeStatus',
                    data: {
                        'status': status,
                        'country_id': country_id
                    },
                    success: function(data) {
                        Swal.fire(
                            'Status!',
                            'Status has been changed.',
                            'success',
                        )
                        window.location.href = '/country/view'
                    }
                });
            } else {
                window.location.href = '/country/view'
            }
        })

    })
    $('#example1 .switcher-input').bootstrapToggle();

});

//tour