@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-xl-center ver-middle">#</th>
                                <th>Ảnh đai diện</th>
                                <th>Tên tài khoản</th>
                                <th>Loại tài khoản</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-xl-center ver-middle">1</td>
                                <td class="text-xl-center ver-middle"><img src="/img/donors1.jpg" class="img-circle" alt="admin" title="admin" style="width: 4rem;height: 4rem;"></td>
                                <td class="ver-middle">Admin</td>
                                <td class="ver-middle">admin</td>
                                <td class="ver-middle">Hoạt động</td>
                                <td class="text-xl-center ver-middle">
{{--                                    <button type="button" class="btn btn-sm btn-warning">Sửa</button>--}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl-center ver-middle">2</td>
                                <td class="text-xl-center ver-middle"><img src="/img/donors1.jpg" class="img-circle" alt="" style="width: 4rem;height: 4rem;"></td>
                                <td class="ver-middle">Tái chế xanh</td>
                                <td class="ver-middle">CỬa hàng</td>
                                <td class="ver-middle">Hoạt động</td>
                                <td class="text-xl-center ver-middle">
                                    <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp; Sửa</button>
                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp; Xoá</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl-center ver-middle">3</td>
                                <td class="text-xl-center ver-middle"><img src="/img/donors1.jpg" class="img-circle" alt="" style="width: 4rem;height: 4rem;"></td>
                                <td class="ver-middle">Siêu tái chế</td>
                                <td class="ver-middle">Người dùng</td>
                                <td class="ver-middle">Hoạt động</td>
                                <td class="text-xl-center ver-middle">
                                    <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp; Sửa</button>
                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp; Xoá</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl-center ver-middle">4</td>
                                <td class="text-xl-center ver-middle"><img src="/img/donors1.jpg" class="img-circle" alt="" style="width: 4rem;height: 4rem;"></td>
                                <td class="ver-middle">cr7</td>
                                <td class="ver-middle">Người dùng</td>
                                <td class="ver-middle">Hoạt động</td>
                                <td class="text-xl-center ver-middle">
                                    <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp; Sửa</button>
                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp; Xoá</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-xl-center ver-middle">5</td>
                                <td class="text-xl-center ver-middle"><img src="/img/donors1.jpg" class="img-circle" alt="" style="width: 4rem;height: 4rem;"></td>
                                <td class="ver-middle">Nguyễn văn hiện</td>
                                <td class="ver-middle">Người dùng</td>
                                <td class="ver-middle">Không hoạt động</td>
                                <td class="text-xl-center ver-middle">
                                    <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp; Sửa</button>
                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp; Xoá</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-script')
    <script src="/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/js/account.js"></script>
@endsection
