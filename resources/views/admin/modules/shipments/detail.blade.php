@extends('admin.layouts.app', ['title' => __('Shipment')])
@section('content')
    @include('admin.layouts.partials.header', [
    'title' => __('Shipment Details'),
    'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-0 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="heading-small text-muted mb-4">{{ __('Customer Information') }}</h6>
                            <div class="pl-lg-4">
                                <h4>{{ $shipment->customer->name ?? '' }}</h4>
                                <h4>{{ $shipment->customer->email ?? '' }}</h4>
                                <h4>{{ $shipment->customer->phone ?? '' }}</h4>
                                <h4>{{ $shipment->customer->address ?? '' }}</h4>

                            </div>
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">{{ __('Vehicle Information') }}</h6>
                            <div class="pl-lg-4">
                                <h4><strong class="text-muted"> {{ __('Name') }}</strong><span
                                        style="float: right">{{ $shipment->vehicle->name ?? '' }}</span></h4>
                                <h4><strong class="text-muted"> {{ __('Registration#') }}</strong><span
                                        style="float: right">{{ $shipment->vehicle->reg_no ?? '' }}</span></h4>

                            </div>
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">{{ __('Ship From') }}</h6>
                            <div class="pl-lg-4">
                                <h4><strong class="text-muted"> {{ __('Name') }}</strong><span
                                        style="float: right">{{ $shipment->pickup_location->first_name . ' ' . $shipment->pickup_location->last_name ?? '' }}</span>
                                </h4>
                                <h4><strong class="text-muted"> {{ __('Company Name') }}</strong><span
                                        style="float: right">{{ $shipment->pickup_location->company_name ?? '' }}</span>
                                </h4>
                                <h4> <strong class="text-muted"> {{ __('Address') }}</strong> <span
                                        style="float: right">{{ $shipment->pickup_location->street_address ?? 0.0 }}<span>
                                </h4>
                                <h4> <strong class="text-muted"> {{ __('City') }}</strong> <span
                                        style="float: right">{{ $shipment->pickup_location->city ?? 0.0 }}<span></h4>
                                <h4> <strong class="text-muted"> {{ __('Zip Code') }}</strong> <span
                                        style="float: right">{{ $shipment->pickup_location->zip_code ?? 0.0 }}<span></h4>

                            </div>
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">{{ __('Ship To') }}</h6>
                            <div class="pl-lg-4">
                                <h4><strong class="text-muted"> {{ __('Name') }}</strong><span
                                        style="float: right">{{ $shipment->drop_location->first_name . ' ' . $shipment->pickup_location->last_name ?? '' }}</span>
                                </h4>
                                <h4><strong class="text-muted"> {{ __('Company Name') }}</strong><span
                                        style="float: right">{{ $shipment->drop_location->company_name ?? '' }}</span>
                                </h4>
                                <h4> <strong class="text-muted"> {{ __('Address') }}</strong> <span
                                        style="float: right">{{ $shipment->drop_location->street_address ?? '' }}<span>
                                </h4>
                                <h4> <strong class="text-muted"> {{ __('City') }}</strong> <span
                                        style="float: right">{{ $shipment->drop_location->city ?? '' }}<span></h4>
                                <h4> <strong class="text-muted"> {{ __('Zip Code') }}</strong> <span
                                        style="float: right">{{ $shipment->drop_location->zip_code ?? '' }}<span></h4>

                            </div>
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">{{ __('Shipment Information') }}</h6>
                            <div class="pl-lg-4">
                                <h4 class="mb-3"><strong class="text-muted"> Status</strong><span
                                        style="float: right">
                                        <div class="btn badge badge-info badge-pill">{{ $shipment->status ?? '' }}</div>
                                        <span></h4>
                                            @if ($shipment->status == 'Cancelled')
                                            <h4> <strong class="text-muted"> Cancelled By</strong> <span
                                                style="float: right">{{ $shipment->cancelled_by ?? '' }}<span></h4>
                                            <h4> <strong class="text-muted"> Cancelled Reason</strong> <span
                                                style="float: right">{{ $shipment->cancelled_reason ?? '' }}<span></h4>
                                            @endif

                                <h4> <strong class="text-muted"> Shipment Date/Time</strong> <span
                                        style="float: right">{{ $shipment->shipment_date_time ?? '' }}<span></h4>
                                <h4><strong class="text-muted"> Shipment Delivered Date/Time</strong><span
                                        style="float: right">{{ $shipment->delivered_date_time ?? '--' }}<span></h4>
                                <h4><strong class="text-muted"> Distance (Miles)</strong><span
                                        style="float: right">{{ $shipment->distance ?? '--' }}<span></h4>

                            </div>
                            @isset($shipment->shipment_items)
                                <hr class="my-4" />
                                <h6 class="heading-small text-muted mb-4">{{ __('Shipment Items') }}</h6>
                                <div class="pl-lg-4">
                                    @php
                                        $items = 0;
                                    @endphp
                                    @foreach ($shipment->shipment_items as $item)
                                        @php
                                            $items++;
                                        @endphp
                                        <h5 class="heading-small text-muted">{{ __('Item# ' . $items) }}</h5>
                                        <h4>
                                            {{ __('Height') }}<span style="float: right">{{ $item->height ?? '-' }}</span>
                                        </h4>
                                        <h4>
                                            {{ __('Width') }}<span style="float: right">{{ $item->width ?? '-' }}</span>
                                        </h4>
                                        <h4>
                                            {{ __('Length') }}<span style="float: right">{{ $item->legth ?? '-' }}</span>
                                        </h4>
                                        <h4>
                                            {{ __('Weight') }}<span style="float: right">{{ $item->weight ?? '-' }}</span>
                                        </h4>
                                        <hr class="my-4" />
                                    @endforeach
                                </div>
                            @endisset
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">{{ __('Total Charges') }}</h6>
                            <div class="pl-lg-4">
                                <h4><strong class="text-muted"> Delivery Charges</strong><span
                                        style="float: right">{{ $shipment->shipment_charges->delivery_charges ?? 0.0 }}<span>
                                </h4>
                                <h4><strong class="text-muted"> Vehicle Charges</strong><span
                                        style="float: right">{{ $shipment->shipment_charges->vehicle_fixed_charges ?? 0.0 }}<span>
                                </h4>
                                <h4><strong class="text-muted"> Vehicle Overtime Charges</strong><span
                                        style="float: right">{{ $shipment->shipment_charges->vehicle_overtime_charges ?? 0.0 }}<span>
                                </h4>
                                <h4><strong class="text-muted"> Vehicle Over Range Charges</strong><span
                                        style="float: right">{{ $shipment->shipment_charges->vehicle_overrange_charges ?? 0.0 }}<span>
                                </h4>
                                <h4><strong class="text-muted"> Total Charges</strong><span
                                        style="float: right">${{ $shipment->total_amount ?? '' }}<span></h4>
                            </div>
                            <hr class="my-4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.layouts.footers.auth')
    </div>


@endsection
