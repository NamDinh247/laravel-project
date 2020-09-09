@extends('admin.layout_admin_master')

@section('title', 'Danh sách đơn hàng')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/v4-shims.css">
    <link rel="stylesheet" href="/Admin/plugins/sweetalert/sweetalert.min.css">

@endsection

@section('main-content')
    <div class="row scroll_content pb-3 pt-1">
        <div class="col-md-12">
            <div class="content-table bg-white py-2 px-3 " style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                <form action="/admin/orders/list" method="get" id="order_search">
                    <div class="card-header bg-white position-relative border-0 py-3 px-0">
                        <h4 class="card-title" style="margin-bottom: 0 !important;">Danh sách Đơn hàng</h4>
                        <div class="breadcrumb mt-1">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm đơn hàng"
                                      value="{!! $data['keyword'] !!}" style="border-radius: 0 !important;">
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
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                            <div class="input-group mr-1 ml-1" style="width: 200px;">
                                <select class="form-control" id="orderStatusSelect" name="od_status" style="border-radius: 0 !important;">
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
                    </div>
                    <input type="submit" name="" id="" hidden/>
                </form>
                <div class="card-body table-responsive p-0">
                    <table id="example" class="table table-head-fixed text-nowrap table-hover">
                        <thead>
{{--                        @foreach($orders as $order)--}}
{{--                            <tr>--}}
{{--                                <td class="text-xl-center ver-middle">--}}
{{--                                    <input type="checkbox" class="form-check-input" id="check-1">--}}
{{--                                    <label class="form-check-label" for="check-1"></label>--}}
{{--                                </td>--}}
{{--                                <td class="ver-middle" value="{{$order->od_code}}">{{$order->od_code}}</td>--}}
{{--                                <td class="ver-middle">{{$order->created_at}}</td>--}}
{{--                                <td class="ver-middle">Sản phẩm</td>--}}
{{--                                <td class="ver-middle">{{$order->od_total_price}}</td>--}}
{{--                                <td class="ver-middle">{{$order->od_status}}</td>--}}
{{--                                <td class="text-xl-right ver-middle">--}}
{{--                                    <a href="/admin/orders/detail/{{$order->id}}" type="button" class="btn btn-sm btn-warning"><i--}}
{{--                                            class="fa fa-edit"></i>&nbsp; Sửa</a>--}}
{{--                                    <button type="button" class="btn btn-sm btn-danger" value="3"--}}
{{--                                            onclick="showModalDeleteAccount(this)"><i class="fa fa-trash"></i>&nbsp; Xoá--}}
{{--                                    </button>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
                        <tr>
                            <th class="text-xl-center ver-middle" style="width: 40px;">
                                <input type="checkbox" class="form-check-input" id="check-th">
                                <label class="form-check-label" for="check-th"></label>
                            </th>
                            <th class="ver-middle">Mã đơn hàng</th>
                            <th class="ver-middle">Khách hàng</th>
                            <th class="ver-middle">Ngày đặt</th>
                            <th class="ver-middle">Tổng tiền</th>
                            <th class="ver-middle">Trạng thái đơn hàng </th>
                            <th class="ver-middle" style="min-width: 125px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data['lstOrder'] as $order)
                                <tr>
                                    <td class="text-xl-center ver-middle" style="width: 40px;">
                                        <input type="checkbox" class="form-check-input" id="check-1">
                                        <label class="form-check-label" for="check-1"></label>
                                    </td>
                                    <td class="ver-middle">{{ $order->od_code }}</td>
                                    <td class="ver-middle">{{ $order->user->full_name }}</td>
                                    <td class="ver-middle">{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                                    <td class="ver-middle">{{ number_format($order->od_total_price,0,',','.') }}</td>
                                    <td class="ver-middle">
                                        {!! $order->orderStatus->stt_name !!}
                                    </td>
                                    <td class="text-xl-right ver-middle" style="min-width: 125px;">
                                        <a href="/admin/orders/detail/{!! $order->id !!}" class="mr-2" title="Sửa">
                                            <i class="fa fa-edit text-warning"></i>
                                        </a>
                                        <a value="{{ $order->id }}" onclick="showModalDeleteAccount(this)" title="Xoá">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row footer-table px-3">
                    <div class="col-md-12 pl-2 mb-3" style="border-bottom: 1px solid #ddd;">
                        <div class="clearfix py-2">
                            <div class="float-left pr-4">
                                Chiết khấu: <label class="pl-2"> 10%</label>
                            </div>
                            <div class="float-left pr-4">
                                Tổng số đơn hoàn thành: <label class="pl-2"> 15 đơn hàng</label>
                            </div>
                            <div class="float-left pr-4">
                                Tổng số đơn chiết khấu: <label class="pl-2"> 13 đơn hàng</label>
                            </div>
                            <div class="float-left pr-4">
                                Tổng tiền chiết khấu: <label class="pl-2"> 2.000.000 VND</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dataTables_info pt-2" id="example1_info" role="status" aria-live="polite">Hiển thị 1 đến
                            10 trong số 57
                        </div>
                    </div>
                    <nav class="col-md-6 clearfix">
                        <ul class="pagination float-right">
                            <li class="page-item disabled">
                                <a class="page-link" href="#"><i class="fa fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <span class="page-link">2
                                    <span class="sr-only">(current)</span>
                                </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="modal-delete-account">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #20c997;color: #fff;">
                    <h5 class="modal-title" id="exampleModalLabel">Xoá tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Bạn có muốn xoá tài khoản này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button id="delete_account" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i>&nbsp;
                        Đồng ý
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/Admin/plugins/moment/moment.min.js"></script>
    <script src="/Admin/plugins/moment/locale/vi.js"></script>
    <script src="/js/admin/orders/orders.js"></script>
    <script src="/Admin/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        $('input[name="dates"]').daterangepicker(
            {
                locale: {
                    format: 'DD/MM/YYYY'
                },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }
        );
        $('#orderStatusSelect').change(function () {
            $('#order_search').submit();
        })
        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            $('input[name="start"]').val(picker.startDate.format('YYYY-MM-DD'));
            $('input[name="end"]').val(picker.endDate.format('YYYY-MM-DD'));
            $('#order_search').submit();
        });
    </script>
@endsection
