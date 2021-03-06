@extends('frontend.layout')

@section('title', 'Trang chủ')

@section('header-script')
    <link rel="stylesheet" href="/css/frontend/content_home.css">
@endsection

@section('content')
    <div class="row" style="background-color: #f0f2f5;">
        <div class="col-md-3 pt-4">
            @include('frontend.asideLeftHome')
        </div>
        <div class="col-md-9 pt-4" id="content_posts_home" style="margin-left: auto!important;">
            <div class="row px-0">
                <div class="col-md-8 px-5">
                    <div class="content_center">
                        {{-- new posts --}}
                        <div class="box-content mb-3 d-none" >
                            <div class="p-3 clearfix">
                                <div class="box_content_left float-left">
                                    <div class="avatar_box">
                                        <img class="rounded-circle" src="/img/avatar_2x.png" alt="avatar" style="width: 100%;">
                                    </div>
                                    <div class="add_action">
                                        <ul class="menu_box_left pt-2 pl-2">
                                            <li class="item_menu_box_left py-2" title="Video trực tiếp"><i class="fa fa-video text-danger" aria-hidden="true"></i></li>
                                            <li class="item_menu_box_left py-2" title="Thêm ảnh"><i class="fa fa-picture-o text-success" aria-hidden="true"></i></li>
                                            <li class="item_menu_box_left py-2" title="Biểu tượng cảm xúc"><i class="fa fa-smile-o text-warning" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="box_content_right input-group float-left">
                                    <textarea class="box_new_posts form-control mb-2" id="box_new_posts" type="text" placeholder="Sản phẩm mới nhất của bạn là gì vậy?" style="height: 39px;"></textarea>
                                </div>
                                <div class="save_posts" style="margin-left: 10%">
                                    <button class="btn btn-sm btn-outline-success" id="post" style="width: 100%;border-radius: 20px;font-weight: 600;">Đăng</button>
                                </div>
                            </div>
                        </div>
                        {{-- for từ đây --}}
                        @foreach($lst_article as $article)
                            <div class="box-content mb-4" >
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
                                                <div class="name">
                                                    {!! $article->shop->name !!}
                                                </div>
                                                <div style="font-size: 11px; color: green">
                                                    {!! date('d-m-Y', strtotime($article->created_at)) !!}
                                                </div>
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
                                            <i class="fa fa-thumbs-o-up" aria-hidden="true" style="font-weight: 500;"><span class="ml-2">Thích</span></i>
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
                <div class="col-md-4 px-4">
                    <a class="py-2" style="font-size: 18px; font-weight: 500;">5 cửa hàng bán chạy nhất tháng</a>
                    <hr class="py-1"/>
                    @foreach($lst_shops as $shop)
                    <div class="row pb-3">
                        <div class="col-md-12 py-3">
                            <div class="row">
                                <div class="col-md-4" style="height: 110px;">
                                    @if($shop->logo == null || strlen($shop->logo) == 0)
                                        <img class="img-thumbnail border-0 p-0 w-100 h-100" src="/img/post1.jpg" alt="img_shop" style="object-fit: cover;">
                                    @else
                                        <img class="img-thumbnail border-0 p-0 w-100 h-100" src="{!! $shop->large_photo !!}" alt="img_shop" style="object-fit: cover;">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <a href="/shops/detail/{!! $shop->id !!}" class="" style="font-size: 14px;font-weight: 500;">{!! $shop->name !!}</a>
                                    <div class="comments_note pb-1">
                                        <div class="star_content clearfix">
                                            <div class="star star_on"><i class="fa fa-star"></i></div>
                                            <div class="star star_on"><i class="fa fa-star"></i></div>
                                            <div class="star star_on"><i class="fa fa-star"></i></div>
                                            <div class="star star_on"><i class="fa fa-star"></i></div>
                                            <div class="star star_on"><i class="fa fa-star"></i></div>
                                        </div>
                                    </div>
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
                                    <p class="card-text">Danh mục: {!! implode(", ",$lstCateByShop) !!}</p>
                                    <p class="card-text">Với {!! count($lstPrd); !!} sản phảm khác nhau</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
@section('main-script')
    <script src="/js/frontend/home.js"></script>
{{--    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=680469619206748&autoLogAppEvents=1" nonce="tTMwqKi2"></script>--}}
    <script>
        var height = $(window).height() - 70;
        $('.menu_categories_home').css({'height': (height - 273)  + 'px', 'overflow-x': 'hidden'});
        $('#content_posts_home').css({'height': (height + 7)  + 'px', 'overflow-x': 'hidden'});
    </script>
@stop
