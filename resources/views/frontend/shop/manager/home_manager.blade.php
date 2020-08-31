@extends('frontend.layout')

@section('title', 'Quản lý cửa hàng')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="/css/frontend/product/listProduct.css">
    <link rel="stylesheet" href="/css/frontend/content_home.css">
    <link rel="stylesheet" href="/css/frontend/detail_shop.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 pt-2 aside_left_detail_shop" style="background-color: #fff !important;box-shadow: 1px 0 5px -2px #888;">
            <div class="aside_left pl-3">
                <div class="filter_left">
                    <ul class="menu_left menu_filter_orders">
                        <li>
                            <a href="#manage_orders" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle clearfix collapsed">
                                <i class="fa fa-file-text-o pr-1"></i>
                                Quản lý đơn hàng
                                <i class="fa fa-angle-up float-right pt-2" aria-hidden="true"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="manage_orders">
                                <li>
                                    <a onclick="changeTab(this, 'manage_orders_content')">Tất cả </a>
                                </li>
                                <li>
                                    <a onclick="changeTab(this, 'manage_orders_content')">Hoàn thành</a>
                                </li>
                                <li>
                                    <a onclick="changeTab(this, 'manage_orders_content')">Đã hủy</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#manage_product" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle clearfix collapsed">
                                <i class="fa fa-shopping-bag pr-1"></i>
                                Quản lý sản phẩm
                                <i class="fa fa-angle-up float-right pt-2" aria-hidden="true"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="manage_product">
                                <li>
                                    <a onclick="changeTab(this, 'manage_product_content')">Tất cả </a>
                                </li>
                                <li>
                                    <a onclick="changeTab(this, 'manage_product_new_content')">Thêm sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a onclick="changeTab(this, 'manage_dashboard_content')">
                                <i class="fa fa-line-chart pr-1"></i>
                                Doanh thu
                            </a>
                        </li>
                        <li>
                            <a href="#manage_shop" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle clearfix collapsed">
                                <i class="fa fa-archive pr-1"></i>
                                Quản lý shop
                                <i class="fa fa-angle-up float-right pt-2" aria-hidden="true"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="manage_shop">
                                <li>
                                    <a>Đánh giá shop</a>
                                </li>
                                <li>
                                    <a onclick="changeTab(this, 'manage_profile_content')">Hồ sơ shop</a>
                                </li>
                                <li>
                                    <a>Danh mục của shop</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9 pt-2 content_detail_shop px-4" style="background-color: rgb(240, 242, 245);">
            {{-- list orders --}}
            <div class="d-block manage_content manage_orders_content">
                <div class="card-header bg-white position-relative border-0 p-0 mb-4">
                    <div class="breadcrumb m-0 bg-white">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control" placeholder="Tìm kiếm đơn hàng"
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
                <div class="card-body table-responsive py-0 px-4 bg-white">
                    <h5 href="/admin/orders/list" class="card-title m-0 py-3" style="margin-bottom: 0 !important;">Đơn hàng</h5>
                    <table id="example" class="table table-head-fixed text-nowrap table-hover">
                        <thead>
                        <tr>
                            <th class="text-xl-center ver-middle">
                                <input type="checkbox" class="form-check-input" id="check-th">
                                <label class="form-check-label" for="check-th"></label>
                            </th>
                            <th class="ver-middle">Mã đơn hàng</th>
                            <th class="ver-middle">Khách hàng</th>
                            <th class="ver-middle">Ngày đặt</th>
                            <th class="ver-middle">Tổng tiền</th>
                            <th class="ver-middle">Trạng thái đơn hàng </th>
                            <th class="ver-middle"></th>
                        </tr>
                        </thead>
                        <tbody>
    {{--                    @foreach($lstOrder as $order)--}}
                            <tr>
                                <td class="text-xl-center ver-middle">
                                    <input type="checkbox" class="form-check-input" id="check-1">
                                    <label class="form-check-label" for="check-1"></label>
                                </td>
                                <td class="ver-middle">1</td>
                                <td class="ver-middle">Khach hang</td>
                                <td class="ver-middle">11/8/2020</td>
                                <td class="ver-middle">1.000.000 VND</td>
                                <td class="ver-middle">
                                    đang giao
                                </td>
                                <td class="text-xl-right ver-middle">
                                    <a onclick="changeTab(this, 'manage_orders_detail_content')" type="button" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit"></i>&nbsp; Chi tiết</a>
                                    <button type="button" class="btn btn-sm btn-danger" value="3"
                                            onclick="showModalDeleteAccount(this)"><i class="fa fa-trash"></i>&nbsp; Hủy
                                    </button>
                                </td>
                            </tr>
    {{--                    @endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- orders detail --}}
            <div class="d-none manage_content pt-3 manage_orders_detail_content">
                <div class="row bg-white p-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Chi tiết đơn hàng</h5>
                                <hr/>
                                <form class="form row" action="#" method="post" id="accountForm">
                                    <div class="form-group col-md-4">
                                        <label>Địa chỉ người nhận</label>
                                        <div>
                                            <div>
                                                <div>
    {{--                                                <p>{!! $order->ship_name !!}</p>--}}
                                                    <p>1</p>
                                                </div>
                                                <div>
    {{--                                                <p>Địa chỉ: {!! $order->ship_address !!}</p>--}}
                                                    <p>Địa chỉ: 2</p>
                                                </div>
                                                <div>
    {{--                                                <p>Điện thoại: {!! $order->ship_phone !!}</p>--}}
                                                    <p>Điện thoại: 3</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Hình thức giao hàng</label>
                                        <div>
    {{--                                        <p>Giao hàng vào {!! $order->created_at !!}</p>--}}
                                            <p>Giao hàng vào 4</p>
                                        </div>
                                        <div>
    {{--                                        <p>Phí vận chuyển: {!! $order->ship_fee !!}</p>--}}
                                            <p>Phí vận chuyển: 5</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Hình thức thanh toán</label>
                                        <div>
                                            <p>Thanh toán tiền mặt khi nhận hàng</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
    {{--                    <?php $prd_name = $order->order_detail->product->name; ?>--}}
    {{--                    <?php $quantity = $order->order_detail->od_quantity; ?>--}}
    {{--                    <?php $price = $order->order_detail->product->price; ?>--}}
    {{--                    <?php $sale_off = $order->order_detail->product->sale_off; ?>--}}
    {{--                    <?php $total_prd = $quantity * ($price - $price * ($sale_off/100)); ?>--}}
    {{--                    <?php $total_money = $quantity * $price; ?>--}}
                        <div class="row">
                            <div class="col-md-4">
                                <label>Sản phẩm</label>
                                <div>
    {{--                                {!! $prd_name !!}--}}
                                    1
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Giá</label>
                                <div>
    {{--                                {!! $price !!}--}}
                                    2
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Số lượng</label>
                                <div>
    {{--                                {!! $quantity !!}--}}
                                    3
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Giảm giá</label>
                                <div>
    {{--                                {!! $sale_off !!}--}}
                                    4
                                </div>
                            </div>
                            <div class="col-md-2 text-right">
                                <label>Tạm tính</label>
                                <div>
    {{--                                {!! $total_prd !!}--}}
                                    5
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4">
                                <div>
    {{--                                <p>Tạm tính: {!! $total_prd !!}</p>--}}
                                    <p>Tạm tính: 6</p>
                                </div>
                                <div>
    {{--                                <p>Giảm giá: {!! $total_money - $total_prd !!}</p>--}}
                                    <p>Giảm giá: 7</p>
                                </div>
                                <div>
    {{--                                <p>Phí vận chuyển: {!! $order->ship_fee !!}</p>--}}
                                    <p>Phí vận chuyển: 8</p>
                                </div>
                                <div>
    {{--                                <p>Tổng cộng: {!! $total_prd + $order->ship_fee !!}</p>--}}
                                    <p>Tổng cộng: 9</p>
                                </div>
                            </div>
                        </div>
                        <hr>
    {{--                    <form action="/admin/orders/change-order/{!! $order->id !!}" method="post">--}}
                        <form action="/admin/orders/change-order/" method="post">
                            @csrf
    {{--                        <input type="hidden" name="od_id" value="{!! $order->id !!}">--}}
                            <input type="hidden" name="od_id" value="1">
                            <div>
                                Chuyển trạng thái đơn hàng
                            </div>
                            <div class="row my-3">
                                <div class="col-4">
                                    <select class="form-control" name="order_status">
    {{--                                    @foreach($order_status as $stt)--}}
    {{--                                        @if($stt->stt_order >= $order->od_status)--}}
    {{--                                            <option value="{!! $stt->stt_order !!}"--}}
    {{--                                                    @if($order->od_status == $stt->stt_order) selected @endif>--}}
    {{--                                                {!! $stt->stt_name !!}--}}
    {{--                                            </option>--}}
    {{--                                        @endif--}}
    {{--                                    @endforeach--}}
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-sm btn-warning form-control">
                                        Cập nhật
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- list product --}}
            <div class="d-none manage_content pt-3 manage_product_content">
                <div class="row">
                    <div class="col-md-12 mb-3">
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
                    <div class="col-md-12">
                        <div class="card content-table bg-white">
                            <div class="card-header bg-white border-0">
                                <h5 class="card-title clearfix" style="margin-bottom: 0 !important;">Danh sách sản phẩm <a type="button" class="btn btn-sm btn-success float-right text-white"><i class="fa fa-plus"></i>&nbsp; Thêm mới</a></h5>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table id="example" class="table table-head-fixed text-nowrap table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-xl-center ver-middle">
                                            <input type="checkbox" class="" id="check-th">
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
{{--                                    @foreach($products as $pro)--}}
                                        <tr>
                                            <td class="text-xl-center ver-middle">
{{--                                                <input type="checkbox" class="form-check-input" id="check-{{$pro->id}}">--}}
                                                <input type="checkbox" class="" id="check-1">
{{--                                                <label class="form-check-label" for="check-{{$pro->id}}"></label>--}}
                                                <label class="form-check-label" for="check-2"></label>
                                            </td>
{{--                                            <td class="ver-middle">{{$pro->id}}</td>--}}
{{--                                            <td class="ver-middle">{{$pro->name}}</td>--}}
{{--                                            <td class="ver-middle">{{$pro->shop_id}}</td>--}}
{{--                                            <td class="ver-middle">{{$pro->category_id}}</td>--}}
{{--                                            <td class="ver-middle">{{$pro->price}} VND</td>--}}
{{--                                            <td class="ver-middle">{{$pro->quantily}}</td>--}}
{{--                                            <td class="ver-middle">{{$pro->status}}</td>--}}
{{--                                            <td class="ver-middle">{{$pro->created_at}}</td>--}}

                                            <td class="ver-middle">1</td>
                                            <td class="ver-middle">2</td>
                                            <td class="ver-middle">3</td>
                                            <td class="ver-middle">4</td>
                                            <td class="ver-middle">5 VND</td>
                                            <td class="ver-middle">6</td>
                                            <td class="ver-middle">7</td>
                                            <td class="ver-middle">8</td>
                                            <td class="text-xl-right ver-middle">
                                                <a onclick="changeTab(this, 'manage_product_detail_content')" type="button" class="btn btn-sm btn-warning"><i
                                                        class="fa fa-edit"></i>&nbsp; Sửa</a>
                                                <button type="button" class="btn btn-sm btn-danger" value="1"
                                                        onclick="showModalDeleteProduct(this)"><i class="fa fa-trash"></i>&nbsp; Xoá
                                                </button>
                                            </td>
                                        </tr>
{{--                                    @endforeach--}}
                                    </tbody>
                                </table>
                            </div>
{{--                            <div class="row footer-table">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Hiển thị 1 đến--}}
{{--                                        10 trong số 57--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <nav class="col-md-6 clearfix">--}}
{{--                                    <ul class="pagination float-right">--}}
{{--                                        <li class="page-item disabled">--}}
{{--                                            <a class="page-link" href="#"><i class="fa fa-chevron-left"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                        <li class="page-item active">--}}
{{--                                <span class="page-link">2--}}
{{--                                    <span class="sr-only">(current)</span>--}}
{{--                                </span>--}}
{{--                                        </li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                        <li class="page-item">--}}
{{--                                            <a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </nav>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- new product --}}
            <div class="d-none manage_content pt-3 manage_product_new_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-r-0 border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Thêm mới sản phẩm</h5>
                                        <hr/>
                                    </div>
                                    <div class="col-sm-8">
                                        <form class="form row" action="/admin/product/new" method="post" id="accountForm">
                                            @csrf
                                            <div class="form-group col-md-6">
                                                <label>Mã sản phẩm</label>
                                                <input type="text" class="form-control" id="id" placeholder="Mã sản phẩm">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tên sản phẩm</label>
                                                <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm">
                                            </div>
                                            {{-- danh mục này lấy từ category --}}
                                            <div class="form-group col-md-6">
                                                <label>Loại sản phẩm</label>
                                                <select id="type-product" class="form-control" name="category_id">
                                                    <option value="">Chọn loại sản phẩm</option>
{{--                                                    @foreach($listCate as $cate)--}}
{{--                                                        <option value="{{ $cate->id }}" class="form-control">--}}
{{--                                                            {{ $cate->name }}--}}
{{--                                                        </option>--}}
{{--                                                    @endforeach--}}
                                                </select>
                                            </div>
                                            {{-- tìm hiểu và sử dụng select2 ở đây --}}
                                            <div class="form-group col-md-6">
                                                <label>Mã cửa hàng</label>
                                                <input type="text" class="form-control" id="shop_id" placeholder="Mã cửa hàng">
                                                {{--                                    <select id="select_shop" class="form-control">--}}
                                                {{--                                        --}}{{-- đây là dữ liệu mẫu, for từ đây, xong thì xoá comment này --}}
                                                {{--                                        <option value="">Chọn loại sản phẩm</option>--}}
                                                {{--                                        <option value="user">Kim loại</option>--}}
                                                {{--                                        <option value="shop">Gỗ</option>--}}
                                                {{--                                        <option value="admin">Nhựa, cao su</option>--}}
                                                {{--                                    </select>--}}
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Giá bán (VND)</label>
                                                <input type="number" class="form-control" min="0" id="price" placeholder="0">
                                            </div>
                                            <div class="form-group col-md-6">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Giảm giá</label>
                                                <select id="sale_shop" class="form-control" name="sale_off">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>
                                            {{-- show --}}
                                            <div class="form-group col-md-6">
                                                <label>Giá trị giảm giá (%)</label>
                                                <input type="number" class="form-control" id="percent" min="0" max="100"
                                                       placeholder="0">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Giá bán sau giảm giá</label>
                                                <input type="number" class="form-control" id="price2" placeholder="0">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Ghi chú</label>
                                                <textarea type="text" class="form-control" id="address" name="description" placeholder="Nhập ghi chú"
                                                          style="resize: vertical;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i>&nbsp;
                                                        Lưu
                                                    </button>
                                                    &emsp;
                                                    <button class="btn btn-sm btn-danger" type="reset"><i></i>
                                                        Làm lại
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Ảnh sản phẩm</label>
                                        <div class="form-group">
                                            <button type="button" id="upload_widget" class="btn btn-sm btn-primary">Tải ảnh
                                            </button>
                                            <div class="thumbnails"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- product detail --}}
            <div class="d-none manage_content pt-3 manage_product_detail_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-r-0 border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Chi tiết sản phẩm</h5>
                                        <hr/>
                                    </div>
                                    <div class="col-sm-8">
                                        <form class="form row" action="/admin/product/new" method="post" id="accountForm">
                                            @csrf
                                            <div class="form-group col-md-6">
                                                <label>Mã sản phẩm</label>
                                                <input type="text" class="form-control" id="id" placeholder="Mã sản phẩm">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tên sản phẩm</label>
                                                <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm">
                                            </div>
                                            {{-- danh mục này lấy từ category --}}
                                            <div class="form-group col-md-6">
                                                <label>Loại sản phẩm</label>
                                                <select id="type-product" class="form-control" name="category_id">
                                                    <option value="">Chọn loại sản phẩm</option>
                                                    {{--                                                    @foreach($listCate as $cate)--}}
                                                    {{--                                                        <option value="{{ $cate->id }}" class="form-control">--}}
                                                    {{--                                                            {{ $cate->name }}--}}
                                                    {{--                                                        </option>--}}
                                                    {{--                                                    @endforeach--}}
                                                </select>
                                            </div>
                                            {{-- tìm hiểu và sử dụng select2 ở đây --}}
                                            <div class="form-group col-md-6">
                                                <label>Mã cửa hàng</label>
                                                <input type="text" class="form-control" id="shop_id" placeholder="Mã cửa hàng">
                                                {{--                                    <select id="select_shop" class="form-control">--}}
                                                {{--                                        --}}{{-- đây là dữ liệu mẫu, for từ đây, xong thì xoá comment này --}}
                                                {{--                                        <option value="">Chọn loại sản phẩm</option>--}}
                                                {{--                                        <option value="user">Kim loại</option>--}}
                                                {{--                                        <option value="shop">Gỗ</option>--}}
                                                {{--                                        <option value="admin">Nhựa, cao su</option>--}}
                                                {{--                                    </select>--}}
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Giá bán (VND)</label>
                                                <input type="number" class="form-control" min="0" id="price" placeholder="0">
                                            </div>
                                            <div class="form-group col-md-6">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Giảm giá</label>
                                                <select id="sale_shop" class="form-control" name="sale_off">
                                                    <option value="1">Có</option>
                                                    <option value="0">Không</option>
                                                </select>
                                            </div>
                                            {{-- show --}}
                                            <div class="form-group col-md-6">
                                                <label>Giá trị giảm giá (%)</label>
                                                <input type="number" class="form-control" id="percent" min="0" max="100"
                                                       placeholder="0">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Giá bán sau giảm giá</label>
                                                <input type="number" class="form-control" id="price2" placeholder="0">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Ghi chú</label>
                                                <textarea type="text" class="form-control" id="address" name="description" placeholder="Nhập ghi chú"
                                                          style="resize: vertical;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i>&nbsp;Lưu</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Ảnh sản phẩm</label>
                                        <div class="form-group">
                                            <button type="button" id="upload_widget" class="btn btn-sm btn-primary">Tải ảnh
                                            </button>
                                            <div class="thumbnails"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- revenue --}}
            <div class="d-none manage_content pt-3 manage_dashboard_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-r-0 border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 pb-2">
                                        <h5>Doanh thu theo tháng</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <canvas id="revenue_shop"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- profile --}}
            <div class="d-none manage_content pt-3 manage_profile_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid bg-white p-3 content_form" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);border-radius: 5px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-banner pb-3 position-relative">
                                        <img id="banner-shop" src="" alt="" class="d-none">
                                        <div class="box-upload-img" ><div class="title-banner" >BANNER</div></div>
                                        <label class="btn btn-outline-success position-absolute" style="top: 55%; left: 45%;"><input type="file" class="text-center center-block file-upload-banner" style="margin-top: 20px;display: none;"><i class="fa fa-upload"></i>&nbsp; Tải ảnh lên</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="text-center">
                                        <img src="/img/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" style="border-radius: 50% !important;width: 13rem;height: 13rem; border: 2px solid #20c997;">
                                        <input type="file" class="text-center center-block file-upload d-none" style="margin-top: 20px;">
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <h5>
                                        Thông tin chung
                                        <button class="btn btn-sm btn-outline-warning float-right" id="edit_shop">
                                            <i class="fa fa-edit"></i>&nbsp; Sửa
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary float-right mr-2" style="border: 1px solid #ddd;">
                                            <i class="fa fa-envelope-open"></i>&nbsp; Kích hoạt
                                        </button>
                                    </h5>
                                    <hr/>
                                    <div class="content_information">
                                        <div class="row my-4">
                                            <div class="col-md-2 font-weight-bold">Tên cửa hàng:</div>
                                            <div class="col-md-4">Hát như hót</div>
                                            <div class="col-md-2 font-weight-bold">Số điện thoại:</div>
                                            <div class="col-md-4">0399899288</div>
                                        </div>
                                        <div class="row my-4">
                                            <div class="col-md-2 font-weight-bold">Email:</div>
                                            <div class="col-md-4">tukhiemton@gmail.com</div>
                                            <div class="col-md-2 font-weight-bold">Địa chỉ:</div>
                                            <div class="col-md-4">Số 2, Duy Tân, Cầu Giấy, Hà Nội</div>
                                        </div>
                                        <div class="row my-4">
                                            <div class="col-md-2 font-weight-bold">Kích hoạt tài khoản: </div>
                                            <div class="col-md-4">Chưa kích hoạt</div>
                                        </div>
                                    </div>
                                    <form class="form row d-none" action="#" method="post" id="accountForm_editshop">
                                        @csrf
                                        <div class="form-group col-md-6">
                                            <label>Tên cửa hàng</label>
                                            <input type="text" class="form-control" id="userName" placeholder="Tên cửa hàng">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Địa chỉ</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ của bạn">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password">Mật khẩu</label>
                                            <input type="password" class="form-control" id="password" placeholder="Mật khẩu">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Kiểm chứng</label>
                                            <input type="password" class="form-control" id="password2" placeholder="Nhập lại mật khẩu">
                                        </div>
                                        <div class="form-group col-md-12 ">
                                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i>&nbsp; Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('main-script')
    <script src="/Admin/plugins/swiper/swiper.min.js"></script>
    <script src="/Admin/plugins/chart.js/Chart.min.js"></script>
{{--    <script src="/js/frontend/product/list.js"></script>--}}
    <script>
        $(document).ready(function() {
            $('.menu-header li').removeClass('active');
            $('.menu-header a[title="Cửa hàng"]').parent().addClass('active');
        });
        var height = $(window).height() - 70;
        $('.aside_left_detail_shop').css({'height': (height + 10)  + 'px', 'overflow-x': 'hidden'});
        $('.content_detail_shop').css({'height': (height + 10)  + 'px', 'overflow-x': 'hidden'});
        $(function () { //tab table 5

            var months = new Date().getDate();
            var arrMonths = [];
            var arrMonthsData = [];

            for (var i=1; i<=months;i++) {
                arrMonths.push(i);
                arrMonthsData.push(i + Math.floor(Math.random() * 250));
            }
            console.log(arrMonths)
            var ctx = document.getElementById('revenue_shop').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: arrMonths,
                    datasets: [{
                        fill: false,
                        backgroundColor: 'rgb(54, 162, 235)',
                        borderColor: 'rgb(54, 162, 235)',
                        data: arrMonthsData,
                    }]
                },
                options: {
                    legend: {
                        display: false,
                    },
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Ngày'
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 300,
                                stepSize: 100,
                                callback: function(value, index, values) {
                                    return value + ' VND';
                                }
                            },
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Giá trị'
                            }
                        }]
                    }
                }
            });
        });
        $('#edit_shop').click(function (event) {
            $(this).addClass('d-none');
            $('#accountForm_editshop').removeClass('d-none');
            $('.file-upload').removeClass('d-none');
            $('.content_information').addClass('d-none');
        })
        function changeTab(e, ele) {
            console.log(ele)
            $(this).css('color', '#0056b');
            $('.manage_content').removeClass('d-block').addClass('d-none');
            $('.' + ele).removeClass('d-none');
            $('.' + ele).addClass('d-block');
        }
    </script>
@stop
