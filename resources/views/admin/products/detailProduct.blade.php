@extends('admin.layout_admin_master')

@section('title', 'Chi tiết sản phẩm')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">

@endsection

@section('main-content')
    <div class="row scroll_content_form_detail pt-1 pb-3">
        <div class="col-md-12 mb-4">
            <a href="/admin/product" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh
                sách sản phẩm</a>
        </div>
        <div class="col-md-12">
            <div class="card border-r-0 border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Thêm mới sản phẩm</h5>
                            <hr/>
                        </div>
                    </div>
                    <div class="row p-0 scroll_content_form">
                        <div class="col-sm-8">
                            <form class="form row" action="/admin/product/new" method="post" id="accountForm">
                                @csrf
                                <div class="form-group col-md-6">
                                    <label>Mã sản phẩm</label>
                                    <input type="text" class="form-control" name="name"
                                           value="{!! $product->prd_code !!}"
                                           placeholder="Mã sản phẩm" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name" value="{!! $product->name !!}"
                                           placeholder="Tên sản phẩm" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Loại sản phẩm</label>
                                    <select id="type-product" class="form-control" name="category_id">
                                        @foreach($lstCate as $cate)
                                            <option value="{{ $cate->id }}" class="form-control"
                                                    @if($product->category_id == $cate->id) selected @endif>
                                                {{ $cate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tên cửa hàng</label>
                                    <select id="select_shop" name="shop_id" class="form-control">
                                        @foreach($lstShop as $shop)
                                            <option value="{!! $shop->id !!}"
                                                    @if($product->shop_id == $shop->id) selected @endif>
                                                {!! $shop->name !!}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Giá bán (VND)</label>
                                    <input type="number" value="{!! $product->price !!}" class="form-control" min="0"
                                           name="price" placeholder="0" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Giá trị giảm giá (%)</label>
                                    <input type="number" value="{!! $product->sale_off !!}" class="form-control"
                                           name="sale_off" min="0" max="100"
                                           placeholder="0" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea type="text" class="form-control" id="address" name="description"
                                              placeholder="Nhập mô tả" required
                                              style="resize: vertical;">{!! $product->description !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button class="btn btn-lg btn-success" type="submit"><i class="fa fa-save"></i>&nbsp;
                                            Lưu
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <label>Thêm ảnh sản phẩm</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="thumbnails">
                                            <label type="button" class="btn btn-outline-success">
                                                <input type="button" class="text-center center-block file-upload"
                                                       id="upload_widget" accept="image/*" multiple=""
                                                       style="margin-top: 20px;display: none;">
                                                <i class="fa fa-upload"></i>&nbsp; Tải ảnh lên
                                            </label>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/admin/product/product.js"></script>
    <script src="/Admin/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'bigbignoobbb',
                uploadPreset: 'x0svi0az',
                multiple: true,
                form: '#product_form',
                fieldName: 'thumbnails[]',
                thumbnails: '.thumbnails'
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info.url);
                    var arrayThumnailInputs = document.querySelectorAll('input[name="thumbnails[]"]');
                    for (let i = 0; i < arrayThumnailInputs.length; i++) {
                        arrayThumnailInputs[i].value = arrayThumnailInputs[i].getAttribute('data-cloudinary-public-id');
                    }
                }
            }
        );
        $('#upload_widget').click(function () {
            myWidget.open();
        })
        $('body').on('click', '.cloudinary-delete', function () {
            var splittedImg = $(this).parent().find('img').attr('src').split('/');
            var imgName = splittedImg[splittedImg.length - 1];
            imgName = imgName.replace('.jpg', '');
            $('input[data-cloudinary-public-id="' + imgName + '"]').remove();
            $(this).parent().remove();
        });
    </script>
@endsection
