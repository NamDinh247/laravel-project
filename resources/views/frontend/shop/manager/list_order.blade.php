@extends('frontend.shop.manager.layout_shop_master')

@section('main-content-shop')
    <div class="d-block manage_content manage_orders_content">
        <div class="card-header bg-white position-relative border-0 p-0 mb-4">
            <form action="/shop/order/list" method="get" id="order_search">
            <div class="breadcrumb m-0 bg-white">
                <div class="input-group" style="width: 250px;">
                    <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm đơn hàng"
                           style="border-radius: 0 !important;" value="{!! $data['keyword'] !!}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"
                                style="border: 1px solid #ced4da; border-radius: 0 !important;"><i
                                class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="input-group mr-1 ml-1" style="width: 250px;">
                    <input type="text" class="form-control" name="dates"
                           style="border-radius: 0 !important;"/>
                    <input type="hidden" name="start">
                    <input type="hidden" name="end">
                    <div class="input-group-addon"><i class="fa fa-calendar pt-1"></i></div>
                </div>
                <div class="input-group mr-1 ml-1" style="width: 200px;">
                    <select class="form-control" style="border-radius: 0 !important;" name="od_status" id="orderStatusSelect">
                        <option value="0">Tất cả</option>
                        @foreach($data['lstOrderStats'] as $status)
                            <option value="{!! $status->stt_order !!}"
                                    @if($data['od_status'] == $status->stt_order) selected @endif>
                                {!! $status->stt_name !!}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            </form>
        </div>
        <div class="card-body table-responsive py-0 px-4 bg-white">
            <h5 href="/admin/orders/list" class="card-title m-0 py-3" style="margin-bottom: 0 !important;">Đơn hàng</h5>
            <table id="example" style="font-size: 95%" class="table table-head-fixed text-nowrap table-hover">
                <thead>
                <tr>
                    <th class="text-xl-center ver-middle" style="width: 40px;">
                        #
                    </th>
                    <th class="ver-middle">Mã đơn hàng</th>
                    <th class="ver-middle">Khách hàng</th>
                    <th class="ver-middle">Ngày đặt</th>
                    <th class="ver-middle">Tổng tiền</th>
                    <th class="ver-middle">Trạng thái đơn hàng </th>
                    <th class="ver-middle text-xl-right">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['lstOrder'] as $order)
                    <tr>
                        <td class="text-xl-center ver-middle" style="width: 40px;">
                            {!! $loop->index + 1 !!}
                        </td>
                        <td class="ver-middle">{!! $order->od_code !!}</td>
                        <td class="ver-middle">{!! $order->ship_name !!}</td>
                        <td class="ver-middle">{!! date('d/m/Y', strtotime($order->created_at)) !!}</td>
                        <td class="ver-middle">{!! number_format($order->od_total_price,0,',','.') !!} đ</td>
                        <td class="ver-middle">
                            {!! $order->orderStatus->stt_name !!}
                        </td>
                        <td class="text-xl-right ver-middle">
                            <a href="/shop/order/{!! $order->id !!}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>&nbsp; Chi tiết
                            </a>
                            @if($order->od_status == 5 || $order->od_status == 6)
                            @else
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>&nbsp; Hủy
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row footer-table px-4">
                @if(isset($data['dataOrder']))
                    <div class="col-md-12 pl-2 mb-3" style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd;">
                        <div class="clearfix py-2 row">
                            <div class="float-left pr-4 col-6">
                                Tổng số đơn hoàn thành:
                                <label class="pl-2" style="color: green;">{!! $data['dataOrder']['totalOrderFinish'] !!} đơn hàng</label>
                            </div>
                            <div class="float-left pr-4 col-6">
                                Tổng doanh thu đơn hàng:
                                <label class="pl-2" style="color: green;">
                                    {!! number_format($data['dataOrder']['totalRevenueOrderFinish'],0,',','.') !!} đ
                                </label>
                            </div>
                            <div class="float-left pr-4 col-6">
                                Tổng số đơn hủy:
                                <label class="pl-2" style="color: green;">{!! $data['dataOrder']['totalOrderCancel'] !!} đơn hàng</label>
                            </div>
                            <div class="float-left pr-4 col-6">
                                Chiết khấu: <label class="pl-2" style="color: green;">10%</label>
                            </div>
                            <div class="float-left pr-4 col-6">
                                Tổng số đang xử lí:
                                <label class="pl-2" style="color: green;">{!! $data['dataOrder']['totalOrderProcess'] !!} đơn hàng</label>
                            </div>
                            <div class="float-left pr-4 col-6">
                                Tổng tiền chiết khấu: <label class="pl-2" style="color: green;">
                                    {!! number_format($data['dataOrder']['totalRevenueOrderFinish'] * 0.1,0,',','.') !!} đ
                                </label>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    {{--                        <div class="dataTables_info pt-2" id="example1_info" role="status" aria-live="polite">Hiển thị 1 đến--}}
                    {{--                            10 trong số 57--}}
                    {{--                        </div>--}}
                </div>
                <nav class="col-md-6 clearfix">
                    <ul class="pagination float-right">
                        {!! $data['lstOrder']->links() !!}
                    </ul>
                </nav>
            </div>
        </div>

    </div>
@endsection
@section('main-script')
    <script src="/Admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script>
        //filter date
        var localevn = {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Áp dụng",
            "cancelLabel": "Hủy",
            "fromLabel": "Từ",
            "toLabel": "Đến",
            "customRangeLabel": "Tùy chỉnh",
            "weekLabel": "W",
            "daysOfWeek": ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
            "monthNames": ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
            "firstDay": 1
        };
        $('input[name="dates"]').daterangepicker({
            format: 'DD/MM/YYYY',
            opens: "left",
            drops: 'down',
            locale: localevn,
            ranges: {
                'Hôm nay': [moment(), moment()],
                'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 ngày trước': [moment().subtract(6, 'days'), moment()],
                '30 ngày trước': [moment().subtract(29, 'days'), moment()],
                'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }).on('apply.daterangepicker', function(ev, picker) {
            $('input[name="start"]').val(picker.startDate.format('YYYY-MM-DD'));
            $('input[name="end"]').val(picker.endDate.format('YYYY-MM-DD'));
            $('#order_search').submit();
        });
        $('#orderStatusSelect').change(function () {
            $('#order_search').submit();
        });
        $('.menu-header li').removeClass('active');
        $('.menu-header a[title="Cửa hàng"]').parent().addClass('active');
        var height = $(window).height() - 70;
        $('.aside_left_detail_shop').css({'height': (height + 10)  + 'px', 'overflow-x': 'hidden'});
        $('.content_detail_shop').css({'height': (height + 10)  + 'px', 'overflow-x': 'hidden'});
    </script>
@endsection
