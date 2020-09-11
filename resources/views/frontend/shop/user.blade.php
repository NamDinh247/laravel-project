@extends('frontend.shop.layout_user_profile')

@section('main-content-profile')
    <div class="row bg-white p-3 m-0" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12">
                    <h5>Hồ Sơ Của Tôi</h5>
                    <hr/>
                    <form class="form row" action="#" method="post" id="accountForm">
                        <div class="col-md-8">
                            <div class="form-group col-md-12">
                                <label>Họ tên</label>
                                <input type="text" class="form-control" name="full_name" placeholder="Tên tài khoản"
                                       value="{!! $user->full_name !!}"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại"
                                       value="{!! $user->phone !!}"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="you@email.com"
                                       value="{!! $user->email !!}"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="address">Giới tính</label>
                                <div>
                                    <input type="radio" name="gender" value="male"> Nam
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="gender" value="female"> Nữ
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="address">Ngày sinh</label>
                                <div>
                                    <input type="date" class="form-control" name="bday" id="bday" placeholder="Ngày sinh">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ"
                                       value="{!! $user->address !!}"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="city">Tỉnh/Thành phố</label>
                                <select class="form-control" style="background-color: #f0f2f5 !important;">
                                    <option value="1" selected>Hà Nội</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-sm btn-outline-success" type="submit"><i class="fa fa-save"></i>&nbsp; Lưu
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group col-md-12 text-center">
                                <img src="/img/avatar_2x.png" class="avatar img-circle img-thumbnail mb-3" alt="avatar"
                                     style="border-radius: 50% !important;width: 13rem;height: 13rem; border: 2px solid #20c997;">
                                <br>
                                <label type="button" class="btn btn-sm btn-outline-success"><input type="file" class="text-center center-block file-upload choose d-none" accept="image/*">
                                    <i class="fa fa-upload"></i>&nbsp; Tải ảnh lên
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/admin/account/detailAccount.js"></script>
@endsection
