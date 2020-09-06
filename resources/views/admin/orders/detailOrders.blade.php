@extends('admin.layout_admin_master')

@section('title', 'Chi tiết đơn hàng')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css" xmlns="http://www.w3.org/1999/html">
@endsection

@section('main-content')
    <div class="row pb-5">
        <div class="col-md-12 mb-3">
            <a href="/admin/orders/list" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh
                sách đơn hàng</a>
        </div>
        <div class="col-md-12">
            <div class="container bootstrap snippet">
                <div class="row">
                    <div class="col-sm-12">
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
                        <hr />
                        <div class="form row">
                            <div class="form-group col-md-4">
                                <label>Thông tin shop</label>
                                <div>
                                    <div>
                                        <div>
                                            <p>{!! $order->shop->name !!}</p>
                                        </div>
                                        <div>
                                            <p>Địa chỉ: {!! $order->shop->address !!}</p>
                                        </div>
                                        <div>
                                            <p>Điện thoại: {!! $order->shop->phone !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <?php $prd_name = $order->order_detail->product->name; ?>
                <?php $quantity = $order->order_detail->od_quantity; ?>
                <?php $price = $order->order_detail->product->price; ?>
                <?php $sale_off = $order->order_detail->product->sale_off; ?>
                <?php $total_prd = $quantity * ($price - $price * ($sale_off/100)); ?>
                <?php $total_money = $quantity * $price; ?>
                <?php $discount = 0; ?>
                @foreach($order_detail as $item)
                    <?php $discount += $item->od_unit_price * $item->od_quantity * ($item->product->sale_off/100); ?>
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
                <hr>
                <div class="row">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-6">
                                <p>Tạm tính: </p>
                                <p>Giảm giá: </p>
                                <p>Phí vận chuyển: </p>
                                <p>Tổng cộng: </p>
                            </div>
                            <div class="col-4 text-right">
                                <p>{!! number_format($order->od_total_price,0,',','.') !!}</p>
                                <p>{!! number_format($discount,0,',','.') !!}</p>
                                <p>{!! number_format($order->ship_fee,0,',','.') !!}</p>
                                <p>{!! number_format($order->od_total_price + $order->ship_fee,0,',','.') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <form action="/admin/orders/change-order/{!! $order->id !!}" method="post">
                    @csrf
                    <input type="hidden" name="od_id" value="{!! $order->id !!}">
                    <div>
                        Chuyển trạng thái đơn hàng
                    </div>
                    <div class="row my-3">
                        <div class="col-4">
                            <select class="form-control" name="order_status"
                                    @if($order->od_status == 5 || $order->od_status == 6) disabled @endif>
                                @foreach($order_status as $stt)
                                    @if($stt->stt_order >= $order->od_status)
                                        <option value="{!! $stt->stt_order !!}"
                                            @if($order->od_status == $stt->stt_order) selected @endif
                                        >
                                            {!! $stt->stt_name !!}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-sm btn-warning form-control">
                                Cập nhật
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/detailAccount.js"></script>
@endsection
