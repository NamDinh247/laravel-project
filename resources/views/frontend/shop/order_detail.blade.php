@extends('frontend.shop.layout_user_profile')

@section('main-content-profile')
    <div class="row m-0">
        <div class="col-md-12 pb-3 pl-0">
            <h4 class=""><a href="/profile/order/list" class="text-success" style="font-size: 16px;"><i class="fa fa-chevron-left text-secondary"></i>&nbsp; Quay lại đơn hàng</a></h4>
        </div>
        <div class="col-md-12 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
            <div class="py-3 px-1">
                <span style="font-size: 20px; font-weight: 500">
                    Chi tiết đơn hàng -
                </span>
                <span style="color: green">{!! $order->orderStatus->stt_name !!}</span>
                <hr/>
                <div class="form row ">
                    <div class="form-group col-md-4">
                        <label>Địa chỉ người nhận</label>
                        <div>
                            <div>
                                <div>
                                    <p>{!! $order->ship_name !!}</p>
                                </div>
                                <div>
                                    <p>Địa chỉ: {!! $order->ship_address !!}</p>
                                </div>
                                <div>
                                    <p>Điện thoại: {!! $order->ship_phone !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Hình thức giao hàng</label>
                        <div>
                            <p>Giao hàng vào {!! date('d-m-Y', strtotime($order->created_at)) !!}</p>
                        </div>
                        <div>
                            <p>Phí vận chuyển: {!! number_format($order->ship_fee,0,',','.') !!}</p>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Hình thức thanh toán</label>
                        <div>
                            <p>Thanh toán tiền mặt khi nhận hàng</p>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row mb-0">
                    <div class="col-md-4">
                        <label>Sản phẩm</label>
                    </div>
                    <div class="col-md-2">
                        <label>Giá</label>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Số lượng</label>
                    </div>
                    <div class="col-md-2">
                        <label>Giảm giá</label>
                    </div>
                    <div class="col-md-2 text-right">
                        <label>Tạm tính</label>
                    </div>
                </div>
                @foreach($order_detail as $item)
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-5">
                                    <img src="{!! $item->product->small_photo !!}" alt="" class="img-fluid">
                                </div>
                                <div class="col-7 pl-0 text-success">
                                    {!! $item->product->name !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                {!! number_format($item->od_unit_price,0,',','.') !!} đ
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div>
                                {!! $item->od_quantity !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                {!! number_format($item->od_unit_price * $item->od_quantity * ($item->prd_sale_off/100),0,',','.') !!} đ
                            </div>
                        </div>
                        <div class="col-md-2 text-right">
                            <div>
                                {!! number_format($item->od_unit_price * $item->od_quantity - $item->od_unit_price * $item->od_quantity * ($item->prd_sale_off/100),0,',','.') !!} đ
                            </div>
                        </div>
                    </div>
                    <hr/>
                @endforeach
                <div class="row">
                    <div class="col-md-7">

                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pt-1">
                                    <p style="font-size: 16px;">Tạm tính:</p>
                                </div>
                                <div class="pt-1">
                                    <p style="font-size: 16px;">Giảm giá:</p>
                                </div>
                                <div class="pt-1">
                                    <p style="font-size: 16px;">Phí vận chuyển:</p>
                                </div>
                                <div class="pt-1" style="color: #666666;">
                                    <p style="font-size: 16px;">Tổng cộng:</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pt-1">
                                    <p style="font-size: 16px;">{!! number_format(($order->od_total_price - $order->ship_fee),0,',','.') !!} đ</p>
                                </div>
                                <div class="pt-1">
                                    <p style="font-size: 16px;">{!! number_format($total_sale_off,0,',','.') !!} đ</p>
                                </div>
                                <div class="pt-1">
                                    <p style="font-size: 16px;">{!! number_format($order->ship_fee,0,',','.') !!} đ</p>
                                </div>
                                <div class="pt-1">
                                    <p class="text-success font-weight-bold" style="font-size: 16px;">{!! number_format($order->od_total_price,0,',','.') !!} đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

