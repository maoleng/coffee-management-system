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
                        <h3 class="fw-bolder mb-75">21,459</h3>
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
                        <h3 class="fw-bolder mb-75">21,459</h3>
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
                <div class="card-header">
                    <h4 class="card-title">By category</h4>
                </div>
                <div class="card-body">
                    <canvas class="polar-area-chart-ex chartjs" data-height="350"></canvas>
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

    <div class="row">
        <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
            <div class="header-left">
                <h4 class="card-title">Statistic product revenue</h4>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="customSwitch1">
                    <label class="form-check-label" for="customSwitch1">Display percentage|money</label>
                </div>
            </div>

            <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                <input type="text" class="form-control flat-picker border-0 shadow-none bg-transparent pe-0 flatpickr-input" placeholder="YYYY-MM-DD" readonly="readonly">
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start">
                    <h4 class="card-title mb-75">By category</h4>
                </div>
                <div class="card-body">
                    <div id="donut-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Top products</h4>
                </div>
                <div class="card-body">
                    <canvas class="doughnut-chart-ex chartjs" data-height="275"></canvas>
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
    <script src="{{ asset('app-assets/js/scripts/charts/chart-chartjs.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/charts/chart-apex.js') }}"></script>

    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>




@endsection

