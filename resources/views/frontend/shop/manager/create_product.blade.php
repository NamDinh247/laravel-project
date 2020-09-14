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
                            <div class="col-sm-12">
                                <form class="form row" action="/shop/products/create" method="post" id="accountForm">
                                    @csrf
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Tên sản phẩm</label>
                                                <input type="text" class="form-control" name="name"
                                                       placeholder="Tên sản phẩm" required>
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
                                                <input type="number" class="form-control" min="0" name="price"
                                                       placeholder="0" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Giá trị giảm giá (%)</label>
                                                <input type="number" class="form-control" min="0" max="100"
                                                       name="sale_off"
                                                       placeholder="0" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Mô tả sản phẩm</label>
                                                <textarea type="text" class="form-control" name="description"
                                                          placeholder="Nhập mô tả"
                                                          style="resize: vertical;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button class="btn btn-sm btn-success" type="submit"><i
                                                            class="fa fa-save"></i>&nbsp;
                                                        Tạo mới
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Thêm ảnh sản phẩm</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" id="product_form">
                                                    <div class="thumbnails">
                                                    </div>
                                                    <label type="button" class="btn btn-outline-success">
                                                        <input type="button"
                                                               class="text-center center-block file-upload"
                                                               id="upload_widget" accept="image/*" multiple=""
                                                               style="margin-top: 20px;display: none;">
                                                        <i class="fa fa-upload"></i>&nbsp; Tải ảnh lên
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('main-script')
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
        // xử lý js trên dynamic content.
        $('body').on('click', '.cloudinary-delete', function () {
            var splittedImg = $(this).parent().find('img').attr('src').split('/');
            var imgName = splittedImg[splittedImg.length - 1];
            imgName = imgName.replace('.jpg', '');
            $('input[data-cloudinary-public-id="' + imgName + '"]').remove();
        });
    </script>
@endsection
