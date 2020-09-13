@extends('frontend.shop.layout_user_profile')

@section('main-content-profile')
    <div class="content_change_password p-3 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
        <div class="row">
            <div class="col-md-12">
                <h5>Đổi mật khẩu</h5>
                <p class="pt-1">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
                <hr/>
            </div>
        </div>
        <form class="row" action="/profile/change-password" method="post">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mật khẩu cũ</label>
                    <input type="password" class="form-control" name="oldPass"
                           placeholder="Nhập mật khẩu cũ" required minlength="6">
                </div>
                <div class="form-group">
                    <label>Mật khẩu mới</label>
                    <input type="password" class="form-control" name="new_password"
                           placeholder="Nhập mật khẩu mới" required minlength="6">
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu mới</label>
                    <input type="password" class="form-control" name="confirm_password"
                           placeholder="Nhập lại mật khẩu mới" required minlength="6">
                </div>
                <button class="btn btn-sm btn-outline-success" id="submit_change_pass">Đổi mật khẩu</button>
            </div>
        </form>
    </div>
@endsection
