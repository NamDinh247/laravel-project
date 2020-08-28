@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="content-table bg-white">
                <div class="card-header bg-white position-relative border-0">
                    <h4 class="card-title" style="margin-bottom: 0 !important;">Danh sách Đơn hàng</h4>
                    <div class="breadcrumb">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control" placeholder="Tìm kiếm"
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
                            <th class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-th">
                                <label class="form-check-label" for="check-th"></label>
                            </th>
                            <th class="ver-middle">Mã đơn hàng</th>
                            <th class="ver-middle">Ngày mua</th>
                            <th class="ver-middle">Sản phẩm</th>
                            <th class="ver-middle">Tổng tiền</th>
                            <th class="ver-middle">Trạng thái đơn hàng </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-1">
                                <label class="form-check-label" for="check-1"></label>
                            </td>
                            <td class="ver-middle"></td>
                            <td class="ver-middle">Admin</td>
                            <td class="ver-middle">admin</td>
                            <td class="ver-middle">Địa chỉ</td>
                            <td class="ver-middle">Hoạt động</td>
                            <td class="text-xl-right ver-middle">
                                <a href="/admin/account/detail" type="button" class="btn btn-sm btn-warning"><i
                                        class="fa fa-edit"></i>&nbsp; Sửa</a>
                                <button type="button" class="btn btn-sm btn-danger" value="3"
                                        onclick="showModalDeleteAccount(this)"><i class="fa fa-trash"></i>&nbsp; Xoá
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-2">
                                <label class="form-check-label" for="check-2"></label>
                            </td>
                            <td class="ver-middle"></td>
                            <td class="ver-middle">Tái chế xanh</td>
                            <td class="ver-middle">CỬa hàng</td>
                            <td class="ver-middle">Hoạt động</td>
                            <td class="ver-middle">Hoạt động</td>
                            <td class="text-xl-right ver-middle">
                                <a href="/admin/account/detail" type="button" class="btn btn-sm btn-warning"><i
                                        class="fa fa-edit"></i>&nbsp; Sửa</a>
                                <button type="button" class="btn btn-sm btn-danger" value="2"
                                        onclick="showModalDeleteAccount(this)"><i class="fa fa-trash"></i>&nbsp; Xoá
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-3">
                                <label class="form-check-label" for="check-3"></label>
                            </td>
                            <td class="ver-middle"></td>
                            <td class="ver-middle">Siêu tái chế</td>
                            <td class="ver-middle">Người dùng</td>
                            <td class="ver-middle">Hoạt động</td>
                            <td class="ver-middle">Hoạt động</td>
                            <td class="text-xl-right ver-middle">
                                <a href="/admin/account/detail" type="button" class="btn btn-sm btn-warning"><i
                                        class="fa fa-edit"></i>&nbsp; Sửa</a>
                                <button type="button" class="btn btn-sm btn-danger" value="3"
                                        onclick="showModalDeleteAccount(this)"><i class="fa fa-trash"></i>&nbsp; Xoá
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-4">
                                <label class="form-check-label" for="check-4"></label>
                            </td>
                            <td class="ver-middle"></td>
                            <td class="ver-middle">cr7</td>
                            <td class="ver-middle">Người dùng</td>
                            <td class="ver-middle">Hoạt động</td>
                            <td class="ver-middle">Hoạt động</td>
                            <td class="text-xl-right ver-middle">
                                <a href="/admin/account/detail" type="button" class="btn btn-sm btn-warning"><i
                                        class="fa fa-edit"></i>&nbsp; Sửa</a>
                                <button type="button" class="btn btn-sm btn-danger" value="4"
                                        onclick="showModalDeleteAccount(this)"><i class="fa fa-trash"></i>&nbsp; Xoá
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-5">
                                <label class="form-check-label" for="check-5"></label>
                            </td>
                            <td class="ver-middle"></td>
                            <td class="ver-middle">Nguyễn văn hiện</td>
                            <td class="ver-middle">Người dùng</td>
                            <td class="ver-middle">Không hoạt động</td>
                            <td class="ver-middle">Không hoạt động</td>
                            <td class="text-xl-right ver-middle">
                                <a href="/admin/orders/detail" type="button" class="btn btn-sm btn-warning"><i
                                        class="fa fa-edit"></i>&nbsp; Detail</a>
                                <button type="button" class="btn btn-sm btn-danger" value="5"
                                        onclick="showModalDeleteAccount(this)"><i class="fa fa-trash"></i>&nbsp; Xoá
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row footer-table">
                    <div class="col-md-6">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Hiển thị 1 đến
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
    <script src="/js/orders/orders.js"></script>

@endsection
