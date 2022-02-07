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
                        <h2 class="page_title">Our Company . About </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home - About Us</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title end  -->

    <!-- FETURES START -->
    <div class="homefeture_1 pt-115 pb-90">
        <div class="container">
            <div class="app_left_shape">
                <img class="leftanimation" src="{{ asset('theme') }}/assets/img/shape/left.png" alt="leftshape" />
                <img src="{{ asset('theme') }}/assets/img/shape/shape7.png" alt="leftshape" />
            </div>
            <div class="App_title text-center wow fadeInUp mb-70" data-wow-delay="0.3s"
                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <h2 class="section-title">Shine the new<br> light on the digital world</h2>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="feabox mb-30">
                        <div class="feabox__img mb-50">
                            <img src="{{ asset('theme') }}/assets/img/fetures/Forma1.png" alt="form1" />
                        </div>
                        <div class="feabox__content">
                            <h3 class="feabox-title tcolor0">Premium Plugins</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="feabox clr1 mb-30">
                        <div class="feabox__img img1 mb-50">
                            <img src="{{ asset('theme') }}/assets/img/fetures/Forma2.png" alt="form2" />
                        </div>
                        <div class="feabox__content">
                            <h3 class="feabox-title tcolor1">Premium Plugins</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="feabox clr2 mb-30">
                        <div class="feabox__img img2 mb-50">
                            <img src="{{ asset('theme') }}/assets/img/fetures/Forma3.png" alt="form3" />
                        </div>
                        <div class="feabox__content">
                            <h3 class="feabox-title tcolor2">Premium Plugins</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="feabox clr3 mb-30">
                        <div class="feabox__img img3 mb-50">
                            <img src="{{ asset('theme') }}/assets/img/fetures/Forma4.png" alt="form4" />
                        </div>
                        <div class="feabox__content">
                            <h3 class="feabox-title tcolor3">Premium Plugins</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FETURES END -->
    <!-- FETURES CONTENT START -->
    <div class="app_image app_image3 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="app_image_shape_h3">
                        <img class="posabsouluteh3 app1" src="{{ asset('theme') }}/assets/img/shape/dark1.png" alt="shape_missing" />
                        <img class="posabsouluteh3 app2 d-none d-sm-block" src="{{ asset('theme') }}/assets/img/shape/shape5.png"
                            alt="shape_missing" />
                        <img class="posabsouluteh3 app3" src="{{ asset('theme') }}/assets/img/shape/shape5.png" alt="shape_missing" />
                        <img class="posabsouluteh3 app4" src="{{ asset('theme') }}/assets/img/shape/lightshape.png" alt="shape_missing" />
                        <img class="posabsouluteh3 app5" src="{{ asset('theme') }}/assets/img/shape/verysmall.png" alt="shape_missing" />
                        <img class="posabsouluteh3 app6" src="{{ asset('theme') }}/assets/img/shape/shape8.png" alt="shape_missing" />
                        <img class="posabsouluteh3 app7" src="{{ asset('theme') }}/assets/img/shape/shape3.png" alt="shape_missing" />
                    </div>
                    <div class="app-image wow fadeInUp" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <img src="{{ asset('theme') }}/assets/img/about/appabout.png" alt="" />
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="features feturesCommon wow fadeInUp pt-90 pl-50 remove-pad" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="features__icon h3_shape">
                            <img src="{{ asset('theme') }}/assets/img/fetures/fetures3.png" alt="" />
                        </div>
                        <div class="features__content h3_content">
                            <h2 class="section-title">We Create innovative solution that works pragmatically.</h2>
                            <p>You mug dropped a clanger barmy David brown <br>bread bleeding crikey say chimney pot me old
                                <br>mucker bugger super.
                            </p>
                            <a href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FETURES CONTENT START -->
    <!-- FETURES CONTENT START -->
    <div class="homefeture_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="features pt-105 wow fadeInLeft" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                        <div class="features__icon">
                            <img src="{{ asset('theme') }}/assets/img/fetures/leftIcon.png" alt="" />
                        </div>
                        <div class="features__content">
                            <h2 class="section-title">We Create innovative solution that works pragmatically.</h2>
                            <p>You mug dropped a clanger barmy David brown <br>bread bleeding crikey say chimney pot me old
                                <br>mucker bugger super.
                            </p>
                            <a href="service.html">Read More<i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="app-image wow fadeInRight" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                        <img src="{{ asset('theme') }}/assets/img/about/about1.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FETURES CONTENT END -->
    <!-- TESTIMONIAL START  -->
    <div class="testimonial-area bg1 pt-110">
        <div class="testimonial_shape">
            <img class="t-1" src="{{ asset('theme') }}/assets/img/shape/shape8.png" alt="shape" />
            <img class="t-2" src="{{ asset('theme') }}/assets/img/shape/shape2.png" alt="shape" />
        </div>
        <div class="testimonal_title">
            <h2 class="section-title">About Our Team Member We have<br> Powerful User Experience.</h2>
        </div>
        <div class="container">
            <div class="row testimonial-active tp-dot-style">
                <div class="col-xl-4 col-lg-4">
                    <div class="testimonial-item actve pt-55">
                        <div class="item">
                            <p>Matie boy it's your round amongst bodge vagabond absolutely bladdered crikey well off his nut
                                have it, goal you mug loo don't super.</p>
                            <div class="clients_meta">
                                <div class="clients_image">
                                    <img src="{{ asset('theme') }}/assets/img/testimonial/test1.jpg" alt="clients_image" />
                                </div>
                                <div class="clients_info">
                                    <h4>Hilary Ouse</h4>
                                    <span>Ui/Ux Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="testimonial-item actve pt-55">
                        <div class="item">
                            <p>Matie boy it's your round amongst bodge vagabond absolutely bladdered crikey well off his nut
                                have it, goal you mug loo don't super.</p>
                            <div class="clients_meta">
                                <div class="clients_image">
                                    <img src="{{ asset('theme') }}/assets/img/testimonial/test3.jpg" alt="clients_image" />
                                </div>
                                <div class="clients_info">
                                    <h4>Brian Cumin</h4>
                                    <span>Ui/Ux Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="testimonial-item actve pt-55">
                        <div class="item">
                            <p>Matie boy it's your round amongst bodge vagabond absolutely bladdered crikey well off his nut
                                have it, goal you mug loo don't super.</p>
                            <div class="clients_meta">
                                <div class="clients_image">
                                    <img src="{{ asset('theme') }}/assets/img/testimonial/test2.jpg" alt="clients_image" />
                                </div>
                                <div class="clients_info">
                                    <h4>Indigo Violet</h4>
                                    <span>Ui/Ux Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="testimonial-item actve pt-55">
                        <div class="item">
                            <p>Matie boy it's your round amongst bodge vagabond absolutely bladdered crikey well off his nut
                                have it, goal you mug loo don't super.</p>
                            <div class="clients_meta">
                                <div class="clients_image">
                                    <img src="{{ asset('theme') }}/assets/img/testimonial/test3.jpg" alt="clients_image" />
                                </div>
                                <div class="clients_info">
                                    <h4>Indigo Violet</h4>
                                    <span>Ui/Ux Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="testimonial-item actve pt-55">
                        <div class="item">
                            <p>Matie boy it's your round amongst bodge vagabond absolutely bladdered crikey well off his nut
                                have it, goal you mug loo don't super.</p>
                            <div class="clients_meta">
                                <div class="clients_image">
                                    <img src="{{ asset('theme') }}/assets/img/testimonial/test2.jpg" alt="clients_image" />
                                </div>
                                <div class="clients_info">
                                    <h4>Indigo Violet</h4>
                                    <span>Ui/Ux Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL END -->

    <!-- TRY START  -->
    <div class="try-area pt-100 mb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="try_box">
                        <div class="try-shape">
                            <img class="tryshape" src="{{ asset('theme') }}/assets/img/shape/shape3.png" alt="shape" />
                        </div>
                        <div class="row">
                            <div class="col-xl-7 col-lg-7">
                                <h2>Try Our New Appz</h2>
                                <p>Horse play argy-bargy me old mucker boot bog show off show off pick your nose and blow
                                    off sloshed my cack buggered.</p>
                            </div>
                            <div class="col-xl-5 col-lg-5">
                                <div class="try_btn_center">
                                    <div class="try_btn">
                                        <a class="btn btnfree" href="contact.html">Free Trail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TRY END  -->

@endsection
