@extends('admin.layouts.app', ['title' => __('Shipments')])
@section('css')

    @include('admin.layouts.partials.datatables.dataTablesStyles')

@endsection
@section('content')
    @include('admin.layouts.partials.header', [
    'title' => __('Shipments'),
    'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-0 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card">
                        <div class="container table-responsive py-4">
                            <table class="table table-flush shipments-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>{{ __('Tracking#') }}</th>
                                        <th>{{ __('Customer Name') }}</th>
                                        <th>{{ __('Customer Email') }}</th>
                                        <th>{{ __('Shipment Date/Time') }}</th>
                                        <th>{{ __('Total Charges') }}</th>
                                        <th>{{ __('Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
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
            $(function() {
                var table = $('.shipments-table').DataTable({
                    processing: true,
                    ordering: false,
                    serverSide: true,
                    ajax: "{{ route('admin:get.shipments') }}",
                    columns: [{
                            data: 'tracking_no',
                            render: function(data, type) {
                                return '<a href="{{ url('/admin/shipment/detail') }}/' + data +
                                    '"><div class="btn badge badge-success badge-pill">' + data +
                                    '</div></a>';
                            }
                        },
                        {
                            data: 'customer',
                            name: 'customer'
                        },
                        {
                            data: 'customer_email',
                            name: 'customer_email'
                        },
                        {
                            data: 'shipment_date_time',
                            name: 'shipment_date_time'
                        },
                        {
                            data: 'total_amount',
                            name: 'total_amount'
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    "language": {
                        "paginate": {
                            "previous": "<",
                            "next": ">"
                        }
                    }
                });
                $(document).on('change', '.shipment_status', function() {
                    var optionSelected = $(this).find("option:selected");
                    var valueSelected = optionSelected.val();
                    var id = $(this).attr('rel');
                    if (valueSelected) {
                        if (valueSelected === "Cancelled") {
                            Swal.fire({
                                title: 'Submit reason for cancellation!',
                                input: 'text',
                                inputAttributes: {
                                    autocapitalize: 'off',
                                    required: true
                                },
                                showCancelButton: true,
                                confirmButtonText: 'Submit',
                                showLoaderOnConfirm: true,
                                preConfirm: (reason) => {

                                    change_status(id, valueSelected, reason)

                                },
                                allowOutsideClick: () => !Swal.isLoading()
                            })
                        } else {

                            change_status(id, valueSelected, '');

                        }
                    }
                });

                function change_status(id, status, reason = '') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: "{{ route('admin:shipment.status') }}",
                        data: {
                            id: id,
                            status: status,
                            cancel_reason: reason
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Woha...',
                                    text: data.message
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.message
                                })
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
        </script>
    @endpush

@endsection
