<div class="floating-whatsapp">
    <a href="https://wa.me/9710501009004">
        <img src="{{ asset('whatsapp.png') }}" alt="WhatsApp Icon">
    </a>
</div>

    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>

    {{-- <footer class="footer-widget-area" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
        <div class="footer-top " style=" padding: 55px 40px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <div class="widget-title">
                                <div class="widget-logo">
                                    <a href="{{ route('viewHomePage') }}">
                                        <img src="{{ asset('storage/users/' . $header_logo) }}" alt=" logo">
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
                                @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
{!! $address !!}
@else
{!! $addressen !!}
@endif
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                             <div class="widget-body">
                                <ul class="info-list">
                                  <li><a href="{{ route('questions') }}">{{ __('Common questions') }}</a></li>
                                  <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                  <li><a href="{{ route('login') }}">{{ __('Sign In') }}</a></li>
                                  <li><a href="{{ route('about') }}">{{ __('About Us') }}</a></li>
                                  <li><a href="{{ route('Shipping') }}">{{ __('Shipping and receiving') }}</a></li>
                                  <li><a href="{{ route('policy') }}">{{ __('Privacy policy') }}</a></li>
                                  <li><a href="{{ route('conditions') }}">{{ __('Terms and Conditions') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="newsletter-wrapper">
                            <h6 class="widget-title-text">{{ __('Newsletter subscription') }}</h6>

                            <form name="subscriber" id="subscriber" enctype="multipart/form-data" method="post" action="" class="newsletter-inner"  >
                            @csrf
                              <input type="email" class="news-field" id="mc-email" type="email" name="email" maxlength="90" id="a1" placeholder="{{ __('Enter email') }}">
                                <button class="news-btn" type="button"  id="subscriber_btn">Subscribe</button>
                            </form>
                            <div id="success_message_subscriber"></div>

                            
                        </div><br>
                        <div class="widget-item">
                             <div class="widget-body social-link">
                                 <a href="{{ $facebook_link }}"><i class="fa fa-facebook"></i></a>
                                <a href="{{ $instagram_link }}"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mt-20">
                      
                    <div class="copyright-text text-end">
                        <p class="copyright">Copyright © <a target="_blank" href="https://instagram.com/nanots.ae?igshid=Yzg5MTU1MDY=" >{{ __('Copyright reserved to Nano Technology Solutions') }} </a></p>
 
                    </div>
                </div>
            </div>
        </div>
         
    </footer>  --}}

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
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'ltr')
        <?php
            $row_reverse = 'flex-row-reverse';
            $text = 'text-start';
        ?>
        <style>
            .accordion-button::after{
                margin-right: unset !important;
                margin-left: auto !important;

            }
        </style>
    @else
    <?php
        $row_reverse = 'flex-row';
        $text = 'text-end'
    ?>
    @endif
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed {{$row_reverse}}" type="button" dir="rtl" data-bs-toggle="collapse"
                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                {{ __('Customer Service') }}
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <ul class="list-unstyled mb-0 {{$text}}" dir="rtl">
                    <li><a class="text-dark" href="{{ route('questions') }}">{{ __('Common questions') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed {{$row_reverse}}" dir="rtl" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                {{ __('For you') }}
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
            data-bs-parent="#accordionExample">
            <div class="accordion-body" dir="rtl">
                <ul class="list-unstyled mb-0 {{$text}}">
                    <li class="mb-3"><a class="text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    <li class="mb-3"><a class="text-dark" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                    </li>
                    <li><a class="text-dark" href="{{ route('viewMyAccountcatogery') }}">{{ __('Categories') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed {{$row_reverse}}" dir="rtl" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                {{ __('Oudz') }}
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
            data-bs-parent="#accordionExample">
            <div class="accordion-body" dir="rtl">
                <ul class="list-unstyled mb-0 {{$text}}">
                    {{-- <li class="mb-3"><a class="text-dark" href="{{route('about')}}">{{__('About Us')}}</a></li>  --}}
                    <li class="mb-3"><a class="text-dark"
                            href="{{ route('policy') }}">{{ __('Privacy policy') }}</a></li>
                    <li><a class="text-dark" href="{{ route('conditions') }}">{{ __('Terms and Conditions') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- End of Footer -->
<footer>
    <div class="container">
        <div class="custom">
            <div class="foot">
                <div class="row">
                    <div class="col-lg-3 col-6 text-end order-lg-1 order-3 sm-footer">
                        <h4>{{ __('Oudz') }}</h4>
                        <ul class="list-unstyled">
                            {{-- <li><a href="{{route('about')}}">{{__('About Us')}}</a></li>  --}}
                            <li><a href="{{ route('policy') }}">{{ __('Privacy policy') }}</a></li>
                            <li><a href="{{ route('conditions') }}">{{ __('Terms and Conditions') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-6 text-end order-lg-3 order-2 sm-footer">
                        <h4>{{ __('Customer Service') }}</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('questions') }}">{{ __('Common questions') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-12 text-end order-lg-2 order-4 sm-footer">
                        <h4>{{ __('For you') }}</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('register') }}">{{ __('Registration') }}</a></li>
                            <li><a href="{{ route('login') }}">{{ __('Sign In') }}</a></li>
                            <li><a href="{{ route('viewMyAccountcatogery') }}">{{ __('Categories') }}</a></li>

                        </ul>
                    </div>
                    <div class="col-lg-3 text-end order-lg-4 order-1">
                        <div class="text-center"><a href="{{ route('viewHomePage') }}"><img
                                    src="{{ asset('storage/users/' . $header_logo) }}" width="80"
                                    class="img-fluid" alt=" logo"></a></div>
                        @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                            <p class="my-3 {{$text}}" dir="ltr">
                                {{ strip_tags($section5_details) }}
                            </p>
                        @else
                            <p class="my-3 {{$text}}" dir="rtl">
                                {{ strip_tags($section5_details_en) }}  
                        @endif

                        <div class="social-icons d-flex justify-content-between">
                            <ul class="list-unstyled d-flex gap-2 justify-content-center w-100">
                                <li class="text-center">
                                    <a href="{{ $instagram_link }}"><i class="fs-4 fa fa-instagram"></i></a>
                                </li>
                                <li class="text-center">
                                    <a href="{{ $facebook_link }}"><i class="fs-4 fa fa-snapchat"></i></a>
                                </li>
                                {{-- <li class="text-center">
                                    <a href=""><img src="{{asset('cash-on-delivery.png')}}" alt="image1"></a>
                                </li>
                                <li class="text-center">
                                    <a href="{{route('sendWhatsAppMessage')}}"><img src="{{asset('visa.png')}}" alt="image2"></a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<div class="bg-light copyright">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="https://instagram.com/nanots.ae?igshid=YmMyMTA2M2Y=" class="text-decoration-none text-dark"
                target="_blank">
                <p class="text-center">{{ __('Copyright NTS') }} &copy;</p>
            </a>
            <div class="imgs-copyright">
                <img src="{{ asset('assets/img/cash-color.svg') }}" width="50">
                <img src="{{ asset('assets/img/mastercard-color.svg') }}" width="50">
                <img src="{{ asset('assets/img/visa-color-v2.png') }}" width="50">
            </div>
        </div>
    </div>
</div>
