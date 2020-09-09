@extends('frontend.layout')

@section('title', 'Chi tiết cửa hàng')

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
{{--                    <li class="item_menu_left pl-2 py-2 clearfix">--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-tags float-left"></i>--}}
{{--                            <span class="float-left item_menu_title">Sản phẩm</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="item_menu_left pl-2 py-2 clearfix">--}}
{{--                        <a href="#" style="color: #444;">--}}
{{--                            <i class="fa fa-file-text-o float-left"></i>--}}
{{--                            <span class="float-left item_menu_title">Bài viết</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
                <hr class="my-3"/>
                <div class="filter_left">
                    <h5 style="color: #65676b;font-size: 16px !important;">Bộ lọc</h5>
                    <?php $lstCate = \App\Category::where('status', '!=', -1)->get(); ?>
                    <ul class="menu_left menu_filter">
                        <li class="item_menu_left pl-2 py-2">
                            <div class="title_filter py-1" style="font-weight: 500;">Loại sản phẩm</div>
                            <select class="form-control" style="background-color: #f0f2f5 !important;">
                                <option value="0" selected>Tất cả</option>
                                @foreach($lstCate as $cate)
                                    <option value="{!! $cate->id !!}">{!! $cate->name !!}</option>
                                @endforeach
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
                    <h5 class="pb-2" style="color: #65676b;font-size: 16px !important;">Hạng mục</h5>
                    <ul class="menu_left menu_categories">
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
                    <div class="row px-2">
                        {{-- danh sách cửa hàng --}}
                        <div class="col-md-12 px-0">
                            <h5 class="py-2 pl-2"><a href="/shops/list" class="text-success"><i class="fa fa-chevron-left text-secondary"></i>&nbsp; Danh sách cửa hàng</a></h5>
                        </div>
                        <div class="col-md-12">
                            <div class="content_introduce">
                                <div class="row py-3 bg-white">
                                    <div class="col-md-4 px-4">
                                        @if($shop->logo == null || strlen($shop->logo) == 0)
                                            <img src="/img/img_sign_in.jpg" alt="logo" class="w-100" style="object-fit: cover;height: 300px;">
                                        @else
                                            <img src="{!! $shop->large_photo !!}" alt="" class="w-100" style="object-fit: cover;height: 300px;">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="pb-3">{!! $shop->name !!}</h5>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><i class="fa fa-phone"></i>&nbsp; Số điện thoại:</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{!! $shop->phone !!}</p>
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-3">
                                                <p><i class="fa fa-envelope"></i>&nbsp; Email:</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{!! $shop->email !!}</p>
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-3">
                                                <p><i class="fa fa-map"></i>&nbsp; Địa chỉ:</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p style="white-space: normal;">{!! $shop->address !!}</p>
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-3">
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
                                                <p><i class="fa fa-cubes"></i>&nbsp; Loại sản phẩm:</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{!! implode(", ",$lstCateByShop) !!}</p>
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-3">
                                                <p><i class="fa fa-tags"></i>&nbsp; Số lượng mặt hàng:</p>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{!! count($lstPrd) !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 pt-3">
                            <h5 class="pt-3">Danh sách sản phẩm</h5>
                            <hr>
                            <div id="new_products" class="new_products">
                                <ul id="new_product_today" class="swiper-container">
                                    <div class="swiper-wrapper clearfix row mx-0">
                                        @foreach($lstProduct as $prd)
                                            <div class="swiper-slide text-center float-left">
                                                <li class="item">
                                                    <article class="product-miniature">
                                                        <div class="thumbnail-container">
                                                            <a href="{!! route('home.product.detail', $prd->id) !!}" class="thumbnail product-thumbnail">
                                                                <img src="{{ $prd->large_photo }}" alt="product"/>
                                                                <img class="replace-2x img_1 img-responsive"
                                                                     src="{{ $prd->large_photo2 }}"/>
                                                            </a>
                                                            <ul class="product-flags">
                                                                <li class="on-sale">On sale!</li>
                                                                <li class="new">New</li>
                                                                <li class="discount_type_flag">
                                                                    <span class="discount-percentage">-20%</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-description">
                                                            <div class="comments_note">
                                                                <div class="star_content clearfix">
                                                                    <div class="star star_on"><i class="fa fa-star"></i></div>
                                                                    <div class="star star_on"><i class="fa fa-star"></i></div>
                                                                    <div class="star star_on"><i class="fa fa-star"></i></div>
                                                                    <div class="star star_on"><i class="fa fa-star"></i></div>
                                                                    <div class="star star_on"><i class="fa fa-star"></i></div>
                                                                </div>
                                                            </div>
                                                            <span class="h3 product-title" itemprop="name">
                                                                <a href="{!! route('home.product.detail', $prd->id) !!}" >{!! $prd->name !!} </a>
                                                            </span>
                                                            <div class="product-price-and-shipping p-0">
                                                                <span class="sr-only">Price</span>
                                                                <span itemprop="price" class="price">
                                                            {!! number_format($prd->price - ($prd->price * ($prd->sale_off/100)),0,',','.') !!} đ
                                                        </span>
                                                                <span class="sr-only">Regular price</span>
                                                                <span class="regular-price">{!! number_format($prd->price,0,',','.') !!} đ</span>
                                                            </div>
                                                            <div class="product-actions-main">
                                                                <a href="javascript:void(0)" class="btn btn-sm add-to-cart"
                                                                   data-id="{{$prd->id}}">
                                                                    <i class="fa fa-shopping-cart"></i>Thêm vào giỏ
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </li>
                                            </div>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 pt-3">
                            <h5 class="">Danh sách bài viết</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div id="list_posts">
                                        @foreach($lstArticle as $article)
                                            <div class="box-content mb-3" >
                                                <div class="box_header pt-3">
                                                    <div class="avatar_box pb-2 px-3">
                                                        <div class="box_img mr-2">
                                                            @if($article->shop->logo == null || strlen($article->shop->logo) == 0)
                                                                <img class="rounded-circle float-left" src="/img/avatar_2x.png" alt="avatar" style="width: 100%;">
                                                            @else
                                                                <img class="rounded-circle float-left" src="{!! $article->shop->small_photo !!}" alt="avatar" style="width: 100%;">
                                                            @endif
                                                        </div>
                                                        <div class="name_time">
                                                            <div class="nameTime">
                                                                <div class="name">{!! $article->shop->name !!}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content_header px-2 py-1">
                                                        <div class="content_header_child">
                                                            <span>
                                                                {!! $article->title !!}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box_body">
                                                    <div class="content_box_body" style="border-top: 1px solid #ced0d4; border-bottom: 1px solid #ced0d4; ">
                                                        <div class="row p-0 m-0" style="margin-bottom: 1px !important;">
                                                            <div class="image1 col-md-12 p-0 m-0">
                                                                <img src="{!! $article->product->large_photo !!}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="row p-0 m-0">
                                                            <?php $count = 0; ?>
                                                            @foreach($article->product->large_photos as $p)
                                                                @if($count < 3)
                                                                    <div class="image1 col-md-4 px-0">
                                                                        <img src="{!! $p !!}" alt="" class="img-fluid" style="padding-right: 2px !important;">
                                                                    </div>
                                                                @endif
                                                                <?php $count++; ?>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box_comment p-3">
                                                    <div class="clearfix">
                                                        <div class="like float-left">
                                                            <i class="fa fa-thumbs-o-up" aria-hidden="true"><span class="ml-3">Thích</span></i>
                                                        </div>
                                                        <div class="detail_posts float-right">
                                                            <a href="{!! route('home.product.detail', $article->product->id) !!}" style="font-weight: 500;">
                                                                Chi tiết <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('main-script')
    <script src="/Admin/plugins/swiper/swiper.min.js"></script>
    <script src="/js/frontend/product/list.js"></script>
    <script>
        $(document).ready(function() {
            $('.menu-header li').removeClass('active');
            $('.menu-header a[title="Cửa hàng"]').parent().addClass('active');
        });
        var height = $(window).height() - 70;
        $('.filter_left').css({'height': (height - 126)  + 'px', 'overflow-x': 'hidden'});
        $('#content_list_shop').css({'height': (height + 10)  + 'px', 'overflow-x': 'hidden'});
    </script>
    <script>
        $(document).ready(function () {
            $('.add-to-cart').click(function () {
                var productId = $(this).attr('data-id');
                $.ajax({
                    'url': '/shopping-cart/add',
                    'method': 'GET',
                    'data': {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        'productId': productId,
                        'quantity': 1
                    },
                    'success': function () {
                        // Thông báo thành công, reload lại trang.
                        alert('Action success');
                    },
                    'error': function () {
                        alert('Action fails');
                    }
                })
            });
        });
    </script>
@stop
