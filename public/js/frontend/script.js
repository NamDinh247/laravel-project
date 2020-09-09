// script for modal process
var registerForm = $("#registerForm");
var loginForm = $("#loginForm");
var registerShopForm = $("#registerShopForm");

$(document).ready(function() {
    if (parseInt($("#userLogin").val()) === 0){
        $('#modal-signIn').modal('show');
    }

    $(".login100-form .btnRegister").click(function (evt) {
        evt.preventDefault();
        $.ajax({
            type: "POST",
            url: '/register',
            data: registerForm.serialize(),
            success: function (data) {
                switch (Number(data)) {
                    case 306:
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Email và số điện thoại đã tồn tại',
                        });
                        break;
                    case 301:
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Email đã tồn tại',
                        });
                        break;
                    case 302:
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Số điện thoại đã tồn tại',
                        });
                        break;
                    case 200:
                        iziToast.success({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Đăng ký tài khoản thành công!',
                        });
                        setTimeout(() => {
                            window.location = '/';
                        }, 2500);
                        break;
                    default:
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Có lỗi xảy ra, vui lòng thử lại',
                        });
                        break;
                }
            },
            error: function () {
                iziToast.warning({
                    position: 'topCenter',
                    timeout: 2500,
                    transitionIn: 'bounceInDown',
                    message: 'Fail, try again!',
                });
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
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Tài khoản chưa được kích hoạt!',
                        });
                        break;
                    case 202:
                        iziToast.error({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Tài khoản đang bị khóa, vui lòng liên hệ admin để được hỗ trợ!',
                        });
                        break;
                    case 203:
                        iziToast.error({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Đăng nhập thất bại, vui lòng thử lại!',
                        });
                        break;
                    case 207:
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Sai mật khẩu, vui lòng thử lại!',
                        });
                        break;
                    case 200:
                        window.location = '/';
                        break;
                    default:
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Có lỗi xảy ra, vui lòng thử lại',
                        });
                        break;
                }
            },
            error: function (data) {
                iziToast.warning({
                    position: 'topCenter',
                    timeout: 2500,
                    transitionIn: 'bounceInDown',
                    message: 'Fail, try again!',
                });
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
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Email và số điện thoại đã tồn tại',
                        });
                        break;
                    case 301:
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Email đã tồn tại',
                        });
                        break;
                    case 302:
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Số điện thoại đã tồn tại',
                        });
                        break;
                    case 200:
                        iziToast.success({
                            position: 'topCenter',
                            timeout: 3500,
                            transitionIn: 'bounceInDown',
                            message: 'Đăng ký tài khoản thành công! Tài khoản của bạn đang được xác minh. ' +
                                'Thời gian xác minh từ 1-3 ngày. Nếu có thắc mắc vui lòng liên hệ, ' +
                                'hotline: 0987654321.',
                        });
                        break;
                    default:
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Có lỗi xảy ra, vui lòng thử lại',
                        });
                        break;
                }
            },
            error: function () {
                iziToast.warning({
                    position: 'topCenter',
                    timeout: 2500,
                    transitionIn: 'bounceInDown',
                    message: 'Fail, try again!',
                });
            }
        });
    })

    $("#btn-channel-shop").click(function (evt) {
        evt.preventDefault();
        $.ajax({
            type: "GET",
            url: '/channel/shop',
            success: function (data) {
                console.log(data);
                switch (Number(data)) {
                    case 201:
                        iziToast.info({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Shop của bạn đang được xác minh. ' +
                                'Thời gian xác minh từ 1-3 ngày. Nếu có thắc mắc vui lòng liên hệ, ' +
                                'hotline: 0987654321.',
                        });
                        break;
                    case 202:
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Shop của bạn đang bị khóa. ' +  'Vui lòng liên hệ hotline: 0987654321 để được hỗ trợ.',
                        });
                        break;
                    case 203:
                        iziToast.error({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Shop của bạn đã bị xóa. ' + 'Vui lòng liên hệ hotline: 0987654321 để được hỗ trợ.',
                        });
                        break;
                    case 200:
                        window.location = '/shop/order/list';
                        break;
                    default:
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 2500,
                            transitionIn: 'bounceInDown',
                            message: 'Có lỗi xảy ra, vui lòng thử lại',
                        });
                        break;
                }
            },
            error: function () {
                iziToast.warning({
                    position: 'topCenter',
                    timeout: 2500,
                    transitionIn: 'bounceInDown',
                    message: 'Fail, try again!',
                });
            }
        });
    })

    $('.add-to-cart').click(function () {
        var productId = $(this).attr('data-id');
        $.ajax({
            'url': '/shopping-cart/add',
            'method': 'GET',
            'data': {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                'productId': productId,
                'quantity': 1
            },
            'success': function () {
                // Thông báo thành công, reload lại trang.
                iziToast.success({
                    position: 'topCenter',
                    timeout: 1500,
                    transitionIn: 'bounceInDown',
                    message: 'Thêm vào giỏ hàng thành công!',
                });
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            },
            'error': function () {
                iziToast.warning({
                    position: 'topCenter',
                    timeout: 1500,
                    transitionIn: 'bounceInDown',
                    message: 'Có lỗi xảy ra, vui lòng thử lại',
                });
            }
        })
    });
    var heightContent = $(window).height() - 60;
    $('#container_detail').css({'height': heightContent + 'px', 'overflow-y': 'auto', 'overflow-x': 'hidden'});

});
