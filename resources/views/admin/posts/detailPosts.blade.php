@extends('admin.layout_admin_master')

@section('title', 'Chi tiết bài viết')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/sweetalert/sweetalert.min.css">
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/v4-shims.css">
    <link rel="stylesheet" href="/Admin/plugins/emoji/style.css">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="/admin/posts" class="gobacklist"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp; Danh sách bài biết</a>
        </div>
        <div class="col-md-12">
            <div class="container-fluid bg-white p-3 content_form" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);border-radius: 5px;">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Thông tin chung</h5>
                        <hr/>
                    </div>
                </div>
                <div class="row scroll_form">
                    <div class="col-sm-6">
                        <form class="form row" action="#" method="post" id="accountForm">
                            <div class="form-group col-md-12">
                                <label>Sản phẩm</label>
                                <select id="nameProduct" class="form-control">
                                    <option value="">Chọn sản phẩm</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 position-relative">
                                <label>Tiêu đề</label>
                                <div class="w-100" data-emojiarea="" data-type="unicode" data-global-picker="true">
                                    <i class="emoji emoji-smile emoji-button fa fa-smile-o text-secondary position-absolute" id="emoji_detail_posts" aria-hidden="true" style="top: 30px; right: 10px;z-index: 1;"></i>
                                    <textarea class="box_new_posts form-control" id="box_new_posts" type="text" placeholder="Nhập tiêu đề" style="width: 100%;resize: vertical;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i>&nbsp; Lưu</button>
                                    <button class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash"></i>&nbsp; Xoá</button>
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
    <script src="/Admin/plugins/emoji/jquery.emojiarea.js"></script>
    <script src="/js/admin/posts/posts.js"></script>
    <script src="/Admin/plugins/sweetalert/sweetalert.min.js"></script>
@endsection
