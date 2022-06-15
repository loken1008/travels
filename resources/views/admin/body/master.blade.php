<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
    <script src="{{ asset('admin/js/pages/editor.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
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
    <script src="{{asset('admin/js/delete.js')}}"></script>
    <script src="{{asset('admin/js/statuschange.js')}}"></script>
    <script src="{{asset('admin/js/addremovefield.js')}}"></script>
    <script src="{{asset('admin/js/selectchild.js')}}"></script>
   
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
          CKEDITOR.replaceAll();
          var route_prefix = "mountainguide-filemanager";
        $('#lfm').filemanager('images', {
            prefix: route_prefix
        });
        $('#lfms').filemanager('images', {
            prefix: route_prefix
        });
        $('#tlfm').filemanager('images', {
            prefix: route_prefix
        });
        $('#elfm').filemanager('images', {
            prefix: route_prefix
        });
        $('#elfms').filemanager('images', {
            prefix: route_prefix
        });
        $('#blfm').filemanager('images', {
            prefix: route_prefix
        });
        $('#lfm').filemanager('images', {
            prefix: route_prefix
        });
        $('#clfm').filemanager('images', {
            prefix: route_prefix
        });
        var options = {
            filebrowserImageBrowseUrl: '/mountainguide-filemanager?type=Images',
            filebrowserImageUploadUrl: '/mountainguide-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/mountainguide-filemanager?type=Files',
            filebrowserUploadUrl: '/mountainguide-filemanager/upload?type=Files&_token='
        };
    </script>
     <script>
        CKEDITOR.replace('my-editor', options);
    </script>

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

 

</body>

</html>
