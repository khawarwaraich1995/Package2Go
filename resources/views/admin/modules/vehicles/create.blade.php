@extends('admin.layouts.app', ['title' => __('Vehciles')])
@section('css')

    @include('admin.layouts.partials.dropify.css')

@endsection
@section('content')
    @include('admin.layouts.partials.header', [
    'title' => __('Register Vehicle'),
    'class' => 'col-lg-12',
    ])
    <?php
    if (isset($data->id) && $data->id != 0) {
        $submit_url = route('admin:vehicle.update', [$data->id ?? '']);
    } else {
        $submit_url = route('admin:vehicle.add');
    }
    ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Vehicle Form') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="vehicle_form" method="post" action="{{ $submit_url }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <h6 class="heading-small text-muted mb-4">{{ __('Vehicle Information') }}</h6>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label"><span class="required-icon">*
                                                </span>{{ __('Registration#') }}</label>
                                            <input class="form-control form-control-alternative" type="text"
                                                value="{{ old('reg_no', $data->reg_no ?? '') }}" placeholder="eg. KY-1812"
                                                id="reg_no" name="reg_no">
                                            @error('reg_no')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label"><span class="required-icon">*
                                                </span>{{ __('Name') }}</label>
                                            <input class="form-control form-control-alternative" autocomplete="off"
                                                type="text" value="{{ old('name', $data->name ?? '') }}"
                                                placeholder="Name of Vehicle (e.g Ciaz)" id="name" name="name">
                                            @error('name')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Image') }}</label>
                                            <input class="form-control form-control-alternative dropify" type="file"
                                                id="image" name="image" data-allowed-file-extensions="jpg jpeg png"
                                                data-max-file-size="2M">
                                            @error('image')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <hr>
                            <fieldset>
                                <h6 class="heading-small text-muted mb-3 mt-3">{{ __('Vehicle Charges') }}</h6>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Fixed Charges') }}</label>
                                            <input class="form-control form-control-alternative" type="number"
                                                value="{{ old('fixed_charges', $data->fixed_charges ?? '') }}" step="0.01"
                                                id="fixed_charges" name="fixed_charges">
                                                <small class="text-muted">
                                                    <strong>{{__('These charges will be applied with every order with this vehicle')}}</strong>
                                                </small>
                                            @error('fixed_charges')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <h6 class="heading-small text-muted mb-3 mt-3">{{ __('Overtime Charges Permiles') }}</h6>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Charges (Per Miles)') }}</label>
                                            <input class="form-control form-control-alternative" type="number"
                                                value="{{ old('over_time_charges', $data->over_time_charges ?? '') }}" step="0.01"
                                                id="over_time_charges" name="over_time_charges">
                                                <small class="text-muted">
                                                    <strong>{{__('These charges will be applied when delivery will be made out of timing of vehicle')}}</strong>
                                                </small>
                                            @error('over_time_charges')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <h5 class="">{{ __('Over Range Charges') }}</h5>
                                <h6 class="text-muted mb-4">{{ __('Over Range Limit is 100 Miles if range will be exceded given fixed charges will be applied.') }}</h6>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Charges Type') }}</label>
                                            <select class="form-control form-control-alternative" name="over_range_charges_type">
                                                <option value="">{{ __('Select charges type') }}</option>
                                                <option value="distance_wise" <?php if ($data->over_range_charges_type ?? '' == 'distance_wise') { echo 'selected'; } ?>> {{ __('Distance Wise') }}</option>
                                                <option value="fixed" <?php if ($data->over_range_charges_type ?? '' == 'fixed') { echo 'selected'; } ?>> {{ __('Fixed') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Fixed Charges') }}</label>
                                            <input class="form-control form-control-alternative" type="number"
                                                value="{{ old('over_range_charges', $data->over_range_charges ?? '') }}" step="0.01"
                                                id="over_range_charges" name="over_range_charges">
                                            @error('over_range_charges')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-lg-2 col-md-2">
                                    <a class="btn btn-icon btn-success" href="{{ route('admin:vehicles') }}" id="back">
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
    @include('admin.layouts.partials.dropify.js')
    <script src="{{ asset('argon') }}/js/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
            $("#save").on('click', function() {
                $("#vehicle_form").validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        username: {
                            required: true,
                        },
                        address: {
                            required: true,
                        },
                        country: {
                            required: true,
                        },
                        city: {
                            required: true,
                        },
                        company: {
                            required: true,
                        },
                        email: {
                            required: true,
                            email: true
                        }
                    }
                });
            });

        });
    </script>
@endpush
