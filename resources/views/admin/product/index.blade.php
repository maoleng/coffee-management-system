@extends('admin-theme.master')

@section('title')
    Manage Product
@endsection

@section('content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="row d-flex justify-content-between align-items-center m-1">
                    <div class="col-lg-6 d-flex align-items-start">
                        <div class="dt-action-buttons text-xl-end text-lg-start text-lg-end text-start ">
                            <div class="dt-buttons">
                                <a href="{{ route('admin.warehouse.create') }}" class="dt-button btn btn-primary btn-add-record ms-2" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                                    <span>Add Product</span>
                                </a>
                            </div>
                        </div>
                        <div class="dt-action-buttons text-xl-end text-lg-start text-lg-end text-start ">
                            <div class="dt-buttons">
                                <a href="{{ route('admin.warehouse.import') }}" class="dt-button btn btn-success btn-add-record ms-2" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                                    <span>Import Products</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pe-lg-1 p-0">
                        <div style="padding-right: 25px; width: 50%">
                            <input value="{{ implode(' to ', explode(',', request()->get('created_at'))) }}" id="i-created_at" type="text" class="form-control flatpickr-range flatpickr-input active" placeholder="Filter create time range" readonly="readonly">
                        </div>
                        <div class="btn-group" style="padding-right: 25px">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                @php ($category = request()->get('category'))
                                {{ $category === null ? 'All' : $categories->where('name', $category)->first()->name }}
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="?category=">All</a>
                                @foreach ($categories as $category)
                                    <a class="dropdown-item" href="?category={{ $category->name }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <input type="search" id="i-search" name="q" value="{{ request()->get('q') }}" class="form-control" placeholder="Search">
                        </div>
                        <div class="invoice_status ms-sm-2"></div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Left</th>
                            <th>Expired In</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div data-bs-original-title="{{ $product->name }}" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xl pull-up my-0" title="">
                                        <img src="{{ asset($product->images[0]->path ?? null) }}" alt="Avatar" height="26" width="26">
                                    </div>
                                    <span class="fw-bold">{{ $product->name }}</span>
                                </td>
                                <td>{{ $product->prettyPrice }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td><span class="badge rounded-pill badge-light-primary me-1">{{ $product->left['amount'] }}</span></td>
                                <td><span class="badge rounded-pill badge-light-success me-1">{{ $product->left['date'] }}</span></td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('admin.warehouse.edit', ['product' => $product]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 me-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                <span>Edit</span>
                                            </a>
                                            <form action="{{ route('admin.warehouse.destroy', ['product' => $product]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" data-message="You are deleting product {{ $product->name }}!" class="btn-del dropdown-item" style="width: 100%">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                    <span>Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="m-3">{{ $products->withQueryString()->links('vendor.pagination') }}</div>
            </div>
        </div>
    </div>
@endsection

@section('vendor_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('page_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
@endsection

@section('page_vendor_script')
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection

@section('page_script')
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <script src="{{ asset('assets/js/handle_search.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    <script>
        alertDangerEvent('.btn-del')
        {!! successAlert() !!}


    </script>
@endsection
