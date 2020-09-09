<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/img/favicon.ico"/>
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/v4-shims.css">
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/frontend/style.css">
    <link rel="stylesheet" href="/css/frontend/sign/main.css">
    <link rel="stylesheet" href="/css/frontend/sign/util.css">
    <link rel="stylesheet" href="/Admin/plugins/izitoast/iziToast.min.css">

    <title>
        @yield('title')
    </title>
    @yield('header-script')
</head>
<div id="fb-root"></div>
{{--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=680469619206748&autoLogAppEvents=1" nonce="tTMwqKi2"></script>--}}
<body>
    <div class="wrapper">
        @include('frontend.include.header')
        <main class="container-fluid">
            @yield('content')
        </main>
    </div>

    @yield('modal')
    {{-- modal đăng nhập, đăng ký --}}
    <div class="modal fade" id="modal-signIn">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid position-relative">
                        <i class="fa fa-times-circle-o position-absolute" style="z-index: 1;top: -10px;right: -10px;font-size: 30px;background-color: #fff; color: #ababab70;border-radius: 50%;" data-dismiss="modal" aria-label="Close"></i>
                        <div class="row p-0">
                            <div class="col-md-5 col-left p-0">
                                <div class="box-img text-center">
                                    <img src="/img/img_sign_in.jpg" class="img-thumbnail p-0 border-0" style="border-radius: 0 !important;">
                                </div>
                            </div>
                            <div class="col-md-7 col-right p-l-55 p-r-55 p-t-30 p-b-30" style="border: 15px solid #efefef;">
                                {{-- signin --}}
                                @include('frontend.include.login_modal')
                                {{-- signup --}}
                                @include('frontend.include.register_modal')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal đăng ký shop --}}
    @include('frontend.include.register_shop_modal')

    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
    <script src="/Admin/plugins/jquery/jquery.min.js"></script>
    <script src="/Admin/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Admin/plugins/izitoast/iziToast.min.js"></script>
    <script src="/js/frontend/script.js"></script>

    <script>
        $(document).ready(function () {
            $('#signIn').click(function (event) {
                $('#modal-signIn').modal('show');
                $('#modal-signIn .form_sign_in').removeClass('d-none');
                $('#modal-signIn .form_sign_up').addClass('d-none');
                $('#modal-signIn .modal-dialog').removeClass('d-none');
                $('.form_sign_in input[name="username"]').val('');
                $('.form_sign_in input[name="password"]').val('');
            });
            $('.formsignup').click(function (event) {
                $('#modal-signIn .form_sign_in').addClass('d-none');
                $('#modal-signIn .form_sign_up').removeClass('d-none');
                $('#modal-signIn .modal-dialog').removeClass('modal-lg');
                $('#modal-signIn .modal-dialog').addClass('modal-xl');

                $('.form_sign_up input[name="email"]').val('');
                $('.form_sign_up input[name="phone"]').val('');
                $('.form_sign_up input[name="full_name"]').val('');
                $('.form_sign_up input[name="password"]').val('');
                $('.form_sign_up input[name="confirm_password"]').val('');
            });
            $('.formsignin').click(function (event) {
                $('#modal-signIn .form_sign_in').removeClass('d-none');
                $('#modal-signIn .form_sign_up').addClass('d-none');
                $('#modal-signIn .modal-dialog').removeClass('modal-xl');
                $('#modal-signIn .modal-dialog').addClass('modal-lg');

                $('.form_sign_in input[name="username"]').val('');
                $('.form_sign_in input[name="password"]').val('');
            });
            var widthWindow = $(window).width();
            if (widthWindow > 1368) {
                $('#header .row-header .col-md-1').removeClass('d-none');
                $('#header .row-header .col-logo').removeClass('col-md-4').addClass('col-md-3');
            } else {
                $('#header .row-header .col-md-1').addClass('d-none');
                $('#header .row-header .col-logo').removeClass('col-md-3').addClass('col-md-4');
            }
            $('#form-signup-shop').click(function (event) {
                $('#modal-signup-shop').modal('show');

                $('#modal-signup-shop .form_sign_up input[name="email"]').val('');
                $('#modal-signup-shop .form_sign_up input[name="phone"]').val('');
                $('#modal-signup-shop .form_sign_up input[name="address"]').val('');
                $('#modal-signup-shop .form_sign_up input[name="name"]').val('');
            });
        })
    </script>

    @yield('main-script')
</body>
</html>
