@extends('admin.layout_admin_master')

@section('title', 'Doanh thu')

@section('header-script')
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/v4-shims.css">
    <style>
        .total_orders, .total_orders1, total_orders2{
            font-size: 20px !important;
            font-weight: normal !important;
        }
    </style>
@endsection

@section('main-content')
    <div class="row scroll_content mx-2 pt-1 pb-3">
        <div class="col-md-12 pt-4 px-4 pb-5 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 2px rgba(0,0,0,.2);">
            <h5 class="pb-4 pl-2">Doanh thu</h5>
            <canvas id="revenue"></canvas>
        </div>
        <div class="col-md-12 px-0 mt-3">
            <div class="row px-3">
                <div class="col-md-4">
                    <div class="row p-2 mr-1 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 2px rgba(0,0,0,.2);">
                        <div class="col-md-3 p-0 d-flex justify-content-center">
                            <input type="text" class="total_orders" data-min="0" data-max="">
                        </div>
                        <div class="col-md-9 p-0">
                            <p class="font-weight-bold mb-0 pb-1" style="font-size: 25px;">100</p>
                            <p>Tổng số đơn hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row p-2 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 2px rgba(0,0,0,.2);">
                        <div class="col-md-3 p-0 d-flex justify-content-center">
                            <input type="text" class="total_orders1" data-min="0" data-max="">
                        </div>
                        <div class="col-md-9 p-0">
                            <p class="font-weight-bold m-0 pb-1" style="font-size: 25px;">93</p>
                            <p>Tổng số đơn thành công</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row p-2 ml-1 bg-white" style="box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 2px rgba(0,0,0,.2);">
                        <div class="col-md-3 p-0 d-flex justify-content-center">
                            <input type="text" class="total_orders2" data-min="0" data-max="">
                        </div>
                        <div class="col-md-9 p-0">
                            <p class="font-weight-bold m-0 pb-1" style="font-size: 25px;">70</p>
                            <p style="font-size: 13px;">Tổng số đơn trừ tiền thành công</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-script')
    <script src="/Admin/plugins/chart.js/Chart.min.js"></script>
    <script src="/Admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script>
        $(function () { //tab table 5
            //var months = new Date().getDate();
            var arrMonths = [];
            var arrMonthsData = [];
            for (var i=1; i<=12;i++) {
                arrMonths.push('Tháng ' + i);
                arrMonthsData.push(i + Math.floor(Math.random() * 500));
            }
            console.log(arrMonths)
            var ctx = document.getElementById('revenue').getContext('2d');
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
        var heightContent = $(window).height() - 70;
        $('.scroll_content').parent().css({'height': (heightContent) + 'px', 'overflow-y': 'auto', 'overflow-x': 'hidden'});
    </script>
@endsection
