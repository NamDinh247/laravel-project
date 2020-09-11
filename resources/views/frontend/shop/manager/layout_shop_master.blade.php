@extends('frontend.layout')

@section('title', 'Quản lý cửa hàng')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="/css/frontend/product/listProduct.css">
    <link rel="stylesheet" href="/css/frontend/content_home.css">
    <link rel="stylesheet" href="/css/frontend/detail_shop.css">
    <link rel="stylesheet" href="/Admin/plugins/emoji/style.css">
    <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker.css">
    <script src="/Admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/Admin/plugins/moment/moment.min.js"></script>
    <script src="/Admin/plugins/moment/locale/vi.js"></script>
    <link rel="stylesheet" href="/Admin/plugins/izitoast/iziToast.min.css">
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
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
                    {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                </div>
            @elseif( \Illuminate\Support\Facades\Session::has('error_message'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Thông báo!</h5>
                    {{ \Illuminate\Support\Facades\Session::get('error_message') }}
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
    <script src="/Admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="/Admin/plugins/izitoast/iziToast.min.js"></script>
    <script src="/Admin/plugins/sweetalert/sweetalert.min.js"></script>

    {{--    <script src="/js/frontend/product/list.js"></script>--}}
    <script>
        $(document).ready(function() {
            $('.menu-header li').removeClass('active');
            $('.menu-header a[title="Cửa hàng"]').parent().addClass('active');
            var height = $(window).height() - 70;
            $('.aside_left_detail_shop').css({'height': (height + 10)  + 'px', 'overflow-x': 'hidden'});
            $('.content_detail_shop').css({'height': (height + 10)  + 'px', 'overflow-x': 'hidden'});

            $(function () { //tab table 5
                //var months = new Date().getDate();
                var arrMonths = [];
                var arrMonthsData = [];
                for (var i=1; i<=12;i++) {
                    arrMonths.push('Tháng ' + i);
                    arrMonthsData.push(i + Math.floor(Math.random() * 500));
                }
                var ctx = document.getElementById('revenue_shop').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: arrMonths,
                        datasets: [{
                            fill: false,
                            backgroundColor: '#20c997',
                            borderColor: '#20c997',
                            borderWidth: 1,
                            data: arrMonthsData,
                            pointBorderWidth: 1,
                            pointRadius: 4,
                            pointBorderColor: '#20c997',
                            pointBackgroundColor: '#fff',
                            label: 'Tổng doanh thu'
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
                                gridLines : {
                                    display : false,
                                    drawBorder: false,
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    suggestedMin: 0,
                                    suggestedMax: 1000,
                                    stepSize: 200,
                                    callback: function(value, index, values) {
                                        if (value === 0) {
                                            return value + '  ';
                                        } else {
                                            return value + ' tr';
                                        }
                                    }
                                },
                                gridLines : {
                                    display : true,
                                    color: '#efefef',
                                    drawBorder: false,
                                }
                            }]
                        }
                    }
                });
                var objectKnob = {
                    'min':0,
                    'max':100,
                    'width': '70',
                    'height': '70',
                    'readOnly': true,
                    'thickness': '.15',
                    'fgColor': '#444',
                    'bgColor': '#20c997'
                }
                $(".total_orders").knob(objectKnob);
                $('.total_orders').val(60).trigger('change');
                $(".total_orders1").knob(objectKnob);
                $('.total_orders1').val(55).trigger('change');
                $(".total_orders2").knob(objectKnob);
                $('.total_orders2').val(40).trigger('change');
            });
        });

        $('#edit_shop').click(function (event) {
            $(this).addClass('d-none');
            $('#accountForm_editshop').removeClass('d-none');
            $('.file-upload').removeClass('d-none');
            $('.content_information').addClass('d-none');
        })
        function changeTab(e, ele) {
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
            var title_posts = $('#box_new_posts').val();
            if (!title_posts) {
                iziToast.warning({
                    position: 'topCenter',
                    timeout: 1000,
                    transitionIn: 'bounceInDown',
                    message: 'Vui lòng nhập tiêu đề!',
                });
                return false;
            } else {
                var notify = $('#notify_posts').val();
                console.log(notify)
                // iziToast.warning({
                //     position: 'topCenter',
                //     timeout: 1000,
                //     transitionIn: 'bounceInDown',
                //     message: 'Vui lòng nhập tiêu đề!',
                // });
                $('#box_new_posts').val('');
            }
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

        //filter date
        var localevn = {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Áp dụng",
            "cancelLabel": "Hủy",
            "fromLabel": "Từ",
            "toLabel": "Đến",
            "customRangeLabel": "Tùy chỉnh",
            "weekLabel": "W",
            "daysOfWeek": ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
            "monthNames": ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
            "firstDay": 1
        };
        var rsFromDate = new Date(new Date().getFullYear(), new Date().getMonth(), 1).setHours(0, 0, 0, 0);
        var rsToDate = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).setHours(0, 0, 0, 0) + 86400000 - 1;
        $('#dateTime_orders').daterangepicker({
            format: 'DD/MM/YYYY',
            opens: "left",
            drops: 'down',
            locale: localevn,
            startDate: moment(rsFromDate),
            endDate: moment(rsToDate),
            alwaysShowCalendars: true,
            ranges: {
                // 'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                // 'Hôm nay': [moment(), moment()],
                'Tuần trước': [moment().subtract(1, 'weeks').startOf('weeks'), moment().subtract(1, 'weeks').endOf('weeks')],
                'Tuần này': [moment().startOf('weeks'), moment().endOf('weeks')],
                'Tuần sau': [moment().subtract(-1, 'weeks').startOf('weeks'), moment().subtract(-1, 'weeks').endOf('weeks')],
                'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                'Tháng sau': [moment().subtract(-1, 'month').startOf('month'), moment().subtract(-1, 'month').endOf('month')]
            }
        }).on('hide.daterangepicker', function (ev, picker) {
            $('#dateTime').val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            $('.total_money').show();
        }).on('cancel.daterangepicker', function (ev, picker) {
            $('#dateTime').val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });
    </script>
@stop

