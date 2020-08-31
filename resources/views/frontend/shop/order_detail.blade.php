@extends('frontend.shop.layout_user_profile')

@section('main-content-profile')
    <span style="font-size: 20px; font-weight: 500">
        Chi tiết đơn hàng -
    </span>
    <span style="color: green">{!! $order->orderStatus->stt_name !!}</span>
    <hr/>
    <div class="form row">
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
    <?php $prd_name = $order->order_detail->product->name; ?>
    <?php $quantity = $order->order_detail->od_quantity; ?>
    <?php $price = $order->order_detail->product->price; ?>
    <?php $sale_off = $order->order_detail->product->sale_off; ?>
    <?php $total_prd = $quantity * ($price - $price * ($sale_off/100)); ?>
    <?php $total_money = $quantity * $price; ?>
    @foreach($order_detail as $item)
        <div class="row mb-4">
            <div class="col-md-4">
                <label>Sản phẩm</label>
                <div class="row">
                    <div class="col-5">
                        <img src="{!! $item->product->small_photo !!}" alt="" class="img-fluid">
                    </div>
                    <div class="col-7 pl-0" style="color: blueviolet">
                        {!! $item->product->name !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <label>Giá</label>
                <div>
                    {!! number_format($item->od_unit_price,0,',','.') !!}
                </div>
            </div>
            <div class="form-group col-md-2">
                <label>Số lượng</label>
                <div>
                    {!! $item->od_quantity !!}
                </div>
            </div>
            <div class="col-md-2">
                <label>Giảm giá</label>
                <div>
                    {!! number_format($item->od_unit_price * $item->od_quantity * ($item->product->sale_off/100),0,',','.') !!}
                </div>
            </div>
            <div class="col-md-2 text-right">
                <label>Tạm tính</label>
                <div>
                    {!! number_format($item->od_unit_price * $item->od_quantity - $item->od_unit_price * $item->od_quantity * ($item->product->sale_off/100),0,',','.') !!}
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-8">

        </div>
        <div class="col-md-4">
            <div>
                <p>Tạm tính: {!! $order->od_total_price !!}</p>
            </div>
            <div>
                <p>Giảm giá: {!! 0 !!}</p>
            </div>
            <div>
                <p>Phí vận chuyển: {!! $order->ship_fee !!}</p>
            </div>
            <div>
                <p>Tổng cộng: {!! $order->od_total_price + $order->ship_fee !!}</p>
            </div>
        </div>
    </div>
    <a href="#" style="color: blue"><< Quay lại đơn hàng</a>
@endsection

