@extends('frontend.layout')

@section('title', 'Danh sách đơn hàng')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="/css/frontend/product/listProduct.css">
    <link rel="stylesheet" href="/css/frontend/user.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 pt-4" style="background-color: #fff !important;box-shadow: 1px 0 5px -2px #888;">
            <div class="aside_left pl-3">
                <ul class="menu_left">
                    <li class="item_menu_left pl-2 py-2 search_left position-relative">
                        <input type="text" class="form-control"
                               style="border: none;padding-left: 30px;border-radius: 30px;height: 35px; line-height: 35px;"
                               placeholder="Tìm kiếm sản phẩm">
                        <i class="fa fa-search position-absolute" style="top: 14px;left: 13px;"></i>
                    </li>
                    <li class="item_menu_left pl-2 py-2 clearfix">
                        <img class="rounded-circle float-left mr-2" src="/img/avatar_2x.png" alt="avatar left">
                        <span class="float-left item_menu_title pt-1">Hiện TNT</span>
                    </li>
                </ul>
                <hr class="my-3"/>
                <div class="side-nav-categories">
                    <ul id="category-tabs">
                        <li>
                            <a class="main-category">
                                <i class="fa fa-user"></i>
                                <span>Tài khoản của tôi</span>

                            </a>
                            <ul class="sub-category-tabs">
                                <li><a href="/detail/user">Hồ sơ</a></li>
                                <li><a href="/detail/password">Đổi mật khẩu</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul id="category-tabs">
                        <li>
                            <a class="main-category" href="/detail/orders">
                                <i class="fa fa-bars"></i>
                                <span>Đơn mua</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="category-tabs">
                        <li>
                            <a class="main-category" href="/detail/notifi">
                                <i class="fa fa-bell"></i>
                                <span>Thông báo</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9 pt-4">
            <div class="col-md-12 text-sm">
                <div class="card content-table bg-white">
                    <table id="example" class="table table-head-fixed text-nowrap table-hover">
                        <thead>
                        <tr>
                            <th class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-th">
                                <label class="form-check-label" for="check-th"></label>
                            </th>
                            <th class="ver-middle">Mã đơn hàng</th>
                            <th class="ver-middle">Ngày mua</th>
                            <th class="ver-middle">Sản phẩm</th>
                            <th class="ver-middle">Tổng tiền</th>
                            <th class="ver-middle">Trạng thái đơn hàng</th>
                            <th class="text-xl-right ver-middle clearfix">
                                <button type="button" class="btn btn-sm btn-danger" id="select_delete"
                                        value="delete"
                                        onclick="showModalDeleteAllCategory(this)">
                                    <i class="fa fa-trash" id="delete-all"></i>&nbsp;Xoá tất cả
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @foreach($categories as $cate)--}}
{{--                            <tr>--}}
{{--                                <td class="text-xl-center ver-middle">--}}
{{--                                    <input type="checkbox" class="form-check-input category-checkbox"--}}
{{--                                           id="check-{{$cate->id}}" value="{{$cate->id}}">--}}
{{--                                    <label class="form-check-label" for="check-{{$cate->id}}"></label>--}}
{{--                                </td>--}}
{{--                                <td class="ver-middle">{{$cate->name}}</td>--}}
{{--                                <td class="ver-middle">{{$cate->note}}</td>--}}
{{--                                <td class="text-xl-right ver-middle">--}}
{{--                                    <a href="/admin/category/detail/{{$cate->id}}" type="button"--}}
{{--                                       class="btn btn-sm btn-warning"><i--}}
{{--                                            class="fa fa-edit"></i>&nbsp; Sửa</a>--}}
{{--                                    <button type="button" class="btn btn-sm btn-danger btn-delete" value="{{$cate->id}}"--}}
{{--                                            onclick="showModalDeleteCategory(this)">--}}
{{--                                        <i class="fa fa-trash"></i>&nbsp; Xoá--}}
{{--                                    </button>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
                        </tbody>
                    </table>
                </div>
{{--                <div class="row footer-table">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">--}}
{{--                            Hiển--}}
{{--                            thị {{ count($categories) > 0 ? $categories->currentPage() * $categories->perPage() - $categories->perPage() + 1 : 0 }}--}}
{{--                            đến--}}
{{--                            {{ ($categories->currentPage() * $categories->perPage()) > $categories->total() ? $categories->total() : $categories->currentPage() * $categories->perPage() }}--}}
{{--                            trong số {!! $categories->total() !!}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-5">--}}

{{--                    </div>--}}
{{--                    <div class="col-md-1">--}}
{{--                        {{ $categories->links() }}--}}
{{--                    </div>--}}
{{--                </div>--}}
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
                    <h5 class="modal-title" id="exampleModalLabel">Xoá đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Bạn có muốn xoá đơn hàng này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button id="delete_category" type="button" class="btn btn-sm btn-success"
                            data-id="" data-token="{{ csrf_token() }}"><i
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
                    <p class="mb-0">Bạn có muốn xoá tất cả đơn hàng?</p>
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
@endsection
@section('main-script')
    <script src="/Admin/plugins/swiper/swiper.min.js"></script>
    <script src="/js/frontend/product/list.js"></script>
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Admin/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="/js/frontend/orders/orders.js"></script>
    <script>
        $('#category-tabs li a').click(function () {
            $(this).next('ul').slideToggle('500');
            $(this).find('i').toggleClass('')
        });
    </script>
@stop
