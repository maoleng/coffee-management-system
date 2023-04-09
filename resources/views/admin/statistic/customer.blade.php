@extends('admin-theme.master')

@section('title')
    Statistic Customer
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
                        <span>Total customers</span>
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
                        <span>Current month's customers</span>
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
        <div class="card-header d-flex justify-content-between align-items-baseline flex-sm-row flex-column">
            <h4 class="card-title">Statistic potential customers</h4>
            <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                <i data-feather="calendar"></i>
                <input type="text" class="form-control flat-picker border-0 shadow-none bg-transparent pe-0" placeholder="YYYY-MM-DD" />
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-baseline flex-sm-row flex-column">
                    <h4 class="card-title"></h4>
                    <div class="btn-group mt-md-0 mt-1" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="radio_options" id="radio_option1" autocomplete="off" checked />
                        <label class="btn btn-outline-primary" for="radio_option1">Revenue</label>

                        <input type="radio" class="btn-check" name="radio_options" id="radio_option2" autocomplete="off" />
                        <label class="btn btn-outline-primary" for="radio_option2">Profit</label>

                        <input type="radio" class="btn-check" name="radio_options" id="radio_option3" autocomplete="off" />
                        <label class="btn btn-outline-primary" for="radio_option3">Orders</label>
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
    <script src="{{ asset('app-assets/js/scripts/charts/chart-chartjs.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/charts/chart-apex.js') }}"></script>

    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>




@endsection

