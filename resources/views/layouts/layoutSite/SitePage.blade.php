<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> {{$site_name}}</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/img/logom.png' )}}">
    @notifyCss

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="{{asset('/assets/css/vendor/bootstrap.min.css' )}}"> -->
    <!-- Pe-icon-7-stroke CSS -->
    <!-- Slick slider css -->
    <!-- <link rel="stylesheet" href="{{asset('/assets/css/plugins/slick.min.css' )}}"> -->
    <!-- animate css -->
    <!-- <link rel="stylesheet" href="{{asset('/assets/css/plugins/animate.css' )}}"> -->
    <!-- Nice Select css -->
    <!-- <link rel="stylesheet" href="{{asset('/assets/css/plugins/nice-select.css' )}}"> -->
    <!-- jquery UI css -->
    <!-- <link rel="stylesheet" href="{{asset('/assets/css/plugins/jqueryui.min.css' )}}"> -->
    

    <link rel="stylesheet" href="{{asset('/assets/css/New/style.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('/assets/css/vendor/pe-icon-7-stroke.css' )}}"> -->
    <link href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css" rel="stylesheet">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/vendor/font-awesome.min.css' )}}">

    <link rel="stylesheet" href="{{asset('/assets/css/New/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/New/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/New/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!--== Main Style CSS ==--> 
    <!-- @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    <link href="{{asset('/assets/css/stylertl.css?'.time() )}}" rel="stylesheet" />
     @else
    <link href="{{asset('/assets/css/style.css?'.time() )}}" rel="stylesheet" />
    @endif
    -->

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
 
    @include('layouts.layoutSite.Header')
    <main>
     <x:notify-messages/>
      @yield('content')
      <div class="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6 mb-2">
                <div class="service text-center">
                    <i class="pe-7s-plane fs-2"></i>
                    <h6>{{__('Delivery Service')}}</h6>
                    <p>{{__('All orders will be delivered as soon as possible')}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-6 mb-2">
                <div class="service text-center">
                    <i class="fs-2 pe-7s-help2"></i>
                    <h6>{{__('Customers service')}}</h6>
                    <p>{{__('We are available on WhatsApp / Facebook or phone to help you')}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-6 mb-2">
                <div class="service text-center">
                    <i class="fs-2 pe-7s-back"></i>
                    <h6>{{__('Unique products')}}</h6>
                    <p>{{__('We have many different products')}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-6 mb-2">
                <div class="service text-center">
                    <i class="fs-2 pe-7s-credit"></i>
                    <h6>{{__('Paying online is very safe')}}</h6>
                    <p>{{__('Payment service is safe')}}<span>100%</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
      <!-- <div class="service-policy " dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" style="background-color:#50090e">
            <div class="container">
                <div class="policy-block section-padding">
                    <div class="row mtn-30">
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-plane" style="color:white"></i>
                                </div>
                                <div class="policy-content text-center">
                                    <h6 style="color:white">{{__('Delivery Service')}}</h6>
                                    <p style="color:white">{{__('All orders will be delivered as soon as possible')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-help2" style="color:white"></i>
                                </div>
                                <div class="policy-content text-center">
                                    <h6 style="color:white">{{__('Customers service')}}</h6>
                                    <p style="color:white">{{__('We are available on WhatsApp / Facebook or phone to help you')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-back" style="color:white"></i>
                                </div>
                                <div class="policy-content text-center">
                                    <h6 style="color:white">{{__('Unique products')}}</h6>
                                    <p style="color:white">{{__('We have many different products')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-credit" style="color:white"></i>
                                </div>
                                <div class="policy-content text-center">
                                    <h6 style="color:white">{{__('Paying online is very safe')}}</h6>
                                    <p style="color:white">{{__('Payment service is safe')}}<span>100%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </main>
  @include('layouts.layoutSite.Footer')
  <!--Start of Tawk.to Script-->
 
<!--End of Tawk.to Script-->
  @notifyJs
  <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a1a75d5546.js" crossorigin="anonymous"></script>
    <!-- Modernizer JS -->
    <!-- <script src="{{asset('/assets/js/vendor/modernizr-3.6.0.min.js' )}}"></script> -->
    <!-- jQuery JS -->
    <script src="{{asset('/assets/js/vendor/jquery-3.6.0.min.js' )}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('/assets/js/vendor/bootstrap.bundle.min.js' )}}"></script>
    <!-- slick Slider JS -->
    <!-- <script src="{{asset('/assets/js/plugins/slick.min.js' )}}"></script> -->
    <!-- Countdown JS -->
    <!-- <script src="{{asset('/assets/js/plugins/countdown.min.js' )}}"></script> -->
    <!-- Nice Select JS -->
    <!-- <script src="{{asset('/assets/js/plugins/nice-select.min.js' )}}"></script> -->
    <!-- jquery UI JS -->
    <script src="{{asset('/assets/js/plugins/jqueryui.min.js' )}}"></script>
    <!-- Image zoom JS -->
    <!-- <script src="{{asset('/assets/js/plugins/image-zoom.min.js' )}}"></script> -->
    <!-- Images loaded JS -->
    <!-- <script src="{{asset('/assets/js/plugins/imagesloaded.pkgd.min.js' )}}"></script> -->
    <!-- mail-chimp active js -->
    <!-- <script src="{{asset('/assets/js/plugins/ajaxchimp.js' )}}"></script> -->
    <!-- contact form dynamic js -->
    <!-- <script src="{{asset('/assets/js/plugins/ajax-mail.js' )}}"></script> -->
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <!-- <script src="{{asset('/assets/js/plugins/google-map.js' )}}"></script> -->
    <!-- Main JS -->
    <!-- <script src="{{asset('/assets/js/main.js' )}}"></script> -->
    <script src="{{asset('/assets/js/New/popper.min.js' )}}"></script>
    <script src="{{asset('/assets/js/New/swiper-bundel.min.js' )}}"></script>

    <script src="{{asset('/assets/js/New/main.js' )}}"></script>



  @stack('js')
  <script>
$('#subscriber_btn').on('click' , function (e) {
            
           // $(document).find('#errsu').remove();
            e.preventDefault();
             $('#errsu').remove();
            $.ajax({
                type: "post",
                url: "{{ route('subscriber') }}",
                data: $("#subscriber").serialize(),
                dataType: 'json',              // let's set the expected response format
                success: function (data) {
                    //console.log(data);
                    $('#success_message_subscriber').fadeIn().html('<div class="text-success border-0">' + data.message +'</div>');
                    // document.body.scrollTop = document.documentElement.scrollTop = 0;
                    document.getElementById('a1').value = '';
                   


                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                         
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                           //el.nextAll().remove();
                           $('#success_message_subscriber').fadeIn().html('<div class="text-danger border-0"> '+ error[0] +'</div>');

                            
                        });
                    }
                }
            });

        });
</script>
  </body>
  </html>