 <header class="header-area header-wide bg-gray" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
         {{-- <div class="main-header d-none d-lg-block">
            <div class="header-top bdr-bottom">
                <div class="container">
                    <div class="row align-items-center">
                    <div class="col-lg-6">
                    @if(Auth::user())@else
              
                           <a href="{{route('login')}}" style="color:#c29958" >
                            {{ __('Sign In') }}
                              </a>  &nbsp;
                              / &nbsp; 
                           <a  href="{{route('register')}}" style="color:#c29958">
                            {{ __('Register') }}
                              </a>  
                       
                          @endif
                          
                          </div>

                    </div>
                </div>
            </div>

            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="{{route('viewHomePage')}}">
                                    <img src="{{asset('storage/users/'. $header_logo )}}" alt=" logo">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-5 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li><a href="{{route('viewHomePage')}}">{{__('Home')}} </a></li>
                                            <li ><a>{{__('Shop by category')}} <i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown">
                                                @foreach($categories as $category)
                                                <li><a href="{{route('category_property',$category->id)}}">@if($category->name_en != null)
                                                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                    {{$category->name}}
                                                    @else
                                                    {{$category->name_en}}
                                                    @endif @else
                                                    {{$category->name}}
                                                    @endif</a></li>
                                                @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="{{route('products')}}">{{__('Our products')}}</a></li>
                                            <li><a href="{{route('about')}}">{{__('About Us')}}</a></li> 
                                                 
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <div class="header-search-container">
                                    <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                    <form class="header-search-box d-lg-none d-xl-block" action="{{ route('search_property')}}" method="GET">
                                        <input type="text" name="title" placeholder="{{__('Search entire store hire')}}" class="header-search-field bg-white">
                                        <button type="submit" class="header-search-btn"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                    <li >
                                            <a href="{{route('viewMyAccount')}}">
                                            <i class="pe-7s-user"></i>&nbsp;<span style="font-size: 12px; color:#c29958;">{{ __('My account') }}</span>
                                            </a> &nbsp; 
                                        </li>
                                        <li>
                                            <a href="{{route('wishlist')}}">
                                                <i class="pe-7s-like"></i><span style="font-size: 12px; color:#c29958;">{{ __('Favorite') }}</span>
                                             </a> 
                                        </li>
                                        <li>
                                            <a href="{{route('cart.index')}}" >
                                                <i class="pe-7s-shopbag"></i><span style="font-size: 12px; color:#c29958;">{{ __('Cart') }}</span>
                                             </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> --}}
        <div class="mobile-header d-lg-none d-md-block sticky fixed-bottom shadow-lg">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <a href="{{route('viewHomePage')}}">
                                        <i class="text-light pe-7s-home"></i>
                                        <span class="d-block text-light">{{__('Home')}}</span>
                                     </a>
                                    <a href="{{route('viewMyAccount')}}">  
                                        <i class="text-light pe-7s-user-female"></i>
                                        <span class="d-block text-light">{{__('user')}}</span>
                                    </a>
                                    <a href="{{route('cart.index')}}">
                                        <i class="text-light pe-7s-cart"></i>
                                        <span class="d-block text-light">{{__('Cart')}}</span>
                                     </a>
                                    <a href="{{route('wishlist')}}">
                                        <i class="text-light pe-7s-like"></i>
                                        <span class="d-block text-light">{{__('Favorite')}}</span>
                                    </a>
                                    <div class="header-top-settings text-end">
                                        <ul class="p-0 m-0">
                                            <li class="language">
                                                @if ( Config::get('app.locale') == 'en')
                                
                                                <img src="{{asset('assets/img/English.png' )}}" width="25" alt="logo">
                                             
                                                @elseif ( Config::get('app.locale') == 'ar' )
                                             
                                                <img src="{{asset('assets/img/العربية.png' )}}" width="25" alt="logo">
                                             
                                                @endif
                                             
                                                {{-- {{ LaravelLocalization::getCurrentLocaleNative() }} --}}
                                                {{-- <i class="fa fa-angle-down"></i> --}}
                                                <ul class="dropdown-list curreny-list">
                                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <li>
                                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    <img src="{{asset('assets/img/'. $properties['native'] .'.png' )}}" width="25" class="m-0" alt="logo"> {{ $properties['native'] }} 
                                                    </a>
                                                </li>
                                                @endforeach
                                                 </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <aside class="off-canvas-wrapper">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="pe-7s-close"></i>
                </div>

                <div class="off-canvas-inner">
                    <div class="search-box-offcanvas">
                        <form action="{{ route('search_property')}}" method="GET">
                            <input type="text"  name="title" placeholder="{{__('Search entire store hire')}}">
                            <button type="submit" class="search-btn"><i class="pe-7s-search"></i></button>
                        </form>
                    </div>

                    <div class="mobile-navigation">

                        <nav>
                            <ul class="mobile-menu">
                            <li><a href="{{route('viewHomePage')}}"> {{__('Home')}} </a></li> 

                                <li class="mega-title menu-item-has-children"><a href="#">{{__('Shop by category')}}</a>
                                    <ul class="dropdown">
                                    @foreach($categories as $category)
                                    <li><a href="{{route('category_property',$category->id)}}">@if($category->name_en != null)
                                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                    {{$category->name}}
                                    @else
                                    {{$category->name_en}}
                                    @endif @else
                                    {{$category->name}}
                                    @endif</a></li>
                                    @endforeach 
                                    </ul>
                                </li>
                                <li><a href="{{route('products')}}">{{__('Our products')}}</a></li>
                                <li><a href="{{route('about')}}">{{__('About Us')}}</a></li> 
                                
                            </ul>
                        </nav>
                    </div>

                    <div class="mobile-settings">
                        <ul class="nav">
                            <li>
                                <div class="dropdown mobile-top-dropdown">
                                    <a href="#" class="dropdown-toggle" id="currency" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ LaravelLocalization::getCurrentLocaleNative() }}

                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="currency">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                        @endforeach   
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>

                    <div class="offcanvas-widget-area">

                    </div>
                </div>
            </div>
        </aside>
    </header> 

