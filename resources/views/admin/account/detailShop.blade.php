@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="/admin/account/shop" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh sách tài khoản cửa hàng</a>
        </div>
        <div class="col-12">
            <div class="container-fluid bg-white p-3 content_form" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);border-radius: 5px;">
                <div class="row">
{{--                    <div class="col-md-12">--}}
{{--                        <div class="box-banner pb-3 position-relative">--}}
{{--                            <img id="banner-shop" src="" alt="" class="d-none">--}}
{{--                            <div class="box-upload-img" ><div class="title-banner" >BANNER</div></div>--}}
{{--                            <button type="button" class="btn btn-outline-success position-absolute" style="top: 55%; left: 45%;"><input type="file" class="text-center center-block file-upload-banner" style="margin-top: 20px;display: none;"><i class="fa fa-upload"></i>&nbsp; Tải ảnh lên</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-sm-3">
                        <div class="text-center">
                            @if($shop->logo == null || strlen($shop->logo) == 0)
                                <img src="/img/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" style="border-radius: 50% !important;width: 13rem;height: 13rem; border: 2px solid #20c997;">
                            @else
                                <img src="{!! $shop->large_photo !!}" class="avatar img-circle img-thumbnail" alt="avatar" style="border-radius: 50% !important;width: 13rem;height: 13rem; border: 2px solid #20c997;">
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <h5>
                            Thông tin cửa hàng
                        </h5>
                        <hr/>
                        <form class="form row" action="/admin/account/shop/edit" method="post" id="accountForm">
                            @csrf
                            <input type="text" name="id" value="{!! $shop->id !!}" hidden/>
                            <div class="form-group col-md-6">
                                <label>Tên cửa hàng</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên cửa hàng"
                                       value="{!! $shop->name !!}" required>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="form-group col-md-6">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại"
                                       value="{!! $shop->phone !!}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="you@email.com"
                                       value="{!! $shop->email !!}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ của bạn"
                                    value="{!! $shop->address !!}" required>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Quận/huyện</label>
                                <input type="password" class="form-control" placeholder="Quận/huyện">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Thành phố</label>
                                <input type="password" class="form-control" placeholder="Tỉnh/thành phố">
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
    <script src="/js/admin/account/detailShop.js"></script>
@endsection
