@extends('admin-theme.master')

@section('title')
    Manage Admin
@endsection

@section('content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="row d-flex justify-content-between align-items-center m-1">
                    <div class="col-lg-6 d-flex align-items-start">
                        <div class="dt-action-buttons text-xl-end text-lg-start text-lg-end text-start ">
                            <div class="dt-buttons">
                                <div class="btn-group dropup">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Add Employee
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="{{ route('admin.hrm.store') }}" method="post" class="px-2 py-2 width-350">
                                            @csrf
                                            <div class="mb-1">
                                                <label class="form-label" for="exampleDropdownFormEmail1">Email address</label>
                                                <input name="email" type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="Email" />
                                            </div>
                                            <div class="mb-0">
                                                <div class="mb-1">
                                                    <label class="form-label" for="blog-edit-category">Role</label>
                                                    <select name="role" id="blog-edit-category" class="select2 form-select">
                                                        @foreach ($roles as $key => $role)
                                                            <option value="{{ $key }}">{{ $role }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                             <div class="mb-0">
                                                <div class="mb-1">
                                                    <div class="form-check">
                                                        <input name="is_send_mail" type="checkbox" class="form-check-input" id="dropdownCheck" />
                                                        <label class="form-check-label" for="dropdownCheck">Send notify email</label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                </div>
                                <div class="btn-group dropup">
                                    @if (session()->get('error') !== null)
                                        {{ session()->get('error') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pe-lg-1 p-0">
                        <div style="padding-right: 25px; width: 50%">
                            <input value="{{ implode(' to ', explode(',', request()->get('created_at'))) }}" id="i-created_at" type="text" class="form-control flatpickr-range flatpickr-input active" placeholder="Filter create time range" readonly="readonly">
                        </div>
                        <div class="btn-group" style="padding-right: 25px">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                @php ($role = request()->get('role'))
                                {{ $role === null ? 'All' : $roles[$role] }}
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="?role=">All</a>
                                @foreach ($roles as $key => $role)
                                    <a class="dropdown-item" href="?role={{ $key }}">{{ $role }}</a>
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
                            <th>Role</th>
                            <th>Active</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>
                                    <div data-bs-original-title="{{ $admin->name }}" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xl pull-up my-0" title="">
                                        <img src="{{ $admin->avatar }}" alt="Avatar" height="26" width="26">
                                    </div>
                                    <span class="fw-bold">{{ $admin->name }}</span>
                                </td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ \App\Enums\AdminRole::getDescription($admin->role) }}</td>
                                <td>{!! $admin->prettyActive !!}</td>
                                <td>{{ $admin->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <form action="{{ route('admin.hrm.cancel', ['admin' => $admin]) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                @if ($admin->active)
                                                    <button class="btn-del dropdown-item" style="width: 100%">
                                                        <span>Lock</span>
                                                    </button>
                                                @else
                                                    <button class="btn-del dropdown-item" style="width: 100%">
                                                        <span>Unlock</span>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="m-3">{{ $admins->withQueryString()->links('vendor.pagination') }}</div>
            </div>
        </div>
    </div>
@endsection

@section('vendor_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('page_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
@endsection

@section('page_vendor_script')
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page_script')
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/components/components-dropdowns.js') }}"></script>
    <script src="{{ asset('assets/js/handle_search.js') }}"></script>
@endsection
