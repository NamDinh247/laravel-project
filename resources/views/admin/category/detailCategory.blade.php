@extends('admin.layout_admin_master')

@section('title', 'Chi tiết danh mục')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/sweetalert/sweetalert.min.css">

@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="/admin/category/" class="gobacklist ml-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;
                Danh sách danh mục</a>
        </div>
        <div class="col-md-12 form_detail_categories" >
            <div class="container-fluid bg-white p-3 content_form" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Sửa thông tin danh mục</h5>
                        <hr/>
                    </div>
                    <div class="col-sm-6">
                        <form class="form row" action="/admin/category/detail" method="post" id="accountForm">
{{--                        <form class="form row" action="/admin/category" method="post" id="accountForm">--}}
                            @csrf
                            <div class="form-group col-md-12">
                                <label>Tên danh mục</label>
                                <input type="text" name="id" value="{!! $category->id !!}" hidden/>
                                <input type="text" name="name" class="form-control" id="nameCategory" value="{!! $category->name !!}"
                                       placeholder="Tên danh mục">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Trạng thái</label>
                                <select class="form-control" id="statusCategory">
                                    <option value="Hoạt động">Hoạt động</option>
                                    <option value="Không hoạt động">Không hoạt động</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Ghi chú</label>
                                <textarea type="text" name="note" class="form-control" id="noteCategory" value="{!! $category->note !!}"
                                          placeholder="Nhập ghi chú" style="resize: vertical;">{!! $category->note !!}</textarea>
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
    <script src="/js/category.js"></script>
    <script src="/Admin/plugins/sweetalert/sweetalert.min.js"></script>

@endsection
