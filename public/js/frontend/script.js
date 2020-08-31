// script for modal process
var registerForm = $("#registerForm");
var loginForm = $("#loginForm");
var registerShopForm = $("#registerShopForm");

$(document).ready(function() {
    $(".login100-form .btnRegister").click(function (evt) {
        evt.preventDefault();
        $.ajax({
            type: "POST",
            url: '/register',
            data: registerForm.serialize(),
            success: function (data) {
                switch (Number(data)) {
                    case 306:
                        alert('Email và số điện thoại đã tồn tại');
                        break;
                    case 301:
                        alert('Email đã tồn tại');
                        break;
                    case 302:
                        alert('Số điện thoại đã tồn tại');
                        break;
                    case 200:
                        alert('Đăng ký tài khoản thành công!');
                        break;
                    default:
                        alert('Có lỗi xảy ra, vui lòng thử lại');
                        break;
                }
            },
            error: function () {
                alert('Fail, try again!');
            }
        });
    })

    $(".login100-form .btnLogin").click(function (evt) {
        evt.preventDefault();
        $.ajax({
            type: "POST",
            url: '/login',
            data: loginForm.serialize() + '&token=' + window.localStorage.getItem('token'),
            success: function (data) {
                switch (Number(data)) {
                    case 201:
                        alert('Tài khoản chưa được kích hoạt');
                        break;
                    case 202:
                        alert('Tài khoản đã bị ');
                        break;
                    case 203:
                        alert('Đăng nhập thất bại');
                        break;
                    case 207:
                        alert('Sai mật khẩu, vui lòng thử lại');
                        break;
                    case 200:
                        window.location = '/';
                        break;
                    default:
                        alert('Có lỗi xảy ra, vui lòng thử lại');
                        break;
                }
            },
            error: function (data) {
                alert('Fail, try again!');
            }
        });
    })

    $(".login100-form .btnRegisterShop").click(function (evt) {
        evt.preventDefault();
        $.ajax({
            type: "POST",
            url: 'shop/register',
            data: registerShopForm.serialize(),
            success: function (data) {
                switch (Number(data)) {
                    case 306:
                        alert('Email và số điện thoại đã tồn tại');
                        break;
                    case 301:
                        alert('Email đã tồn tại');
                        break;
                    case 302:
                        alert('Số điện thoại đã tồn tại');
                        break;
                    case 200:
                        alert('Đăng ký tài khoản thành công! Tài khoản của bạn đang được xác minh. ' +
                            'Thời gian xác minh từ 1-3 ngày. Nếu có thắc mắc vui lòng liên hệ, ' +
                            'hotline: 0987654321.');
                        break;
                    default:
                        alert('Có lỗi xảy ra, vui lòng thử lại');
                        break;
                }
            },
            error: function () {
                alert('Fail, try again!');
            }
        });
    })

    $("#btn-channel-shop").click(function (evt) {
        evt.preventDefault();
        $.ajax({
            type: "GET",
            url: 'channel/shop',
            success: function (data) {
                console.log(data);
                switch (Number(data)) {
                    case 201:
                        alert('Shop của bạn đang được xác minh. ' +
                            'Thời gian xác minh từ 1-3 ngày. Nếu có thắc mắc vui lòng liên hệ, ' +
                            'hotline: 0987654321.');
                        break;
                    case 202:
                        alert('Shop của bạn đang bị khóa. ' +
                            'Vui lòng liên hệ hotline: 0987654321 để được hỗ trợ');
                        break;
                    case 203:
                        alert('Shop của bạn đang bị xóa. ' +
                            'Vui lòng liên hệ hotline: 0987654321 để được hỗ trợ');
                        break;
                    case 200:
                        window.location = '/shop/order/list';
                        break;
                    default:
                        alert('Có lỗi xảy ra, vui lòng thử lại');
                        break;
                }
            },
            error: function () {
                alert('Fail, try again!');
            }
        });
    })
});
