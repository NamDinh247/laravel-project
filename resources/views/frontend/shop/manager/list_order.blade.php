@extends('frontend.shop.manager.layout_shop_master')

@section('main-content-shop')
    <div class="d-block manage_content manage_orders_content">
        <div class="card-header bg-white position-relative border-0 p-0 mb-4">
            <div class="breadcrumb m-0 bg-white">
                <div class="input-group input-group-sm" style="width: 200px;">
                    <input type="text" name="table_search" class="form-control" placeholder="Tìm kiếm đơn hàng"
                           style="border-radius: 0 !important;">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"
                                style="border: 1px solid #ced4da; border-radius: 0 !important;"><i
                                class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="input-group mr-1 ml-1" style="width: 250px;">
                    <input type="text" class="form-control" readonly="" id="dateTime"
                           style="border-radius: 0 !important;"/>
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                </div>
                <div class="input-group mr-1 ml-1" style="width: 200px;">
                    <select class="form-control" style="border-radius: 0 !important;">
                        <option value="">Tất cả</option>
                        <option value="shop">Cửa hàng</option>
                        <option value="od_code">Mã đơn hàng</option>
                        <option value="od_status">Trạng thái</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive py-0 px-4 bg-white">
            <h5 href="/admin/orders/list" class="card-title m-0 py-3" style="margin-bottom: 0 !important;">Đơn hàng</h5>
            <table id="example" class="table table-head-fixed text-nowrap table-hover">
                <thead>
                <tr>
                    <th class="text-xl-center ver-middle">
                        <input type="checkbox" class="form-check-input" id="check-th">
                        <label class="form-check-label" for="check-th"></label>
                    </th>
                    <th class="ver-middle">Mã đơn hàng</th>
                    <th class="ver-middle">Khách hàng</th>
                    <th class="ver-middle">Ngày đặt</th>
                    <th class="ver-middle">Tổng tiền</th>
                    <th class="ver-middle">Trạng thái đơn hàng </th>
                    <th class="ver-middle"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($lstOrder as $order)
                    <tr>
                        <td class="text-xl-center ver-middle">
                            <input type="checkbox" class="form-check-input" id="check-1">
                            <label class="form-check-label" for="check-1"></label>
                        </td>
                        <td class="ver-middle">{!! $loop->index + 1 !!}</td>
                        <td class="ver-middle">{!! $order->user->full_name !!}</td>
                        <td class="ver-middle">{!! date('d-m-Y', strtotime($order->created_at)) !!}</td>
                        <td class="ver-middle">{!! number_format($order->od_total_price,0,',','.') !!} VND</td>
                        <td class="ver-middle">
                            {!! $order->orderStatus->stt_name !!}
                        </td>
                        <td class="text-xl-right ver-middle">
                            <a href="/shop/order/{!! $order->id !!}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>&nbsp; Chi tiết
                            </a>
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>&nbsp; Hủy
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
