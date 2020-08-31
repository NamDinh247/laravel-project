@extends('frontend.shop.layout_user_profile')

@section('main-content-profile')
    <h5>Hồ Sơ Của Tôi</h5>
    <hr/>
    <form class="form row" action="#" method="post" id="accountForm">
        <div class="col-md-6">
            <div class="form-group col-md-12 text-center">
                <img src="/img/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar"
                     style="border-radius: 50% !important;width: 13rem;height: 13rem; border: 2px solid #20c997;">
                <br>
                <input type="file" class="text-center center-block file-upload choose">
            </div>
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
            <div class="col-md-6">
                <button class="btn btn-success form-control" type="submit"><i class="fa fa-save"></i>&nbsp; Lưu
                </button>
            </div>
        </div>
        <div class="col-md-6">
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
        </div>
    </form>
@endsection
