@extends('admin.layout_admin_master')

@section('title', 'Tạo mới sản phẩm')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">

@endsection

@section('main-content')
    <div class="row scroll_content_form pt-1 pb-3">
        <div class="col-md-12 mb-3">
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
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Loại sản phẩm</label>
                                    <select id="type-product" class="form-control" name="category_id">
                                        <option value="">Chọn loại sản phẩm</option>
                                        @foreach($listCate as $cate)
                                            <option value="{{ $cate->id }}" class="form-control">
                                                {{ $cate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tên cửa hàng</label>
                                    <select id="select_shop" name="shop_id" class="form-control">
                                        @foreach($lstShop as $shop)
                                            <option value="{!! $shop->id !!}">{!! $shop->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Giá bán (VND)</label>
                                    <input type="number" class="form-control" min="0" name="price" placeholder="0">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Giá trị giảm giá (%)</label>
                                    <input type="number" class="form-control" name="sale_off" min="0" max="100"
                                           placeholder="0">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea type="text" class="form-control" id="address" name="description"
                                              placeholder="Nhập mô tả"
                                              style="resize: vertical;"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button class="btn btn-lg btn-success" type="submit"><i class="fa fa-save"></i>&nbsp;
                                            Lưu
                                        </button>
                                        &emsp;
                                        <button class="btn btn-lg btn-danger" type="reset"><i></i>
                                            Làm lại
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <label>Thêm ảnh sản phẩm</label>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="thumbnails">
                                        <label type="button" class="btn btn-outline-success">
                                            <input type="button" class="text-center center-block file-upload"
                                                   id="upload_widget" accept="image/*" multiple=""
                                                   style="margin-top: 20px;display: none;">
                                            <i class="fa fa-upload"></i>&nbsp; Tải ảnh lên
                                        </label>
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
    <script src="/Admin/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
{{--    <script src="/js/admin/product/product.js"></script>--}}
    <script type="text/javascript">
        $('#menu_filter .nav-link').removeClass('active');
        $('.product_filter').addClass('active');
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
        var heightContent = $(window).height() - 70;
        $('.scroll_content').parent().css({
            'height': (heightContent + 20) + 'px',
            'overflow-y': 'auto',
            'overflow-x': 'hidden'
        });
        $('.scroll_content_form').css({'height': (heightContent) + 'px', 'overflow-y': 'auto'});
        $('.scroll_content_form_detail').css({
            'height': (heightContent) + 'px',
            'overflow-y': 'auto',
            'overflow-x': 'hidden'
        });
    </script>
@endsection
