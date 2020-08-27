@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="/admin/account/user" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh sách tài khoản người dùng</a>
        </div>
        <div class="col-12">
            <div class="container-fluid bg-white p-3 content_form" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);border-radius: 5px;">
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
                        <form class="form row" action="#" method="post" id="accountForm">
                            <div class="form-group col-md-6">
                                <label>Tên tài khoản</label>
                                <input type="text" class="form-control" id="userName" placeholder="Tên tài khoản">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tên đầy đủ</label>
                                <input type="text" class="form-control" id="fullName" placeholder="Tên đầy đủ">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" placeholder="Mật khẩu">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ của bạn">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Kiểm chứng</label>
                                <input type="password" class="form-control" id="password2" placeholder="Nhập lại mật khẩu">
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
