@extends('frontend.layout')

@section('title', 'Thông tin tài khoản')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="/css/frontend/product/listProduct.css">
    <link rel="stylesheet" href="/css/frontend/user.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 pt-4" style="background-color: #fff !important;box-shadow: 1px 0 5px -2px #888;">
            <div class="aside_left pl-3">
                <ul class="menu_left">
                    <li class="item_menu_left pl-2 py-2 search_left position-relative">
                        <input type="text" class="form-control"
                               style="border: none;padding-left: 30px;border-radius: 30px;height: 35px; line-height: 35px;"
                               placeholder="Tìm kiếm sản phẩm">
                        <i class="fa fa-search position-absolute" style="top: 14px;left: 13px;"></i>
                    </li>
                    <li class="item_menu_left pl-2 py-2 clearfix">
                        <img class="rounded-circle float-left mr-2" src="/img/avatar_2x.png" alt="avatar left">
                        <span class="float-left item_menu_title pt-1">Hiện TNT</span>
                    </li>
                </ul>
                <hr class="my-3"/>
                <div class="side-nav-categories">
                    <ul id="category-tabs">
                        <li>
                            <a class="main-category">
                                <i class="fa fa-user"></i>
                                <span>Tài khoản của tôi</span>

                            </a>
                            <ul class="sub-category-tabs">
                                <li><a href="/detail/user">Hồ sơ</a></li>
                                <li><a href="/detail/password">Đổi mật khẩu</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul id="category-tabs">
                        <li>
                            <a class="main-category" href="/detail/orders">
                                <i class="fa fa-bars"></i>
                                <span>Đơn mua</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="category-tabs">
                        <li>
                            <a class="main-category" href="/detail/notifi">
                                <i class="fa fa-bell"></i>
                                <span>Thông báo</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9 pt-4">
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
                        <label>Tên tài khoản</label>
                        <input type="text" class="form-control" id="userName" placeholder="Tên tài khoản">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                               placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com">
                    </div>
                    <div class="col-md-12 text-right">
                        <button class="btn btn-success" type="submit"><i class="fa fa-save"></i>&nbsp; Lưu
                        </button>
                        <button class="btn btn-danger" type="reset"><i class="fa fa-repeat"></i>&nbsp; Reset
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group col-md-12">
                        <label for="address">Giới tính</label>
                        <div>
                            <input type="radio" name="gender" value="male" checked> Nam
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
                        <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="city">Tỉnh/Thành phố</label>
                        <select class="form-control" style="background-color: #f0f2f5 !important;">
                            @foreach($listProvince as $list)
                                <option value="{{$list}}">{{$list}}</option>
                                @if($list == 'Hà Nội')
                                    <option value="{{$list}}" selected>{{$list}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
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
            </form>
        </div>
    </div>
@stop
@section('main-script')
    <script src="/Admin/plugins/swiper/swiper.min.js"></script>
    <script src="/js/frontend/product/list.js"></script>
    <script>
        $('#category-tabs li a').click(function () {
            $(this).next('ul').slideToggle('500');
            $(this).find('i').toggleClass('')
        });
    </script>
@stop
