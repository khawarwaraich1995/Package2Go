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
                    <h2 class="page_title">Our Contact. us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li  class="breadcrumb-item"><a href="index.html">Home - Contact us</a></li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page title end  -->


<!-- contact form Start  -->
<div class="contact__wrapper mt-115 mb-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="contact__info">
                    <h4 class="info_title">Office Address</h4>
                    <p>{{$site_data->address}}</p>
                </div>
                <div class="contact__form pt-70 pb-50">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Phone :  {{$site_data->phone}}</li>
                        <li>Email :  {{$site_data->email}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="post-comment-form contact-form">
                    <form action="#">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="post-input contact-form">
                                    <input type="text" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="post-input contact-form">
                                    <input type="email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="post-input contact-form">
                                    <input type="text" placeholder="subject"/>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="post-input contact-form">
                                   <textarea placeholder="Your Message"></textarea>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="post-check mb-40">
                                    <button type="submit" class="btn btn-comment">SEND MESSAGE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact form End  -->

<div class="google-map contact-map">
    <iframe class="w-100" height="450" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.91477055202!2d-74.11976321327155!3d40.69740344214894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1612427122501!5m2!1sen!2sbd"></iframe>
</div>

@endsection
