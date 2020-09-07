@extends('frontend.layout')

@section('title', 'Danh sách cửa hàng')

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
                        <input type="text" class="form-control" style="border: none;padding-left: 30px;border-radius: 30px;height: 35px; line-height: 35px;" placeholder="Tìm kiếm cửa hàng">
                        <i class="fa fa-search position-absolute" style="top: 14px;left: 13px;"></i>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li class="item_menu_left pl-2 py-2 clearfix">
                            <img class="rounded-circle float-left mr-2" src="/img/avatar_2x.png" alt="avatar left">
                            <span class="float-left item_menu_title pt-1">
                                {!! \Illuminate\Support\Facades\Auth::user()->full_name !!}
                            </span>
                        </li>
                    @endif
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
                    </ul>
                    <hr class="my-3"/>

                    <h5 class="pb-2" style="color: #65676b;font-size: 16px !important;">Hạng mục</h5>
                    <ul class="menu_left menu_categories">
                        <?php $lstCate = \App\Category::where('status', '!=', -1)->get(); ?>
                        @foreach($lstCate as $cate)
                            <li class="item_menu_left pl-2 py-2 clearfix">
                                <a href="/product/cate/{!! $cate->id !!}" style="color: #444;">
                                    @switch($cate->id)
                                        @case(1)
                                        <i class="fa fa-cubes float-left"></i>
                                        @break
                                        @case(2)
                                        <i class="fa fa-tree float-left"></i>
                                        @break
                                        @case(3)
                                        <i class="fa fa-futbol-o float-left"></i>
                                        @break
                                        @case(4)
                                        <i class="fa fa-glass float-left"></i>
                                        @break
                                        @case(5)
                                        <i class="fa fa-window-minimize float-left"></i>
                                        @break
                                        @default
                                        <i class="fa fa-window-minimize float-left"></i>
                                        @break
                                    @endswitch
                                    <span class="float-left item_menu_title">{!! $cate->name !!}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 pt-2" id="content_list_shop" style="background-color: #f0f2f5;">
            <div class="col-md-12 px-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="py-2 pl-2">Danh sách cửa hàng</h5>
                        </div>
                        @foreach($lstShop as $shop)
                        <div class="col-md-6">
                            <div class="card my-2 border-0">
                                <div class="card-body row">
                                    <div class="col-md-4 cart-img-shop" style="max-width: 220px;">
                                        @if($shop->logo == null || strlen($shop->logo) == 0)
                                            <img class="img-thumbnail border-0 p-0 w-100 h-100" src="/img/img_sign_in.jpg" alt="ảnh 1" style="object-fit: cover;">
                                        @else
                                            <img class="img-thumbnail border-0 p-0 w-100 h-100" src="{!! $shop->large_photo !!}" alt="ảnh 1" style="object-fit: cover;">
                                        @endif
                                    </div>
                                    <div class="col-md-8 pl-0 position-relative">
                                        <h5 class="card-title">{!! $shop->name !!}</h5>
                                        <p class="card-text"></p>
                                        <?php
                                            $lstPrd = \App\Product::where('shop_id', $shop->id)->where('status', 1)->get();
                                            $lstCateByShop = array();
                                            foreach ($lstPrd as $prd) {
                                                if (in_array($prd->category->name, $lstCateByShop)) {
                                                    continue;
                                                }
                                                array_push($lstCateByShop, $prd->category->name);
                                            };
                                        ?>
                                        <p class="card-text pt-2">Danh mục: {!! implode(", ",$lstCateByShop) !!}</p>

                                        <p class="card-text pt-2">Số lượng mặt hàng: {!! count($lstPrd); !!}</p>
                                        <p class="position-absolute" style="bottom: 0;right: 15px;"><a href="/shops/detail/{!! $shop->id !!}" class="" style="color: #2aa846;">Chi tiết <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                            </a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('main-script')
    <script src="/Admin/plugins/swiper/swiper.min.js"></script>
    <script src="/js/frontend/shop/home.js"></script>
    <script>
        $(document).ready(function() {
            $('.menu-header li').removeClass('active');
            $('.menu-header a[title="Cửa hàng"]').parent().addClass('active');
        });
        var height = $(window).height() - 70;
        $('.filter_left').css({'height': (height - 126)  + 'px', 'overflow-x': 'hidden'});
        $('#content_list_shop').css({'height': (height + 10)  + 'px', 'overflow-x': 'hidden'});
    </script>
@stop
