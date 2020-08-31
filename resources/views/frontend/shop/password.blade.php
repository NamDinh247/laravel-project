@extends('frontend.shop.layout_user_profile')

@section('main-content-profile')
    <h5>Đổi mật khẩu</h5>
    <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
    <hr/>
    <form class="row" action="#">
        <div class="col-md-6">
            <div class="form-group">
                <label>Mật khẩu cũ</label>
                <input type="password" class="form-control" id="old_pass">
            </div>
            <div class="form-group">
                <label>Mật khẩu mới</label>
                <input type="password" class="form-control" id="new_pass">
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu mới</label>
                <input type="password" class="form-control" id="re_new_pass">
            </div>
            <button class="btn btn-primary" id="submit_change_pass">
                <span class="glyphicon glyphicon-ok"></span> Đổi mật khẩu
            </button>
        </div>
        <div class="col-md-3">

        </div>
    </form>
@endsection
