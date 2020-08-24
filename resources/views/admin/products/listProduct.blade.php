@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/Admin/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 border-r-0">
                <form action="/admin/products/listProduct" method="get" id="product-form">
                    <div class="card-body border-0 clearfix">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tìm kiếm với từ khóa</label>
                                    <input value="" type="text" name="keyword" class="form-control border-r-0"
                                           placeholder="Từ khóa">
                                    <input type="submit" style="visibility: hidden;"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlSelect1">Dòng sản phẩm</label>
                                    <select name="category_id" class="form-control border-r-0" id="categorySelect">
                                        <option value="0">Tất cả</option>
                                        {{--                                        @foreach($categories as $cate)--}}
                                        {{--                                            <option value="{{$cate->id}}" {{$cate->id == $category_id ? 'selected':''}}>{{$cate->name}}</option>--}}
                                        {{--                                        @endforeach--}}
                                    </select>
                                </div>
                            </div>
                            {{-- type product --}}
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlSelect1">Loại sản phẩm</label>
                                    <select name="category_id" class="form-control border-r-0" id="categorySelect">
                                        <option value="0">Tất cả</option>
                                        {{--                                        @foreach($categories as $cate)--}}
                                        {{--                                            <option value="{{$cate->id}}" {{$cate->id == $category_id ? 'selected':''}}>{{$cate->name}}</option>--}}
                                        {{--                                        @endforeach--}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{-- giảm giá --}}
                        <div class="row">
                            <div class="col-md-2">
                                <label for="exampleFormControlSelect1">Giảm giá</label>
                                <a class="btn dropdown-toggle bg-white style_dropdown border-r-1" role="button"
                                   id="filter_type" style="padding: 16px 16px;"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                <div class="dropdown-menu" style="width: 50%" aria-labelledby="filter_type">
                                    <div class="p-3">
                                        <input id="range_1" class="p-3 form-control border-r-0" type="text"
                                               name="range_1" value="">
                                    </div>
                                </div>
                            </div>
                            {{-- giá bán --}}
                            <div class="col-md-2">
                                <label for="exampleFormControlSelect1">Giá bán</label>
                                <a class="btn dropdown-toggle bg-white style_dropdown" role="button"
                                   id="filter_type"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                <div class="dropdown-menu border-r-0" style="width: 50%;"
                                     aria-labelledby="filter_type">
                                    <div class="p-3">
                                        <label>Từ:
                                            <input class="form-control" type="number" min="0" placeholder="0">
                                        </label>
                                        <label class="pt-2 pb-2">Đến:
                                            <input class="form-control" type="number" min="0" placeholder="0"/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{-- date --}}
                            <div class=" col-md-3 input-group mr-1 float-left mb-4" style="width: 20%;">
                                <input type="text" class="form-control border-r-0" readonly="" id="dateTime"
                                       style="padding: 16px 16px;"/>
                                <div class="input-group-addon border-0"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12">
            <div class="card content-table bg-white">
                <div class="card-header bg-white position-relative border-0">
                    <h4 class="card-title" style="margin-bottom: 0 !important;">Danh sách sản phẩm</h4>
                    <div class="breadcrumb">
                        <a href="/admin/product/new" type="button" class="btn btn-sm btn-success"><i
                                class="fa fa-plus"></i>&nbsp; Thêm mới</a>
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
                            <th class="ver-middle">Mã sản phẩm</th>
                            <th class="ver-middle">Tên sản phẩm</th>
                            <th class="ver-middle">Cửa hàng</th>
                            <th class="ver-middle">Loại sản phẩm</th>
                            <th class="ver-middle">Giá bán</th>
                            <th class="ver-middle">Số lượng</th>
                            <th class="ver-middle">Trạng thái</th>
                            <th class="ver-middle">Ngày tạo</th>
                            <th class="ver-middle">
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle bg-white"
                                       style="border: 1px solid #ced4da !important; padding: .3rem .75rem !important; border-radius: 0 !important;"
                                       role="button" id="bulkaction_product" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">Thao tác nhiều</a>
                                    <div class="dropdown-menu" aria-labelledby="bulkaction_product">
                                        <a class="dropdown-item active">Xoá</a>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $pro)
                            <tr>
                                <td class="text-xl-center ver-middle">
                                    <input type="checkbox" class="form-check-input" id="check-{{$pro->id}}">
                                    <label class="form-check-label" for="check-{{$pro->id}}"></label>
                                </td>
                                <td class="ver-middle">{{$pro->id}}</td>
                                <td class="ver-middle">{{$pro->name}}</td>
                                <td class="ver-middle">{{$pro->shop_id}}</td>
                                <td class="ver-middle">{{$pro->category_id}}</td>
                                <td class="ver-middle">{{$pro->price}} VND</td>
                                <td class="ver-middle">{{$pro->quantily}}</td>
                                <td class="ver-middle">{{$pro->status}}</td>
                                <td class="ver-middle">{{$pro->created_at}}</td>
                                <td class="text-xl-right ver-middle">
                                    <a href="/admin/product/detail" type="button" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit"></i>&nbsp; Sửa</a>
                                    <button type="button" class="btn btn-sm btn-danger" value="1"
                                            onclick="showModalDeleteProduct(this)"><i class="fa fa-trash"></i>&nbsp; Xoá
                                    </button>
                                </td>
                            </tr>
                        @endforeach
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
    <div class="modal fade" id="modal-delete-product">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #20c997;color: #fff;">
                    <h5 class="modal-title" id="exampleModalLabel">Xoá sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Bạn có muốn xoá sản phẩm này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button id="delete_product" type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i>&nbsp;
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
    <script src="/Admin/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="/Admin/plugins/moment/moment.min.js"></script>
    <script src="/Admin/plugins/moment/locale/vi.js"></script>
    <script src="/js/product/product.js"></script>

@endsection
