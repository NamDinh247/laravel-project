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
                    <h4 class="card-title" style="margin-bottom: 0 !important;">Danh sách danh mục</h4>
                    <div class="breadcrumb mr-1">
                        <div class="input-group input-group-sm mr-1" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control" placeholder="Tìm kiếm" style="border-radius: 0 !important;">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default" style="border: 1px solid #ced4da; border-radius: 0 !important;"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <a href="/admin/category/new" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp; Thêm mới</a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table id="example" class="table table-head-fixed text-nowrap table-hover">
                        <thead>
                        <tr>
                            <th class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-th">
                                <label class="form-check-label" for="check-th"></label>
                            </th>
                            <th class="ver-middle">Tên danh mục</th>
                            <th class="ver-middle">Ghi chú</th>
                            <th class="text-xl-right ver-middle clearfix">
                                <select id="select_bulkaction" class="form-control float-right">
                                    <option value="">Thao tác nhiều</option>
                                    <option value="delete">Xoá</option>
                                </select>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-1">
                                <label class="form-check-label" for="check-1"></label>
                            </td>
                            <td class="ver-middle">Kim loại</td>
                            <td class="ver-middle">sản phẩm tái chế bằng kim loại</td>
                            <td class="text-xl-right ver-middle">
                                <a href="/admin/category/detail" type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp; Sửa</a>
                                <button type="button" class="btn btn-sm btn-danger" value="1" onclick="showModalDeleteCategory(this)"><i class="fa fa-trash"></i>&nbsp; Xoá</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-2">
                                <label class="form-check-label" for="check-2"></label>
                            </td>
                            <td class="ver-middle">Gỗ</td>
                            <td class="ver-middle">sản phẩm tái chế bằng gỗ</td>
                            <td class="text-xl-right ver-middle">
                                <a href="/admin/category/detail" type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp; Sửa</a>
                                <button type="button" class="btn btn-sm btn-danger" value="1" onclick="showModalDeleteCategory(this)"><i class="fa fa-trash"></i>&nbsp; Xoá</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-3">
                                <label class="form-check-label" for="check-3"></label>
                            </td>
                            <td class="ver-middle">Nhựa, cao su</td>
                            <td class="ver-middle">sản phẩm tái chế bằng nhựa, cao su</td>
                            <td class="text-xl-right ver-middle">
                                <a href="/admin/category/detail" type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp; Sửa</a>
                                <button type="button" class="btn btn-sm btn-danger" value="1" onclick="showModalDeleteCategory(this)"><i class="fa fa-trash"></i>&nbsp; Xoá</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-4">
                                <label class="form-check-label" for="check-4"></label>
                            </td>
                            <td class="ver-middle">Thuỷ tinh</td>
                            <td class="ver-middle">sản phẩm tái chế bằng thuỷ tinh</td>
                            <td class="text-xl-right ver-middle">
                                <a href="/admin/category/detail" type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp; Sửa</a>
                                <button type="button" class="btn btn-sm btn-danger" value="1" onclick="showModalDeleteCategory(this)"><i class="fa fa-trash"></i>&nbsp; Xoá</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-5">
                                <label class="form-check-label" for="check-5"></label>
                            </td>
                            <td class="ver-middle">Khác</td>
                            <td class="ver-middle">sản phẩm tái chế khác</td>
                            <td class="text-xl-right ver-middle">
                                <a href="/admin/category/detail" type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp; Sửa</a>
                                <button type="button" class="btn btn-sm btn-danger" value="1" onclick="showModalDeleteCategory(this)"><i class="fa fa-trash"></i>&nbsp; Xoá</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row footer-table">
                    <div class="col-md-6">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Hiển thị 1 đến 10 trong số 57</div>
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
    <div class="modal fade" id="modal-delete-category">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #20c997;color: #fff;">
                    <h5 class="modal-title" id="exampleModalLabel">Xoá danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Bạn có muốn xoá danh mục này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button id="delete_category" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i>&nbsp; Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/category.js"></script>
@endsection
