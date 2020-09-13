<div class="modal fade" id="modal-signup-shop">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="container-fluid position-relative p-3">
                    <i class="fa fa-times-circle-o position-absolute" style="z-index: 1;top: -10px;right: -10px;font-size: 30px;background-color: #fff; color: #ababab70;border-radius: 50%;" data-dismiss="modal" aria-label="Close"></i>
                    <div class="row p-0">
                        <div class="col-md-12 px-5 py-5">
                            {{-- signup --}}
                            <form class="login100-form validate-form form_sign_up" id="registerShopForm">
                                @csrf
                                <span class="login100-form-title p-b-37">
										Đăng Ký Cửa Hàng
									</span>

                                <div class="wrap-input100 validate-input m-b-25" data-validate = "Nhập tên của hàng">
                                    <input class="input100" type="text" name="name" placeholder="Nhập tên của hàng">
                                    <span class="focus-input100"></span>
                                </div>

                                <div class="wrap-input100 validate-input m-b-20" data-validate="Vui lòng nhập email">
                                    <input class="input100" type="text" name="email" placeholder="Nhập email">
                                    <span class="focus-input100"></span>
                                </div>

                                <div class="wrap-input100 validate-input m-b-20" data-validate="Nhập số điện thoại">
                                    <input class="input100" type="text" name="phone" placeholder="Nhập số điện thoại">
                                    <span class="focus-input100"></span>
                                </div>

                                <div class="wrap-input100 validate-input m-b-20" data-validate="Nhập địa chỉ">
                                    <input class="input100" type="text" name="address" placeholder="Nhập địa chỉ">
                                    <span class="focus-input100"></span>
                                </div>
                                {{--                                    <div class="wrap-input100 validate-input m-b-20">--}}
                                {{--                                        <textarea class="input100 py-2" name="introduce-shop" placeholder="Giới thiệu về cửa hàng" style="resize: vertical;"></textarea>--}}
                                {{--                                        <span class="focus-input100"></span>--}}
                                {{--                                    </div>--}}
{{--                                <div class="wrap-input100 m-b-25 position-relative" style="height: 50px;">--}}
{{--                                    <label class="btn btn-outline-success position-absolute" style="top: 0; left: 0; display: inline-block;cursor: pointer;">--}}
{{--                                        <input type="file" class="text-center center-block file-upload" style="margin-top: 20px;display: none;">--}}
{{--                                        <i class="fa fa-upload"></i>&nbsp; Tải ảnh lên--}}
{{--                                    </label>--}}
{{--                                </div>--}}

                                <div class="container-login100-form-btn">
                                    <button class="login100-form-btn btnRegisterShop">
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
