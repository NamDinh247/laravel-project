<form class="login100-form validate-form form_sign_up d-none" id="registerForm">
    @csrf
    <span class="login100-form-title p-b-37">
										Đăng Ký
									</span>

    {{--                                    <div hidden class="wrap-input100 validate-input m-b-25" data-validate = "Nhập tên tài khoản">--}}
    {{--                                        <input class="input100" type="text" name="username" placeholder="Nhập tên tài khoản">--}}
    {{--                                        <span class="focus-input100"></span>--}}
    {{--                                    </div>--}}

    <div class="wrap-input100 validate-input m-b-20" data-validate="Vui lòng nhập email">
        <input class="input100" type="text" name="email" placeholder="Nhập email">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-20" data-validate="Nhập số điện thoại">
        <input class="input100" type="number" name="phone" placeholder="Nhập số điện thoại">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-25" data-validate = "Nhập tên đầy đủ">
        <input class="input100" type="text" name="full_name" placeholder="Nhập tên đầy đủ">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-25" data-validate = "Nhập mật khẩu">
        <input class="input100" type="password" name="password" placeholder="Nhập mật khẩu">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-25" data-validate="Nhập lại mật khẩu">
        <input class="input100" type="password" name="confirm_password" placeholder="Nhập lại mật khẩu">
        <span class="focus-input100"></span>
    </div>

    <div class="container-login100-form-btn">
        <button class="login100-form-btn btnRegister">
            Đăng Ký
        </button>
    </div>

    <div class="text-center p-t-30 p-b-20">
										<span class="txt1">
											Đăng ký bằng
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
