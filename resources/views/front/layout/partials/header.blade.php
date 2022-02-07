<!-- HEADER START -->
<header>
    <div id="header-sticky" class="header-area header-area-white transparent-header pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2 col-md-4 col-10 d-flex align-items-center">
                    <div class="logo">
                        <a href="{{ url('/') }}"> <img src="{{ asset('theme') }}/assets/img/logo/home2.png" alt=""> </a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-7 col-8 d-none d-md-block">
                    <div class="main-menu colormenu d-block">
                        <nav id="mobile-menu">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('about-us') }}">About us</a></li>
                                <li><a href="{{ url('services') }}">Service</a></li>
                                <li><a href="{{ url('pricing') }}">Pricing</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-2 col-md-1">
                    <div class="side-menu-icon bar-two d-lg-none text-end">
                        <button class="side-toggle"><i class="far fa-bars"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER END -->


<div class="fix">
    <div class="side-info">
        <button class="side-info-close"><i class="fal fa-times"></i></button>
        <div class="side-info-content">
            <div class="mobile-menu"></div>
        </div>
    </div>
</div>
<div class="offcanvas-overlay"></div>
