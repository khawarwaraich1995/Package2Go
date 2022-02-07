       <!-- FOOTER START -->
       <div class="footer-area padding-remove footertext-hover">
           <div class="container">
               <div class="row">
                   <div class="col-xl-2 col-lg-2 col-md-4">
                       <div class="footer_logo wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                           <img src="{{ asset('theme') }}/assets/img/logo/logo.png" alt="logo" />
                       </div>
                   </div>
                   <div class="col-xl-2 col-lg-2 col-md-4">
                       <div class="footer_widget_design wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                           <div class="link_heading">
                               <h3 class="link_heading">Useful Links</h3>
                           </div>
                           <div class="links">
                               <ul>
                                   <li><a href="index.html">Home </a></li>
                                   <li><a href="about.html">About</a></li>
                                   <li><a href="service.html">Service</a></li>
                                   <li><a href="blog.html">Blog</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-2 col-lg-2 col-md-4">
                       <div class="footer_widget_design wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                           <div class="link_heading">
                               <h3 class="link_heading">Resources</h3>
                           </div>
                           <div class="links">
                               <ul>
                                   <li><a href="about.html">Project</a></li>
                                   <li><a href="about.html">About</a></li>
                                   <li><a href="about.html">Help</a></li>
                                   <li><a href="about.html">Privacy</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-3 col-lg-3 col-md-4">
                       <div class="footer_widget_design fixwidth wow  fadeInUp" data-wow-duration="2s"
                           data-wow-delay=".2s">
                           <div class="link_heading">
                               <h3 class="link_heading">Service</h3>
                           </div>
                           <div class="links">
                               <ul>
                                   <li><a href="service.html">Managed IT</a></li>
                                   <li><a class="itsupport" href="service.html">IT Support </a></li>
                                   <li><a href="service.html">Cecurity</a></li>
                                   <li><a href="about.html">FAQ’s </a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-3 col-lg-2 col-md-4">
                       <div class="footer_widget_design wow  fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                           <div class="link_heading">
                               <h3 class="link_heading linkspecail">Office Location</h3>
                           </div>
                           <div class="links special_widget_tp">
                               <ul>
                                   <li><a href="contact.html"><i class="far fa-map-marker-alt"></i><span
                                               class="tp-spaceing">{{$site_data->address}}</span></a></li>
                                   <li><a href="tel:+8801821243622"><i class="fad fa-phone-alt"></i>{{$site_data->phone}}</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="footer_bottom pt-60 pb-15">
               <div class="container tp-border">
                   <div class="row align-items-center">
                       <div class="col-xl-6 col-lg-6 col-md-6">
                           <div class="copyright_text pt-20">
                               <p>{{$site_data->footer_text}}</p>
                           </div>
                       </div>
                       <div class="col-xl-6 col-lg-6 col-md-6">
                           <div class="footer_social f-right">
                               <span>Follow us</span>
                               <a href="{{$site_data->fb_link}}"><i class="fab fa-twitter"></i></a>
                               <a href="{{$site_data->insta_link}}"><i class="fab fa-facebook-f"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- FOOTER END -->
