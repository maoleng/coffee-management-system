@extends('admin-theme.master')

@section('title')
    Manage Customer
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
                            <th>Joined at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div data-bs-original-title="{{ $user->name }}" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xl pull-up my-0" title="">
                                        <img src="{{ $user->avatar }}" alt="Avatar" height="26" width="26">
                                    </div>
                                    <span class="fw-bold">{{ $user->name }}</span>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a data-user_id="{{ $user->id }}" class="btn-show dropdown-item" data-bs-toggle="modal" data-bs-target="#referEarnModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-medium-5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                <span>Show</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="m-3">{{ $users->withQueryString()->links('vendor.pagination') }}</div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="referEarnModal" tabindex="-1" aria-labelledby="referEarnTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-refer-earn">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-0">
                    <div class="px-sm-4 mx-50">
                        <h1 class="text-center mb-1" id="referEarnTitle">Detail customer</h1>
                        <p id="p-name" class="text-center mb-5"></p>
                        <div class="row mb-4">
                            <div class="col-12 col-lg-6">
                                <div class="d-flex justify-content-center mb-1">
                                    <div class="modal-refer-earn-step d-flex width-100 height-100 rounded-circle justify-content-center align-items-center bg-light-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck font-medium-5"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h6 class="fw-bolder mb-1">Success orders 👩🏻‍💻</h6>
                                    <p id="p-successful"></p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="d-flex justify-content-center mb-1">
                                    <div class="modal-refer-earn-step d-flex width-100 height-100 rounded-circle justify-content-center align-items-center bg-light-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon font-medium-5"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h6 class="fw-bolder mb-1">Cancelled orders 🎉</h6>
                                    <p id="p-cancelled"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_script')
    <script src="{{ asset('app-assets/js/scripts/components/components-dropdowns.js') }}"></script>
    <script src="{{ asset('assets/js/handle_search.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.btn-show').on('click', function() {
                const user_id = $(this).data('user_id')
                $.ajax({
                    url: '{{ route('admin.customer.show') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_id: user_id,
                    }
                }).done(function (data) {
                    $('#p-cancelled').text(data.cancelled)
                    $('#p-successful').text(data.successful)
                    $('#p-name').text(data.name)

                })
            })
        })

    </script>
@endsection
