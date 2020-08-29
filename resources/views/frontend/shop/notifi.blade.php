@extends('frontend.layout')

@section('title', 'Thông báo')

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
        <div class="row col-sm-9 pt-4">
            <div class="col-md-2">
                <div style="width: 100%;height: 100%;" src="/img/avatar_2x.png">

                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <p>Đơn hàng đã giao thành công. Tiki tặng bạn mã coupon giá trị...</p>
                </div>
            </div>
            <div class="row col-md-2">
                <div class="col-md-6">
                    <a href="" style="text-decoration: none; color: blue">Đã đọc</a>
                </div>
                <div class="col-md-6">
                    <a href="" style="text-decoration: none; color: red">Xóa</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-script')
    <script src="/Admin/plugins/swiper/swiper.min.js"></script>
    <script src="/js/frontend/product/list.js"></script>
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Admin/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        $('#category-tabs li a').click(function () {
            $(this).next('ul').slideToggle('500');
            $(this).find('i').toggleClass('')
        });
    </script>
@stop
