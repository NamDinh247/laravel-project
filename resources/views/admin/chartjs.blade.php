@extends('admin.layout_admin_master')

@section('main-content')

    <div class="col-md-10" style="width: 100%">
        <h2 style="padding-bottom: 50px">Doanh thu thuần</h2>
        <canvas id="myChart4"></canvas>
    </div>
    {{--    <div style="width: 100%">--}}
    {{--        <h2 style="padding-bottom: 50px">Tổng doanh thu</h2>--}}
    {{--        <canvas id="myChart"></canvas>--}}
    {{--    </div>--}}
    <hr>
    <div class=row>
        <div class="col-md-4">
            <canvas id="myChart1"></canvas>
            <div class="donut-inner">
                <span>100%</span>
            </div>
        </div>
        <div class="col-md-4">
            <canvas id="myChart2"></canvas>
            <div class="donut-inner">
                <span>100%</span>
            </div>
        </div>
        <div class="col-md-4">
            <canvas id="myChart3"></canvas>
            <div class="donut-inner">
                <span class="">100%</span>
            </div>
        </div>
    </div>
    <hr>

    <hr>
    <div class="col-md-6" style="width: 100%">
        <h2 style="padding-bottom: 50px">Doanh thu theo dòng hàng</h2>
        <canvas id="myChart5"></canvas>
    </div>
    <hr>
    <div class="col-md-6" style="width: 100%">
        <h2 style="padding-bottom: 50px">Top 10 đơn hàng có tổng giá trị cao nhất</h2>
        <canvas id="myChart6"></canvas>
    </div>
@endsection

@section('main-script')
    <script>
        $(function () { //tab table 1
            var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var ctx1 = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        label: 'My Second dataset',
                        fill: false,
                        backgroundColor: 'rgb(54, 162, 235)',
                        borderColor: 'rgb(54, 162, 235)',
                        data: [30, 20, 55, 62, 55, 34],
                    }]
                },
                options: {
                    legend: {
                        display: false,
                    },
                    responsive: true,
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 100,
                                stepSize: 25
                            },
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Money'
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>

        $(function () { //tab table 2
            var ctx1 = document.getElementById('myChart1').getContext('2d');
            var myChart1 = new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        backgroundColor: ['#000000'],
                        borderColor: '#fff',
                        data: [10],
                        borderWidth: [0, 0]
                    }]
                },
                options: {
                    responsive: true,
                    cutoutPercentage: 88,
                    title: {
                        display: true,
                        text: 'ABC Doughnut'
                    },
                    animation: {
                        animateRotate: true,
                        duration: 2000
                    }
                }
            });
        });
    </script>
    <script>

        $(function () { //tab table 3
            var ctx1 = document.getElementById('myChart2').getContext('2d');
            var myChart2 = new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        backgroundColor: ['#000000'],
                        borderColor: '#fff',
                        data: [10],
                        borderWidth: [0, 0]
                    }]
                },
                options: {
                    responsive: true,
                    cutoutPercentage: 88,
                    title: {
                        display: true,
                        text: 'ABC Doughnut'
                    },
                    animation: {
                        animateRotate: true,
                        duration: 2000
                    }
                }
            });
        });
    </script>
    <script>

        $(function () { //tab table 4
            var ctx1 = document.getElementById('myChart3').getContext('2d');
            var myChart3 = new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        backgroundColor: ['#000000'],
                        borderColor: '#fff',
                        data: [10],
                        borderWidth: [0, 0]
                    }]
                },
                options: {
                    responsive: true,
                    cutoutPercentage: 88,
                    title: {
                        display: true,
                        text: 'ABC Doughnut'
                    },
                    animation: {
                        animateRotate: true,
                        duration: 2000
                    }
                }
            });
        });
    </script>
    <script>
        $(function () { //tab table 5
            var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var ctx1 = document.getElementById('myChart4').getContext('2d');
            var myChart4 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        fill: false,
                        backgroundColor: 'rgb(54, 162, 235)',
                        borderColor: 'rgb(54, 162, 235)',
                        data: [30, 20, 55, 62, 55, 34],
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
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 300,
                                stepSize: 100
                            },
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Money'
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        $(function () { //tab table 5
            var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var ctx1 = document.getElementById('myChart5').getContext('2d');
            var myChart5 = new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        fill: false,
                        backgroundColor: ['#0000ff', '#00ff00'],
                        data: [30, 70]
                    }]
                },
                options: {
                    legend: {
                        display: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                }
            });
        });
    </script>
    <script>
        $(function () { //tab table 6
            var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var ctx1 = document.getElementById('myChart6').getContext('2d');
            var myChart6 = new Chart(ctx1, {
                type: 'horizontalBar',
                data: {
                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                    datasets: [{
                        label: 'My Second dataset',
                        fill: false,
                        backgroundColor: 'rgb(54, 162, 235)',
                        borderColor: 'rgb(54, 162, 235)',
                        data: [60, 55, 50, 51, 44, 42, 37, 30, 27, 20],
                    }]
                },
                options: {
                    legend: {
                        display: false,
                    },
                    responsive: true,
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 100,
                                stepSize: 25
                            },
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endsection
