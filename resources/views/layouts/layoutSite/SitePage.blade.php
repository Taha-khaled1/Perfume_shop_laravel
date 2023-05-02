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
<style>.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* .add-to-favorites i {
    color: #fff;
}

.add-to-favorites.active i {
    color: red;
} */








/* Style for the breadcrumb area */
.ltn__breadcrumb-area {
    padding: 100px 0;
    background-position: center center;
    background-size: cover;
    text-align: center;
}

.ltn__breadcrumb-inner {
    max-width: 800px;
    margin: 0 auto;
}

.ltn__breadcrumb-inner h1 {
    color: #fff;
    font-size: 40px;
    font-weight: 700;
    margin-bottom: 20px;
}

.ltn__breadcrumb-list {
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    font-size: 16px;
    font-weight: 500;
}

.ltn__breadcrumb-list li {
    list-style: none;
    margin: 0 10px;
}

.ltn__breadcrumb-list li a {
    color: #fff;
    text-decoration: none;
}

.ltn__breadcrumb-list li a:hover {
    color: #f2a413;
}

/* Style for the contact address area */
.ltn__contact-address-area {
    margin-top: 100px;
}
.btn-blue {
    background-color: blue;
    color: white;
}
.ltn__contact-address-item {
    text-align: center;
    padding: 30px;
    border-radius: 5px;
    transition: all 0.3s ease;
    background-color: #fff;
    margin-bottom: 30px;
}

.ltn__contact-address-item:hover {
    transform: translateY(-10px);
    box-shadow: 0px 20px 50px rgba(0, 0, 0, 0.2);
}

.ltn__contact-address-icon {
    font-size: 50px;
    color: #f2a413;
    margin-bottom: 20px;
}

.ltn__contact-address-item h3 {
    font-size: 24px;
    font-weight: 700;
    color: #111;
    margin-bottom: 10px;
}

.ltn__contact-address-item p {
    font-size: 16px;
    color: #777;
    margin: 0;
}

/* Style for the contact message area */
.ltn__form-box {
    background-color: #fff;
    padding: 50px;
    border-radius: 5px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
}

.ltn__form-box h4 {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 30px;
    color: #111;
}

.ltn__form-box .form-group label {
    font-size: 16px;
    font-weight: 500;
    color: #777;
    margin-bottom: 10px;
}

.ltn__form-box .form-control {
    height: 50px;
    border-radius: 5px;
    margin-bottom: 20px;
    font-size: 16px;
    color: #111;
    padding: 0 20px;
    border: 1px solid #ccc;
}

.ltn__form-box .form-control:focus {
    outline: none;
    box-shadow: none;
    border-color: #f2a413;
}

.ltn__form-box .form-control::-webkit-input-placeholder {
    color: #999;
}

.ltn__form-box .form-control::-moz-placeholder {
    color: #999;
}

.ltn__form-box .form-control:-ms-input-placeholder {
    color: #999;
}























Style for the breadcrumb area /
.ltn__breadcrumb-area {
position: relative; / Add position */
padding: 100px 0;
background-position: center center;
background-size: cover;
text-align: center;
}

.ltn__breadcrumb-inner {
max-width: 800px;
margin: 0 auto;
}

.ltn__breadcrumb-inner h1 {
color: #fff;
font-size: 40px;
font-weight: 700;
margin-bottom: 20px;
text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5); /* Add text shadow */
}

.ltn__breadcrumb-list {
display: flex;
justify-content: center;
align-items: center;
color: #fff;
font-size: 16px;
font-weight: 500;
}

.ltn__breadcrumb-list li {
list-style: none;
margin: 0 10px;
}

.ltn__breadcrumb-list li a {
color: #fff;
text-decoration: none;
}

.ltn__breadcrumb-list li a:hover {
color: #f2a413;
}

/* Style for the contact address area */
.ltn__contact-address-area {
margin-top: 100px;
}

.ltn__contact-address-item {
text-align: center;
padding: 30px;
border-radius: 5px;
transition: all 0.3s ease;
background-color: #fff;
margin-bottom: 30px;
box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); /* Add box shadow */
}

.ltn__contact-address-item:hover {
transform: translateY(-10px);
box-shadow: 0px 20px 50px rgba(0, 0, 0, 0.2);
}

.ltn__contact-address-icon {
font-size: 50px;
color: #f2a413;
margin-bottom: 20px;
}

.ltn__contact-address-item h3 {
font-size: 24px;
font-weight: 700;
color: #111;
margin-bottom: 10px;
}

.ltn__contact-address-item p {
font-size: 16px;
color: #777;
margin: 0;
}


.ltn__form-box {
background-color: #fff;
padding: 50px;
border-radius: 5px;
box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); / Add box shadow */
}

.ltn__form-box h4 {
font-size: 28px;
font-weight: 700;
margin-bottom: 30px;
color: #111;
text-align: center; /* Center the heading /
text-transform: uppercase; / Add text transform */
}

.ltn__form-box .form-group label {
font-size: 16px;
font-weight: 500;
color: #777;
margin-bottom: 10px;
}

.ltn__form-box .form-control {
height: 50px;
border-radius: 5px;
margin-bottom: 20px;
font-size: 16px;
color: #111;
padding: 0 20px;
border: 1px solid #ccc;
}

/* Style for the submit button */
.theme-btn-1 {
background-color: blue;
color: #fff;
font-size: 18px;
font-weight: 700;
padding: 15px 30px;
border: none;
border-radius: 5px;
cursor: pointer;
transition: all 0.3s ease;
}

.theme-btn-1:hover {
background-color: #0066cc;
}

/* Style for the input fields */
.input-item {
margin-bottom: 20px;
}

.input-item input,
.input-item textarea {
width: 100%;
padding: 15px;
border-radius: 5px;
border: 1px solid #ccc;
font-size: 16px;
color: #111;
transition: all 0.3s ease;
}
  .floating-whatsapp {
    position: fixed;
    bottom: 117px;
    right: 31px;
    z-index: 9999;
  }
  .centered-text {
    text-align: center;
    margin-top: 50px;
    margin-bottom: 50px;
    font-size: 24px; /* Example font size */
    font-weight: bold; /* Example font weight */
    color: #333; /* Example text color */
    /* Add any other styles you want to apply to the text here */
  }

  .floating-whatsapp img {
    width: 50px; /* Set the width of the icon */
    height: 50px; /* Set the height of the icon */
  }
.input-item input:focus,
.input-item textarea:focus {
outline: none;
border-color: blue;
}

.input-item input::-webkit-input-placeholder,
.input-item textarea::-webkit-input-placeholder {
color: #999;
}

.input-item input::-moz-placeholder,
.input-item textarea::-moz-placeholder {
color: #999;
}

.input-item input:-ms-input-placeholder,
.input-item textarea:-ms-input-placeholder {
color: #999;
}

/* Style for the email input field */
.input-item input[type="email"] {
direction: ltr;
}

.input-item input[type="email"]:focus {
direction: ltr;
text-align: left;
}
</style>
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
     @if( LaravelLocalization::getCurrentLocaleDirection() == 'ltr')
    {{-- <link href="{{asset('/assets/css/stylertl.css?'.time() )}}" rel="stylesheet" /> --}}
     @else
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
<style>
    body{
        font-family: 'Cairo', sans-serif !important;

    }
</style>
    {{-- <link href="{{asset('/assets/css/style.css?'.time() )}}" rel="stylesheet" /> --}}
    @endif
   

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
      {{-- <div class="services">
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
</div> --}}
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