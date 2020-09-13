<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/img/favicon.ico"/>
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/Admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin/admin.css">
    <link rel="stylesheet" href="/Admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker.css">
{{--    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">--}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <title>
        @yield('title')
    </title>
    @yield('header-script')
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>
</head>
<body class="sidebar-mini control-sidebar-slide-open text-sm">
    <div class="wrapper">

        @include('admin.include.header')

        @include('admin.include.main_sidebar')

        <div class="content-wrapper px-2">
            <section class="content-header clearfix">
                @yield('main-header')
                @if( \Illuminate\Support\Facades\Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
                        {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                    </div>
                @elseif( \Illuminate\Support\Facades\Session::has('error_message'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Thông báo</h5>
                        {{ \Illuminate\Support\Facades\Session::get('error_message') }}
                    </div>
                @endif
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('main-content')
            </section>
        </div>
    </div>
    @yield('modal')

    <script src="/Admin/plugins/jquery/jquery.min.js"></script>
    <script src="/Admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/Admin/plugins/sparklines/sparkline.js"></script>
    <script src="/Admin/plugins/moment/moment.min.js"></script>
    <script src="/Admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/Admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/Admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/Admin/dist/js/adminlte.min.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
    <script src="/js/admin/admin.js"></script>
    <script>
        $(document).ready(function () {
            if ($('.alert') && $('.alert').length > 0){
                setTimeout(function () {
                    $('.alert').addClass('d-none');
                }, 2500);
            }
        });
        function activeFilterLeft(ele, el) {
            $(ele + ' .nav-link').removeClass('active');
            $(el).addClass('active');
        }
        function activeFilterAccount(ele, el) {
            $(ele).parent().addClass('menu-open');
            $(el).addClass('active');
        }
    </script>
    @yield('main-script')
</body>
</html>

