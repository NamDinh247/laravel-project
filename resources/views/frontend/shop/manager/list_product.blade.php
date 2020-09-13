@extends('frontend.shop.manager.layout_shop_master')



@section('main-content-shop')
    <div class="manage_content pt-3 manage_product_content">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="box-filter py-3 px-2 bg-white"
                     style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                    <div class="header_box_filter clearfix">
                        <div class="input-group float-left" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control" placeholder="Tìm kiếm sản phẩm"
                                   style="border-radius: 0 !important;">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"
                                        style="border: 1px solid #ced4da; border-radius: 0 !important;"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="input-group mr-1 ml-1 float-left" style="width: 250px;">
                            <input type="text" class="form-control" readonly="" id="dateTime"
                                   style="border-radius: 0 !important;"/>
                            <div class="input-group-addon"><i class="fa fa-calendar pt-1"></i></div>
                        </div>
                        <div class="input-group mr-1 ml-1 float-left" style="width: 147px;">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" style="border: 1px solid #ddd;"
                                        type="button" id="actionTypeProduct" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Loại sản phẩm
                                </button>
                                <div class="dropdown-menu" aria-labelledby="actionTypeProduct">
                                    <a class="dropdown-item" data-val="" onclick="filterActive(this)">Tất cả</a>
                                    <a class="dropdown-item" data-val="1" onclick="filterActive(this)">Kim loại</a>
                                    <a class="dropdown-item" data-val="2" onclick="filterActive(this)">Gỗ</a>
                                    <a class="dropdown-item" data-val="3" onclick="filterActive(this)">Nhựa, Cao su</a>
                                    <a class="dropdown-item" data-val="4" onclick="filterActive(this)">Thuỷ tinh</a>
                                    <a class="dropdown-item" data-val="5" onclick="filterActive(this)">Khác</a>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mr-1 ml-1 float-left" style="width: 115px;">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" style="border: 1px solid #ddd;"
                                        type="button" id="action" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Trạng thái
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action">
                                    <a class="dropdown-item" data-val="" onclick="filterActive(this)">Tất cả</a>
                                    <a class="dropdown-item" data-val="1" onclick="filterActive(this)">Hoạt động</a>
                                    <a class="dropdown-item" data-val="0" onclick="filterActive(this)">Không hoạt
                                        động</a>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mr-1 ml-1 float-left" style="width: 107px;">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" style="border: 1px solid #ddd;"
                                        type="button" id="filter_type" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Giảm giá
                                </button>
                                <div class="dropdown-menu" aria-labelledby="filter_type">
                                    <div class="p-3">
                                        <input id="range_1" class="p-3" type="text" name="range_1" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mr-1 ml-1 float-left" style="width: 100px;">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" style="border: 1px solid #ddd;"
                                        type="button" id="filter_sale" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Giá bán
                                </button>
                                <div class="dropdown-menu border-r-0" aria-labelledby="filter_sale">
                                    <div class="p-3">
                                        <label>Từ: <input class="form-control" type="number" min="0"
                                                          placeholder="0"></label>
                                        <label class="pt-2 pb-2">Đến: <input class="form-control" type="number" min="0"
                                                                             placeholder="0"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card content-table bg-white">
                    {{--                    <div class="card-header bg-white border-0">--}}
                    {{--                        <h5 class="card-title clearfix" style="margin-bottom: 0 !important;">Danh sách sản phẩm <a type="button" class="btn btn-sm btn-success float-right text-white"><i class="fa fa-plus"></i>&nbsp; Thêm mới</a></h5>--}}
                    {{--                    </div>--}}
                    <div class="card-body table-responsive p-0">
                        <table id="example" class="table table-head-fixed text-nowrap table-hover">
                            <thead>
                            <tr>
                                <th class="text-xl-center ver-middle">
                                    <input type="checkbox" class="form-check-input" id="check-th">
                                    <label class="form-check-label" for="check-th"></label>
                                </th>
                                <th class="ver-middle">Mã sản phẩm</th>
                                <th class="ver-middle">Hình ảnh</th>
                                <th class="ver-middle">Tên sản phẩm</th>
                                <th class="ver-middle">Loại sản phẩm</th>
                                <th class="ver-middle">Giá bán</th>
                                <th class="ver-middle">Giảm giá</th>
                                <th class="ver-middle">Ngày tạo</th>
                                <th class="ver-middle">Trạng thái</th>
                                <th class="ver-middle text-xl-right">
                                    <a id="select_delete" value="delete" onclick="showModalDeleteAllProduct(this)"
                                       title="Xoá nhiều">
                                        <i class="fa fa-trash" id="delete-all" style="font-size: 1em;"></i>
                                    </a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lstProduct as $pro)
                                <tr>
                                    {{--                                    <td class="text-xl-center ver-middle">--}}
                                    {{--                                        --}}
                                    {{--                                        {!! $loop->index + 1 !!}--}}
                                    {{--                                    </td>--}}
                                    <td class="text-xl-center ver-middle" style="width: 40px;">
                                        <input type="checkbox" class="form-check-input product-checkbox"
                                               id="check-{{$pro->id}}" value="{{$pro->id}}">
                                        <label class="form-check-label" for="check-{{$pro->id}}"></label>
                                    </td>
                                    <td class="ver-middle">{{$pro->id}}</td>
                                    <td class="ver-middle">
                                        @if($pro->thumbnail == null || strlen($pro->thumbnail) == 0)
                                            <img src="/img/donors1.jpg" class="img-circle" alt="product" title="admin"
                                                 style="width: 3rem;height: 3rem;">
                                        @else
                                            <img src="{!! $pro->small_photo !!}" class="img-circle" alt="product"
                                                 title="admin" style="width: 3rem;height: 3rem;">
                                        @endif
                                    </td>
                                    <td class="ver-middle">{{$pro->name}}</td>
                                    <td class="ver-middle">
                                        @foreach($lstCate as $cate)
                                            @if($cate->id == $pro->category_id)
                                                {!! $cate->name !!}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="ver-middle">{{number_format($pro->price,0,',','.')}} VND</td>
                                    <td class="ver-middle">{{$pro->sale_off}}%</td>
                                    <td class="ver-middle">{{date('d-m-Y', strtotime($pro->created_at))}}</td>
                                    <td class="ver-middle">
                                        @if($pro->status == 1)
                                            Họat động
                                        @else
                                            Khóa
                                        @endif
                                    </td>
                                    <td class="text-xl-right ver-middle">
                                        <a href="/admin/product/detail/{!! $pro->id !!}" class="pr-2" title="Sửa">
                                            <i class="fa fa-edit text-warning" style="font-size: 1em;"></i>
                                        </a>
                                        <a data-id="{{$pro->id}}" onclick="showModalDeleteProduct(this)" title="Xoá">
                                            <i class="fa fa-trash" style="font-size: 1em;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row footer-table">
                        <nav class="col-md-6 clearfix">
                            {!! $lstProduct->links() !!}
                        </nav>
                    </div>
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
                    <button id="delete_product" type="button" class="btn btn-sm btn-success"
                            {{--                            data-id="{{ count($products) > 0 ? $pro->id : null }}" data-token="{{ csrf_token() }}"><i--}}
                            class="fa fa-check"></i>&nbsp; Đồng ý
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-deleteAll-product">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #20c997;color: #fff;">
                    <h5 class="modal-title" id="exampleModalLabel">Xoá danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Bạn có muốn xoá tất cả sản phẩm này??</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button id="deleteAll_product" type="button" class="btn btn-sm btn-success"><i
                            class="fa fa-check"></i>&nbsp; Đồng ý
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('main-script')
    <link rel="stylesheet" href="/Admin/plugins/sweetalert/sweetalert.min.css">
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Admin/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="/Admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/Admin/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="/Admin/plugins/moment/moment.min.js"></script>
    <script src="/Admin/plugins/moment/locale/vi.js"></script>
    <script src="/js/frontend/shop/list.js"></script>

@endsection
