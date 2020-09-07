@extends('frontend.shop.manager.layout_shop_master')

@section('main-content-shop')
    <div class="manage_content pt-3 manage_dashboard_content">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-r-0 border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 pb-2">
                                <h5>Doanh thu theo tháng</h5>
                            </div>
                            <div class="col-md-12">
                                <canvas id="revenue_shop"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
