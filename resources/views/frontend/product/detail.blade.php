@extends('frontend.layout')

@section('title', 'Danh sách sản phẩm')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="/css/frontend/product/listProduct.css">
    <link rel="stylesheet" href="/css/frontend/product/detailProduct.css">
@endsection

@section('content')
    <div class="container px-1">
        <div class="row pt-4">
            <div class="col-md-4 product_main_img">
                <section class="page-content" id="content">
                    <div id="" class="product-leftside">
                        <ul class="product-flags">
                            <li class="product-flag online-only">Online only</li>
                            <li class="product-flag on-sale">On sale!</li>
                            <li class="product-flag new">New</li>
                        </ul>
                        <div class="images-container">
                            <div class="product-cover">
                                <a href="#" data-fancybox="images">
                                    <img class="js-qv-product-cover" src="{{ $product->large_photo }}" style="width: 100%;" width="100"/>
                                </a>
                            </div>
                            <div id="images-container" class="products swiper-container">
                                <ul id="additional-carousel" class="carousel slide tm-carousel product_list swiper-wrapper">
                                   @foreach($product->large_photos as $p)
                                        <div class="owl-item swiper-slide">
                                            <li class="thumb-container item pb-0">
                                                <a href="#" data-fancybox="images">
                                                    <img class="thumb js-thumb m-0" src="{{ $p }}"  width="100"/>
                                                </a>
                                            </li>
                                        </div>
                                    @endforeach
                                </ul>
                                <div class="customNavigation">
                                    <a class="btn prev brand_prev carousel-control-prev" >&nbsp;<i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                    <a class="btn next brand_next carousel-control-next">&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-8 product_middle">
                <h5 class="productpage_title" itemprop="name">{!! $product->name !!}</h5>
                <a href="#" itemprop="name"><i class="fa fa-archive" style="color: #444;"></i>
                    &nbsp;{!! $product->shop->name !!}
                </a>
                <div class="hook-reviews pt-2">
                    <div class="comments_note">
                        <div class="star_content clearfix">
                            <div class="star star_on"><i class="fa fa-star"></i></div>
                            <div class="star star_on"><i class="fa fa-star"></i></div>
                            <div class="star star_on"><i class="fa fa-star"></i></div>
                            <div class="star star_on"><i class="fa fa-star"></i></div>
                            <div class="star"><i class="fa fa-star"></i></div>
                        </div>
                    </div>
                </div>
                <div class="product-information">
                    <div class="product-prices">
                        <div class="product-price h5 has-discount">
                            <div class="current-price">
                                <span>{!! number_format($product->price - $product->price * ($product->sale_off/100),0,',','.') !!} VND</span>
                                <span class="discount discount-percentage">
                                    {!! $product->sale_off !!}%
                                </span>
                            </div>
                        </div>
                        <div class="product-discount">
                            <span class="regular-price">
                                {!! number_format($product->price,0,',','.') !!} vnđ
                            </span>
                        </div>
                    </div>
                    <div id="product-description-short-2" itemprop="description">
                        <p>{!! $product->description !!}</p>
                    </div>
                    <div class="product-actions">
                        <form action="" method="post" id="add-to-cart-or-refresh">
                            <div class="product-variants">
                                <div class="clearfix product-variants-item">
                                    <span class="control-label">Chất liệu chính:</span>
                                    <div class="float-left py-2" id="group_1">
                                        {!! $product->category->name !!}
                                    </div>
                                </div>
                                <div class="clearfix product-variants-item">
                                    <span class="control-label">Đơn vị:</span>
                                    <div class="float-left py-2" id="group_1">Chiếc</div>
                                </div>
                            </div>

                            <div class="product-add-to-cart clearfix">
                                <span class="control-label">Số lượng:</span>

                                <div class="product-quantity">
                                    <div class="qty">
                                        <div class="input-group bootstrap-touchspin">
                                            <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                                            <input type="number" name="qty" id="quantity_wanted" min="0" value="1" class="input-group form-control" min="1" aria-label="Quantity" style="display: block;" />
                                        </div>
                                    </div>

                                    <div class="add">
                                        <a href="javascript:void(0)" class="btn btn-sm add-to-cart"
                                           data-id="{{$product->id}}">
                                            <i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng
                                        </a>

                                        <span id="product-availability"> </span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <p class="product-minimal-quantity"></p>
                            </div>

                            <div class="product-additional-info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- 2 -->
        <section class="product-tabcontent mt-3">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#description">Mô tả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#product-details">Chi tiết sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#rating">Đánh giá</a>
                    </li>
                </ul>
                <div class="tab-content" id="tab-content">
                    <!-- mô tả -->
                    <div class="tab-pane active" id="description">
                        <div class="product-description">
                            <p>{!! $product->description !!}</p>
                        </div>
                    </div>

                    <!-- chi tiết sản phẩm -->
                    <div class="tab-pane fade clearfix" id="product-details" role="tabpanel">
                        <div class="product-manufacturer" style="float: left;padding-right: 30px;">
                            <a href="#">
                                <img src="{{ $product->small_photo }}" class="img img-thumbnail manufacturer-logo"/>
                            </a>
                        </div>
                        <div class="detail_content" style="float: left;">
                            <div class="product-reference">
                                <label class="label">Sản phẩm: </label>
                                <span itemprop="sku">{!! $product->name !!}</span>
                            </div>
                            <div class="product-reference">
                                <label class="label">Loại sản phẩm: </label>
                                <span itemprop="sku">{!! $product->category->name !!}</span>
                            </div>
                            <div class="product-reference">
                                <label class="label">Xuất xứ: </label>
                                <span itemprop="sku">Việt Nam</span>
                            </div>
                            <div class="product-reference">
                                <label class="label">Đơn vị: </label>
                                <span itemprop="sku">{!! $product->shop->name !!}</span>
                            </div>
                        </div>
                    </div>

                    <!-- đánh giá -->
                    <div class="tab-pane fade in" id="rating">
                        <div id="productCommentsBlock">
                            <div class="tabs">
                                <div id="product_comments_block_tab">
                                    <div class="comment clearfix" itemprop="review" itemscope="" itemtype="https://schema.org/Review">
                                        <div class="comment_author">
                                            <span>Grade&nbsp;</span>
                                            <div class="star_content clearfix" itemprop="reviewRating" itemscope="" itemtype="https://schema.org/Rating">
                                                <div class="star star_on"></div>
                                                <div class="star star_on"></div>
                                                <div class="star star_on"></div>
                                                <div class="star star_on"></div>
                                                <div class="star"></div>
                                                <meta itemprop="worstRating" content="0" />
                                                <meta itemprop="ratingValue" content="4" />
                                                <meta itemprop="bestRating" content="5" />
                                            </div>
                                            <div class="comment_author_infos">
                                                <strong itemprop="author">Ipsum</strong><br />
                                                <em>07/17/2019</em>
                                                <meta itemprop="datePublished" content="07/17/2019" />
                                            </div>
                                        </div>
                                        <div class="comment_details">
                                            <h4 class="title_block" itemprop="name">best qulity</h4>
                                            <p itemprop="reviewBody">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula.
                                            </p>
                                            <ul></ul>
                                        </div>
                                    </div>
                                    <div class="clearfix pull-left">
                                        <a class="open-comment-form btn btn-sm" href="#new_comment_form">Nhận xét của bạn</a>
                                    </div>
                                    <div id="new_comment_form_ok" class="alert alert-success" style="display: none; padding: 15px 25px;"></div>
                                </div>
                            </div>

                            <!-- Fancybox -->
                            <div style="display: none;">
                                <div id="new_comment_form">
                                    <form id="id_new_comment_form" action="#">
                                        <h2 class="title">Nhận xét của bạn</h2>
                                        <div class="product clearfix">
                                            <div class="product_desc">
                                                <p class="product_name"><strong>Suspendisse Massa Nullaqm vulputate dictum</strong></p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in
                                                    ligula.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="new_comment_form_content">
                                            <h2>Nhận xét của bạn</h2>
                                            <div id="new_comment_form_error" class="error" style="display: none; padding: 15px 25px;">
                                                <ul></ul>
                                            </div>
                                            <ul id="criterions_list">
                                                <li>
                                                    <label>Quality</label>
                                                    <div class="star_content">
                                                        <input type="hidden" name="criterion[1]" value="5" />
                                                        <div class="cancel"><a title="Cancel Rating"></a></div>
                                                        <div class="star star_on"><a title="1">1</a></div>
                                                        <div class="star star_on"><a title="2">2</a></div>
                                                        <div class="star star_on"><a title="3">3</a></div>
                                                        <div class="star star_on"><a title="4">4</a></div>
                                                        <div class="star star_on"><a title="5">5</a></div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </ul>
                                            <label for="comment_title">Title for your review<sup class="required">*</sup></label>
                                            <input id="comment_title" name="title" type="text" value="" />

                                            <label for="content">Your review<sup class="required">*</sup></label>
                                            <textarea id="content" name="content"></textarea>

                                            <label>Your name<sup class="required">*</sup></label>
                                            <input id="commentCustomerName" name="customer_name" type="text" value="" />

                                            <div id="new_comment_form_footer">
                                                <input id="id_product_comment_send" name="id_product" type="hidden" value="2" />
                                                <p class="row required"><sup>*</sup> Required fields</p>
                                                <p class="fr">
{{--                                                    <input--}}
{{--                                                        onchange="if($(this).is(':checked')){$('#submitNewMessage').removeClass('gdpr_disabled'); $('#submitNewMessage').removeAttr('disabled'); rebindClickButton();}else{$('#submitNewMessage').addClass('gdpr_disabled'); $('#submitNewMessage').off('click'); $('#submitNewMessage').attr('disabled', 1); }"--}}
{{--                                                        id="gdpr_checkbox"--}}
{{--                                                        type="checkbox"--}}
{{--                                                    />--}}

                                                    I accept <a target="_blank" href="https://prestashop.templatemela.com/PRSADD11/PRS273/index.php?id_cms=1&amp;controller=cms&amp;id_lang=1">privacy policy</a> rules

                                                    <button disabled="" class="btn btn-primary gdpr_disabled" id="submitNewMessage" name="submitMessage" type="submit">Send</button>&nbsp; or&nbsp;<a href="#" >Cancel</a>
{{--                                                    onclick="$.fancybox.close();"--}}
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- có thể bạn cũng thích -->
        <h5 hidden class="products-section-title text-uppercase pb-2" style="border-bottom: 1px solid #f0f0f0;">Có thể bạn cũng thích</h5>
        <div id="youLike" hidden class="products position-relative pt-2">
            <ul id="favorite_product" class="carousel slide tm-carousel product_list swiper-container">
{{--                        @foreach($list_product as $prd)--}}
                <div class="clearfix swiper-wrapper">
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="/img/posts2.jpg" alt="product"/>
                                        <img class="replace-2x img_1 img-responsive"
                                             src="/img/posts3.jpg"/>
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
{{--										                <a href="{{ route('frontend.detailProduct', $prd->id) }}" > {{$prd->name}} </a>--}}
                                        <a href="" > 1 </a>
                                    </span>
                                    <div class="product-price-and-shipping">
                                        <span class="sr-only">Price</span>
                                        <span itemprop="price" class="price">12312312 VNĐ</span>
                                        <span class="sr-only">Regular price</span>
                                        <span class="regular-price">1231231212312 vnđ</span>
                                    </div>
                                    <div class="product-actions-main">
                                        <form action="" method="post" class="add-to-cart-or-refresh">
                                            <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                            <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                            <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="/img/posts2.jpg" alt="product"/>
                                        <img class="replace-2x img_1 img-responsive"
                                             src="/img/posts3.jpg"/>
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
{{--										                <a href="{{ route('frontend.detailProduct', $prd->id) }}" > {{$prd->name}} </a>--}}
                                            <a href="" > 1 </a>
                                        </span>
                                    <div class="product-price-and-shipping">
                                        <span class="sr-only">Price</span>
                                        <span itemprop="price" class="price">12312312 VNĐ</span>
                                        <span class="sr-only">Regular price</span>
                                        <span class="regular-price">1231231212312 vnđ</span>
                                    </div>
                                    <div class="product-actions-main">
                                        <form action="" method="post" class="add-to-cart-or-refresh">
                                            <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                            <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                            <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="/img/posts2.jpg" alt="product"/>
                                        <img class="replace-2x img_1 img-responsive"
                                             src="/img/posts3.jpg"/>
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
{{--										                <a href="{{ route('frontend.detailProduct', $prd->id) }}" > {{$prd->name}} </a>--}}
                                            <a href="" > 1 </a>
                                        </span>
                                    <div class="product-price-and-shipping">
                                        <span class="sr-only">Price</span>
                                        <span itemprop="price" class="price">12312312 VNĐ</span>
                                        <span class="sr-only">Regular price</span>
                                        <span class="regular-price">1231231212312 vnđ</span>
                                    </div>
                                    <div class="product-actions-main">
                                        <form action="" method="post" class="add-to-cart-or-refresh">
                                            <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                            <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                            <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="/img/posts2.jpg" alt="product"/>
                                        <img class="replace-2x img_1 img-responsive"
                                             src="/img/posts3.jpg"/>
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
{{--										                <a href="{{ route('frontend.detailProduct', $prd->id) }}" > {{$prd->name}} </a>--}}
                                            <a href="" > 1 </a>
                                        </span>
                                    <div class="product-price-and-shipping">
                                        <span class="sr-only">Price</span>
                                        <span itemprop="price" class="price">12312312 VNĐ</span>
                                        <span class="sr-only">Regular price</span>
                                        <span class="regular-price">1231231212312 vnđ</span>
                                    </div>
                                    <div class="product-actions-main">
                                        <form action="" method="post" class="add-to-cart-or-refresh">
                                            <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                            <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                            <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="/img/posts2.jpg" alt="product"/>
                                        <img class="replace-2x img_1 img-responsive"
                                             src="/img/posts3.jpg"/>
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
{{--										                <a href="{{ route('frontend.detailProduct', $prd->id) }}" > {{$prd->name}} </a>--}}
                                            <a href="" > 1 </a>
                                        </span>
                                    <div class="product-price-and-shipping">
                                        <span class="sr-only">Price</span>
                                        <span itemprop="price" class="price">12312312 VNĐ</span>
                                        <span class="sr-only">Regular price</span>
                                        <span class="regular-price">1231231212312 vnđ</span>
                                    </div>
                                    <div class="product-actions-main">
                                        <form action="" method="post" class="add-to-cart-or-refresh">
                                            <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                            <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                            <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="/img/posts2.jpg" alt="product"/>
                                        <img class="replace-2x img_1 img-responsive"
                                             src="/img/posts3.jpg"/>
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
{{--										                <a href="{{ route('frontend.detailProduct', $prd->id) }}" > {{$prd->name}} </a>--}}
                                            <a href="" > 1 </a>
                                        </span>
                                    <div class="product-price-and-shipping">
                                        <span class="sr-only">Price</span>
                                        <span itemprop="price" class="price">12312312 VNĐ</span>
                                        <span class="sr-only">Regular price</span>
                                        <span class="regular-price">1231231212312 vnđ</span>
                                    </div>
                                    <div class="product-actions-main">
                                        <form action="" method="post" class="add-to-cart-or-refresh">
                                            <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                            <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                            <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="/img/posts2.jpg" alt="product"/>
                                        <img class="replace-2x img_1 img-responsive"
                                             src="/img/posts3.jpg"/>
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
{{--										                <a href="{{ route('frontend.detailProduct', $prd->id) }}" > {{$prd->name}} </a>--}}
                                            <a href="" > 1 </a>
                                        </span>
                                    <div class="product-price-and-shipping">
                                        <span class="sr-only">Price</span>
                                        <span itemprop="price" class="price">12312312 VNĐ</span>
                                        <span class="sr-only">Regular price</span>
                                        <span class="regular-price">1231231212312 vnđ</span>
                                    </div>
                                    <div class="product-actions-main">
                                        <form action="" method="post" class="add-to-cart-or-refresh">
                                            <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                            <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                            <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="/img/posts2.jpg" alt="product"/>
                                        <img class="replace-2x img_1 img-responsive"
                                             src="/img/posts3.jpg"/>
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
{{--										                <a href="{{ route('frontend.detailProduct', $prd->id) }}" > {{$prd->name}} </a>--}}
                                            <a href="" > 1 </a>
                                        </span>
                                    <div class="product-price-and-shipping">
                                        <span class="sr-only">Price</span>
                                        <span itemprop="price" class="price">12312312 VNĐ</span>
                                        <span class="sr-only">Regular price</span>
                                        <span class="regular-price">1231231212312 vnđ</span>
                                    </div>
                                    <div class="product-actions-main">
                                        <form action="" method="post" class="add-to-cart-or-refresh">
                                            <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                            <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                            <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="/img/posts2.jpg" alt="product"/>
                                        <img class="replace-2x img_1 img-responsive"
                                             src="/img/posts3.jpg"/>
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
{{--										                <a href="{{ route('frontend.detailProduct', $prd->id) }}" > {{$prd->name}} </a>--}}
                                            <a href="" > 1 </a>
                                        </span>
                                    <div class="product-price-and-shipping">
                                        <span class="sr-only">Price</span>
                                        <span itemprop="price" class="price">12312312 VNĐ</span>
                                        <span class="sr-only">Regular price</span>
                                        <span class="regular-price">1231231212312 vnđ</span>
                                    </div>
                                    <div class="product-actions-main">
                                        <form action="" method="post" class="add-to-cart-or-refresh">
                                            <input type="hidden" name="token" value="75d588bed716bb5ab0bb3241a08ab68c" />
                                            <input type="hidden" name="id_product" value="1" class="product_page_product_id" />
                                            <input type="hidden" name="id_customization" value="0" class="product_customization_id" />
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                </div>
{{--                        @endforeach--}}
            </ul>
            <div class="customNavigation" style="top: 11rem;">
                <a class="btn prev brand_prev carousel-control-prev" href="#favorite_product" role="button" data-slide="prev">&nbsp;<i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <a class="btn next brand_next carousel-control-next" href="#favorite_product" role="button" data-slide="next">&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <!-- Sản phẩm đi kèm -->
        <h5 hidden class="products-section-title text-uppercase pb-2" style="border-bottom: 1px solid #f0f0f0;">Sản phẩm đi kèm</h5>
        <div id="productIncluded" hidden class="products position-relative pt-2">
            <ul id="products_included" class="carousel slide tm-carousel product_list swiper-container">
                <div class="swiper-wrapper clearfix">
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                </div>
            </ul>
            <div class="customNavigation" style="top: 11rem;">
                <a class="btn prev brand_prev carousel-control-prev" href="#products_included" role="button" data-slide="prev">&nbsp;<i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <a class="btn next brand_next carousel-control-next" href="#products_included" role="button" data-slide="next">&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <!-- Sản phẩm tương tự -->

        <h5 hidden class="products-section-title text-uppercase pb-2" style="border-bottom: 1px solid #f0f0f0;">Sản phẩm tương tự</h5>
        <div id="similar" hidden class="products position-relative pt-2">
            <ul id="similar_product" class="carousel slide tm-carousel product_list swiper-container">
                <div class="clearfix swiper-wrapper">
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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

                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                    <div class="owl-item swiper-slide">
                        <li class="item">
                            <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">
                                    <a href="#" class="thumbnail product-thumbnail">
                                        <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/2/7/27-home_default.jpg" alt=""/>
                                        <img class="replace-2x img_1 img-responsive" src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg"/>
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
                                            <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </div>
                </div>
            </ul>
            <div class="customNavigation" style="top: 11rem;">
                <a class="btn prev brand_prev carousel-control-prev">&nbsp;<i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <a class="btn next brand_next carousel-control-next">&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
@stop
@section('main-script')
    <script src="/Admin/plugins/swiper/swiper.min.js"></script>
    <script src="/js/frontend/product/detail.js"></script>
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
