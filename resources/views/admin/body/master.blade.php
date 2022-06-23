<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (!empty($sitesetting->logo))
        <link href="{{ $sitesetting->logo }}" rel="shortcut icon" type="image/png">
    @endif

    <title>Admin | @yield('title')</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('admin/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/skin_color.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }

        #mainthumbnail-error,
        #thumbnail-error {
            position: absolute;
            top: 42px;
            font-weight: 500;
        }

        .notific {
            position: fixed;
            color: #ff0404;
            font-size: 16.5px;
        }
    </style>

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        @include('admin.partials.header') 

        @include('admin.partials.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('admin.partials.footer')

        <div class="control-sidebar-bg"></div>

    </div>

    <!-- Vendor JS -->
    <script src="{{ asset('admin/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/data-table.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
    <script src="{{ asset('admin/js/pages/editor.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/pages/dashboard.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/vendor_components/gallery/js/animated-masonry-gallery.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/vendor_components/gallery/js/jquery.isotope.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/vendor_components/lightbox-master/dist/ekko-lightbox.js') }}">
    </script>
    <script src="{{ asset('admin/js/pages/gallery.js') }}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script src="{{ asset('admin/js/adminjqueryvalidation.js') }}"></script>
    <script src="{{ asset('admin/js/edittourvalidation.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

<script>
$(function() {
    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    })
});
$(function() {
    $(document).on('click', '#softdelete', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Trashed it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire(
                    'Trashed!',
                    'Your file has been move to trashed.',
                    'success'
                )
            }
        })
    })
});

$(function() {
    $(document).on('click', '#restore', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Restore it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire(
                    'Restore!',
                    'Your file has been restore.',
                    'success'
                )
            }
        })
    })
});    
</script> 

<script>
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
</script>

<script>
    $(document).ready(function() {
    $('select[name="category_id"]').on('change', function() {
        var category_id = $(this).val();
        if (category_id) {
            $.ajax({
                url: "/subcategory/ajax/" + category_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var d = $('select[name="subcategory_id"]').empty();
                    $('select[name="subcategory_id"]').append(
                        '<option value="">Select Sub Category</option>');
                    $.each(data, function(key, value) {
                        $('select[name="subcategory_id"]').append(

                            '<option value="' + value.id + '">' + value
                            .sub_category_name + '</option>');
                    });
                }
            });
        } else {
            alert('danger');
        }
    });
});

// country
$(document).ready(function() {
    $('select[name="country_id"]').on('change', function() {
        var country_id = $(this).val();
        if (country_id) {
            $.ajax({
                url: "/place/ajax/" + country_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var d = $('select[name="place_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="place_id"]').append(

                            '<option value="' + value.id + '">' + value
                            .place_name + '</option>');
                    });
                }
            });
        } else {
            alert('danger');
        }
    });
});
</script>
</body>

</html>
