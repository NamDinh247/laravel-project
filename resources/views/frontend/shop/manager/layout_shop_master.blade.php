@extends('frontend.layout')

@section('title', 'Quản lý cửa hàng')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="/css/frontend/product/listProduct.css">
    <link rel="stylesheet" href="/css/frontend/content_home.css">
    <link rel="stylesheet" href="/css/frontend/detail_shop.css">
    <link rel="stylesheet" href="/Admin/plugins/emoji/style.css">

@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 pt-2 aside_left_detail_shop" style="background-color: #fff !important;box-shadow: 1px 0 5px -2px #888;">
            <div class="aside_left pl-3">
                <div class="filter_left">
                    <ul class="menu_left menu_filter_orders">
                        <li class="item_menu_left pl-2 py-2 clearfix">
                            @if(\Illuminate\Support\Facades\Auth::user()->shop->logo == null ||
                                strlen(\Illuminate\Support\Facades\Auth::user()->shop->logo) == 0)
                                <img class="rounded-circle float-left mr-2" src="/img/avatar_2x.png" alt="avatar left">
                            @else
                                <img class="rounded-circle float-left mr-2" src="{!! \Illuminate\Support\Facades\Auth::user()->shop->small_photo !!}" alt="avatar left">
                            @endif
                            <span class="float-left item_menu_title pt-1">
                                {!! \Illuminate\Support\Facades\Auth::user()->shop->name !!}
                            </span>
                        </li>
                        <li>
                            <a href="/shop/revenue">
                                <i class="fa fa-line-chart pr-1"></i>
                                Doanh thu
                            </a>
                        </li>
                        <li>
                            <a href="#manage_orders" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle clearfix collapsed">
                                <i class="fa fa-file-text-o pr-1"></i>
                                Quản lý đơn hàng
                                <i class="fa fa-angle-up float-right pt-2" aria-hidden="true"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="manage_orders">
                                <li>
                                    <a href="/shop/order/list">Tất cả </a>
                                </li>
                                <li>
                                    <a onclick="changeTab(this, 'manage_orders_content')">Hoàn thành</a>
                                </li>
                                <li>
                                    <a onclick="changeTab(this, 'manage_orders_content')">Đã hủy</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#manage_product" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle clearfix collapsed">
                                <i class="fa fa-shopping-bag pr-1"></i>
                                Quản lý sản phẩm
                                <i class="fa fa-angle-up float-right pt-2" aria-hidden="true"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="manage_product">
                                <li>
                                    <a href="/shop/products/list">Tất cả </a>
                                </li>
                                <li>
                                    <a href="/shop/products/create">Thêm sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#manage_shop" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle clearfix collapsed">
                                <i class="fa fa-archive pr-1"></i>
                                Quản lý shop
                                <i class="fa fa-angle-up float-right pt-2" aria-hidden="true"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="manage_shop">
                                <li>
                                    <a href="/shop/profile">Hồ sơ shop</a>
                                </li>
                                <li>
                                    <a>Thông báo</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/shop/article/list">
                                <i class="fa fa-file-text-o pr-1"></i>
                                    Quản lý bài viết
{{--                                <i class="fa fa-angle-up float-right pt-2" aria-hidden="true"></i>--}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9 pt-2 content_detail_shop px-4" style="background-color: rgb(240, 242, 245);">
            @if( \Illuminate\Support\Facades\Session::has('success_message'))
                <div class="box-body" style="background-color: green">
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thành công</h3>

                            <div class="box-tools pull-right" hidden>
                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            @endif
            @yield('main-content-shop')
        </div>
    </div>
@stop
@section('main-script')
    <script src="/Admin/plugins/swiper/swiper.min.js"></script>
    <script src="/Admin/plugins/chart.js/Chart.min.js"></script>
    <script src="/Admin/plugins/emoji/jquery.emojiarea.js"></script>
    {{--    <script src="/js/frontend/product/list.js"></script>--}}
    <script>
        $(document).ready(function() {
            $('.menu-header li').removeClass('active');
            $('.menu-header a[title="Cửa hàng"]').parent().addClass('active');
        });
        var height = $(window).height() - 70;
        $('.aside_left_detail_shop').css({'height': (height + 10)  + 'px', 'overflow-x': 'hidden'});
        $('.content_detail_shop').css({'height': (height + 10)  + 'px', 'overflow-x': 'hidden'});
        $(function () { //tab table 5

            var months = new Date().getDate();
            var arrMonths = [];
            var arrMonthsData = [];

            for (var i=1; i<=months;i++) {
                arrMonths.push(i);
                arrMonthsData.push(i + Math.floor(Math.random() * 250));
            }
            console.log(arrMonths)
            var ctx = document.getElementById('revenue_shop').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: arrMonths,
                    datasets: [{
                        fill: false,
                        backgroundColor: 'rgb(54, 162, 235)',
                        borderColor: 'rgb(54, 162, 235)',
                        data: arrMonthsData,
                    }]
                },
                options: {
                    legend: {
                        display: false,
                    },
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Ngày'
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 300,
                                stepSize: 100,
                                callback: function(value, index, values) {
                                    return value + ' VND';
                                }
                            },
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Giá trị'
                            }
                        }]
                    }
                }
            });
        });
        $('#edit_shop').click(function (event) {
            $(this).addClass('d-none');
            $('#accountForm_editshop').removeClass('d-none');
            $('.file-upload').removeClass('d-none');
            $('.content_information').addClass('d-none');
        })
        function changeTab(e, ele) {
            console.log(ele)
            $(this).css('color', '#0056b');
            $('.manage_content').removeClass('d-block').addClass('d-none');
            $('.' + ele).removeClass('d-none');
            $('.' + ele).addClass('d-block');
        }
        $('#box_new_posts').click(function (e) {
            $(this).height(100);
            $(this).css({'border-radius': '10px', 'background': '#f0f2f5'});
            $('.add_action').show();
            $('#post').show();
            $('#input_search_product').show();
            $('#emoji_new_posts').show();
            $('#resetTextarea').show();
            $('#content-post').removeClass('d-none');
        });
        $('#post').click(function (e) {
            $('#box_new_posts').height(25);
            $('#box_new_posts').css('border-radius', '30px');
            $('.add_action').hide();
            $('#post').hide();
            $('#input_search_product').hide();
            $('#emoji_new_posts').hide();
            $('#resetTextarea').hide();
        });
        $('#resetTextarea').click(function (e) {
            $('#box_new_posts').height(25);
            $('#box_new_posts').css('border-radius', '30px');
            $('.add_action').hide();
            $('#post').hide();
            $('#input_search_product').hide();
            $('#emoji_new_posts').hide();
            $('#resetTextarea').hide();
            $('#box_new_posts').val('');
        });

        $('#box_new_posts').on('input', function() {});
    </script>
@stop

