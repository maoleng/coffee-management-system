@extends('admin-theme.master')

@section('title')
    Manage Post
@endsection

@section('content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="row d-flex justify-content-between align-items-center m-1">
                <div class="col-lg-6 d-flex align-items-start">
                    <div class="dt-action-buttons text-xl-end text-lg-start text-lg-end text-start">
                        <div class="dt-buttons">
                            <a href="{{ route('admin.post.create') }}" class="dt-button btn btn-primary btn-add-record ms-2 waves-effect waves-float waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                                <span>Add new Post</span>
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
                            {{ $category === null ? 'All' : $categories[$category] }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="?category=">All</a>
                            @foreach ($categories as $key => $category)
                                <a class="dropdown-item" href="?category={{ $key }}">{{ $category }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <input type="search" id="i-search" name="q" value="{{ request()->get('q') }}" class="form-control" placeholder="Search">
                    </div>
                    <div class="invoice_status ms-sm-2"></div>
                </div>
            </div>
            <div class="row match-height">
                @foreach ($posts as $post)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $post->limiTtitle }}</h4>
                                <h6 class="card-subtitle text-muted">{{ $post->prettyCategory }}</h6>
                                <img class="img-fluid my-2" src="{{ $post->banner }}" alt="Card image cap" />
                                <p class="card-text">{{ $post->rawContent }}</p>
                                <small class="text-muted">Created at: {{ $post->created_at }}</small>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admin.post.edit', ['post' => $post]) }}" class="float-start btn btn-outline-primary">Edit</a>
                                <form class="float-end" action="{{ route('admin.post.destroy', ['post' => $post]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button data-message="You are deleting post!" type="button" class="btn-del btn btn-outline-danger waves-effect">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="m-3">{{ $posts->withQueryString()->links('vendor.pagination') }}</div>
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
