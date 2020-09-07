@extends('frontend.shop.manager.layout_shop_master')

@section('main-content-shop')
    <div class="manage_content pt-3 manage_product_new_content">
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
                                <form class="form row" action="/shop/products/create" method="post" id="accountForm">
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Danh mục sản phẩm</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($lstCate as $cate)
                                                <option value="{{ $cate->id }}" class="form-control">
                                                    {{ $cate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Giá bán (VND)</label>
                                        <input type="number" class="form-control" min="0" name="price" placeholder="0" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Giá trị giảm giá (%)</label>
                                        <input type="number" class="form-control" min="0" max="100" name="sale_off"
                                               placeholder="0" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea type="text" class="form-control" name="description" placeholder="Nhập mô tả"
                                                  style="resize: vertical;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i>&nbsp;
                                                Tạo mới
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
@endsection


