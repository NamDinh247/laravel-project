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
                                @foreach($listProvince as $list)
                                    <option value="{{$list}}">{{$list}}</option>
                                    @if($list == 'Hà Nội')
                                        <option value="{{$list}}" selected>{{$list}}</option>
                                    @endif
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
                    {{-- sản phẩm mới --}}
                    <h5 class="py-2 pl-2">Sản phẩm hôm nay</h5>
                    <div id="new_products" class="new_products">
                        <ul id="new_product_today" class="swiper-container">
                            <div class="swiper-wrapper clearfix">
                                <div class="swiper-slide text-center float-left">
                                    <li class="item ">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item ">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                            </div>
                        </ul>
                        <div class="customNavigation">
                            <a class="btn prev brand_prev carousel-control-prev">&nbsp;<i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                            <a class="btn next brand_next carousel-control-next">&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <hr class="pt-2 mb-0"/>
                    {{-- for từ đây lấy sản phẩm theo categories --}}
                    <h5 class="py-2 pl-2">Kim loại</h5>
                    <div id="new_categories1" class="new_products">
                        <ul id="new_product_categories1" class="swiper-container">
                            <div class="swiper-wrapper clearfix">
                                <div class="swiper-slide text-center float-left">
                                    <li class="item ">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item ">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                                <div class="swiper-slide text-center float-left">
                                    <li class="item">
                                        <article class="product-miniature">
                                            <div class="thumbnail-container">
                                                <a href="#" class="thumbnail product-thumbnail">
                                                    <img src="/img/post1.jpg" alt=""/>
                                                    <img class="replace-2x img_1 img-responsive" src="/img/posts2.jpg"/>
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
                                                    <a href="#" > Curabitur Dolor NuncPellentesque augue </a>
                                                </span>
                                                <div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">$19.12</span>
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$23.90</span>
                                                </div>
                                                <div class="product-actions-main">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                                        <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                                        <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                                        <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </div>
                            </div>
                        </ul>
                        <div class="customNavigation">
                            <a class="btn prev brand_prev carousel-control-prev">&nbsp;<i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                            <a class="btn next brand_next carousel-control-next">&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
@stop
