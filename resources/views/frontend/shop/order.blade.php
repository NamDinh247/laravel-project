@extends('frontend.shop.layout_user_profile')

@section('main-content-profile')
    <div class="row m-0">
        <div class="col-md-12 text-sm px-0">
            <div class="content-table bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                <table id="example" class="table table-head-fixed text-nowrap table-hover">
                    <thead>
                    <tr>
                        <th class="ver-middle">#</th>
                        <th class="ver-middle">Mã đơn hàng</th>
                        <th class="ver-middle">Ngày mua</th>
                        <th class="ver-middle">Sản phẩm</th>
                        <th class="ver-middle">Tổng tiền</th>
                        <th class="ver-middle">Trạng thái đơn hàng</th>
                        <th class="ver-middle"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lstOrder as $order)
                        <tr>
                            <td class="ver-middle">{{ $loop->iteration }}</td>
                            <td class="ver-middle">{!! $order->od_code !!}</td>
                            <td class="ver-middle">{!! date('d-m-Y', strtotime($order->created_at)) !!}</td>
                            <td class="ver-middle">{!! $order->order_detail->product->name !!}</td>
                            <td class="ver-middle">{!! number_format($order->od_total_price,0,',','.') !!}</td>
                            <td class="ver-middle">{!! $order->orderStatus->stt_name !!}</td>
                            <td class="text-xl-right ver-middle">
                                <a href="/profile/order/detail/{!! $order->id !!}" title="Chi tiết">
                                    <i class="fa fa-edit text-warning"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row footer-table">

            </div>
        </div>
    </div>
@endsection