<div class="header shadow">
        <div class="nav">
            <div class="d-flex justify-content-between w-100">
                <div class="icons d-flex">
                    <ul class="list-unstyled d-flex gap-1">
                        <li>
                            <img src="{{asset('assets/img/New/0147-removebg-preview.png' )}}" class="custom-img" alt=" logo">
                            <a href="{{route('wishlist')}}">
                                <i class="text-dark pe-7s-like"></i>
                            </a>
                        </li>
                        <li>
                            <img src="{{asset('assets/img/New/0147-removebg-preview.png' )}}" class="custom-img" alt="logo">
                            <a href="{{route('cart.index')}}">
                                <img src="{{asset('assets/img/New/icons__Recovered__7-removebg-preview.png' )}}" alt=" logo">
                            </a>
                        </li>
                        <li>
                            <img src="{{asset('assets/img/New/0147-removebg-preview.png' )}}" class="custom-img" alt=" logo">
                            <a href="{{route('viewMyAccount')}}">
                                <img src="{{asset('assets/img/New/icons__Recovered___5_-removebg-preview (1).png' )}}" alt=" logo">
                            </a>
                        </li>
                    </ul>
                    <div class="header-top-settings">
                        <ul>
                            <li class="language">
                                @if ( Config::get('app.locale') == 'en')

                                <img src="{{asset('assets/img/English.png' )}}" width="25" alt="logo">
                             
                                @elseif ( Config::get('app.locale') == 'ar' )
                             
                                <img src="{{asset('assets/img/العربية.png' )}}" width="25" alt="logo">
                             
                                @endif
                             
                                {{-- {{ LaravelLocalization::getCurrentLocaleNative() }} --}}
                                {{-- <i class="fa fa-angle-down"></i> --}}
                                <ul class="dropdown-list curreny-list">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <img src="{{asset('assets/img/'. $properties['native'] .'.png' )}}" width="25" class="m-0" alt="logo"> {{ $properties['native'] }} 
                                    </a>
                                </li>
                                @endforeach
                                 </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <div class="d-flex ">
                           <div class="search-box-offcanvas position-relative">
                           <img src="{{asset('assets/img/New/0147-removebg-preview.png' )}}" class="custom-img end-0" width="25" alt="logo">
                               <form action="{{ route('search_property')}}" method="GET">
                                   <input type="text"  name="title" placeholder="{{__('Search entire store hire')}}">
                                   <button type="submit" class="search-btn"><i class="pe-7s-search"></i></button>
                               </form>
                           </div>
                           @if(Auth::user())
                           @else
             
                           <div class="login login-lg">
                           <ul class="list-unstyled d-flex">
                               <li class="px-2 ps-3"><a href="{{route('login')}}">{{ __('Sign In') }}</a></li>
                               <li><a href="{{route('register')}}">{{ __('Register') }}</a></li>
                           </ul>
                           </div>
                      
                           @endif
                         
                       <div class="menu-icon">
                           <i class="fas fa-bars ms-3 fs-2"></i>
                       </div>
                   </div>
               </div>
                <div class="logo logo-lg text-center">
                    <!-- <img src="{{asset('storage/users/'. $header_logo )}}" alt=" logo"> -->
                    <img src="{{asset('storage/users/logo.png' )}}" width="150" class="img-fluid" alt=" logo">
                </div>
            </div>
        </div>
