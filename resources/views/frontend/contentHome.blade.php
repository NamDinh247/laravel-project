@extends('frontend.layout')

@section('title', 'Trang chủ')

@section('header-script')
    <link rel="stylesheet" href="/css/frontend/content_home.css">
@endsection

@section('content')
    <div class="row pt-4">
        <div class="col-md-3">
            @include('frontend.asideLeftHome')
        </div>
        <div class="col-md-6 px-3">
            <div class="content_center">
                {{-- new posts --}}
                <div class="box-content mb-3" >
                    <div class="p-3 clearfix">
                        <div class="box_content_left float-left">
                            <div class="avatar_box">
                                <img class="rounded-circle" src="/img/avatar_2x.png" alt="avatar" style="width: 100%;">
                            </div>
                            <div class="add_action">
                                <ul class="menu_box_left pt-2 pl-2">
                                    <li class="item_menu_box_left py-2" title="Video trực tiếp"><i class="fa fa-video text-danger" aria-hidden="true"></i></li>
                                    <li class="item_menu_box_left py-2" title="Thêm ảnh"><i class="fa fa-picture-o text-success" aria-hidden="true"></i></li>
                                    <li class="item_menu_box_left py-2" title="Biểu tượng cảm xúc"><i class="fa fa-smile-o text-warning" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box_content_right input-group float-left">
                            <textarea class="box_new_posts form-control mb-2" id="box_new_posts" type="text" placeholder="Sản phẩm mới nhất của bạn là gì vậy?"></textarea>
                        </div>
                        <div class="save_posts" style="margin-left: 10%">
                            <button class="btn btn-sm btn-default" id="post" style="width: 100%;border-radius: 20px;">Đăng</button>
                        </div>
                    </div>

                </div>
                <div class="box-content mb-3" >
                    <div class="p-3">
                        <div class="box_header">
                            <div class="avatar_box">
                                <img class="rounded-circle" src="/img/avatar_2x.png" alt="avatar" style="width: 100%;">
                            </div>
                            <div class="add_action">
                                <ul class="menu_box_left pt-2 pl-2">
                                    <li class="item_menu_box_left py-2" title="Video trực tiếp"><i class="fa fa-video text-danger" aria-hidden="true"></i></li>
                                    <li class="item_menu_box_left py-2" title="Thêm ảnh"><i class="fa fa-picture-o text-success" aria-hidden="true"></i></li>
                                    <li class="item_menu_box_left py-2" title="Biểu tượng cảm xúc"><i class="fa fa-smile-o text-warning" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box_body">
                            <div class="content_box_body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <img src="" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-sm btn-default" id="post" style="width: 100%;border-radius: 20px;">Đăng</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop
@section('main-script')
    <script src="/js/frontend/home.js"></script>
@stop
