@extends('front.layout.app')

@section('content')

    <!-- === SLIDER AREA START === -->
    <div class="slider_2" data-background="{{ asset('theme') }}/assets/img/home-2_shapes/home2bg.png">
        <div class="slider_2_shapes">
            <img class="h2_shape4" src="{{ asset('theme') }}/assets/img/home-2_shapes/home_2_shape4.png" alt="" />
            <img class="h2_sh_1 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/borderShape.png" alt="">
            <img class="h2_sh_2 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/home2shape2.png" alt="">
            <img class="h2_sh_3 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/h2shap3.png" alt="">
            <img class="h2_sh_4 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/h2shape2.png" alt="">
            <img class="h2_sh_5 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/home_2_shape.png" alt="">
            <img class="h2_sh_6 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/home_2_shape7.png" alt="">
            <img class="h2_sh_7 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/border2shape.png" alt="">
            <img class="h2_sh_8 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="slider_2__content">
                        <h2 class="home2_title hero-title">Get things done with this beautiful app.</h2>
                        <p>Charles tosser quaint twit bamboozled burke brown bread I naff I <br>don't want no agro say
                            blimey.!!</p>
                        <a class="tp_white_border" href="contact.html">Free Trail</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="slider_2_image">
                        <div class="home2_shapes">
                            <img class="h2_love" src="{{ asset('theme') }}/assets/img/home-2_shapes/loveshape.png" alt="loveShape" />
                        </div>
                        <img class="H2_iphonex d-sm-none d-md-block d-none d-sm-block"
                            src="{{ asset('theme') }}/assets/img/home-2_shapes/home_2_shape8.png" alt="iphoneX" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- === SLIDER AREA END === -->

    <!-- === HOME-2 FETURES AREA START === -->
    <div class="fetures2 pt-115 pb-90">
        <div class="container">
            <div class="section_title_wrapper mb-60 text-center fetures2">
                <h2 class="section-title">Make Cool Landing Pages with Appz.</h2>
                <p>We take great pride in the quality of our content. Our writers create original content<br> that is free
                    of ethical concerns.Wellies bender.</p>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="featurebox2 mb-30  wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <div class="featurebox2__img">
                            <img src="{{ asset('theme') }}/assets/img/fetures/s3.png" alt="" />
                        </div>
                        <div class="featurebox2__content">
                            <h3 class="fea-title">Security</h3>
                            <p>The little rotter bevvy I gormless <br> mush golly gosh cras.</p>
                            <a class="fea-link" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="featurebox2 mb-30  wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <div class="featurebox2__img gradientorange">
                            <img src="{{ asset('theme') }}/assets/img/fetures/s2.png" alt="" />
                        </div>
                        <div class="featurebox2__content">
                            <h3 class="fea-title">Database</h3>
                            <p>The little rotter bevvy I gormless <br> mush golly gosh cras.</p>
                            <a class="fea-link" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="featurebox2 mb-30  wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <div class="featurebox2__img gradientbrwon">
                            <img src="{{ asset('theme') }}/assets/img/fetures/s1.png" alt="" />
                        </div>
                        <div class="featurebox2__content">
                            <h3 class="fea-title">Pricing Range</h3>
                            <p>The little rotter bevvy I gormless <br> mush golly gosh cras.</p>
                            <a class="fea-link" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="featurebox2 mb-30  wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <div class="featurebox2__img gradientgreen">
                            <img src="{{ asset('theme') }}/assets/img/fetures/s4.png" alt="" />
                        </div>
                        <div class="featurebox2__content">
                            <h3 class="fea-title">Risk Protectable</h3>
                            <p>The little rotter bevvy I gormless <br> mush golly gosh cras.</p>
                            <a class="fea-link" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- === HOME-2 FETURES AREA END === -->

    <!-- === HOME-2 APP DETAILS START === -->
    <div class="app_details_h2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="app_images_h2 wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">
                        <img class="bgphone d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/bgphone.png"
                            alt="bighphone.png" />
                        <div class="shape_design_h2">
                            <img class="home2FlatIphone_h2 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/about/home2FlatIphone.png"
                                alt="home2shape.png" />
                            <img class="home2IphoneX_h2 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/about/home2IphoneX.png"
                                alt="iphone.png" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 d-flex align-items-center">
                    <div class="details_content_h2 pl-100 wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <h2 class="section-title mb-20">Get paid and use the cash. All<br> with Front Pay.</h2>
                        <p>Barmy porkies gormless blower zonked cuppa burke<br> bugger all mate victoria sponge pardon me
                            William<br> are you taking the piss nice.</p>
                        <div class="details_btn_h2 pt-30">
                            <div class="bg-blue">
                                <img src="{{ asset('theme') }}/assets/img/home-2_shapes/smalllove.png" alt="smalllove.png">
                            </div>
                            <div class="bg-white">
                                <img src="{{ asset('theme') }}/assets/img/home-2_shapes/smallpersonk.png" alt="smalllove.png">
                            </div>
                        </div>
                        <a class="fea-link fea-link-two" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- === HOME-2 APP DETAILS END === -->

    <!-- === HOME-2 APP CHOOSE START === -->
    <div class="app_choose pt-115 mt-130 pb-160">
        <div class="container-fluidd">
            <div class="section_title_wrapper text-center pb-55">
                <h2 class="section-title section-title-large">Choose the offering that<br> works best for you.</h2>
            </div>
            <div class="choose_active">
                <div class="choose_item">
                    <img src="{{ asset('theme') }}/assets/img/choose/choose1.png" alt="choose_item" />
                </div>
                <div class="choose_item">
                    <img src="{{ asset('theme') }}/assets/img/choose/choose2.png" alt="choose_item" />
                </div>
                <div class="choose_item">
                    <img src="{{ asset('theme') }}/assets/img/choose/choose3.png" alt="choose_item" />
                </div>
                <div class="choose_item">
                    <img src="{{ asset('theme') }}/assets/img/choose/choose4.png" alt="choose_item" />
                </div>
                <div class="choose_item">
                    <img src="{{ asset('theme') }}/assets/img/choose/choose5.png" alt="choose_item" />
                </div>
                <div class="choose_item">
                    <img src="{{ asset('theme') }}/assets/img/choose/choose1.png" alt="choose_item" />
                </div>
                <div class="choose_item">
                    <img src="{{ asset('theme') }}/assets/img/choose/choose2.png" alt="choose_item" />
                </div>
                <div class="choose_item">
                    <img src="{{ asset('theme') }}/assets/img/choose/choose3.png" alt="choose_item" />
                </div>
            </div>
        </div>
    </div>
    <!-- === HOME-2 APP CHOOSE END === -->

    <!-- === HOME-2 PAY AREA START  === -->
    <div class="pay_area mb-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="details_content_h2 pt-200 wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <h2 class="section-title mb-20 pt-50">Simple and affordable. Pay as <br> you go.</h2>
                        <p>Barmy porkies gormless blower zonked cuppa burke<br> bugger all mate victoria sponge pardon me
                            William<br> are you taking the piss nice.</p>
                        <div class="details_btn_h2 pt-30">
                            <div class="bg-blue">
                                <img src="{{ asset('theme') }}/assets/img/home-2_shapes/smalllove.png" alt="smalllove.png">
                            </div>
                            <div class="bg-white">
                                <img src="{{ asset('theme') }}/assets/img/home-2_shapes/smallpersonk.png" alt="smallpersong.png">
                            </div>
                        </div>
                        <a class="fea-link fea-link-two" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="Pay_images pt-130 wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <img class="pay_shape1 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/Appz_home_01.png"
                            alt="pay_image" />
                        <img class="pay_shape2 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/Dashboard.png"
                            alt="pay_image" />
                        <img class="pay_shape3 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/home-2_shapes/circle1.png"
                            alt="pay_image" />
                        <img class="pay_shape4 d-md-none d-lg-block d-none d-sm-block"
                            src="{{ asset('theme') }}/assets/img/home-2_shapes/Polygon1.png" alt="pay_image" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- === HOME-2 PAY AREA END  === -->

    <!-- === HOME-2 PURCHES AREA START  === -->
    <div class="purches-area pt-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="section_title_wrapper purches">
                        <h2 class="section-title purches_heading">Easy to access and making purchases.</h2>
                        <p>Happy days jolly good bonnet owt to do with me loo wind up bog-standard, starkers victoria.!</p>
                        <div class="row g-0 pt-20">
                            <div class="col-xl-4 col-md-4 col-md-4 col-sm-4">
                                <div class="purches_btn">
                                    <a href="#"><i class="fas fa-user-robot"></i></a>
                                    <div class="purches_text">
                                        <h6>Download on the</h6>
                                        <a href="#">Play Store</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-md-4 col-sm-4">
                                <div class="purches_btn btn_outline">
                                    <a href="#"><i class="fab fa-apple"></i></a>
                                    <div class="purches_text purches2">
                                        <h6>Download on the</h6>
                                        <a href="#">App Store</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="pay_image d-sm-none d-md-block d-none d-sm-block">
                        <img src="{{ asset('theme') }}/assets/img/home-2_shapes/pay.png" alt="pay_image" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- === HOME-2 PURCHES AREA END  === -->

    <!-- === HOME-2 USER EXPERIENCE AREA START  === -->
    <div class="experience_area">
        <div class="container">
            <div class="section_title_wrapper text-center mb-70 mt-50">
                <h2 class="section-title">About Security Features Stunning <br> Design,Powerful User Experience.</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="service">
                        <div class="service__icon">
                            <img src="{{ asset('theme') }}/assets/img/service/s1.png" alt="service_image" />
                        </div>
                        <div class="service__content">
                            <h4>Maintenance</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                            <a class="fea-link" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="service">
                        <div class="service__icon">
                            <img src="{{ asset('theme') }}/assets/img/service/s2.png" alt="service_image" />
                        </div>
                        <div class="service__content">
                            <h4>Database</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                            <a class="fea-link" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="service">
                        <div class="service__icon">
                            <img src="{{ asset('theme') }}/assets/img/service/s3.png" alt="service_image" />
                        </div>
                        <div class="service__content">
                            <h4>Server</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                            <a class="fea-link" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="service">
                        <div class="service__icon">
                            <img src="{{ asset('theme') }}/assets/img/service/s4.png" alt="service_image" />
                        </div>
                        <div class="service__content">
                            <h4>Cost Flexibility</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                            <a class="fea-link" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="service">
                        <div class="service__icon">
                            <img src="{{ asset('theme') }}/assets/img/service/s5.png" alt="service_image" />
                        </div>
                        <div class="service__content">
                            <h4>Risk Protectable</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                            <a class="fea-link" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="service">
                        <div class="service__icon">
                            <img src="{{ asset('theme') }}/assets/img/service/s6.png" alt="service_image" />
                        </div>
                        <div class="service__content">
                            <h4>Clients Feedback</h4>
                            <p>The little rotter bevvy I gormless <br>mush golly gosh cras.</p>
                            <a class="fea-link" href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- === HOME-2 USER EXPERIENCE AREA END  === -->

    <!-- === HOME-2 TESTIMONIAL AREA START  === -->
    <div class="testimonial-area testimonial2 pt-200 pb-220 fix">
        <div class="testimonial_person d-md-none d-lg-block d-lg-none d-xl-block d-sm-none">
            <img class="testimonial1_h2 d-none d-sm-block" src="assets/img/testimonial/1.png" alt="" />
            <img class="testimonial2_h2 d-none d-sm-block" src="assets/img/testimonial/2.png" alt="" />
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="testimonial-active2 tp-dot-style">
                        <div class="testimonial-items">
                            <div class="items">
                                <div class="clients_meta">
                                    <div class="clients_image">
                                        <img src="{{ asset('theme') }}/assets/img/testimonial/h2_test_1.png" alt="clients_image" />
                                    </div>
                                </div>
                                <div class="clients_info-two">
                                    <p>The little rotter Richard bobby skive off arse over tit cracking<br> goal boot super
                                        a load of old tosh pukka, naff crikey cockup<br> ummm I'm telling say barmy chip
                                        shop porkies</p>
                                    <div class="clients_info info2">
                                        <h4>Nathaneal Down</h4>
                                        <span>UI/UX Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-items">
                            <div class="items">
                                <div class="clients_meta">
                                    <div class="clients_image">
                                        <img src="{{ asset('theme') }}/assets/img/testimonial/h2_test_1.png" alt="clients_image" />
                                    </div>
                                </div>
                                <div class="clients_info-two">
                                    <p>The little rotter Richard bobby skive off arse over tit cracking<br> goal boot super
                                        a load of old tosh pukka, naff crikey cockup<br> ummm I'm telling say barmy chip
                                        shop porkies</p>
                                    <div class="clients_info info2">
                                        <h4>Nathaneal Down</h4>
                                        <span>UI/UX Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- === HOME-2 TESTIMONIAL AREA END  === -->

    <!-- === HOME-2 CTA AREA START  === -->
    <div class="cta_area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="cta">
                        <h2 class="sub-title">Stunning Design,<br> Powerful User Experience.</h2>
                        <p>Horse play argy-bargy me old mucker boot bog show off show off pick<br> your nose and blow off
                            sloshed my lady blow off mush cack, cras buggered say.</p>
                        <div class="cta__freeBtn">
                            <a class="cta_btn_2" href="contact.html">Free Trail </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- === HOME-2 CTA AREA END  === -->


@endsection