</div>
<div class="logo-sm text-center">
    <!-- <img src="{{asset('storage/users/'. $header_logo )}}" width="250" class="img-fluid" alt=" logo"> -->
    <img src="{{asset('storage/users/logo.png' )}}" width="150" class="img-fluid" alt=" logo">
</div>
{{-- <div class="hiden-menu text-center py-2">
    <i class="fa fa-window-close	position-absolute close"></i>
    <ul class="list-unstyled">
        <li class="mb-3"><a href="{{route('viewHomePage')}}" class="text-decoration-none">الرئيسية</a></li>
        <li class="mb-3"><a href="" class="text-decoration-none">تسوق حسب الفئة</a>
        @if(Auth::user())
        @else
        <li class="mb-3"><a href="{{route('login')}}" class="text-decoration-none">{{ __('Sign In') }}</a>
        <li class="mb-3"><a href="{{route('register')}}" class="text-decoration-none">{{ __('Register') }}</a></li>
        @endif
        <li class="mb-3"><a href="contact.html" class="text-decoration-none">تواصل معنا</a></li>
        <li>
            <form action="{{ route('search_property')}}" method="GET">
                <input type="text" name="title" placeholder="أدخل كلمة البحث هنا">
                <button type="submit" class="search-btn"><i class="pe-7s-search"></i></button>
            </form>
        </li>
    </ul>
</div>  --}}


<!--=========================================================== start links ==============================================-->
<div class="links">
    <ul class="list-unstyled d-flex justify-content-center">
        <li><a href="{{route('products')}}" class="text-decoration-none">{{__('Products')}}</a></li>
        <li><a href="{{route('about')}}" class="text-decoration-none">{{__('About Us')}}</a></li>
        <li>
            <a href="" class="text-decoration-none">{{__('Categories')}}</a>
            <ul class="hiden-links list-unstyled text-center">
                @foreach($categories as $category)
                <li><a href="{{route('category_property',$category->id)}}">@if($category->name_en != null)
                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                {{$category->name}}
                @else
                {{$category->name_en}}
                @endif @else
                {{$category->name}}
                @endif</a></li>
                @endforeach             
            </ul>
        </li>
        <li><a href="{{route('viewHomePage')}}" class="text-decoration-none">
            <i class="fa fa-home"></i>
        </a></li>
    </ul>
</div>
