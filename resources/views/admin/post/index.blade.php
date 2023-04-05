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
                    <div>
                        <input type="search" class="form-control" placeholder="Search Invoice" aria-controls="DataTables_Table_0">
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
                                    <button class="btn btn-outline-danger waves-effect">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="m-3">{{ $posts->links('vendor.pagination') }}</div>
        </div>
    </div>
@endsection
