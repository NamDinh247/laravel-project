@extends('frontend.shop.layout_user_profile')

@section('main-content-profile')
    <div class="col-md-2">
        <div style="width: 100%;height: 100%;" src="/img/avatar_2x.png">

        </div>
    </div>
    <div class="col-md-8">
        <div>
            <p>Đơn hàng đã giao thành công. Tiki tặng bạn mã coupon giá trị...</p>
        </div>
    </div>
    <div class="row col-md-2">
        <div class="col-md-6">
            <a href="" style="text-decoration: none; color: blue">Đã đọc</a>
        </div>
        <div class="col-md-6">
            <a href="" style="text-decoration: none; color: red">Xóa</a>
        </div>
    </div>
@endsection
