@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="/admin/product" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh sách sản phẩm</a>
        </div>
        <div class="col-md-12">
            <div class="card border-r-0 border-0">
                <div class="card-body container bootstrap snippet">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Nhập tên sản phẩm</h5>
                            <hr/>
                        </div>
                        <div class="col-10">
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm"
                                   value="{{ $product->name }}" />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            Dòng sản phẩm
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <select class="form-control" name="cateId">
                                    @foreach($listCate as $cate)
                                        <option value="{{ $cate->id }}" class="form-control"
                                                @if ($product->categoryId == $cate->id) selected
                                            @endif
                                        >
                                            {{ $cate->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-2">
                            Giá
                        </div>
                        <div class="col-10">
                            <input type="text" name="price" class="form-control price" placeholder="Nhập giá sản phẩm"
                                   value="{{ $product->price }}" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-2">
                            Ảnh sản phẩm
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="button" id="upload_widget" class="btn btn-primary">Upload
                                    files
                                </button>
                                <div class="thumbnails">
                                    <ul class="cloudinary-thumbnails">
                                        @foreach($product->preview_photos as $preview)
                                            <li class="cloudinary-thumbnail active">
                                                <img src="{{$preview}}" alt="">
                                                <a href="javascript:void(0)" class="cloudinary-delete">x</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-2">
                            Mô tả
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                    <textarea id="editor" name="description" class="form-control"
                              placeholder="Mô tả chi tiết sản phầm">
                        {{$product->description}}
                    </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 px-5">
                        <div class="col-6">
                            <input type="submit" value="Cập nhật" class="btn btn-primary form-control"/>
                        </div>
                        <div class="col-6">
                            <input type="reset" value="Hủy" class="btn btn-secondary btn-cancel form-control" />
                        </div>
                    </div>
                    @foreach($product->photo_ids as $id)
                        <input type="hidden" name="thumbnails[]" data-cloudinary-public-id="{{$id}}" value="{{$id}}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/product/detailProduct.js"></script>
@endsection

