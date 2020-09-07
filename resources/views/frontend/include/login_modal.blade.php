<form class="login100-form validate-form form_sign_in" id="loginForm">
    @csrf
    <span class="login100-form-title p-b-37">
										Đăng Nhập
									</span>

    <div class="wrap-input100 validate-input m-b-20" data-validate="Vui lòng nhập email">
        <input class="input100" type="text" name="username" placeholder="Nhập email">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-25" data-validate = "Nhập mật khẩu">
        <input class="input100" type="password" name="password" placeholder="Nhập mật khẩu">
        <span class="focus-input100"></span>
    </div>

    <div class="container-login100-form-btn">
        <button class="login100-form-btn btnLogin">
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
