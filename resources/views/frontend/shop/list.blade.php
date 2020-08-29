@extends('frontend.layout')

@section('title', 'Danh sách sản phẩm')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="/css/frontend/product/listProduct.css">
    <link rel="stylesheet" href="/css/frontend/content_home.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 pt-2" style="background-color: #fff !important;box-shadow: 1px 0 5px -2px #888;">
            <div class="aside_left pl-3">
                <ul class="menu_left">
                    <li class="item_menu_left pl-2 py-2 search_left position-relative">
                        <input type="text" class="form-control" style="border: none;padding-left: 30px;border-radius: 30px;height: 35px; line-height: 35px;" placeholder="Tìm kiếm sản phẩm">
                        <i class="fa fa-search position-absolute" style="top: 14px;left: 13px;"></i>
                    </li>
                    <li class="item_menu_left pl-2 py-2 clearfix">
                        <img class="rounded-circle float-left mr-2" src="/img/avatar_2x.png" alt="avatar left">
                        <span class="float-left item_menu_title pt-1">Hiện TNT</span>
                    </li>
                </ul>
                <hr class="my-3"/>
                <div class="filter_left">
                    <h5 style="color: #65676b;font-size: 16px !important;">Bộ lọc</h5>
                    <ul class="menu_left menu_filter">
                        <li class="item_menu_left pl-2 py-2">
                            <div class="title_filter py-1" style="font-weight: 500;">Tỉnh thành</div>
                            <select class="form-control" style="background-color: #f0f2f5 !important;">
                                <option value="1" selected readonly>Hà Nội</option>
                            </select>
                        </li>
                        <li class="item_menu_left pl-2 py-2">
                            <div class="title_filter py-1" style="font-weight: 500;">Giá</div>
                            <div class="row px-0">
                                <div class="col-md-5 pr-0">
                                    <input type="number" min="0" max="9999999" class="form-control" placeholder="Thấp nhất" style="background-color: #f0f2f5;">
                                </div>
                                <div class="col-md-2 px-0 py-2 text-center">đến</div>
                                <div class="col-md-5 pl-0">
                                    <input type="number" min="0" class="form-control" placeholder="Cao nhất" style="background-color: #f0f2f5;">
                                </div>
                            </div>
                        </li>
                    </ul>
                    <hr class="my-3"/>

                    <h5 style="color: #65676b;font-size: 16px !important;">Hạng mục</h5>
                    <ul class="menu_left menu_categories">
                        <li class="item_menu_left pl-2 py-2 clearfix">
                            <a href="/product/list" style="color: #444;">
                                <i class="fa fa-cubes float-left"></i>
                                <span class="float-left item_menu_title">Kim loại</span>
                            </a>
                        </li>
                        <li class="item_menu_left pl-2 py-2 clearfix">
                            <a href="/product/list">
                                <i class="fa fa-tree float-left"></i>
                                <span class="float-left item_menu_title">Gỗ</span>
                            </a>
                        </li>
                        <li class="item_menu_left pl-2 py-2 clearfix">
                            <a href="/product/list">
                                <i class="fa fa-futbol-o float-left"></i>
                                <span class="float-left item_menu_title">Nhựa, cao su</span>
                            </a>
                        </li>
                        <li class="item_menu_left pl-2 py-2 clearfix">
                            <a href="/product/list">
                                <i class="fa fa-glass float-left"></i>
                                <span class="float-left item_menu_title">Thuỷ tinh</span>
                            </a>
                        </li>
                        <li class="item_menu_left pl-2 py-2 clearfix">
                            <a href="/product/list">
                                <i class="fa fa-window-minimize float-left"></i>
                                <span class="float-left item_menu_title">Khác</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 pt-4" id="content_list_product" style="background-color: #f0f2f5;">
            <div class="col-md-12 px-0">
                <div class="container-fluid">

                </div>
            </div>
        </div>
    </div>
@stop
@section('main-script')
    <script src="/Admin/plugins/swiper/swiper.min.js"></script>
    <script src="/js/frontend/product/list.js"></script>
@stop
