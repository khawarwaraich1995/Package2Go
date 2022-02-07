@extends('front.layout.app')

@section('content')

    <!-- page title start  -->
    <section class="page__title  fix text-center">
        <div class="slider__shape">
            <img class="shape triangle" src="{{ asset('theme') }}/assets/img/aboutpage/topElips.png" alt="topshape">
            <img class="shape dotted-square" src="{{ asset('theme') }}/assets/img/aboutpage/rightElips.png" alt="rightshape">
            <img class="shape solid-square" src="{{ asset('theme') }}/assets/img/aboutpage/circleElips.png" alt="solid-square">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content pt-235">
                        <h2 class="page_title">Our Service . Details </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home - Service</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title end  -->

    <!-- === HOME-2 USER EXPERIENCE AREA START  === -->
    <div class="experience_area">
        <div class="section_title_wrapper text-center mb-70 mt-50">
            <h2 class="section-title">About Security Features Stunning <br> Design,Powerful User Experience.</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="service service_page">
                        <div class="service__icon servicepageIcon sbg1">
                            <img src="{{ asset('theme') }}/assets/img/service-page/icon1.png" alt="service_image" />
                        </div>
                        <div class="service__content servicecontent">
                            <h4>Backup Database</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="service service_page">
                        <div class="service__icon servicepageIcon sbg2">
                            <img src="{{ asset('theme') }}/assets/img/service-page/icon2.png" alt="service_image" />
                        </div>
                        <div class="service__content servicecontent">
                            <h4>Server Maintenance</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="service service_page">
                        <div class="service__icon servicepageIcon sbg3">
                            <img src="{{ asset('theme') }}/assets/img/service-page/icon3.png" alt="service_image" />
                        </div>
                        <div class="service__content servicecontent">
                            <h4>Security Maintenance</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="service service_page">
                        <div class="service__icon servicepageIcon sbg4">
                            <img src="{{ asset('theme') }}/assets/img/service-page/icon4.png" alt="service_image" />
                        </div>
                        <div class="service__content servicecontent">
                            <h4>Clients Feedback</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="service service_page">
                        <div class="service__icon servicepageIcon sbg5">
                            <img src="{{ asset('theme') }}/assets/img/service-page/icon5.png" alt="service_image" />
                        </div>
                        <div class="service__content servicecontent">
                            <h4>No Risk Protectable</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="service service_page">
                        <div class="service__icon servicepageIcon sbg6">
                            <img src="{{ asset('theme') }}/assets/img/service-page/icon6.png" alt="service_image" />
                        </div>
                        <div class="service__content servicecontent">
                            <h4>Cost Flexibility</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- === HOME-2 USER EXPERIENCE AREA END  === -->


    <!-- development-platform start  -->
    <div class="tab-area pt-180 mb-200">
        <div class="container">
            <div class="section_title_wrapper mb-60">
                <h2 class="section-title service-padding">Dedicated app <br>development platform</h2>
                <p>We take great pride in the quality of our<br> content. Our writers create original content that is free
                    of ethical<br> concerns.</p>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="tab-menu">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#tab1" type="button" role="tab" aria-selected="true"><i
                                    class="fal fa-lightbulb"></i>Creative Ideas</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#tab2" type="button" role="tab" aria-selected="false"><i
                                    class="fal fa-key"></i>Innovative Ideas</button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#tab3" type="button" role="tab" aria-selected="false"><i
                                    class="fal fa-lock-alt"></i>Secure Planing</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12 d-none d-lg-block">
                    <div class="tab-item pt-100">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="tab_contentt d-md-none d-lg-block">
                                    <img class="bigshape" src="{{ asset('theme') }}/assets/img/service-page/shapeBig.png" alt="shape" />
                                    <img class="mobilesmall" src="{{ asset('theme') }}/assets/img/service-page/mobileIcon.png" alt="shape" />
                                    <img class="mobilebig" src="{{ asset('theme') }}/assets/img/service-page/mobile2.png" alt="shape" />
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="tab_contentt d-md-none d-lg-block">
                                        <img class="bigshape" src="{{ asset('theme') }}/assets/img/service-page/shapeBig.png"
                                            alt="shape" />
                                        <img class="mobilesmall" src="{{ asset('theme') }}/assets/img/service-page/mobileIcon.png"
                                            alt="shape" />
                                        <img class="mobilebig" src="{{ asset('theme') }}/assets/img/service-page/mobile2.png" alt="shape" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="tab_contentt d-md-none d-lg-block">
                                        <img class="bigshape" src="{{ asset('theme') }}/assets/img/service-page/shapeBig.png"
                                            alt="shape" />
                                        <img class="mobilesmall" src="{{ asset('theme') }}/assets/img/service-page/mobileIcon.png"
                                            alt="shape" />
                                        <img class="mobilebig" src="{{ asset('theme') }}/assets/img/service-page/mobile2.png" alt="shape" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- APP DETAILS START -->
    <div class="app_details mb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-lg-6 col-md-6 d-none d-sm-block">
                    <div class="details_image wow zoomIn leftImag pt-80 f-left" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: zoomIn;">
                        <img src="{{ asset('theme') }}/assets/img/fetures/mockup.png" alt="blogshape" />
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 pl--50">
                    <div class="details_content pb-70 pt-120">
                        <h2 class="section-title">A new way to manage your work, tasks and projects.</h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="feature3">
                                <div class="feature3__image">
                                    <img class="pb-30" src="{{ asset('theme') }}/assets/img/service/s7.png" alt="details" />
                                </div>
                                <div class="feature3__content">
                                    <h4 class="content_title">Security Maintenance</h4>
                                    <p>The little rotter bevvy I gormless mush golly gosh cras.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="feature3">
                                <div class="feature3__image febg1">
                                    <img class="pb-30" src="{{ asset('theme') }}/assets/img/fetures/s2.png" alt="details" />
                                </div>
                                <div class="feature3__content">
                                    <h4 class="content_title">Backup Database</h4>
                                    <p>The little rotter bevvy I gormless mush golly gosh cras.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="feature3">
                                <div class="feature3__image febg2">
                                    <img class="pb-30" src="{{ asset('theme') }}/assets/img/fetures/s3.png" alt="details" />
                                </div>
                                <div class="feature3__content">
                                    <h4 class="content_title">Server Maintenance</h4>
                                    <p>The little rotter bevvy I gormless mush golly gosh cras.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="feature3">
                                <div class="feature3__image febg3">
                                    <img class="pb-30" src="{{ asset('theme') }}/assets/img/fetures/s4.png" alt="details" />
                                </div>
                                <div class="feature3__content">
                                    <h4 class="content_title">No Risk Protectable</h4>
                                    <p>The little rotter bevvy I gormless mush golly gosh cras.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- APP DETAILS END -->
    <!-- development-platform end  -->

@endsection
