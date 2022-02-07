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
                        <h2 class="page_title">Our Priceing . Plan </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home - Pricing</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title end  -->


    <!-- pricing area start  -->
    <div class="pricing-area pt-105 pb-110 position-relative">
        <div class="pricing_shapes">
            <img class="position-absolute price-1" src="{{ asset('theme') }}/assets/img/shape/left.png" alt="pricing_shapes" />
            <img class="position-absolute price-2" src="{{ asset('theme') }}/{{ asset('theme') }}/assets/img/shape/shape7.png" alt="pricing_shapes" />
            <img class="position-absolute price-3" src="{{ asset('theme') }}/assets/img/shape/shape2.png" alt="pricing_shapes" />
        </div>
        <div class="container">
            <div class="section_title_wrapper text-center pb-50">
                <h2 class="section-title pricing_title">Choose the offering that <br>works best for you.</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing mb-30">
                        <div class="pricing__header">
                            <h4>Basic Package</h4>
                            <h2><span>$</span>202</h2>
                            <span>Monthly</span>
                        </div>
                        <div class="pricing__content">
                            <ul>
                                <li><i class="far fa-check"></i>Web Research & Analysis</li>
                                <li><i class="far fa-check"></i>25 Analytics Campaign</li>
                                <li><i class="far fa-check"></i>Content Optimization</li>
                                <li><i class="far fa-check"></i>24/7 Online Support</li>
                                <li><i class="far fa-check"></i>Free Marketing Tutorials</li>
                            </ul>
                        </div>
                        <div class="pricing__footer">
                            <a href="contact.html">Choose Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing design1 mb-30">
                        <div class="pricing__header orange">
                            <h4>Standard Package</h4>
                            <h2><span>$</span>404</h2>
                            <span>Monthly</span>
                        </div>
                        <div class="pricing__content">
                            <ul>
                                <li><i class="far fa-check"></i>Web Research & Analysis</li>
                                <li><i class="far fa-check"></i>25 Analytics Campaign</li>
                                <li><i class="far fa-check"></i>Content Optimization</li>
                                <li><i class="far fa-check"></i>24/7 Online Support</li>
                                <li><i class="far fa-check"></i>Free Marketing Tutorials</li>
                            </ul>
                        </div>
                        <div class="pricing__footer">
                            <a href="contact.html">Choose Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="pricing design2 mb-30">
                        <div class="pricing__header lightcolor">
                            <h4>Advance Package</h4>
                            <h2><span>$</span>909</h2>
                            <span>Monthly</span>
                        </div>
                        <div class="pricing__content">
                            <ul>
                                <li><i class="far fa-check"></i>Web Research & Analysis</li>
                                <li><i class="far fa-check"></i>25 Analytics Campaign</li>
                                <li><i class="far fa-check"></i>Content Optimization</li>
                                <li><i class="far fa-check"></i>24/7 Online Support</li>
                                <li><i class="far fa-check"></i>Free Marketing Tutorials</li>
                            </ul>
                        </div>
                        <div class="pricing__footer">
                            <a href="contact.html">Choose Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pricing area end -->

@endsection
