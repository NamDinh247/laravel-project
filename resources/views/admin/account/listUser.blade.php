@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/v4-shims.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="box-filter p-3 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                <div class="header_box_filter clearfix">
                    <button type="button" class="btn btn-sm btn-default mr-2 float-left" style="border: 1px solid #ddd;" title="Tải lại"><i class="fa fa-refresh px-1"></i></button>
                    <div class="input-group input-group-sm float-left" style="width: 200px;">
                        <input type="text" name="table_search" class="form-control" placeholder="Tìm kiếm quản trị" style="border-radius: 0 !important;">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default" style="border: 1px solid #ced4da; border-radius: 0 !important;"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="input-group mr-1 ml-1 float-left" style="width: 250px;">
                        <input type="text" class="form-control" readonly="" id="dateTime" style="border-radius: 0 !important;"/>
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    </div>
                    <div class="input-group mr-1 ml-1 float-left" style="width: 100px;">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" style="border: 1px solid #ddd;" type="button" id="action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Trạng thái
                            </button>
                            <div class="dropdown-menu" aria-labelledby="action">
                                <a class="dropdown-item" data-val="" onclick="filterActive(this)">Tất cả</a>
                                <a class="dropdown-item" data-val="1" onclick="filterActive(this)">Hoạt động</a>
                                <a class="dropdown-item" data-val="0" onclick="filterActive(this)">Không hoạt động</a>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mr-1 ml-1 float-left" style="width: 155px;">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" style="border: 1px solid #ddd;" type="button" id="accuracy" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Kích hoạt tài khoản
                            </button>
                            <div class="dropdown-menu" aria-labelledby="accuracy">
                                <a class="dropdown-item" data-val="" onclick="filterAccuracy(this)">Tất cả</a>
                                <a class="dropdown-item" data-val="1" onclick="filterAccuracy(this)">Đã xác thực email</a>
                                <a class="dropdown-item" data-val="0" onclick="filterAccuracy(this)">Chưa xác thực email</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="content-table bg-white py-2 px-3" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                <div class="card-header bg-white position-relative border-0 py-3 px-0">
                    <h4 class="card-title" style="margin-bottom: 0 !important;">Danh sách tài khoản người dùng</h4>
                    <div class="breadcrumb">
                        <a href="/admin/account/user/new" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp; Thêm mới</a>
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
                            <th class="ver-middle">Tên người dùng</th>
                            <th class="ver-middle">Số điện thoại</th>
                            <th class="ver-middle">Email</th>
                            <th class="ver-middle">Trạng thái</th>
                            <th class="ver-middle" style="min-width: 125px;">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lstUser as $user)
                            <tr>
                                <td class="text-xl-center ver-middle" style="width: 40px;">
                                    <input type="checkbox" class="form-check-input" id="check-1">
                                    <label class="form-check-label" for="check-1"></label>
                                </td>
                                <td class="text-xl-center ver-middle">
                                    @if($user->avatar == null || strlen($user->avatar) == 0)
                                        <img src="/img/donors1.jpg" class="img-circle" alt="admin" title="admin" style="width: 3rem;height: 3rem;">
                                    @else
                                        <img src="{!! $user->small_photo !!}" class="img-circle" alt="admin" title="admin" style="width: 3rem;height: 3rem;">
                                    @endif
                                </td>
                                <td class="ver-middle">{!! $user->full_name !!}</td>
                                <td class="ver-middle">{!! $user->phone !!}</td>
                                <td class="ver-middle">{!! $user->email !!}</td>
                                <td class="ver-middle">
                                    @if($user->status == 1)
                                        Hoạt động
                                    @elseif($user->status == 2)
                                        Đang xử lí
                                    @else
                                        Khóa
                                    @endif
                                </td>
                                <td class="text-xl-right ver-middle" style="min-width: 125px;">
    {{--                                <a class="mr-2"><i class="fa fa-envelope-open text-danger" aria-hidden="true"></i></a>--}}
                                    <a href="/admin/account/user/detail/{!! $user->id !!}" class="mr-2"><i class="fa fa-edit text-warning"></i></a>
                                    <a value="2" onclick="showModalDeleteAccount(this)"><i class="fa fa-trash"></i></a>
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
                        {{$lstUser->links()}}
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
    <script src="/js/admin/account/listUser.js"></script>

@endsection
