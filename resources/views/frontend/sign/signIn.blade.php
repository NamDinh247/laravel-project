<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="/img/favicon.ico"/>
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/v4-shims.css">
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <script src="/Admin/plugins/jquery/jquery.min.js"></script>
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/css/util.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">

</head>
<body style="background-color: #999999;">

    <div class="limiter">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url({{asset('/img/post1.jpg')}});"></div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                <form class="login100-form validate-form">
                    <span class="login100-form-title p-b-59">Đăng ký</span>

                    <div class="wrap-input100 validate-input" data-validate="Vui lòng nhập tên">
                        <span class="label-input100">Tên</span>
                        <input class="input100" type="text" name="name" placeholder="Tên đầy đủ">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="vui lòng nhập tên tài khoản ">
                        <span class="label-input100">Tên tài khoản</span>
                        <input class="input100" type="text" name="username" placeholder="Tên tài khoản">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Email hợp lệ là bắt buộc: email@gmail.com">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" placeholder="Địa chỉ email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Vui lòng nhập mật khẩu">
                        <span class="label-input100">Mật khẩu</span>
                        <input class="input100" type="text" name="pass" placeholder="*************">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Vui lòng nhập lại mật khẩu">
                        <span class="label-input100">Nhập lại mật khẩu</span>
                        <input class="input100" type="text" name="repeat-pass" placeholder="*************">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-m w-full p-b-33">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                    <span class="txt1">
                                        Tôi đồng ý với các điều khoản của Người dùng
                                    </span>
                            </label>
                        </div>


                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Đăng nhập
                            </button>
                        </div>

                        <a href="#" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                            Đăng ký
                            <i class="fa fa-long-arrow-right m-l-5"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
