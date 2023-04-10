<!DOCTYPE html>
<html class="loading @if (session()->get('dark_mode')) dark-layout @endif" lang="en" data-textdirection="ltr">
@include('admin-theme.meta_tag')
<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">
@include('admin-theme.header') @include('admin-theme.menu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">@yield('title')</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">@yield('breadcrumb')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">@yield('content')</div>
    </div>
</div>
@include('admin-theme.footer') @include('admin-theme.script')
</body>
</html>
