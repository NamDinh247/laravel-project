@extends('frontend.shop.manager.layout_shop_master')

@section('main-content-shop')
    <div class="manage_content pt-3 manage_posts_content">
        <div class="container">
            <div class="row px-0">
                <div class="col-md-12 px-5">
                    <div class="content_center">
                        {{-- new posts --}}
                        <div class="box-content mb-3" >
                            <div class="p-3 clearfix">
                                <form action="/shop/article/create" method="post">
                                @csrf
                                <div class="box_content_left float-left" style="width: 6%;">
                                    <div class="avatar_box">
                                        @if($shop->logo == null || strlen($shop->logo) == 0)
                                            <img class="rounded-circle" src="/img/avatar_2x.png" alt="avatar" style="width: 100%;">
                                        @else
                                            <img class="rounded-circle" src="{!! $shop->small_photo !!}" alt="avatar" style="width: 100%;">
                                        @endif
                                    </div>
                                    <div class="add_action">
                                        <ul class="menu_box_left pt-2 pl-2">
                                            <li class="item_menu_box_left py-2" title="Video trực tiếp"><i class="fa fa-video text-danger" aria-hidden="true"></i></li>
                                            <li class="item_menu_box_left py-2" title="Thêm ảnh"><i class="fa fa-picture-o text-success" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="box_content_right input-group float-left position-relative" style="width: 94%;">
                                    <div class="w-100" data-emojiarea="" data-type="unicode" data-global-picker="true">
                                        <i class="emoji emoji-smile emoji-button fa fa-smile-o text-warning position-absolute" id="emoji_new_posts" aria-hidden="true"></i>
                                        <textarea class="box_new_posts form-control mb-2" id="box_new_posts" type="text"
                                                  placeholder="Sản phẩm mới nhất của bạn là gì vậy?"
                                                  style="width: 100%;height: 39px;border: none;" name="title"></textarea>
                                        <i class="fa fa-times-circle-o position-absolute" id="resetTextarea" style="top: -5px;right: -5px;color: #868585;font-size: 20px;z-index: 1;"></i>
                                    </div>
                                </div>
                                <div class="save_posts d-none" id="content-post" style="margin-left: 6%">
                                    <div class="row mb-2">
                                        <div class="col-md-7">
                                            <select name="product_id" class="form-control">
                                                @foreach($lst_product as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <button class="btn btn-sm btn-outline-success" id="post" style="width: 100%;border-radius: 20px;font-weight: 600;">Đăng</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        {{-- for từ đây --}}
                        @foreach($lst_article as $article)
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
                                            <div class="name">{!! \Illuminate\Support\Facades\Auth::user()->shop->name !!}</div>
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
                                <div class="content_box_body">
                                    <div class="row p-0 m-0" style="margin-bottom: 1px !important;">
                                        <div class="image1 col-md-12 p-0 m-0">
                                            <img src="{!! $article->product->large_photo !!}" alt="">
                                        </div>
                                    </div>
                                    <div class="row p-0 m-0">
                                        <?php $count = 0; ?>
                                        @foreach($article->product->large_photos as $p)
                                            @if($count < 3)
                                                    <div class="image1 col-md-4">
                                                        <img src="{!! $p !!}" alt="" class="img-fluid">
                                                    </div>
                                            @endif
                                            <?php $count++; ?>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="box_comment pb-3">
                                <div class="clearfix">
                                    <div class="like float-left">
                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"><span class="ml-3">Thích</span></i>
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
@endsection
