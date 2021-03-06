<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recycling</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/img/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Admin/plugins/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/css/frontend/util_login.css">
    <link rel="stylesheet" type="text/css" href="/css/frontend/main_login.css">
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="/img/img-01.png" alt="IMG">
            </div>
            <form class="login100-form validate-form" action="/admin/login" method="post">
                @csrf
                <span class="login100-form-title">Đăng nhập</span>
                @if( \Illuminate\Support\Facades\Session::has('success_message'))
                    <ul class="mb-3 pl-4" style="font-size: 90%; color: red;">
                        <li>
                            {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                        </li>
                    </ul>
                @elseif( \Illuminate\Support\Facades\Session::has('error_message'))
                    <ul class="mb-3 pl-4" style="font-size: 90%; color: red;">
                        <li>
                            {{ \Illuminate\Support\Facades\Session::get('error_message') }}
                        </li>
                    </ul>
                @endif
                <div class="wrap-input100 validate-input" data-validate="Vui lòng nhập tên tài khoản">
                    <input class="input100" type="text" name="username" placeholder="Tên tài khoản">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Vui lòng nhập mật khẩu">
                    <input class="input100" type="password" name="password" placeholder="Mật khẩu">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">Đăng nhập</button>
                </div>
                <div class="text-center p-t-136">
                    <a class="txt2"></a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/Admin/plugins/jquery/jquery.min.js"></script>
<script src="/Admin/plugins/bootstrap/js/popper.min.js"></script>
<script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/Admin/plugins/bootstrap/js/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<script src="js/main.js"></script>

</body>
</html>
