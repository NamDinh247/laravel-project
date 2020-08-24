@extends('admin.layout_admin_master')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="/admin/category/" class="gobacklist ml-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
                Danh sách danh mục</a>
        </div>
        <div class="col-12">
            <div class="container bootstrap snippet">
                <div class="row">
                    <div class="col-sm-9">
                        <h5>Sửa thông tin danh mục</h5>
                        <hr/>
                        <form class="form row" action="/admin/category/detail" method="post" id="accountForm">
                            @csrf
                            <h5>Chi tiết danh mục</h5>
                            <hr/>
                            <div class="form-group col-md-6">
                                <label>Tên danh mục</label>
                                <input type="text" name="id" value="{!! $category->id !!}" hidden/>
                                <input type="text" name="name" class="form-control" id="nameCategory" value="{!! $category->name !!}"
                                       placeholder="Tên danh mục">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Ghi chú</label>
                                <textarea type="text" name="note" class="form-control" id="noteCategory" value="{!! $category->note !!}"
                                          placeholder="Nhập ghi chú" style="resize: vertical;"></textarea>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-script')
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
@endsection
