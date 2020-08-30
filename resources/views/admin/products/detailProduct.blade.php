@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="/admin/product" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh sách sản phẩm</a>
        </div>
        <div class="col-md-12">
            <div class="card border-r-0 border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Thêm mới sản phẩm</h5>
                            <hr/>
                        </div>
                        <div class="col-sm-8">
                            <form class="form row" action="#" method="post" id="accountForm">
                                <div class="form-group col-md-6">
                                    <label>Mã sản phẩm</label>
                                    <input type="text" class="form-control" id="code_product" placeholder="Mã sản phẩm">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tên tài khoản</label>
                                    <input type="text" class="form-control" id="userName" placeholder="Tên sản phẩm">
                                </div>
                                {{-- danh mục này lấy từ category --}}
                                <div class="form-group col-md-6">
                                    <label>Loại sản phẩm</label>
                                    <select id="type-product" class="form-control">
                                        <option value="">Chọn loại sản phẩm</option>
                                        {{-- đây là dữ liệu mẫu, for từ đây, xong thì xoá comment này --}}
                                        <option value="user">Kim loại</option>
                                        <option value="shop">Gỗ</option>
                                        <option value="admin">Nhựa, cao su</option>
                                    </select>
                                </div>
                                {{-- tìm hiểu và sử dụng select2 ở đây --}}
                                <div class="form-group col-md-6">
                                    <label>Cửa hàng</label>
                                    <select id="select_shop" class="form-control">
                                        {{-- đây là dữ liệu mẫu, for từ đây, xong thì xoá comment này --}}
                                        <option value="user">Kim loại</option>
                                        <option value="shop">Gỗ</option>
                                        <option value="admin">Nhựa, cao su</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Giá bán (VND)</label>
                                    <input type="number" class="form-control" min="0" id="price" placeholder="0">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" id="quantily" min="1" placeholder="1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Giảm giá</label>
                                    <select id="sale_shop" class="form-control">
                                        <option value="user" selected>Có</option>
                                        <option value="shop">Không</option>
                                    </select>
                                </div>
                                {{-- show --}}
                                <div class="form-group col-md-6">
                                    <label>Giá trị giảm giá</label>
                                    <input type="number" class="form-control" id="percent" min="0" max="100" placeholder="0">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Giá bán sau giảm giá</label>
                                    <input type="number" class="form-control" id="price2" placeholder="0">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Trạng thái</label>
                                    <select id="sale_shop" class="form-control">
                                        <option value="active">Hoạt động</option>
                                        <option value="inactive">Không hoạt động</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Ghi chú</label>
                                    <textarea type="text" class="form-control" id="address" placeholder="Nhập ghi chú" style="resize: vertical;"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button class="btn btn-lg btn-success" type="submit"><i class="fa fa-save"></i>&nbsp; Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <label for="">Tải ảnh lên</label>
                            <input type="file" id="uploadImages" accept="image/*" multiple>
                            <div class="images_product pt-5">
                                <div class="row">
                                    {{-- for ở đây --}}
                                    <div class="col-md-4">
                                        <div class="image_product position-relative">
                                            <img src="" alt="">
                                            <i class="position-absolute fa fa-trash" style="top: 0; right: 0;font-size: 13px; color: red;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/product/detailProduct.js"></script>
@endsection
