@extends('frontend.layout')

@section('title', 'Trang chủ')

@section('header-script')
    <link rel="stylesheet" href="/css/frontend/content_home.css">
@endsection

@section('content')
    <div class="row pt-4">
        <div class="col-md-3 sidebar">
            @include('frontend.asideLeftHome')
        </div>
        <div class="col-md-9" style="margin-left: auto!important;">
            <div class="col-md-8 px-5">
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
                                <button class="btn btn-sm btn-default" id="post" style="width: 100%;border-radius: 20px;font-weight: 600;">Đăng</button>
                            </div>
                        </div>
                    </div>
                    {{-- for từ đây --}}
                    <div class="box-content mb-3" >
                        <div class="box_header pt-3">
                            <div class="avatar_box pb-2 px-3">
                                <div class="box_img mr-2">
                                    <img class="rounded-circle float-left" src="/img/avatar_2x.png" alt="avatar" style="width: 100%;">
                                </div>
                                <div class="name_time">
                                    <div class="nameTime">
                                        <div class="name">Hiện TNT</div>
                                        <div class="time">
                                            20 phút trước
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content_header px-2 py-1">
                                <div class="content_header_child">
                                    <span>
                                        Vẻ quyến rũ đầy màu sắc của mặt bàn bằng kính tái chế có thể là thứ bạn đang tìm kiếm để thêm một chút gia vị vào thiết kế nhà bếp của mình với phong cách thân thiện với môi trường.
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="box_body">
                            <div class="content_box_body">
                                <div class="row p-0 m-0" style="margin-bottom: 1px !important;">
                                    <div class="image1 col-md-12 p-0 m-0">
                                        <img src="/img/post1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="row p-0 m-0">
                                    <div class="image1 col-md-4 p-0 m-0">
                                        <img src="/img/posts3.jpg" alt="" style="padding-right: 1px !important;">
                                    </div>
                                    <div class="image1 col-md-4 p-0 m-0">
                                        <img src="/img/posts4.jpg" alt="">
                                    </div>
                                    <div class="image1 col-md-4 p-0 m-0">
                                        <img src="/img/posts5.jpg" alt="" style="margin-left: 1px !important;margin-right: 1px !important;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box_comment">
                            <div id="fb-root"></div>
                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="2" data-width=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
@stop
@section('main-script')
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=680469619206748&autoLogAppEvents=1" nonce="tTMwqKi2"></script>
    <script src="/js/frontend/home.js"></script>
@stop