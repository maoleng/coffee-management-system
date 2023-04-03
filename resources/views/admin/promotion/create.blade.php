@extends('admin-theme.master')

@section('title')
    Manage Promotion
@endsection

@section('breadcrumb')
    Create new promotion
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="author-info">
                            <h6 class="mb-25"></h6>
                        </div>
                    </div>
                    <form action="{{ route('admin.promotion.store') }}" method="post" enctype="multipart/form-data" class="mt-2">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <label class="form-label" for="blog-edit-title">Name</label>
                                    <input name="name" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <label class="form-label" for="blog-edit-category">Percent</label>
                                    <div class="input-group">
                                        <input name="percent" type="number" class="touchspin" value="50" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <label class="form-label" for="blog-edit-title">Code</label>
                                    <input name="code" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label" for="blog-edit-slug">Description</label>
                                    <textarea name="description" class="form-control" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-check form-switch">
                                    <input name="active" type="checkbox" class="form-check-input" id="customSwitch1" />
                                    <label class="form-check-label" for="customSwitch1">Active</label>
                                </div>
                            </div>
                            <div class="col-12 mt-50">
                                <button type="submit" class="btn btn-primary me-1">Save</button>
                                <a href="{{ route('admin.promotion.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('page_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
@endsection

@section('page_vendor_script')
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page_script')
    <script src="{{ asset('app-assets/js/scripts/forms/form-number-input.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>


@endsection
