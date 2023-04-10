@extends('admin-theme.master')

@section('title')
    Statistic Product
@endsection

@section('content')
    <div class="row">
        <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
            <div class="header-left">
                <h4 class="card-title">Overview</h4>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $total_order }}</h3>
                        <span>Total orders</span>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                    <span class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user font-medium-4">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ $month_order }}</h3>
                        <span>Current month's orders</span>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                    <span class="avatar-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user font-medium-4">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
            <div class="header-left">
                <h4 class="card-title">Statistic product purchased</h4>
            </div>
            <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                <input type="text" class="form-control flat-picker border-0 shadow-none bg-transparent pe-0 flatpickr-input" placeholder="YYYY-MM-DD" readonly="readonly">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                    <div class="header-left">
                        <h4 class="card-title">By category</h4>
                    </div>
                </div>
                <div class="card-body">
                    <canvas class="horizontal-bar-chart-ex chartjs" data-height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                    <div class="header-left">
                        <h4 class="card-title">Top products</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div style="height:400px"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas class="bar-chart-ex chartjs chartjs-render-monitor" data-height="400" width="1146" height="500" style="display: block; height: 400px; width: 917px;"></canvas></div>
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
        $(document).ready(function() {
            let successColorShade = '#28dac6',
                tooltipShadow = 'rgba(0, 0, 0, 0.25)',
                labelColor = '#6e6b7b',
                grid_line_color = 'rgba(200, 200, 200, 0.2)'

            const horizontalBarChartEx = $('.horizontal-bar-chart-ex')
            const barChartEx = $('.bar-chart-ex')
            const datePicker = $('.flat-picker')
            const chartWrapper = $('.chartjs')

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
                        url: '{{ route('admin.statistic.get_chart_product') }}',
                        data: {
                            'range': range,
                        }
                    }).done(function (data) {
                        const by_category_chart = new Chart(horizontalBarChartEx, {
                            type: 'horizontalBar',
                            options: {
                                elements: {
                                    rectangle: {
                                        borderWidth: 2,
                                        borderSkipped: 'right'
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
                                responsive: true,
                                maintainAspectRatio: false,
                                responsiveAnimationDuration: 500,
                                legend: {
                                    display: false
                                },
                                layout: {
                                    padding: {
                                        bottom: -30,
                                        left: -25
                                    }
                                },
                                scales: {
                                    xAxes: [
                                        {
                                            display: true,
                                            gridLines: {
                                                zeroLineColor: grid_line_color,
                                                borderColor: 'transparent',
                                                color: grid_line_color
                                            },
                                            scaleLabel: {
                                                display: true
                                            },
                                            ticks: {
                                                min: 0,
                                                fontColor: labelColor
                                            }
                                        }
                                    ],
                                    yAxes: [
                                        {
                                            display: true,
                                            gridLines: {
                                                display: false
                                            },
                                            scaleLabel: {
                                                display: true
                                            },
                                            ticks: {
                                                fontColor: labelColor
                                            }
                                        }
                                    ]
                                }
                            },
                            data: {
                                labels: [],
                                datasets: [
                                    {
                                        data: [],
                                        barThickness: 15,
                                        backgroundColor: window.colors.solid.info,
                                        borderColor: 'transparent'
                                    }
                                ]
                            }
                        })
                        by_category_chart.data.labels = data.by_category.labels
                        by_category_chart.data.datasets[0].data = data.by_category.data
                        by_category_chart.update()

                        const top_product_chart = new Chart(barChartEx, {
                            type: 'bar',
                            options: {
                                elements: {
                                    rectangle: {
                                        borderWidth: 2,
                                        borderSkipped: 'bottom'
                                    }
                                },
                                responsive: true,
                                maintainAspectRatio: false,
                                responsiveAnimationDuration: 500,
                                legend: {
                                    display: false
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
                            },
                            data: {
                                labels: [],
                                datasets: [
                                    {
                                        data: [],
                                        barThickness: 15,
                                        backgroundColor: successColorShade,
                                        borderColor: 'transparent'
                                    }
                                ]
                            }
                        })
                        top_product_chart.data.labels = data.top_product.labels
                        top_product_chart.data.datasets[0].data = data.top_product.data
                        top_product_chart.update()
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

