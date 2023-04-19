<!-- 
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>

    <footer class="footer-widget-area" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
        <div class="footer-top " style=" padding: 55px 40px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <div class="widget-title">
                                <div class="widget-logo">
                                    <a href="{{route('viewHomePage')}}">
                                        <img src="{{asset('storage/users/'. $header_logo )}}" alt=" logo">
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                             <div class="widget-body">
                                <address class="contact-block">
                                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                    {!!$address!!}
                        @else
                        {!!$addressen!!}
                      @endif
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                             <div class="widget-body">
                                <ul class="info-list">
                                  <li><a href="{{route('questions')}}">{{__('Common questions')}}</a></li>
                                  <li><a href="{{route('register')}}">{{__('Register')}}</a></li>
                                  <li><a href="{{route('login')}}">{{__('Sign In')}}</a></li>
                                  <li><a href="{{route('about')}}">{{__('About Us')}}</a></li>
                                  <li><a href="{{route('Shipping')}}">{{__('Shipping and receiving')}}</a></li>
                                  <li><a href="{{route('policy')}}">{{__('Privacy policy')}}</a></li>
                                  <li><a href="{{route('conditions')}}">{{__('Terms and Conditions')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="newsletter-wrapper">
                            <h6 class="widget-title-text">{{__('Newsletter subscription')}}</h6>

                            <form name="subscriber" id="subscriber" enctype="multipart/form-data" method="post" action="" class="newsletter-inner"  >
                            @csrf
                              <input type="email" class="news-field" id="mc-email" type="email" name="email" maxlength="90" id="a1" placeholder="{{__('Enter email')}}">
                                <button class="news-btn" type="button"  id="subscriber_btn">Subscribe</button>
                            </form>
                            <div id="success_message_subscriber"></div>

                            
                        </div><br>
                        <div class="widget-item">
                             <div class="widget-body social-link">
                                 <a href="{{$facebook_link}}"><i class="fa fa-facebook"></i></a>
                                 <a href="{{$twitter_link}}"><i class="fa fa-twitter"></i></a>&nbsp; 
                                <a href="{{$instagram_link}}"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mt-20">
                      
                    <div class="copyright-text text-end">
                        <p class="copyright">Copyright © <a target="_blank" href="https://instagram.com/nanots.ae?igshid=Yzg5MTU1MDY=" >{{__('Copyright reserved to Nano Technology Solutions')}} </a></p>
 
                    </div>
                </div>
            </div>
        </div>
         
    </footer> -->

{{-- <footer>
    <div class="container">
        <div class="foot">
            <div class="row">
                <div class="col-lg-4 text-end">
                    <img src="{{asset('storage/users/logo.png' )}}" alt="">
                    <form class="Subscribe input-group mb-3" id="subscriber" enctype="multipart/form-data" method="get">
                        @csrf
                        <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="submit">Subscribe</button>
                        </div>
                        <input type="email" class="form-control" aria-label="" aria-describedby="basic-addon1" name="email" maxlength="90" id="a1" placeholder="{{__('Enter email')}}">
                        <div id="success_message_subscriber"></div>
                    </form>
                </div>
                <div class="col-lg-4 text-end">
                    <p class="text-dark fs-4" dir="rtl">روابط</p>
                    <ul class="list-styled">
                        <li><a href="{{route('questions')}}">{{__('Common questions')}}</a></li>
                        <li><a href="{{route('register')}}">{{__('Register')}}</a></li>
                        <li><a href="{{route('login')}}">{{__('Sign In')}}</a></li>
                        <li><a href="{{route('about')}}">{{__('About Us')}}</a></li>
                        <li><a href="{{route('Shipping')}}">{{__('Shipping and receiving')}}</a></li>
                        <li><a href="{{route('policy')}}">{{__('Privacy policy')}}</a></li>
                        <li><a href="{{route('conditions')}}">{{__('Terms and Conditions')}}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 text-md-center text-sm-center text-lg-end text-end">
                    <p class="text-dark fs-4" dir="rtl">شركة  <br>A ELLE BOUTIQUE </p>
                    <div class="social-icons d-flex justify-content-end">
                        <ul class="list-unstyled d-flex gap-2">
                            <li class="text-center">
                                <img src="{{asset('assets/img/New/0147-removebg-preview.png')}}" alt="">
                                <a href="{{$facebook_link}}"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="text-center">
                                <img src="{{asset('assets/img/New/0147-removebg-preview.png')}}" alt="">
                                <a href="{{$twitter_link}}"><i class="fa fa-twitter"></i></a>&nbsp; 
                            </li>
                            <li class="text-center">
                                <img src="{{asset('assets/img/New/0147-removebg-preview.png')}}" alt="">
                                <a href="{{$instagram_link}}"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white p-2">
        <p class="text-center mt-2">Copyright &copy; NTS</p>
    </div>
</footer> --}}
<div class="accordion footer-accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" dir="rtl" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          خدمات العملاء
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <ul class="list-unstyled mb-0" dir="rtl">
                <li><a class="text-dark" href="{{route('questions')}}">{{__('Common questions')}}</a></li>
            </ul>       
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" dir="rtl" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          لك
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body" dir="rtl">
            <ul class="list-unstyled mb-0">
                <li class="mb-3"><a class="text-dark" href="{{route('register')}}">{{__('Register')}}</a></li>
                <li><a class="text-dark" href="{{route('login')}}">{{__('Sign In')}}</a></li>
            </ul>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" dir="rtl" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          اودز
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body" dir="rtl">
            <ul class="list-unstyled mb-0">
                <li class="mb-3"><a class="text-dark" href="{{route('about')}}">{{__('About Us')}}</a></li> 
                <li class="mb-3"><a class="text-dark" href="{{route('policy')}}">{{__('Privacy policy')}}</a></li>
                <li><a class="text-dark" href="{{route('conditions')}}">{{__('Terms and Conditions')}}</a></li>
            </ul>
        </div>
      </div>
    </div>
  </div>
<footer>
    <div class="container">
        <div class="custom">
            {{-- <h3 class="text-center mb-5">انضم لنشرتنا و تابع كل ماهو جديد</h3>
            <div class="Subscribe mb-3 d-flex">
                <div class="input-group-prepend">
                  <button class="subscribe-field-btn" type="button">Subscribe</button>
                </div>
                <input type="text" class="subscribe-field" placeholder="أدخل الايميل" aria-label="" aria-describedby="basic-addon1">
            </div> --}}
            {{-- <hr class="my-5 custom-hr"> --}}
            <div class="foot">
                <div class="row">
                    <div class="col-lg-3 col-6 text-end order-lg-1 order-3 sm-footer">
                        <h4>اودز</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{route('about')}}">{{__('About Us')}}</a></li> 
                            <li><a href="{{route('policy')}}">{{__('Privacy policy')}}</a></li>
                            <li><a href="{{route('conditions')}}">{{__('Terms and Conditions')}}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-6 text-end order-lg-3 order-2 sm-footer">
                        <h4>خدمات العملاء</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{route('questions')}}">{{__('Common questions')}}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-12 text-end order-lg-2 order-4 sm-footer">
                        <h4>لك</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{route('register')}}">{{__('Register')}}</a></li>
                            <li><a href="{{route('login')}}">{{__('Sign In')}}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 text-end order-lg-4 order-1">
                        <div class="text-center"><img src="{{asset('storage/users/'. $header_logo )}}" width="80" class="img-fluid" alt=" logo"></div>
                        <p class="my-3">بإدخال عنوان بريدك الإلكتروني أدناه ، فإنك توافق على تلقي رسائلنا الإخبارية مع إمكانية الوصول إلى أحدث مجموعاتنا وفعالياتنا ومبادراتنا. يتم توفير مزيد من التفاصيل حول هذا في سياسة الخصوصية الخاصة بنا.
                        </p>
                        <div class="social-icons d-flex justify-content-between">
                            <ul class="list-unstyled d-flex gap-2 justify-content-center w-100">
                                {{-- <li class="text-center">
                                    <a href="{{$facebook_link}}"><i class="fs-4 fa fa-facebook"></i></a>
                                </li>
                                <li class="text-center">
                                    <a href="{{$twitter_link}}"><i class="fs-4 fa fa-twitter"></i></a>&nbsp; 
                                </li> --}}
                                <li class="text-center">
                                    <a href="{{$instagram_link}}"><i class="fs-4 fa fa-instagram"></i></a>
                                </li>
                                <li class="text-center">
                                    <a href=""><i class="fs-4 fa fa-snapchat"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 text-md-center text-sm-center text-lg-end text-center">
                        <a href="{{route('about')}}" class="who-us text-decoration-none">{{__('About Us')}}</a>
                        <p class="text-dark fs-4">  {{__('Welcome To')}}  </p>
                        <p class="text-dark" dir="rtl">  

                        <span class="fw-bold mb-2 d-block"> {{__('Shop Laha .. À ELLE BOUTIQUE')}} </span>
                        {{__('Our boutique is a diverse Emirati brand.. We specialize in designing various dresses, abayas, etc.. We also provide bags and shoes that suit all different occasions, and we strive to provide everything that is new and distinguished. needs..')}}
                        <span class="fw-bold mt-2 d-block">{{__('We seek to serve you with love.. 🤍')}}
                        </span>
                        </p>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="bg-light p-2">
            <a href="https://instagram.com/nanots.ae?igshid=YmMyMTA2M2Y=" class="text-decoration-none text-dark" target="_blank"><p class="text-center mt-2">{{__('Copyright NTS')}} &copy;</p> </a>
        </div>
    </div>
</footer>