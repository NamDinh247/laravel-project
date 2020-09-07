@extends('frontend.shop.manager.layout_shop_master')

@section('main-content-shop')
    <div class="manage_content pt-3 manage_product_detail_content">
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
                                <form class="form row" action="/shop/products/edit" method="post" id="accountForm">
                                    @csrf
                                    <input type="text" name="id" value="{!! $product->id !!}" hidden/>
                                    <div class="form-group col-md-6">
                                        <label>Mã sản phẩm</label>
                                        <input type="text" class="form-control" placeholder="Mã sản phẩm"
                                            value="{!! $product->prd_code !!}" readonly/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name"
                                            value="{!! $product->name !!}" required/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Loại sản phẩm</label>
                                        <select class="form-control" readonly="">
                                            @foreach($lstCate as $cate)
                                                <option class="form-control"
                                                    @if($cate->id == $product->category_id) selected @endif
                                                >
                                                    {{ $cate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Giá bán (VND)</label>
                                        <input type="number" class="form-control" min="0" name="price" placeholder="0"
                                            value="{!! $product->price !!}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Giá trị giảm giá (%)</label>
                                        <input type="number" class="form-control" name="sale_off" min="0" max="100"
                                               placeholder="0" value="{!! $product->sale_off !!}" required/>
                                    </div>
{{--                                    <div class="form-group col-md-6">--}}
{{--                                        <label>Giá bán sau giảm giá</label>--}}
{{--                                        <input type="number" class="form-control" placeholder="0"--}}
{{--                                            value="" readonly=""/>--}}
{{--                                    </div>--}}
                                    <div class="form-group col-md-12">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea type="text" class="form-control" name="description" placeholder="Nhập mô tả"
                                                 val style="resize: vertical;">{!! $product->description !!}</textarea>
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
                                <div class="row">
                                    @foreach($product->large_photos as $p)
                                        <div class="col-6 mb-2">
                                            <img class="img-fluid" src="{{ $p }}"  width="100"/>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


