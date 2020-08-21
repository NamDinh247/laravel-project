@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css" xmlns="http://www.w3.org/1999/html">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="/admin/orders/" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh
                sách đơn hàng</a>
        </div>
        <div class="col-12">
            <div class="container bootstrap snippet">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Chi tiết đơn hàng</h5>
                        <hr/>
                        <form class="form row" action="#" method="post" id="accountForm">
                            <div class="form-group col-md-4">
                                <label>Địa chỉ người nhận</label>
                                <div>
                                    <div>
                                        <div>
                                            <p>Name khách hàng</p>
                                        </div>
                                        <div>
                                            <p>Địa chỉ</p>
                                        </div>
                                        <div>
                                            <p>Điện thoại</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Hình thức giao hàng</label>
                                <div>
                                    <p>Thời gian</p>
                                </div>
                                <div>
                                    <p>Hình thức</p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Hình thức thanh toán</label>
                                <div>
                                    <p>Giao hàng miễn phí</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label>Sản phẩm</label>
                        <div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Giá</label>
                        <div>

                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Số lượng</label>
                        <div>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <label>Giảm giá</label>
                        <div>

                        </div>
                    </div>
                    <div class="col-md-2 text-right">
                        <label>Tạm tính</label>
                        <div>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-2">
                        <div>
                            <p>Tạm tính</p>
                        </div>
                        <div>
                            <p>Giảm giá</p>
                        </div>
                        <div>
                            <p>Phí vận chuyển</p>
                        </div>
                        <div>
                            <p>Tổng cộng</p>
                        </div>
                    </div>
                </div>
                <hr>
                <form action="">
                    <button class="btn btn-sm btn-warning ">
                        Cập nhật trạng thái đơn hàng
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/detailAccount.js"></script>
@endsection
