@extends('frontend.shop.manager.layout_shop_master')

@section('main-content-shop')
    <div class="manage_content pt-3 manage_profile_content">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid bg-white p-3 content_form" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);border-radius: 5px;">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="text-center">
                                @if($shop->logo == null || strlen($shop->logo) == 0)
                                    <img src="/img/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" style="border-radius: 50% !important;width: 13rem;height: 13rem; border: 2px solid #20c997;">
                                @else
                                    <img src="{!! $shop->large_photo !!}" class="avatar img-circle img-thumbnail" alt="avatar" style="border-radius: 50% !important;width: 13rem;height: 13rem; border: 2px solid #20c997;">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            $lstPrd = \App\Product::where('shop_id', $shop->id)->where('status', 1)->get();
                            $lstCateByShop = array();
                            foreach ($lstPrd as $prd) {
                                if (in_array($prd->category->name, $lstCateByShop)) {
                                    continue;
                                }
                                array_push($lstCateByShop, $prd->category->name);
                            };
                            ?>
                            <h5>
                                Thông tin cửa hàng
                                <button class="btn btn-sm btn-outline-warning float-right" id="edit_shop">
                                    <i class="fa fa-edit"></i>&nbsp; Sửa
                                </button>
                            </h5>
                            <hr/>
                            <div class="content_information">
                                <div class="row my-4">
                                    <div class="col-md-2 font-weight-bold">Tên cửa hàng:</div>
                                    <div class="col-md-4">{!! $shop->name !!}</div>
                                    <div class="col-md-2 font-weight-bold">Số điện thoại:</div>
                                    <div class="col-md-4">{!! $shop->phone !!}</div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-md-2 font-weight-bold">Email:</div>
                                    <div class="col-md-4">{!! $shop->email !!}</div>
                                    <div class="col-md-2 font-weight-bold">Địa chỉ:</div>
                                    <div class="col-md-4">{!! $shop->address !!}</div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-md-2 font-weight-bold">Quận/huyện: </div>
                                    <div class="col-md-4">{!! $shop->district !!}</div>
                                    <div class="col-md-2 font-weight-bold">Tỉnh/thành phố: </div>
                                    <div class="col-md-4">{!! $shop->city !!}</div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-md-2 font-weight-bold">Danh mục sản phẩm: </div>
                                    <div class="col-md-4">{!! implode(", ",$lstCateByShop) !!}</div>
                                    <div class="col-md-2 font-weight-bold">Số lượng sản phẩm: </div>
                                    <div class="col-md-4">{!! count($lstPrd); !!}</div>
                                </div>
                            </div>
                            <form class="form row d-none" action="#" method="post" id="accountForm_editshop">
                                @csrf
                                <input type="text" name="id" value="{!! $shop->id !!}" hidden/>
                                <div class="form-group col-md-6">
                                    <label>Tên cửa hàng</label>
                                    <input type="text" class="form-control" name="name" placeholder="Tên cửa hàng"
                                           value="{!! $shop->name !!}" required>
                                </div>
                                <div class="col-md-6">

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại"
                                           value="{!! $shop->phone !!}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="you@email.com"
                                           value="{!! $shop->email !!}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ của bạn"
                                           value="{!! $shop->address !!}" required>
                                </div>
                                <div class="col-md-6">

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Quận/huyện</label>
                                    <input type="password" class="form-control" name="district" placeholder="Quận/huyện">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Thành phố</label>
                                    <input type="password" class="form-control" name="city" placeholder="Tỉnh/thành phố">
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
@endsection


