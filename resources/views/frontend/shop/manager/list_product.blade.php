@extends('frontend.shop.manager.layout_shop_master')

@section('main-content-shop')
    <div class="manage_content pt-3 manage_product_content">
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
                                            @foreach($lstCate as $cate)
                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
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
{{--                    <div class="card-header bg-white border-0">--}}
{{--                        <h5 class="card-title clearfix" style="margin-bottom: 0 !important;">Danh sách sản phẩm <a type="button" class="btn btn-sm btn-success float-right text-white"><i class="fa fa-plus"></i>&nbsp; Thêm mới</a></h5>--}}
{{--                    </div>--}}
                    <div class="card-body table-responsive p-0">
                        <table id="example" class="table table-head-fixed text-nowrap table-hover">
                            <thead>
                            <tr>
                                <th class="text-xl-center ver-middle">#</th>
                                <th class="ver-middle">Mã sản phẩm</th>
                                <th class="ver-middle">Hình ảnh</th>
                                <th class="ver-middle">Tên sản phẩm</th>
                                <th class="ver-middle">Loại sản phẩm</th>
                                <th class="ver-middle">Giá bán</th>
                                <th class="ver-middle">Giảm giá</th>
                                <th class="ver-middle">Ngày tạo</th>
                                <th class="ver-middle">Trạng thái</th>
                                <th class="ver-middle text-xl-right">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lstProduct as $pro)
                                <tr>
                                    <td class="text-xl-center ver-middle">
                                        {!! $loop->index + 1 !!}
                                    </td>
                                    <td class="ver-middle">{{$pro->id}}</td>
                                    <td class="ver-middle">
                                        @if($pro->thumbnail == null || strlen($pro->thumbnail) == 0)
                                            <img src="/img/donors1.jpg" class="img-circle" alt="product" title="admin" style="width: 3rem;height: 3rem;">
                                        @else
                                            <img src="{!! $pro->small_photo !!}" class="img-circle" alt="product" title="admin" style="width: 3rem;height: 3rem;">
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
                                        <a href="/shop/products/detail/{!! $pro->id !!}" type="button" class="btn btn-sm btn-warning"><i
                                                class="fa fa-edit"></i>&nbsp; Chi tiết</a>
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
                        <nav class="col-md-6 clearfix">
                            {!! $lstProduct->links() !!}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

