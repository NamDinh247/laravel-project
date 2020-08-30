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
    <script src="/Admin/plugins/jquery/jquery.min.js"></script>
    <script src="/Admin/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>

    <title>
        @yield('title')
    </title>
    @yield('header-script')
</head>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=680469619206748&autoLogAppEvents=1" nonce="tTMwqKi2"></script>
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
                                <form class="login100-form validate-form form_sign_in">
									<span class="login100-form-title p-b-37">
										Đăng Nhập
									</span>

                                    <div class="wrap-input100 validate-input m-b-20" data-validate="Vui lòng nhập email">
                                        <input class="input100" type="text" name="username" placeholder="Nhập email">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-25" data-validate = "Nhập mật khẩu">
                                        <input class="input100" type="password" name="pass" placeholder="Nhập mật khẩu">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="container-login100-form-btn">
                                        <button class="login100-form-btn">
                                            Đăng Nhập
                                        </button>
                                    </div>

                                    <div class="text-center p-t-30 p-b-20">
										<span class="txt1">
											đăng nhập bằng
										</span>
                                    </div>

                                    <div class="flex-c p-b-50">
                                        <a class="login100-social-item">
                                            <i class="fa fa-facebook"></i>
                                        </a>

                                        <a class="login100-social-item">
                                            <img src="/img/icon-google.png" alt="GOOGLE">
                                        </a>
                                    </div>

                                    <div class="text-center">
                                        <a class="txt2 hov1 formsignup">
                                            Đăng Ký
                                        </a>
                                    </div>
                                </form>
                                {{-- signup --}}
                                <form class="login100-form validate-form form_sign_up d-none">
									<span class="login100-form-title p-b-37">
										Đăng Ký
									</span>

                                    <div class="wrap-input100 validate-input m-b-25" data-validate = "Nhập tên tài khoản">
                                        <input class="input100" type="text" name="username" placeholder="Nhập tên tài khoản">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-25" data-validate = "Nhập tên đầy đủ">
                                        <input class="input100" type="text" name="fullname" placeholder="Nhập tên đầy đủ">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-20" data-validate="Vui lòng nhập email">
                                        <input class="input100" type="text" name="email" placeholder="Nhập email">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-20" data-validate="Nhập số điện thoại">
                                        <input class="input100" type="number" name="phone" placeholder="Nhập số điện thoại">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-20" data-validate="Nhập địa chỉ">
                                        <input class="input100" type="text" name="address" placeholder="Nhập địa chỉ">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-25" data-validate = "Nhập mật khẩu">
                                        <input class="input100" type="password" name="pass" placeholder="Nhập mật khẩu">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-25" data-validate="Nhập lại mật khẩu">
                                        <input class="input100" type="password" name="pass" placeholder="Nhập lại mật khẩu">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="container-login100-form-btn">
                                        <button class="login100-form-btn">
                                            Đăng Ký
                                        </button>
                                    </div>

                                    <div class="text-center p-t-30 p-b-20">
										<span class="txt1">
											đăng ký bằng
										</span>
                                    </div>

                                    <div class="flex-c p-b-50">
                                        <a class="login100-social-item">
                                            <i class="fa fa-facebook"></i>
                                        </a>

                                        <a class="login100-social-item">
                                            <img src="/img/icon-google.png" alt="GOOGLE">
                                        </a>
                                    </div>

                                    <div class="text-center">
                                        <a class="txt2 hov1 formsignin">
                                            Đăng Nhập
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal đăng ký shop --}}
    <div class="modal fade" id="modal-signup-shop">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid position-relative p-3">
                        <i class="fa fa-times-circle-o position-absolute" style="z-index: 1;top: -10px;right: -10px;font-size: 30px;background-color: #fff; color: #ababab70;border-radius: 50%;" data-dismiss="modal" aria-label="Close"></i>
                        <div class="row p-0">
                            <div class="col-md-12 px-5 py-5">
                                {{-- signup --}}
                                <form class="login100-form validate-form form_sign_up">
									<span class="login100-form-title p-b-37">
										Đăng Ký Cửa Hàng
									</span>

                                    <div class="wrap-input100 validate-input m-b-25" data-validate = "Nhập tên của hàng">
                                        <input class="input100" type="text" name="username" placeholder="Nhập tên của hàng">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-20" data-validate="Vui lòng nhập email">
                                        <input class="input100" type="text" name="email" placeholder="Nhập email">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-20" data-validate="Nhập số điện thoại">
                                        <input class="input100" type="number" name="phone" placeholder="Nhập số điện thoại">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="wrap-input100 validate-input m-b-20" data-validate="Nhập địa chỉ">
                                        <input class="input100" type="text" name="address" placeholder="Nhập địa chỉ">
                                        <span class="focus-input100"></span>
                                    </div>
                                    <div class="wrap-input100 validate-input m-b-20">
                                        <textarea class="input100 py-2" name="introduce-shop" placeholder="Giới thiệu về cửa hàng" style="resize: vertical;"></textarea>
                                        <span class="focus-input100"></span>
                                    </div>
                                    <div class="wrap-input100 m-b-25 position-relative" style="height: 50px;">
                                        <label class="btn btn-outline-success position-absolute" style="top: 0; left: 0; display: inline-block;cursor: pointer;">
                                            <input type="file" class="text-center center-block file-upload" style="margin-top: 20px;display: none;">
                                            <i class="fa fa-upload"></i>&nbsp; Tải ảnh lên
                                        </label>
                                    </div>

                                    <div class="container-login100-form-btn">
                                        <button class="login100-form-btn">
                                            Đăng Ký
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            $('#signIn').click(function (event) {
                $('#modal-signIn').modal('show');
                $('#modal-signIn .form_sign_in').removeClass('d-none');
                $('#modal-signIn .form_sign_up').addClass('d-none');
                $('#modal-signIn .modal-dialog').removeClass('d-none');
            });
            $('.formsignup').click(function (event) {
                $('#modal-signIn .form_sign_in').addClass('d-none');
                $('#modal-signIn .form_sign_up').removeClass('d-none');
                $('#modal-signIn .modal-dialog').removeClass('modal-lg');
                $('#modal-signIn .modal-dialog').addClass('modal-xl');
            });
            $('.formsignin').click(function (event) {
                $('#modal-signIn .form_sign_in').removeClass('d-none');
                $('#modal-signIn .form_sign_up').addClass('d-none');
                $('#modal-signIn .modal-dialog').removeClass('modal-xl');
                $('#modal-signIn .modal-dialog').addClass('modal-lg');
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
            });
        })
    </script>

    @yield('main-script')
</body>
</html>
