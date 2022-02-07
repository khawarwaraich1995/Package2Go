@extends('admin.layouts.app', ['title' => __('Vehciles Timing')])
@section('content')
    @include('admin.layouts.partials.header', [
    'title' => __('Vehicle Timing'),
    'class' => 'col-lg-12',
    ])
    <?php
    if (isset($id) && $id != 0) {
        $submit_url = route('admin:vehicle.timing.update', [$id ?? '']);
    }
    ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Vehicle Timing') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{$submit_url}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="vehicle_id" value="{{ $timing->vehicle_id }}">
                            <div class="form-group">
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="custom-control custom-checkbox">
                                            @php
                                                if (isset($timing->sunday) && $timing->sunday == 1) {
                                                    $sunday_check = 'checked';
                                                } else {
                                                    $sunday_check = '';
                                                }
                                            @endphp
                                            <input type="checkbox" name="sunday" class="custom-control-input"
                                                id="sunday" {{ $sunday_check }}>
                                            <label class="custom-control-label text-capitalize"
                                                for="sunday">sunday</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="Start Time" type="text" name="sunday_open" value="{{ \Carbon\Carbon::parse($timing->sunday_open)->format('H:i') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="End Time" type="text" name="sunday_close" value="{{ \Carbon\Carbon::parse($timing->sunday_close)->format('H:i') }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="custom-control custom-checkbox">
                                            @php
                                                if (isset($timing->monday) && $timing->monday == 1) {
                                                    $monday_check = 'checked';
                                                } else {
                                                    $monday_check = '';
                                                }
                                            @endphp
                                            <input type="checkbox" name="monday" class="custom-control-input"
                                                id="monday" {{ $monday_check }}>
                                            <label class="custom-control-label text-capitalize"
                                                for="monday">monday</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="Start Time" type="text" name="monday_open" value="{{ \Carbon\Carbon::parse($timing->monday_open)->format('H:i') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="End Time" type="text" name="monday_close" value="{{ \Carbon\Carbon::parse($timing->monday_close)->format('H:i') }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="custom-control custom-checkbox">
                                            @php
                                                if (isset($timing->tuesday) && $timing->tuesday == 1) {
                                                    $tuesday_check = 'checked';
                                                } else {
                                                    $tuesday_check = '';
                                                }
                                            @endphp
                                            <input type="checkbox" name="tuesday" class="custom-control-input"
                                                id="tuesday" {{ $tuesday_check }}>
                                            <label class="custom-control-label text-capitalize"
                                                for="tuesday">tuesday</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="Start Time" type="text" name="tuesday_open" value="{{ \Carbon\Carbon::parse($timing->tuesday_open)->format('H:i') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="End Time" type="text" name="tuesday_close" value="{{ \Carbon\Carbon::parse($timing->tuesday_close)->format('H:i') }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="custom-control custom-checkbox">
                                            @php
                                                if (isset($timing->wednesday) && $timing->wednesday == 1) {
                                                    $wednesday_check = 'checked';
                                                } else {
                                                    $wednesday_check = '';
                                                }
                                            @endphp
                                            <input type="checkbox" name="wednesday" class="custom-control-input"
                                                id="wednesday" {{ $wednesday_check }}>
                                            <label class="custom-control-label text-capitalize"
                                                for="wednesday">wednesday</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="Start Time" type="text" name="wednesday_open" value="{{ \Carbon\Carbon::parse($timing->wednesday_open)->format('H:i') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="End Time" type="text" name="wednesday_close" value="{{ \Carbon\Carbon::parse($timing->wednesday_close)->format('H:i') }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="custom-control custom-checkbox">
                                            @php
                                                if (isset($timing->thursday) && $timing->thursday == 1) {
                                                    $thursday_check = 'checked';
                                                } else {
                                                    $thursday_check = '';
                                                }
                                            @endphp
                                            <input type="checkbox" name="thursday" class="custom-control-input"
                                                id="thursday" {{ $thursday_check }}>
                                            <label class="custom-control-label text-capitalize"
                                                for="thursday">thursday</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="Start Time" type="text" name="thursday_open" value="{{ \Carbon\Carbon::parse($timing->thursday_open)->format('H:i') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="End Time" type="text" name="thursday_close" value="{{ \Carbon\Carbon::parse($timing->thursday_close)->format('H:i') }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="custom-control custom-checkbox">
                                            @php
                                                if (isset($timing->friday) && $timing->friday == 1) {
                                                    $friday_check = 'checked';
                                                } else {
                                                    $friday_check = '';
                                                }
                                            @endphp
                                            <input type="checkbox" name="friday" class="custom-control-input"
                                                id="friday" {{ $friday_check }}>
                                            <label class="custom-control-label text-capitalize"
                                                for="friday">friday</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="Start Time" type="text" name="friday_open" value="{{ \Carbon\Carbon::parse($timing->friday_open)->format('H:i') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="End Time" type="text" name="friday_close" value="{{ \Carbon\Carbon::parse($timing->friday_close)->format('H:i') }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="custom-control custom-checkbox">
                                            @php
                                                if (isset($timing->saturday) && $timing->saturday == 1) {
                                                    $saturday_check = 'checked';
                                                } else {
                                                    $saturday_check = '';
                                                }
                                            @endphp
                                            <input type="checkbox" name="saturday" class="custom-control-input"
                                                id="saturday" {{ $saturday_check }}>
                                            <label class="custom-control-label text-capitalize"
                                                for="saturday">saturday</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="Start Time" type="text" name="saturday_open" value="{{ \Carbon\Carbon::parse($timing->saturday_open)->format('H:i') }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-time-alarm"></i></span>
                                            </div>
                                            <input class="flatpickr datetimepicker form-control form-control input"
                                                placeholder="End Time" type="text" name="saturday_close" value="{{ \Carbon\Carbon::parse($timing->saturday_close)->format('H:i') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footers.auth')
    </div>
@endsection

