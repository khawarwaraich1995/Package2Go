@php
    $segment = Request::segment(2);
    $segmentSecondary = Request::segment(3);
@endphp
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('admin:dashboard') }}">
            <img style="max-height: 6.5rem" src="https://image.freepik.com/free-vector/man-with-map-smartphone-renting-car-driver-using-car-sharing-app-phone-searching-vehicle-vector-illustration-transport-transportation-urban-traffic-location-app-concept_74855-10109.jpg" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin:logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('admin:dashboard') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            {{-- @php
                dd();
            @endphp --}}
            <ul class="navbar-nav">
                <li class="nav-item {{($segment == 'dashboard' ? 'active': '')}}">
                    <a class="nav-link" href="{{ route('admin:dashboard') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item {{($segment == 'shipments' ? 'active': '')}}">
                    <a class="nav-link" href="{{ route('admin:shipments') }}">
                        <i class="ni ni-delivery-fast text-red"></i> {{ __('Shipments') }}
                    </a>
                </li>
                <li class="nav-item {{($segment == 'customers' ? 'active': '')}}">
                    <a class="nav-link" href="{{ route('admin:customers') }}">
                        <i class="ni ni-circle-08 text-green"></i> {{ __('Customers') }}
                    </a>
                </li>
                <li class="nav-item {{($segment == 'vehicles' ? 'active': '')}}">
                    <a class="nav-link" href="{{ route('admin:vehicles') }}">
                        <i class="ni ni-delivery-fast text-yellow"></i> {{ __('Vehicles') }}
                    </a>
                </li>
                <li class="nav-item {{($segment == 'settings' ? 'active': '')}}">
                    <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="true"
                        aria-controls="navbar-forms">
                        <i class="ni ni-single-copy-04 text-pink"></i>
                        <span class="nav-link-text">{{ __('Settings') }}</span>
                    </a>
                    <div class="collapse {{($segment == 'settings' ? 'show': '')}}" id="navbar-forms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{($segmentSecondary == 'business' ? 'active': '')}}">
                                <a href="{{url('/admin/settings/business')}}" class="nav-link">
                                    <i class="ni ni-shop text-blue"></i> {{ __('Business Setting') }}
                                </a>
                            </li>
                            <li class="nav-item {{($segmentSecondary == 'notifications' ? 'active': '')}}">
                                <a href="{{url('/admin/settings/notifications')}}" class="nav-link">
                                    <i class="ni ni-bell-55 text-orange"></i> {{ __('Notifications Setting') }}
                                </a>
                            </li>
                            <li class="nav-item {{($segmentSecondary == 'courier' ? 'active': '')}}">
                                <a href="{{url('/admin/settings/courier')}}" class="nav-link">
                                    <i class="ni ni-delivery-fast text-purple"></i> {{ __('Courier Settings') }}
                                </a>
                            </li>
                            {{-- <li class="nav-item {{($segmentSecondary == 'payment' ? 'active': '')}}">
                                <a href="{{url('/admin/settings/payments')}}" class="nav-link">
                                    <i class="ni ni-money-coins text-yellow"></i> {{ __('Payments Setting') }}
                                </a>
                            </li> --}}
                            <li class="nav-item {{($segmentSecondary == 'smtp' ? 'active': '')}}">
                                <a href="{{url('/admin/settings/smtp')}}" class="nav-link">
                                    <i class="ni ni-email-83 text-red"></i> {{ __('SMTP Setting') }}
                                </a>
                            </li>
                            <li class="nav-item {{($segmentSecondary == 'sms' ? 'active': '')}}">
                                <a href="{{url('/admin/settings/sms')}}" class="nav-link">
                                    <i class="ni ni-chat-round text-green"></i> {{ __('SMS Setting') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{($segment == 'theme-settings' ? 'active': '')}}">
                    <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="true"
                        aria-controls="navbar-forms">
                        <i class="ni ni-single-copy-04 text-green"></i>
                        <span class="nav-link-text">{{ __('Theme Settings') }}</span>
                    </a>
                    <div class="collapse {{($segment == 'theme-settings' ? 'show': '')}}" id="navbar-forms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{($segmentSecondary == 'business' ? 'active': '')}}">
                                <a href="{{url('/admin/settings/business')}}" class="nav-link">
                                    <i class="ni ni-shop text-blue"></i> {{ __('Business Setting') }}
                                </a>
                            </li>


                        </ul>
                    </div>
                </li>
                <li class="nav-item {{($segment == 'roles' ? 'active': '')}}">
                    <a class="nav-link" href="{{route('admin:roles')}}">
                        <i class="ni ni-planet text-pink"></i> {{ __('Roles & Permissions') }}
                    </a>
                </li>
                <li class="nav-item {{($segment == 'users' ? 'active': '')}}">
                    <a class="nav-link" href="{{ route('admin:users') }}">
                        <i class="ni ni-circle-08 text-red"></i> {{ __('Users') }}
                    </a>
                </li>
                <li class="nav-item {{($segment == 'drivers' ? 'active': '')}}">
                    <a class="nav-link" href="{{ route('admin:drivers') }}">
                        <i class="ni ni-circle-08 text-green"></i> {{ __('Drivers') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
