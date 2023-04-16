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

<footer>
    <div class="container">
        <div class="custom">
            <div class="social-icons d-flex justify-content-center">
                <ul class="list-unstyled d-flex gap-2">
                    <li class="text-center">
                        <img src="{{asset('assets/img/New/0147-removebg-preview.png')}}" alt="">
                        <a href="{{$facebook_link}}"><i class="fs-4 fa fa-facebook"></i></a>
                    </li>
                    <li class="text-center">
                        <img src="{{asset('assets/img/New/0147-removebg-preview.png')}}" alt="">
                        <a href="{{$twitter_link}}"><i class="fs-4 fa fa-twitter"></i></a>&nbsp; 
                    </li>
                    <li class="text-center">
                        <img src="{{asset('assets/img/New/0147-removebg-preview.png')}}" alt="">
                        <a href="{{$instagram_link}}"><i class="fs-4 fa fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
    
            <div class="Subscribe input-group mb-3">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary" type="button">Subscribe</button>
                </div>
                <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
    
            <div class="foot">
                <div class="row">
                    <div class="col-lg-4 text-center">
                        <ul class="list-unstyled">
                            <li><a href="{{route('questions')}}">{{__('Common questions')}}</a></li>
                            <li><a href="{{route('register')}}">{{__('Register')}}</a></li>
                            <li><a href="{{route('login')}}">{{__('Sign In')}}</a></li>
                            <li><a href="{{route('about')}}">{{__('About Us')}}</a></li>
                            <li><a href="{{route('Shipping')}}">{{__('Shipping and receiving')}}</a></li>
                            <li><a href="{{route('policy')}}">{{__('Privacy policy')}}</a></li>
                            <li><a href="{{route('conditions')}}">{{__('Terms and Conditions')}}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 text-center customm">
                        <img src="{{asset('storage/users/logo.png' )}}" alt="">
                    </div>
                    <div class="col-lg-4 text-md-center text-sm-center text-lg-end text-center">
                        <a href="{{route('about')}}" class="who-us text-decoration-none">{{__('About Us')}}</a>
                        <p class="text-dark fs-4">  {{__('Welcome To')}}  </p>
                        <p class="text-dark" dir="rtl">  

                        <span class="fw-bold mb-2 d-block"> {{__('Shop Laha .. À ELLE BOUTIQUE')}} </span>
                        {{__('Our boutique is a diverse Emirati brand.. We specialize in designing various dresses, abayas, etc.. We also provide bags and shoes that suit all different occasions, and we strive to provide everything that is new and distinguished. needs..')}}
                        <span class="fw-bold mt-2 d-block">{{__('We seek to serve you with love.. 🤍')}}
                        </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p class="text-center mt-2">{{__('Copyright NTS')}} &copy;</p> 
        </div>
    </div>
</footer>
