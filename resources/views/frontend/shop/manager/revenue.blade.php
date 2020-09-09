@extends('frontend.shop.manager.layout_shop_master')

@section('main-content-shop')
    <div class="manage_content pt-3 manage_dashboard_content">
        <div class="row m-0 pb-3">
            <div class="col-md-12 pt-4 px-4 pb-5 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 2px rgba(0,0,0,.2);">
                <h5 class="pb-4 pl-2">Doanh thu</h5>
                <canvas id="revenue_shop"></canvas>
            </div>
            <div class="col-md-12 px-0 mt-3">
                <div class="row px-3">
                    <div class="col-md-4">
                        <div class="row p-2 mr-1 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 2px rgba(0,0,0,.2);">
                            <div class="col-md-3 p-0 d-flex justify-content-center">
                                <input type="text" class="total_orders" data-min="0" data-max="">
                            </div>
                            <div class="col-md-9 p-0 pl-1">
                                <p class="font-weight-bold mb-0 pb-1" style="font-size: 25px;">100</p>
                                <p>Tổng số đơn hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row p-2 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 2px rgba(0,0,0,.2);">
                            <div class="col-md-3 p-0 d-flex justify-content-center">
                                <input type="text" class="total_orders1" data-min="0" data-max="">
                            </div>
                            <div class="col-md-9 p-0 pl-1">
                                <p class="font-weight-bold m-0 pb-1" style="font-size: 25px;">93</p>
                                <p>Tổng số đơn thành công</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row p-2 ml-1 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 2px rgba(0,0,0,.2);">
                            <div class="col-md-3 p-0 d-flex justify-content-center">
                                <input type="text" class="total_orders2" data-min="0" data-max="">
                            </div>
                            <div class="col-md-9 p-0 pl-1">
                                <p class="font-weight-bold m-0 pb-1" style="font-size: 25px;">70</p>
                                <p style="font-size: 13px;">Tổng số đơn trừ tiền thành công</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
