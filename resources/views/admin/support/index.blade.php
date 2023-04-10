@extends('admin-theme.master')

@section('title')
    Customer Care
@endsection

@section('content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="row d-flex justify-content-between align-items-center m-1">
                    <div class="col-lg-6 d-flex align-items-start">
                        <div class="dt-action-buttons text-xl-end text-lg-start text-lg-end text-start ">
                            <div class="dt-buttons">
                                <div class="btn-group dropup"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pe-lg-1 p-0">
                        <div class="btn-group" style="padding-right: 25px">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                @php ($status = request()->get('status'))
                                {{ $status === null ? 'All' : $support_status[$status] }}
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="?status=">All</a>
                                @foreach ($support_status as $key => $each)
                                    <a class="dropdown-item" href="?status={{ $key }}">{{ $each }}</a>
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
                            <th>Email</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Requested At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($supports as $support)
                            <tr>
                                <td>{{ $support->name }}</td>
                                <td>{{ $support->email }}</td>
                                <td>{{ $support->limitContent }}</td>
                                <td>{!! $support->prettyStatus !!}</td>
                                <td>{{ $support->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="@if ($support->status !== \App\Enums\SupportStatus::UNPROCESSED) disabled @endif btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-{{ $support->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square font-medium-5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                                <span>Response</span>
                                            </a>
                                            <form action="{{ route('admin.customer-care.filter', ['support' => $support]) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn-del dropdown-item" style="width: 100%">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                    <span>Filter</span>
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
                <div class="m-3">{{ $supports->links('vendor.pagination') }}</div>
            </div>
        </div>
    </div>

    @foreach ($supports as $support)
        <div class="modal fade text-start" id="modal-{{ $support->id }}" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Response to {{ $support->name }}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.customer-care.response', ['support' => $support]) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <p>{{ $support->content }}</p>
                            <label>Message: </label>
                            <div class="mb-1">
                                <textarea name="response" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Hello {{ $support->name }}..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-dismiss="modal">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('page_script')
    <script src="{{ asset('assets/js/handle_search.js') }}"></script>
@endsection
