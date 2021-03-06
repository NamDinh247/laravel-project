@extends('admin.layout_admin_master')

@section('title', 'Danh sách cửa hàng')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/v4-shims.css">

@endsection

@section('main-content')
    <div class="row scroll_content pb-3">
        <div class="col-md-12 mb-3">
            <form action="/admin/account/shop" method="get" id="user_search">
            <div class="box-filter p-3 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                <div class="header_box_filter clearfix">
                    <button type="button" class="btn btn-sm btn-default mr-2 float-left" style="border: 1px solid #ddd;" title="Tải lại"><i class="fa fa-refresh px-1"></i></button>
                    <div class="input-group input-group-sm float-left" style="width: 200px;">
                        <input type="text" name="keyword" value="{!!  $data['keyword'] !!}" class="form-control" placeholder="Tìm kiếm quản trị" style="border-radius: 0 !important;">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default" style="border: 1px solid #ced4da; border-radius: 0 !important;"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="input-group mr-1 ml-1 float-left" style="width: 250px;">
                        <input type="text" class="form-control" name="dates"
                               style="border-radius: 0 !important;"/>
                        <input type="hidden" name="start">
                        <input type="hidden" name="end">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    </div>
                    <div class="input-group mr-1 ml-1 float-left" style="width: 120px;">
                        <select class="form-control" id="user_status" name="user_status" style="border-radius: 0 !important;">
                            <option value="0">Trạng thái</option>
                            <option value="1" @if($data['user_status'] == 1) selected @endif>Họat động</option>
                            <option value="3" @if($data['user_status'] == 3) selected @endif>Khóa</option>
                        </select>
                    </div>
{{--                    <div class="input-group mr-1 ml-1 float-left" style="width: 155px;">--}}
{{--                        <div class="dropdown">--}}
{{--                            <button class="btn btn-default dropdown-toggle" style="border: 1px solid #ddd;" type="button" id="accuracy" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                Kích hoạt tài khoản--}}
{{--                            </button>--}}
{{--                            <div class="dropdown-menu" aria-labelledby="accuracy">--}}
{{--                                <a class="dropdown-item" data-val="" onclick="filterAccuracy(this)">Tất cả</a>--}}
{{--                                <a class="dropdown-item" data-val="1" onclick="filterAccuracy(this)">Đã xác thực email</a>--}}
{{--                                <a class="dropdown-item" data-val="0" onclick="filterAccuracy(this)">Chưa xác thực email</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="content-table bg-white py-2 px-3" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                <div class="card-header bg-white position-relative border-0 py-3 px-0">
                    <h4 class="card-title" style="margin-bottom: 0 !important;">Danh sách tài khoản cửa hàng</h4>
                    <div class="breadcrumb mt-1">
                        <a href="/admin/account/shop/new" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp; Thêm mới</a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table id="example" class="table table-head-fixed text-nowrap table-hover">
                        <thead>
                        <tr>
                            <th class="text-xl-center ver-middle" style="width: 40px;">
                                <input type="checkbox" class="form-check-input" id="check-th">
                                <label class="form-check-label" for="check-th"></label>
                            </th>
                            <th class="text-xl-center ver-middle">Ảnh đai diện</th>
                            <th class="ver-middle">Tên cửa hàng</th>
                            <th class="ver-middle">Số điện thoại</th>
                            <th class="ver-middle">Email</th>
                            <th class="ver-middle">Địa chỉ</th>
                            <th class="ver-middle">Trạng thái</th>
                            <th class="ver-middle clearfix" style="min-width: 125px;">
                                <a class="float-right" id="select_delete" value="delete" onclick="showModalDeleteAccount(this)" title="Xoá nhiều">
                                    <i class="fa fa-trash" id="delete-all"></i>
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($lstShop as $shop)
                            <tr>
                                <td class="text-xl-center ver-middle" style="width: 40px;">
                                    <input type="checkbox" class="form-check-input" id="check-1">
                                    <label class="form-check-label" for="check-1"></label>
                                </td>
                                <td class="text-xl-center ver-middle">
                                    @if($shop->logo == null || strlen($shop->logo) == 0)
                                        <img src="/img/donors1.jpg" class="img-circle" alt="Logo" title="admin" style="width: 3rem;height: 3rem;">
                                    @else
                                        <img src="{!! $shop->small_photo !!}" class="img-circle" alt="Logo" title="admin" style="width: 3rem;height: 3rem;">
                                    @endif
                                </td>
                                <td class="ver-middle">{!! $shop->name !!}</td>
                                <td class="ver-middle">{!! $shop->phone !!}</td>
                                <td class="ver-middle">{!! $shop->email !!}</td>
                                <td class="ver-middle">{!! $shop->address !!}</td>
                                <td class="ver-middle">
                                    @switch($shop->status)
                                        @case(1)
                                            <span>Hoạt động</span>
                                            @break
                                        @case(2)
                                            <span>Đang xác thực</span>
                                            @break
                                        @case(3)
                                            <span>Khóa</span>
                                            @break
                                    @endswitch
                                </td>
                                <td class="text-xl-right ver-middle" style="min-width: 125px;">
                                    @if($shop->status != 1)
                                        <a href="/admin/account/shop/{!!$shop->id!!}/1" class="mr-2" id="active-shop" title="Kích hoạt">
                                            <i class="fa fa-envelope-open text-danger" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                    <a href="/admin/account/shops/detail/{!! $shop->id !!}" class="mr-2"><i class="fa fa-edit text-warning"></i></a>
                                    <a><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row footer-table">
                    <div class="col-md-6">
{{--                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Hiển thị 1 đến 10 trong số 57</div>--}}
                    </div>
                    <nav class="col-md-6 clearfix">
                        {!! $lstShop->links() !!}
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
                    <button id="delete_account" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i>&nbsp; Đồng ý</button>
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
    <script src="/js/admin/account/listShop.js"></script>
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
        $('#user_status').change(function () {
            $('#user_search').submit();
        })
        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            $('input[name="start"]').val(picker.startDate.format('YYYY-MM-DD'));
            $('input[name="end"]').val(picker.endDate.format('YYYY-MM-DD'));
            $('#user_search').submit();
        });
    </script>
@endsection
