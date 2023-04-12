@extends('admin-theme.master')

@section('title')
    Manage Product
@endsection

@section('breadcrumb')
    Import products
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product</h4>
            </div>
            <div class="card-body">
                @if (session()->get('error') !== null)
                    {{ session()->get('error') }}
                @endif
                <form action="{{ route('admin.warehouse.process_import') }}" method="post" class="invoice-repeater">
                    @csrf
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="blog-edit-category">Supplier</label>
                            <select name="supplier_id" class="select2 form-select">
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div data-repeater-list="products">
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">

                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Product</label>
                                        <select name="product_id" class="select2 form-select">
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemcost">Price</label>
                                        <input name="price" type="number" class="form-control" id="itemcost" aria-describedby="itemcost" placeholder="32" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="itemamount">Amount</label>
                                        <input name="amount" type="number" class="form-control" id="itemamount" aria-describedby="itemamount" placeholder="1" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12 mb-50">
                                    <div class="mb-1">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                            <i data-feather="x" class="me-25"></i>
                                            <span>Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>Add New</span>
                            </button>


                        </div>
                        <div class="col-12 mt-5">
                            <button class="btn btn-icon btn-success p-1">
                                <span>Import</span>
                            </button>
                            <a href="{{ route('admin.warehouse.index') }}" class="btn btn-icon btn-secondary p-1">Cancel</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('vendor_style')
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">--}}
@endsection

@section('page_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">

@endsection

@section('page_vendor_script')
{{--    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>--}}

    <script src="{{ asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
@endsection

@section('page_script')
    <script src="{{ asset('app-assets/js/scripts/forms/form-repeater.js') }}"></script>
{{--    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>--}}
@endsection
