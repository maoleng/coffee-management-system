@extends('admin-theme.master')

@section('title')
    Statistic Revenue
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $total_revenue }}</h3>
                        <span>Total revenue</span>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                    <span class="avatar-content">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 96H192L144.6 24.9C137.5 14.2 145.1 0 157.9 0H354.1c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128H320c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96H96c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4l0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V424c0 11 9 20 20 20s20-9 20-20V410.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l0 0-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V216z"/></svg>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $total_profit }}</h3>
                        <span id="span-total_profit">Total profit</span>
                    </div>
                    <div class="avatar bg-light-danger p-50">
                    <span class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-17.7 0-32 14.3-32 32l-32 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h32v49.1c-18.8-10.9-40.7-17.1-64-17.1c-70.7 0-128 57.3-128 128s57.3 128 128 128c24.5 0 47.4-6.9 66.8-18.8c5 11.1 16.2 18.8 29.2 18.8c17.7 0 32-14.3 32-32V288 128c17.7 0 32-14.3 32-32s-14.3-32-32-32c0-17.7-14.3-32-32-32zM128 288a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM32 448c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c17.7 0 32-14.3 32-32s-14.3-32-32-32H32z"/></svg>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $month_revenue }}</h3>
                        <span id="span-month_revenue">Current month's revenue</span>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                    <span class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 96H192L144.6 24.9C137.5 14.2 145.1 0 157.9 0H354.1c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128H320c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96H96c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4l0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V424c0 11 9 20 20 20s20-9 20-20V410.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l0 0-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V216z"/></svg>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $month_profit }}</h3>
                        <span id="span-month_profit">Current month's profit</span>
                    </div>
                    <div class="avatar bg-light-danger p-50">
                    <span class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-17.7 0-32 14.3-32 32l-32 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h32v49.1c-18.8-10.9-40.7-17.1-64-17.1c-70.7 0-128 57.3-128 128s57.3 128 128 128c24.5 0 47.4-6.9 66.8-18.8c5 11.1 16.2 18.8 29.2 18.8c17.7 0 32-14.3 32-32V288 128c17.7 0 32-14.3 32-32s-14.3-32-32-32c0-17.7-14.3-32-32-32zM128 288a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM32 448c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c17.7 0 32-14.3 32-32s-14.3-32-32-32H32z"/></svg>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-baseline flex-sm-row flex-column">
                    <h4 class="card-title">Revenue and profit analysis</h4>
                    <div class="card-header d-flex justify-content-between align-items-baseline flex-sm-row flex-column">
                        <h4 class="card-title"></h4>
                        <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                            <i data-feather="calendar"></i>
                            <input type="text" class="form-control flat-picker border-0 shadow-none bg-transparent pe-0" placeholder="YYYY-MM-DD" />
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas class="line-area-chart-ex chartjs" data-height="450"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
@endsection

@section('page_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
@endsection

@section('page_vendor_script')
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
@endsection

@section('page_script')
    <script>
        $(document).ready(function () {
            const lineAreaChartEx = $('.line-area-chart-ex')
            const chartWrapper = $('.chartjs');
            const datePicker = $('.flat-picker');

            let blueColor = '#2c9aff',
                blueLightColor = '#84D0FF',
                tooltipShadow = 'rgba(0, 0, 0, 0.25)',
                labelColor = '#6e6b7b',
                grid_line_color = 'rgba(200, 200, 200, 0.2)';

            if ($('html').hasClass('dark-layout')) {
                labelColor = '#b4b7bd';
            }

            if (chartWrapper.length) {
                chartWrapper.each(function () {
                    $(this).wrap($('<div style="height:' + this.getAttribute('data-height') + 'px"></div>'));
                });
            }

            datePicker.on('change', function () {
                const range = datePicker.val().split(' to ')
                if (range.length === 2) {
                    $.ajax({
                        url: '{{ route('admin.statistic.get_chart_revenue') }}',
                        data: {
                            'range': range,
                        }
                    }).done(function (data) {
                        const chart = new Chart(lineAreaChartEx, {
                            type: 'line',
                            plugins: [
                                // to add spacing between legends and chart
                                {
                                    beforeInit: function (chart) {
                                        chart.legend.afterFit = function () {
                                            this.height += 20;
                                        };
                                    }
                                }
                            ],
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                legend: {
                                    position: 'top',
                                    align: 'start',
                                    labels: {
                                        usePointStyle: true,
                                        padding: 25,
                                        boxWidth: 9
                                    }
                                },
                                layout: {
                                    padding: {
                                        top: -20,
                                        bottom: -20,
                                        left: -20
                                    }
                                },
                                tooltips: {
                                    // Updated default tooltip UI
                                    shadowOffsetX: 1,
                                    shadowOffsetY: 1,
                                    shadowBlur: 8,
                                    shadowColor: tooltipShadow,
                                    backgroundColor: window.colors.solid.white,
                                    titleFontColor: window.colors.solid.black,
                                    bodyFontColor: window.colors.solid.black
                                },
                                scales: {
                                    xAxes: [
                                        {
                                            display: true,
                                            gridLines: {
                                                color: 'transparent',
                                                zeroLineColor: grid_line_color
                                            },
                                            scaleLabel: {
                                                display: true
                                            },
                                            ticks: {
                                                fontColor: labelColor
                                            }
                                        }
                                    ],
                                    yAxes: [
                                        {
                                            display: true,
                                            gridLines: {
                                                color: 'transparent',
                                                zeroLineColor: grid_line_color
                                            },
                                            ticks: {
                                                stepSize: 0,
                                                min: 0,
                                                max: 0,
                                                fontColor: labelColor
                                            },
                                            scaleLabel: {
                                                display: true
                                            }
                                        }
                                    ]
                                }
                            },
                            data: {
                                labels: [],
                                datasets: [
                                    {
                                        label: 'Revenue',
                                        data: [],
                                        lineTension: 0,
                                        backgroundColor: blueColor,
                                        pointStyle: 'circle',
                                        borderColor: 'transparent',
                                        pointRadius: 0.5,
                                        pointHoverRadius: 5,
                                        pointHoverBorderWidth: 5,
                                        pointBorderColor: 'transparent',
                                        pointHoverBackgroundColor: blueColor,
                                        pointHoverBorderColor: window.colors.solid.white
                                    },
                                    {
                                        label: 'Profit',
                                        data: [],
                                        lineTension: 0,
                                        backgroundColor: blueLightColor,
                                        pointStyle: 'circle',
                                        borderColor: 'transparent',
                                        pointRadius: 0.5,
                                        pointHoverRadius: 5,
                                        pointHoverBorderWidth: 5,
                                        pointBorderColor: 'transparent',
                                        pointHoverBackgroundColor: blueLightColor,
                                        pointHoverBorderColor: window.colors.solid.white
                                    },
                                ]
                            }
                        })
                        const revenue = data.revenue
                        chart.data.labels = data.labels
                        chart.data.datasets[0].data = revenue
                        chart.data.datasets[1].data = data.profit
                        chart.options.scales.yAxes[0].ticks.stepSize = data.step
                        chart.options.scales.yAxes[0].ticks.max = data.max
                        chart.update()


                    })
                }
            })

            load()
            function load()
            {
                if (datePicker.length) {
                    datePicker.each(function () {
                        $(this).flatpickr({
                            mode: 'range',
                        });
                    });
                }
            }
        })
    </script>



@endsection

