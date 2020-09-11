@extends('admin.layout_admin_master')

@section('title', 'Danh sách danh mục')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/Admin/plugins/sweetalert/sweetalert.min.css">
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/v4-shims.css">
@endsection

@section('main-content')
    <div class="row scroll_content pb-3 pt-1">
        <div class="col-md-12">
            <div class="content-table bg-white py-2 px-3" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                <form action="/admin/category" method="get">
                <div class="card-header bg-white position-relative border-0 py-3 px-0">
                    <h4 class="card-title" style="margin-bottom: 0 !important;">Danh sách danh mục</h4>
                    <div class="breadcrumb mt-1">
                        <div class="input-group input-group-sm mr-1" style="width: 220px;">
                            <input value="{{ $data['keyword'] }}" type="text" name="keyword" class="form-control"
                                   placeholder="Tìm kiếm danh mục"
                                   style="border-radius: 0 !important;">
                            <input type="submit" name="" id="" hidden/>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"
                                        style="border: 1px solid #ced4da; border-radius: 0 !important;"><i
                                        class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <a href="/admin/category/new" type="button" class="btn btn-sm btn-success"><i
                                class="fa fa-plus"></i>&nbsp; Thêm mới</a>
                    </div>
                </div>
                </form>
                <div class="card-body table-responsive p-0">
                    <table id="example" class="table table-head-fixed text-nowrap table-hover">
                        <thead>
                        <tr>
                            <th class="text-xl-center ver-middle" style="width: 40px">
                                <input type="checkbox" class="form-check-input" id="check-th">
                                <label class="form-check-label" for="check-th"></label>
                            </th>
                            <th class="ver-middle">Tên danh mục</th>
                            <th class="ver-middle">Ghi chú</th>
                            <th class="text-xl-right ver-middle clearfix">
                                <a id="select_delete" value="delete" onclick="showModalDeleteAllCategory(this)" title="Xoá nhiều">
                                    <i class="fa fa-trash" id="delete-all" style="font-size: 1em;"></i>
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['categories'] as $cate)
                            <tr>
                                <td class="text-xl-center ver-middle" style="width: 40px">
                                    <input type="checkbox" class="form-check-input category-checkbox"
                                           id="check-{{$cate->id}}" value="{{$cate->id}}">
                                    <label class="form-check-label" for="check-{{$cate->id}}"></label>
                                </td>
                                <td class="ver-middle">{{$cate->name}}</td>
                                <td class="ver-middle">{{$cate->note}}</td>
                                <td class="text-xl-right ver-middle">
                                    <a href="/admin/category/detail/{{$cate->id}}" class="mr-2" title="Sửa">
                                        <i class="fa fa-edit text-warning" style="font-size: 1em;"></i>
                                    </a>
                                    <a data-id="{{$cate->id}}" onclick="showModalDeleteCategory(this)" title="Xoá">
                                        <i class="fa fa-trash" style="font-size: 1em;"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row footer-table">
                    <div class="col-md-6">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
{{--                            Hiển thị {{ count($categories) > 0 ? $categories->currentPage() * $categories->perPage() - $categories->perPage() + 1 : 0 }} đến--}}
{{--                            {{ ($categories->currentPage() * $categories->perPage()) > $categories->total() ? $categories->total() : $categories->currentPage() * $categories->perPage() }}--}}
{{--                            trong số {!! $categories->total() !!}--}}
                        </div>
                    </div>
                    <nav class="col-md-6 clearfix">
                        {{ $data['categories']->links() }}
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
                    <button id="delete_category" type="button" class="btn btn-sm btn-success"
                            data-id="{{ count($data['categories']) > 0 ? $cate->id : null }}" data-token="{{ csrf_token() }}"><i
                            class="fa fa-check"></i>&nbsp; Đồng ý
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-deleteAll-category">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #20c997;color: #fff;">
                    <h5 class="modal-title" id="exampleModalLabel">Xoá danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Bạn có muốn xoá tất cả danh mục?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button id="deleteAll_category" type="button" class="btn btn-sm btn-success"><i
                            class="fa fa-check"></i>&nbsp; Đồng ý
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/category.js"></script>
    <script src="/Admin/plugins/sweetalert/sweetalert.min.js"></script>
@endsection
