@extends('admin.layout_admin_master')

@section('title', 'Chi tiết tài khoản người dùng')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="/admin/account/user" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh sách tài khoản người dùng</a>
        </div>
        <div class="col-12">
            <div class="container-fluid bg-white p-3 content_form" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);border-radius: 5px;">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img src="/img/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" style="border-radius: 50% !important;width: 13rem;height: 13rem; border: 2px solid #20c997;">
                            <input type="file" class="text-center center-block file-upload d-none" style="margin-top: 20px;">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <h5>
                            Thông tin chung
{{--                            <button class="btn btn-sm btn-outline-warning float-right" id="edit">--}}
{{--                                <i class="fa fa-edit"></i>&nbsp; Sửa--}}
{{--                            </button>--}}
{{--                            <button class="btn btn-sm btn-outline-secondary float-right mr-2" style="border: 1px solid #ddd;">--}}
{{--                                <i class="fa fa-envelope-open"></i>&nbsp; Xác minh--}}
{{--                            </button>--}}
                        </h5>
                        <hr/>
                        <form class="form row" action="/admin/account/edit" method="post" id="accountForm">
                            @csrf
                            <input type="text" name="id" value="{!! $user->id !!}" hidden />
                            <div class="form-group col-md-6">
                                <label>Tên tài khoản</label>
                                <input type="text" class="form-control" name="user_name" placeholder="Tên tài khoản"
                                       value="{!! $user->user_name !!}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" name="full_name" placeholder="Tên đầy đủ"
                                       value="{!! $user->full_name !!}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại"
                                       value="{!! $user->phone !!}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="you@email.com"
                                       value="{!! $user->email !!}" required>
                            </div>
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label for="password">Mật khẩu</label>--}}
{{--                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>--}}
{{--                            </div>--}}
                            <div class="form-group col-md-6">
                                <label for="email">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ của bạn"
                                    value="{!! $user->address !!}" required>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="form-group col-md-6">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1" @if($user->status == 1) selected @endif>Hoạt động</option>
                                    <option value="3" @if($user->status == 3) selected @endif>Khóa</option>
                                </select>
                            </div>
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label>Kiểm chứng</label>--}}
{{--                                <input type="password" class="form-control" id="password2" placeholder="Nhập lại mật khẩu">--}}
{{--                            </div>--}}
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
    <script src="/js/admin/account/detailUser.js"></script>
@endsection
