@extends('frontend.layout')

@section('title', 'Danh sách sản phẩm')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="/Admin/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/css/frontend/listProduct.css">
    <link rel="stylesheet" href="/css/frontend/shoppingCart.css">
@endsection

@section('content')
    <div class="container">
        <div id="columns_inner" style="padding: 20px 0;">
            <div id="content-wrapper" class="row">
                <div class="tab-main-title col-md-12" style="margin-bottom: 15px !important; border: none;">
                    <h2 class="h1 products-section-title text-uppercase" style="font-size: 16px !important;">
                        SHOPPING CART
                    </h2>
                </div>
                <section id="main" class="col-md-12">
                    <div class="cart-grid row mb-2">
                        <div class="cart-grid-body col-md-9">
                            <div class="card cart-container border-0 mb-3">
                                <div class="card-block">
                                    {{-- for từ đây --}}
                                    <div class="cart-header">
                                        <div class="close1"></div>
                                        <div class="cart-sec simpleCart_shelfItem">
                                            <div class="cart-item cyc py-0" style="border-bottom: none;">
                                                <img src="https://prestashop.templatemela.com/PRSADD11/PRS273/img/p/3/2/32-home_default.jpg" class="img-responsive" alt="" />
                                            </div>
                                            <div class="cart-item-info">
                                                <h3><a href="#">Mountain Hopper(XS R034)</a><span>Mã sản phẩm: 3578</span></h3>
                                                <ul class="qty">
                                                    <li class="row py-1">
                                                        <div class="product-variants-item col-md-6">
                                                            <div class="row p-0 m-0">
                                                                <span class="control-label col-md-6 px-0 mr-0 my-2">cửa hàng: </span>
                                                                <span class="col-md-6 p-0 my-2"><a href="#">Kim Loại Bất Lực</a></span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="row py-1">
                                                        <div class="product-variants-item col-md-6">
                                                            <div class="row p-0 m-0">
                                                                <span class="control-label col-md-6 px-0 mr-0 my-2">Loại sản phẩm: </span>
                                                                <span class="col-md-6 p-0 my-2">Kim loại</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="row py-1">
                                                        <div class="product-add-to-cart clearfix col-md-6">
                                                            <div class="row p-0 m-0">
                                                                <span class="control-label col-md-6 mt-3 px-0 mr-0 mb-2">Số lượng: </span>
                                                                <div class="col-md-6 p-0 my-2">
                                                                    <input type="number" min="0" class="form-control" placeholder="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="row py-1">
                                                        <div class="product-variants-item col-md-6">
                                                            <div class="row p-0 m-0">
                                                                <span class="control-label col-md-6 px-0 mr-0 my-2">Tổng tiền: </span>
                                                                <span class="col-md-6 p-0 my-2">100.00 VND</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>

                                                <div class="delivery">
                                                    <p> </p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="cart-overview js-cart d-none">
                                    <span class="no-items">There are no more items in your cart</span>
                                </div>
                            </div>
                            <a class="label" style="color: #444;" href="#"> <i class="fa fa-chevron-left" aria-hidden="true" style="font-size: 13px;"></i> Continue shopping </a>
                        </div>
                        <div class="cart-grid-right col-md-3">
                            <div class="card cart-summary border-0">
                                <div class="cart-detailed-totals p-2">
                                    <div class="card-block">
                                        <div class="cart-summary-line row mx-0">
                                            <span class="label col-md-6 text-left pl-2 py-1">Giao hàng</span>
                                            <span class="value col-md-6 text-right pr-2 py-1">Miễn phí</span>
                                        </div>
                                        <div class="cart-summary-line row mx-0">
                                            <span class="label col-md-6 text-left pl-2 py-1">Nhận hàng sau</span>
                                            <span class="value col-md-6 text-right pr-2 py-1">1 Ngày</span>
                                        </div>
                                    </div>
                                    <div class="card-block pt-4">
                                        <div class="cart-summary-line row mx-0">
                                            <span class="label col-md-6 text-left pl-2 py-1">Số lượng</span>
                                            <span class="value col-md-6 text-right pr-2 py-1">10</span>
                                        </div>
                                        <div class="cart-summary-line row mx-0">
                                            <span class="label col-md-6 text-left pl-2 py-1">Tổng tiền</span>
                                            <span class="value col-md-6 text-right pr-2 py-1">1.000.000 VND</span>
                                        </div>
                                        <div class="cart-summary-line row mx-0">
                                            <span class="label col-md-6 text-left pl-2 py-1">VAT</span>
                                            <span class="value col-md-6 text-right pr-2 py-1">10.000 VND</span>
                                        </div>
                                        <div class="cart-summary-line row mx-0">
                                            <span class="label col-md-6 text-left pl-2 py-1">Chiết khấu</span>
                                            <span class="value col-md-6 text-right pr-2 py-1">10.000 VND</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout text-xs-center card-block text-center p-2">
                                    <button type="button" class="btn add-to-cart">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="featured-products clearfix px-2">
                    <div class="tab-main-title">
                        <h2 class="h1 products-section-title text-uppercase">
                            Popular Products
                        </h2>
                    </div>
                    <div id="spe_res">
                        <div class="products">
                            <ul class="featured_grid product_list grid row gridcount">
                                <li class="item col-md-2">
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
                                                    <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                <li class="item col-md-2">
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
                                                    <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                <li class="item col-md-2">
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
                                                    <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                <li class="item col-md-2">
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
                                                    <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                <li class="item col-md-2">
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
                                                    <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                <li class="item col-md-2">
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
                                                    <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                <li class="item col-md-2">
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
                                                    <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                                <li class="item col-md-2">
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
                                                    <button class="btn btn-sm add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                            </ul>
                            <h5 class="text-center"><a class="all-product-link" href="https://prestashop.templatemela.com/PRSADD11/PRS273/index.php?id_category=2&amp;controller=category&amp;id_lang=1">
                                All products <i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 13px;"></i>
                            </a></h5>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop
@section('main-script')
    <script src="/Admin/plugins/swiper/swiper.min.js"></script>
    <script src="/js/frontend/shoppingCart.js"></script>
@stop
