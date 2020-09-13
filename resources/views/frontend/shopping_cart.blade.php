@extends('frontend.layout')

@section('title', 'Danh sách sản phẩm')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="/Admin/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/css/frontend/product/listProduct.css">
    <link rel="stylesheet" href="/css/frontend/shoppingCart.css">
@endsection

@section('content')
    <div class="container">
        <div id="columns_inner" style="padding: 20px 0;">
            <div id="content-wrapper" class="row">
                <div class="tab-main-title col-md-12" style="margin-bottom: 15px !important; border: none;">
                    <h2 class="h1 products-section-title text-uppercase" style="font-size: 16px !important;">
                        GIỎ HÀNG MUA SẮM
                    </h2>
                </div>
                <section id="main" class="col-md-12">
                    <div class="cart-grid row mb-2">
                        <div class="cart-grid-body col-md-8">
                            <div class="card cart-container mb-3">
                                <div class="card-block">
                                    @if(isset($shoppingCart) && count($shoppingCart) > 0)
                                        @foreach($shoppingCart as $key => $cartItem)
                                            <div class="cart-header">
                                                <div class="close1 position-absolute" style="top: 0; right: 10px;z-index: 1;">
                                                    <a href="/shopping-cart/remove?productId={{$cartItem['productId']}}" title="Bỏ sản phẩm khỏi giỏ hàng"><i class="fa fa-times text-secondary"></i></a>&nbsp;
                                                </div>
                                                <div class="cart-sec simpleCart_shelfItem mb-3">
                                                    <div class="cart-item cyc py-0" style="border-bottom: none;">
                                                        <img src="{!! $cartItem['prd_detail']->large_photo !!}" class="img-responsive" alt="" style="height: 220px;object-fit: cover;"/>
                                                    </div>
                                                    <div class="cart-item-info">
                                                        <h3>
                                                            <a href="/product/detail/{{$cartItem['productId']}}">{{ $cartItem['productName'] }}</a>
                                                        </h3>
                                                        <div class="d-inline" style="font-size: 14px;">Mã sản phẩm: <span class="pl-3">{!! $cartItem['prd_detail']->prd_code !!}</span></div>
                                                        <ul class="qty">
                                                            <li class="row py-1">
                                                                <div class="product-variants-item col-md-6">
                                                                    <div class="row p-0 m-0">
                                                                        <span class="control-label col-md-6 px-0 mr-0 my-0">Cửa hàng: </span>
                                                                        <span class="col-md-6 p-0 my-0">
                                                                            <a >
{{--                                                                                href="/shop/detail/{{$cartItem['shopId']}}"--}}
                                                                                {!! $cartItem['prd_detail']->shop->name !!}
                                                                            </a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="row py-1">
                                                                <div class="product-variants-item col-md-6">
                                                                    <div class="row p-0 m-0">
                                                                        <span class="control-label col-md-6 px-0 mr-0 my-0">Loại sản phẩm: </span>
                                                                        <span class="col-md-6 p-0 my-0">
                                                                            {!! $cartItem['prd_detail']->category->name !!}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="row py-1">
                                                                <div class="product-add-to-cart clearfix col-md-6">
                                                                    <div class="row p-0 m-0">
                                                                        <span class="control-label col-md-6 mt-3 px-0 mr-0 mb-2">Số lượng: </span>
                                                                        <div class="col-md-6 p-0 my-2">
                                                                            <div class="row ml-0">
                                                                                <div class="col-md-9 pl-0">
                                                                                    <input type="number" min="0" class="form-control float-left" value="{!! $cartItem['quantity'] !!}" disabled>
                                                                                </div>
                                                                                <div class="col-md-2 p-0" style="margin-top: -4px;">
                                                                                    <span><a href="/shopping-cart/add?productId={{$cartItem['productId']}}&quantity=1"><i class="fa fa-plus text-success"></i></a></span>
                                                                                    <span><a href="/shopping-cart/add?productId={{$cartItem['productId']}}&quantity=-1"><i class="fa fa-minus text-danger"></i></a></span>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="row py-1">
                                                                <div class="product-variants-item col-md-6">
                                                                    <div class="row p-0 m-0">
                                                                        <span class="control-label col-md-6 px-0 mr-0 my-0">Tổng tiền: </span>
                                                                        <span class="col-md-6 p-0 my-0">
                                                                            {!! number_format($cartItem['quantity'] * $cartItem['productPrice'],0,',','.') !!} đ
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="py-3 text-center" style="color: #a09f9f;">Chưa có sản phẩm trong giỏ!</p>
                                    @endif
                                </div>
                            </div>
                            <div class="information_pay pt-3 pb-3">
                                @if(isset($shoppingCart) && count($shoppingCart) > 0)
                                <div class="content_information_pay p-3" style="border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;">
                                    <form action="/shopping-cart/submit" method="post" id="createOrderForm" class="row">
                                        @csrf
                                        <input type="hidden" name="od_total_price" value="{!! $total_payment + 20000 !!}"/>
                                        <input type="hidden" name="ship_fee" value="20000" />
                                        <input type="hidden" name="shop_id" value="{!! $shop_id !!}" />
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold" style="font-size: 14px;">Người nhận</label>
                                                <input type="text" name="shipName" class="form-control" placeholder="Tên người nhận"
                                                    value="{!! \Illuminate\Support\Facades\Auth::user()->full_name !!}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold" style="font-size: 14px;">Địa chỉ</label>
                                                <input type="text" name="shipAddress" class="form-control" placeholder="Nhập địa chỉ"
                                                    value="{!! \Illuminate\Support\Facades\Auth::user()->address !!}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold" style="font-size: 14px;">Số điện thoại</label>
                                                <input type="text" name="shipPhone" class="form-control" placeholder="Nhập số điện thoại"
                                                    value="{!! \Illuminate\Support\Facades\Auth::user()->phone !!}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold" style="font-size: 14px;">Email</label>
                                                <input type="email" name="shipEmail" class="form-control" placeholder="you@gmail.com"
                                                    value="{!! \Illuminate\Support\Facades\Auth::user()->email !!}">
                                            </div>
                                        @else
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold" style="font-size: 14px;">Người nhận</label>
                                                <input type="text" name="shipName" class="form-control" placeholder="Tên người nhận">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold" style="font-size: 14px;">Địa chỉ</label>
                                                <input type="text" name="shipAddress" class="form-control" placeholder="Nhập địa chỉ">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold" style="font-size: 14px;">Số điện thoại</label>
                                                <input type="text" name="shipPhone" class="form-control" placeholder="Nhập số điện thoại">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-bold" style="font-size: 14px;">Email</label>
                                                <input type="email" name="shipEmail" class="form-control" placeholder="you@gmail.com">
                                            </div>
                                        @endif
                                        <div class="form-group col-md-12">
                                            <label class="font-weight-bold" style="font-size: 14px;">Lưu ý</label>
                                            <input type="text" name="note" class="form-control" placeholder="Nhập lưu ý">
                                        </div>
                                        <div class="checkout pt-3 col-md-12 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-sm btn-outline-success btn-create-order">Đặt hàng</button>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            </div>
                            <a class="label" style="color: #444;" href="/product/list"> <i class="fa fa-chevron-left" aria-hidden="true" style="font-size: 13px;"></i> Tiếp tục mua sắm </a>
                        </div>
                        <div class="cart-grid-right col-md-4">
                            <div class="card cart-summary ">
                                <div class="cart-detailed-totals p-2">
{{--                                    <div class="card-block">--}}
{{--                                        <div class="cart-summary-line row mx-0">--}}
{{--                                            <span class="label col-md-6 text-left pl-2 py-1">Giao hàng</span>--}}
{{--                                            <span class="value col-md-6 text-right pr-2 py-1">Miễn phí</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="cart-summary-line row mx-0">--}}
{{--                                            <span class="label col-md-6 text-left pl-2 py-1">Nhận hàng sau</span>--}}
{{--                                            <span class="value col-md-6 text-right pr-2 py-1">1 Ngày</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="card-block">
{{--                                        <div class="cart-summary-line row mx-0">--}}
{{--                                            <span class="label col-md-6 text-left pl-2 py-1">Số lượng</span>--}}
{{--                                            <span class="value col-md-6 text-right pr-2 py-1">{!! $total_quantity !!}</span>--}}
{{--                                        </div>--}}
                                        <div class="cart-summary-line row mx-0">
                                            <span class="label col-md-6 text-left pl-2 py-1">Tổng tiền</span>
                                            <span class="value col-md-6 text-right pr-2 py-1">{!! number_format($total_price,0,',','.') !!} đ</span>
                                        </div>
                                        <div class="cart-summary-line row mx-0">
                                            <span class="label col-md-6 text-left pl-2 py-1">Khuyến mãi</span>
                                            <span class="value col-md-6 text-right pr-2 py-1">{!! number_format($total_price - $total_payment,0,',','.') !!} đ</span>
                                        </div>
                                        <div class="cart-summary-line row mx-0">
                                            <span class="label col-md-6 text-left pl-2 py-1">Phí vận chuyển</span>
                                            <span class="value col-md-6 text-right pr-2 py-1" co>
                                                @if(isset($shoppingCart) && count($shoppingCart) > 0)
                                                    {!! number_format(20000,0,',','.') !!} đ
                                                @else
                                                    0
                                                @endif
                                            </span>
                                        </div>
                                        <div class="cart-summary-line row mx-0">
                                            <span class="label col-md-6 text-left pl-2 py-1" style="font-size: 16px; font-weight: 500">Tổng tiền</span>
                                            <span class="value col-md-6 text-right pr-2 py-1" style="font-size: 16px; font-weight: 500; color: #228b22;">
                                                @if(isset($shoppingCart) && count($shoppingCart) > 0)
                                                    {!! number_format($total_payment + 20000,0,',','.') !!} đ
                                                @else
                                                    0
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="featured-products clearfix px-2 py-3">
                    <div class="tab-main-title pb-3">
                        <h2 class="products-section-title text-uppercase pb-2" style="border-bottom: 1px solid #dfdfdf;">
                            Có thể bạn cũng thích
                        </h2>
                    </div>
                    <div id="spe_res">
                        <div class="products">
                            <ul class="featured_grid product_list grid row gridcount">
                                @foreach($list_product as $prd)
                                    <li class="item col-md-2 mb-3">
                                        <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1" itemscope="" itemtype="http://schema.org/Product">
                                            <div class="thumbnail-container">
                                                <a href="{!! route('home.product.detail', $prd->id) !!}" class="thumbnail product-thumbnail">
                                                    <img src="{!! $prd->large_photo !!}" alt="product"/>
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
                                                <a href="{!! route('home.product.detail', $prd->id) !!}">
                                                    {!! $prd->name !!}
                                                </a>
                                            </span>
                                                <div class="product-price-and-shipping">
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
                                @endforeach
                            </ul>
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
    <script>
        $(document).ready(function () {
            var createOrderForm = $("#createOrderForm");
            $(".btn-create-order").click(function (event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '/shopping-cart/submit',
                    data: createOrderForm.serialize(),
                    success: function (data) {
                        switch (Number(data)) {
                            case 200:
                                iziToast.success({
                                    position: 'topCenter',
                                    timeout: 1500,
                                    transitionIn: 'bounceInDown',
                                    message: 'Đặt hàng thành công!',
                                });
                                setTimeout(() => {
                                    window.location.reload();
                                }, 1500);
                                break;
                            case 301:
                                window.location = '/login';
                                break;
                            case 500:
                                iziToast.warning({
                                    position: 'topCenter',
                                    timeout: 1500,
                                    transitionIn: 'bounceInDown',
                                    message: 'Có lỗi xảy ra, vui lòng thử lại',
                                });
                                break;
                            default:
                                iziToast.warning({
                                    position: 'topCenter',
                                    timeout: 1500,
                                    transitionIn: 'bounceInDown',
                                    message: 'Có lỗi xảy ra, vui lòng thử lại',
                                });
                                break;
                        }
                    },
                    error: function () {
                        iziToast.warning({
                            position: 'topCenter',
                            timeout: 1500,
                            transitionIn: 'bounceInDown',
                            message: 'Có lỗi xảy ra, vui lòng thử lại',
                        });
                    }
                });
            })
        })
        var heightcontent = $(window).height() - 60;
        $('#columns_inner').parent().parent().css({'height': (heightcontent) + 'px', 'overflow-x': 'hidden', 'overflow-y': 'auto'});
    </script>
@stop
