@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="/admin/account" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh sách tài khoản</a>
        </div>
        <div class="col-12">
            <div class="container bootstrap snippet">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="text-center">
                            @if($user->avatar == null || strlen($user->avatar) == 0)
                                <img src="/img/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" style="border-radius: 50% !important;width: 13rem;height: 13rem; border: 2px solid #20c997;">
                            @else
                                <img src="{!! $user->largar_photo !!}" class="avatar img-circle img-thumbnail" alt="avatar" style="border-radius: 50% !important;width: 13rem;height: 13rem; border: 2px solid #20c997;">
                            @endif
{{--                            <input type="file" class="text-center center-block file-upload" style="margin-top: 20px;">--}}
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <h5>Thông tin chung</h5>
                        <hr/>
                        <form class="form row" action="/admin/account/edit" method="post" id="userAdminForm">
                            @csrf
                            <input type="text" name="id" hidden value="{!! $user->id !!}"/>
                            <input type="text" name="user_name" hidden value="{!! $user->user_name !!}"/>
                            <input type="text" name="address" hidden value="{!! $user->address !!}"/>
                            <div class="form-group col-md-6">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" name="full_name"
                                       placeholder="Tên tài khoản" value="{!! $user->full_name !!}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Loại tài khoản</label>
                                <select id="type-account" class="form-control" readonly>
                                    <option value="1" @if($user->role == 1) selected @endif>Super Admin</option>
                                    <option value="2" @if($user->role == 2) selected @endif>Admin</option>
{{--                                    <option value="user">Người dùng</option>--}}
{{--                                    <option value="shop">Cửa hàng</option>--}}
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phone"
                                       placeholder="Nhập số điện thoại" value="{!! $user->phone !!}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email"
                                       placeholder="you@email.com" value="{!! $user->email !!}">
                            </div>
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label for="password">Mật khẩu</label>--}}
{{--                                <input type="password" class="form-control" id="password" placeholder="Mật khẩu">--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label>Kiểm chứng</label>--}}
{{--                                <input type="password" class="form-control" id="password2" placeholder="Nhập lại mật khẩu">--}}
{{--                            </div>--}}
                            <div class="form-group col-md-6">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1" @if($user->status == 1) selected @endif>Hoạt động</option>
                                    <option value="3" @if($user->status == 3) selected @endif>Khóa</option>
                                </select>
                            </div>
                            {{-- show --}}
                            <div class="form-group col-md-12">
                                <div class="col-md-6 p-0">
                                    <button class="btn btn-lg btn-success" type="submit"><i class="fa fa-save"></i>&nbsp; Lưu</button>
                                </div>
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
    <script src="/js/detailAccount.js"></script>
@endsection
