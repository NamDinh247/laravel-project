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
                        <form action="">
                            <input type="text" class="form-control" name="keyword"
                                   style="border: none;padding-left: 30px;border-radius: 30px;
                                   height: 35px; line-height: 35px;" placeholder="Tìm kiếm sản phẩm">
                            <input type="submit" class="d-none" style="visibility: hidden;" />
                            <i class="fa fa-search position-absolute" style="top: 14px;left: 13px;"></i>
                        </form>
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
        <div class="col-md-9 pt-4" id="content_list_product" style="background-color: #f0f2f5;">
            <div class="col-md-12 px-0">
                <div class="container-fluid">
                    {{-- sản phẩm mới --}}
                    @if(isset($data['keyword']) && strlen($data['keyword']) > 0)
                    <h5 class="py-2 mb-3 pl-2">Tìm kiếm theo từ khóa: {!! $data['keyword'] !!}</h5>
                    @endif
                    <div id="new_products" class="new_products">
                        <ul id="new_product_today" class="swiper-container">
                            <div class="swiper-wrapper clearfix row mx-0">
                                @foreach($data['lst_product'] as $prd)
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
                        {{ $data['lst_product']->links() }}
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
