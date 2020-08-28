@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css" xmlns="http://www.w3.org/1999/html">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="/admin/orders/list" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh
                sách đơn hàng</a>
        </div>
        <div class="col-12">
            <div class="container bootstrap snippet">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Chi tiết đơn hàng</h5>
                        <hr/>
                        <form class="form row" action="#" method="post" id="accountForm">
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
                                    <p>Giao hàng vào {!! $order->created_at !!}</p>
                                </div>
                                <div>
                                    <p>Phí vận chuyển: {!! $order->ship_fee !!}</p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Hình thức thanh toán</label>
                                <div>
                                    <p>Thanh toán tiền mặt khi nhận hàng</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <?php $prd_name = $order->order_detail->product->name; ?>
                <?php $quantity = $order->order_detail->od_quantity; ?>
                <?php $price = $order->order_detail->product->price; ?>
                <?php $sale_off = $order->order_detail->product->sale_off; ?>
                <?php $total_prd = $quantity * ($price - $price * ($sale_off/100)); ?>
                <?php $total_money = $quantity * $price; ?>
                <div class="row">
                    <div class="col-md-4">
                        <label>Sản phẩm</label>
                        <div>
                            {!! $prd_name !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Giá</label>
                        <div>
                            {!! $price !!}
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Số lượng</label>
                        <div>
                            {!! $quantity !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Giảm giá</label>
                        <div>
                            {!! $sale_off !!}
                        </div>
                    </div>
                    <div class="col-md-2 text-right">
                        <label>Tạm tính</label>
                        <div>
                            {!! $total_prd !!}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4">
                        <div>
                            <p>Tạm tính: {!! $total_prd !!}</p>
                        </div>
                        <div>
                            <p>Giảm giá: {!! $total_money - $total_prd !!}</p>
                        </div>
                        <div>
                            <p>Phí vận chuyển: {!! $order->ship_fee !!}</p>
                        </div>
                        <div>
                            <p>Tổng cộng: {!! $total_prd + $order->ship_fee !!}</p>
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
                            <select class="form-control" name="order_status">
                                @foreach($order_status as $stt)
                                    @if($stt->stt_order >= $order->od_status)
                                        <option value="{!! $stt->stt_order !!}"
                                            @if($order->od_status == $stt->stt_order) selected @endif>
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
