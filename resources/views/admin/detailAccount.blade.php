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
                                <label>Loại tài khoản</label>
                                <select id="type-account" class="form-control">
                                    <option value="">Chọn loại tài khoản</option>
                                    <option value="user">Người dùng</option>
                                    <option value="shop">Cửa hàng</option>
                                    <option value="admin">Admin</option>
                                </select>
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
                                <label>Kiểm chứng</label>
                                <input type="password" class="form-control" id="password2" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Trạng thái</label>
                                <select id="status" class="form-control">
                                    <option value="active">Hoạt động</option>
                                    <option value="inactive">Không hoạt động</option>
                                </select>
                            </div>
                            {{-- show --}}
                            <div class="form-group content-bottom-detail col-md-6 d-none">
                                <label>Loại sản phẩm</label>
                                <select id="type-product" class="form-control">
                                    <option value="">Chọn loại sản phẩm</option>
                                    <option value="metal">Kim loại</option>
                                    <option value="wood">Gỗ</option>
                                    <option value="rubber">Nhựa, cao su</option>
                                    <option value="glass">Thuỷ tinh</option>
                                    <option value="synthetic">Vật liệu tổng hợp</option>
                                    <option value="other">Khác</option>
                                </select>
                            </div>
                            <div class="form-group content-bottom-detail col-md-6 d-none">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group content-bottom-detail col-md-6 d-none">
                                <label>Số tài khoản ngân hàng</label>
                                <input type="text" class="form-control" id="number_bank" placeholder="Nhập số tài khoản">
                            </div>
                            <div class="form-group content-bottom-detail col-md-6 d-none">
                                <label>Ngân hàng</label>
                                <input type="text" class="form-control" id="bank" placeholder="Nhập tên ngân hàng">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Ghi chú</label>
                                <textarea type="text" class="form-control" id="address" placeholder="Nhập ghi chú" style="resize: vertical;"></textarea>
                            </div>
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
