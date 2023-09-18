<footer class="rbt-footer footer-style-1 bg-color-white overflow-hidden">
    <div class="footer-top">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ url('front') }}/assets/images/logo/logo.png" alt="Edu-cause">
                            </a>
                        </div>

                        <p class="description mt--20" style="text-align: justify;">
                            <span style="font-weight: bold;color: orangered;">EduStage</span> مشروع تعليمي متخصص في التعليم عن بعد من خلال شبكة الإنترنت والتقنيات
                            الحديثة، انطلقت الأكاديمية بشكل رسمي في مايو 2016، بدأ العمل الفعلي في أغسطس 2016 قُبيل العام الدراسي 2016-2017.
                            أكاديمية إديوستيدج للتعليم أونلاين مرخصة ولها سجل تجارى وبطاقة ضريبية
                        </p>
                        {{-- <p class="description mt--20">
                            {!! implode(' ', array_slice(explode(' ', App\Models\Back\AboutAcadmy::where('id', 1)->first()['description']), 0, 37)) !!}
                        </p> --}}

                        <ul class="social-icon social-default justify-content-start">
                            <li><a href="{{ \App\Models\Back\Setting::first()['facebook'] }}/" target="_blank">
                                    <i class="feather-facebook"></i>
                                </a>
                            </li>
                            <li><a href="{{ \App\Models\Back\Setting::first()['twitter'] }}" target="_blank">
                                    <i class="feather-twitter"></i>
                                </a>
                            </li>
                            <li><a href="{{ \App\Models\Back\Setting::first()['linkedin'] }}" target="_blank">
                                    <i class="feather-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget" style="margin-top: 20px;">
                        <h5 class="ft-title">روابط سريعة</h5>
                        <ul class="ft-link">
                            <li>
                            </li>
                            <li>
                                <a href="{{ url('privacy-policy') }}">سياسة الخصوصية</a>
                            </li>
                            <li>
                                <a href="{{ url('policy-to-parent') }}">معلومات هامة لأولياء الأمور</a>
                            </li>
                            <li>
                                <a href="{{ url('teachers-terms') }}">الشروط والأحكام للمدرسين</a>
                            </li>
                            {{-- <li>
                                <a href="{{ url('faqs') }}">الأسئلة الشائعة</a>
                            </li> --}}
                        </ul>

                        <h5 class="ft-title" style="margin-top: 25px;">تواصل معنا</h5>
                        <ul class="ft-link">
                            <li><span>موبايل:</span> <a href="tel:+{{ \App\Models\Back\Setting::first()['phone1'] }}">{{ \App\Models\Back\Setting::first()['phone1'] }}</a></li>
                            <li><span>موبايل:</span> <a href="tel:+{{ \App\Models\Back\Setting::first()['phone2'] }}">{{ \App\Models\Back\Setting::first()['phone2'] }}</a></li>
                            <li><span>البريد الإلكتروني:</span> <a href="mailto:{{ \App\Models\Back\Setting::first()['email'] }}">{{ \App\Models\Back\Setting::first()['email'] }}</a></li>
                        </ul>
                                                
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget">                        
                        <h5 class="ft-title">صفحتنا علي فيس بوك</h5>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fedustage.academy&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=3426359377693920" width="100%" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                        {{-- <form class="newsletter-form mt--20" action="#">
                            <h6 class="w-600">Newsletter</h6>
                            <p class="description">2000+ Our students are subscribe Around the World.<br> Don’t be shy introduce yourself!</p>

                            <div class="form-group right-icon icon-email mb--20">
                                <label for="email">Enter Your Email Here</label>
                                <input id="email" type="email">
                            </div>

                            <div class="form-group mb--0">
                                <button class="rbt-btn rbt-switch-btn btn-gradient radius-round btn-sm" type="submit">
                                    <span data-text="Submit Now">Submit Now</span>
                                </button>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-style-1 ptb--20">
        <div class="container">
            <div class="">
                <p class="rbt-link-hover text-center">
                    جميع الحقوق محفوظة أكاديمية إيديوستيج
                    © {{ date('Y') }} <a href="https://www.linkedin.com/in/farid-negm" target="_blank" style="font-size: 14px;">By. Farid Negm</a>
                </p>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
</footer>


<div class="rbt-progress-parent rbt-backto-top-active">
    <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 97.1876;"></path>
    </svg>
</div>