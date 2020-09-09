@extends('admin.layout_admin_master')

@section('title', 'Tạo tài khoản người dùng mới')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-2">
{{--            <a href="/admin/account/user" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh sách tài khoản người dùng</a>--}}
            <h4>Thêm tài khoản admin</h4>
        </div>
        <div class="col-md-12">
            <div class="container-fluid bg-white p-3 content_form" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img src="/img/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" style="border-radius: 50% !important;width: 13rem;height: 13rem; border: 2px solid #20c997;">
                            <input type="file" class="text-center center-block file-upload" style="margin-top: 20px;">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <h5>Thông tin chung</h5>
                        <hr/>
                        <form class="form row" action="/admin/account/create" method="post" id="accountForm">
                            @csrf
                            <input type="text" name="role" value="2" hidden/>
                            <div class="form-group col-md-6">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" name="full_name" placeholder="Tên đầy đủ" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="you@email.com" required>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" name="comfirm_pass" placeholder="Nhập lại mật khẩu" required>
                            </div>
                            <div class="form-group col-md-12 ">
                                <button class="btn btn-lg btn-success" type="submit"><i class="fa fa-save"></i>&nbsp; Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/admin/account/newUser.js"></script>
@endsection
