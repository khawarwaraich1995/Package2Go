@extends('admin.layouts.app', ['title' => __('Roles')])

@section('css')

    @include('admin.layouts.partials.datatables.dataTablesStyles')

@endsection

@section('content')
    @include('admin.layouts.partials.header', [
    'title' => __('Roles & Permissions'),
    'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-0 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card">
                        <div class="card-header text-right">
                            <a href="{{ route('admin:role.create') }}">
                                <button class="btn btn-sm btn-icon btn-success" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-circle-08"></i></span>
                                    <span class="btn-inner--text"> {{ __('Add New Role') }}</span>
                                </button>
                            </a>
                        </div>
                        <div class="container table-responsive py-4">
                            <table class="table table-flush" id="datatable-buttons">
                                <thead class="thead-light">
                                    <tr>
                                        <th>{{ __('Sr.no') }}</th>
                                        <th>{{ __('Role Title') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Manage Permissions') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @if (isset($roles) && !empty($roles))
                                        @foreach ($roles as $key => $value)
                                            @php
                                                $i = $i + 1;
                                                $edit_url = url('/admin/roles/edit/' . $value->id);
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="btn badge badge-success badge-pill">#{{ $i }}
                                                    </div>
                                                </td>
                                                <td>{{ $value->name }}</td>
                                                <td>
                                                    <span class="badge badge-dot mr-4 current_status">
                                                        @if ($value->status == 1)
                                                            <i class="bg-success"></i>
                                                            <span
                                                                class="status badge badge-success badge-pill">Active</span>
                                                        @else
                                                            <i class="bg-danger"></i>
                                                            <span
                                                                class="status badge badge-danger badge-pill">Inactive</span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-icon btn-warning"
                                                        href="{{ route('admin:role.permission-modules', [$value->id ?? '']) }}">
                                                        <span class="btn-inner--icon"><i
                                                                class="ni ni-lock-circle-open"></i></span>
                                                        <span class="btn-inner--text">Permissions</span>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="true">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"
                                                            x-placement="bottom-end"
                                                            style="position: absolute;will-change: transform;top: 0px;left: 0px;transform: translate3d(-160px, 32px, 0px);">
                                                            <a class="dropdown-item" href="{{ $edit_url }}">Edit</a>
                                                            @if ($value->status == 1)
                                                                <a class="dropdown-item status-change"
                                                                    href="javascript:void(0);" rel="{{ $value->status }}"
                                                                    data-id="{{ $value->id }}">Deactivate</a>
                                                            @else
                                                                <a class="dropdown-item status-change"
                                                                    href="javascript:void(0);" rel="{{ $value->status }}"
                                                                    data-id="{{ $value->id }}">Activate</a>
                                                            @endif
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin:role.destroy', [$value->id ?? '']) }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.layouts.footers.auth')
    </div>
    @push('js')
        @include('admin.layouts.partials.datatables.dataTablesJs')

        <script type="text/javascript">
            $('.status-change').on('click', function() {
                var status = $(this).attr('rel');
                var id = $(this).attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin:role.status") }}',
                    data: {
                        'status': status,
                        'id': id,
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        var status = response.status;
                        var message = response.message;
                        var current_status = response.current_status;
                        if (status == true) {
                            location.reload();
                        }
                    }
                });
            });
        </script>
    @endpush

@endsection
