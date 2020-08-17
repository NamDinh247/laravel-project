@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="/admin/category" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh sách danh mục</a>
        </div>
        <div class="col-12">
            <div class="container bootstrap snippet">
                <div class="row">
                    <div class="col-sm-9">
                        <h5>Thêm mới danh mục</h5>
                        <hr/>
                        <form class="form row" action="#" method="post" id="accountForm">
                            <div class="form-group col-md-6">
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control" id="nameCategory" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Ghi chú</label>
                                <textarea type="text" class="form-control" id="noteCategory" placeholder="Nhập ghi chú" style="resize: vertical;"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button class="btn btn-lg btn-success" type="submit"><i class="fa fa-save"></i>&nbsp; Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/detailCategory.js"></script>
@endsection
