@extends('admin-theme.master')

@section('title')
    Manage Supplier
@endsection

@section('breadcrumb')
    Create new supplier
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
                    <form action="{{ route('admin.supplier.store') }}" method="post" class="mt-2">
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
                                    <label class="form-label" for="blog-edit-title">Address</label>
                                    <input name="address" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <label class="form-label" for="blog-edit-title">Phone</label>
                                    <input name="phone" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-12 mt-50">
                                <button type="submit" class="btn btn-primary me-1">Save</button>
                                <a href="{{ route('admin.supplier.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection