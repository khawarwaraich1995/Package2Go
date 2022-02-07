@extends('admin.layouts.app', ['title' => __('Courier Settings')])

@section('content')
    @include('admin.layouts.partials.header', [
    'title' => __('Courier Settings'),
    'class' => 'col-lg-12',
    ])
    <?php
    $submit_url = route('admin:update-courier-settings');
    ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Courier Settings Form') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="courier_form" method="post" action="{{ $submit_url }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <h4 class="heading-medium text-black font-weight-bold mb-4">
                                    {{ __('1 Day Delivery Charges') }}</h4>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Charges Type') }}</label>
                                            <select class="form-control form-control-alternative" name="charges_type">
                                                <option value="">{{ __('Select charges type') }}</option>
                                                <option value="distance_wise" <?php if ($settings->charges_type == 'distance_wise') { echo 'selected'; } ?>> {{ __('Distance Wise') }}</option>
                                                <option value="fixed" <?php if ($settings->charges_type == 'fixed') { echo 'selected'; } ?>> {{ __('Fixed') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Delivery in 1 Day') }}</label>
                                            <input class="form-control form-control-alternative" autocomplete="off"
                                                type="number" step="0.01" id="one_day_delivery_charges"
                                                name="one_day_delivery_charges" placeholder=""
                                                value="{{ old('one_day_delivery_charges', $settings->one_day_delivery_charges ?? '') }}">
                                            <small class="text-muted">
                                                <strong>{{ __('Charges should be in numeric/decimal form (eg. 10 or 14.32)') }}</strong>
                                            </small>
                                            @error('one_day_delivery_charges')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <h4 class="heading-medium text-black font-weight-bold mb-4">
                                    {{ __('2 Days Delivery Charges') }}</h4>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Charges Type') }}</label>
                                            <select class="form-control form-control-alternative" name="charges_type_2">
                                                <option value="">{{ __('Select charges type') }}</option>
                                                <option value="distance_wise" <?php if ($settings->charges_type_2 == 'distance_wise') { echo 'selected'; } ?>> {{ __('Distance Wise') }}</option>
                                                <option value="fixed" <?php if ($settings->charges_type_2 == 'fixed') { echo 'selected'; } ?>> {{ __('Fixed') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Delivery in 2 Days') }}</label>
                                            <input class="form-control form-control-alternative" autocomplete="off"
                                                type="number" step="0.01" id="two_days_delivery_charges"
                                                name="two_days_delivery_charges" placeholder=""
                                                value="{{ old('two_days_delivery_charges', $settings->two_days_delivery_charges ?? '') }}">
                                            <small class="text-muted">
                                                <strong>{{ __('Charges should be in numeric/decimal form (eg. 10 or 14.32)') }}</strong>
                                            </small>
                                            @error('two_days_delivery_charges')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <h4 class="heading-medium text-black font-weight-bold mb-4">
                                    {{ __('3 Days Delivery Charges') }}</h4>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Charges Type') }}</label>
                                            <select class="form-control form-control-alternative" name="charges_type_3">
                                                <option value="">{{ __('Select charges type') }}</option>
                                                <option value="distance_wise" <?php if ($settings->charges_type_3 == 'distance_wise') { echo 'selected'; } ?>> {{ __('Distance Wise') }}</option>
                                                <option value="fixed" <?php if ($settings->charges_type_3 == 'fixed') { echo 'selected'; } ?>> {{ __('Fixed') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Delivery in 3 or more than 3 Days') }}</label>
                                            <input class="form-control form-control-alternative" autocomplete="off"
                                                type="number" step="0.01" id="three_days_delivery_charges"
                                                name="three_days_delivery_charges" placeholder=""
                                                value="{{ old('three_days_delivery_charges', $settings->three_days_delivery_charges ?? '') }}">
                                            <small class="text-muted">
                                                <strong>{{ __('Charges should be in numeric/decimal form (eg. 10 or 14.32). This will be applied for days or more than 3 days e.g. 20 Days will be same charged as 3 days.') }}</strong>
                                            </small>
                                            @error('three_days_delivery_charges')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-lg-2 col-md-2">
                                    <a class="btn btn-icon btn-success" href="{{ route('admin:dashboard') }}" id="back">
                                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                        <span class="btn-inner--text">{{ __('Back') }}</span>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-2 offset-lg-8">
                                    <button class="btn btn-icon btn-success" type="submit" id="save">
                                        <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                        <span class="btn-inner--text">{{ __('Save') }}</span>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.layouts.footers.auth')
    </div>
@endsection


@push('js')
    <script src="{{ asset('argon') }}/js/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#save").on('click', function() {
                $("#courier_form").validate({
                    rules: {
                        onesignal_app_id: {
                            required: true,
                        },
                        onesignal_restApi_key: {
                            required: true
                        }
                    }
                });
            });

        });
    </script>
@endpush
