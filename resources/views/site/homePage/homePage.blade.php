@extends('layouts.layoutSite.SitePage')

@section('content')
<!-- hero slider area start -->
<!-- <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            @foreach($carousels as $carousel)
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="{{asset('storage/property/'.$carousel->image)}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="hero-slider-content slide-2">
                                        <h2 class="slide-title"> @if($carousel->title_en != null)
                                              @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                              {{$carousel->title}}
                                              @else
                                              {{$carousel->title_en}}
                                              @endif @else
                                              {{$carousel->title}}
                                              @endif</h2>
                                              <h4 class="slide-desc"> @if($carousel->subtitle_en != null)
                                              @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                              {{$carousel->subtitle}}
                                              @else
                                              {{$carousel->subtitle_en}}
                                              @endif @else
                                              {{$carousel->subtitle}}
                                              @endif</h4>
                                        <p class="slide-desc"> @if($carousel->text_en != null)
                                              @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                              {{$carousel->text}}
                                              @else
                                              {{$carousel->text_en}}
                                              @endif @else
                                              {{$carousel->text}}
                                              @endif</p>
                                        <a class="btn btn-hero" href="{{$carousel->link}}">{{__('Shop now')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</section> -->
<div class="hero text-center rounded m-1" style="background-image:url({{asset('storage/property/'.$carousel->image)}});">
    {{-- <h1 class="mb-5">{{__('Shop now on great offers')}}</h1> 
    <a href="{{route('products')}}" class="text-decoration-none">{{__('Shop now')}}</a> --}}
</div>

 <div class="bg-light">
    <div class="container">
        <section class="last-product pb-5">
            <h1>{{__('Latest products')}}</h1>
            <!-- Swiper -->
            @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                @php
                    $dir = 'rtl'
                @endphp
            @else
                @php
                    $dir = 'ltr'
                @endphp
            @endif
           <div class="" dir="{{$dir}}">
             <div class="row">
             @foreach( $products as $product)
             <div class="col-lg-3 col-6 mb-3">

                 <div class="d-flex flex-column item">
                    <a href="{{route('viewProperty',$product->id)}}" class="bg-transparent p-0"><img src="{{asset('/storage/property/'.$product->image)}}" alt="" class="custom-imgg"></a>
                 <div class="text-center p-2">
                    <h4 class="mt-2">
                    @if($product->name_en != null)
                        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                        {{$product->name}}
                        @else
                        {{$product->name_en}}
                        @endif @else
                        {{$product->name}}
                        @endif
                    </h4>
                    <h6 class="text-center py-2">{{$product->price}} {{__('AED')}}</h6>
                    <a class="btn btn-primary add_cart border-0" product_id="{{$product->id}}" >{{__('Add to cart')}}</a>
                 </div>
                 </div>
               </div>
             @endforeach
             </div>
           </div>
         </section>
    </div>
</div>
 {{-- <!-- <section class="product-area section-padding bg-gray"  >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">{{__('Latest products')}}</h2>
                         </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    @foreach( $products as $product)
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{route('viewProperty',$product->id)}}">
                                                    <img class="pri-img" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                                    <img class="sec-img" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                                </a>
                                                 
                                                <div class="button-group">
                                                     <a class="add-wishlist liked"  property="{{$product->id}}" value="1" name="like" >
                                                      <i class="pe-7s-like" @if(Auth::user()) @if( Auth::user()->like->where('property_id', $product->id)->first() ) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   ></i>
                                                    </a>
                                                 </div>
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart add_cart" product_id="{{$product->id}}" href="#">{{__('Add to cart')}}</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                
                                                <h6 class="product-name">
                                                    <a href="{{route('viewProperty',$product->id)}}">@if($product->name_en != null)
                                                        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                        {{$product->name}}
                                                        @else
                                                        {{$product->name_en}}
                                                        @endif @else
                                                        {{$product->name}}
                                                        @endif</a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular">{{$product->price}} {{__('AED')}}</span>
                                                 </div>
                                            </div>
                                        </div>
                                        @endforeach 

                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="swiper-pagination"></div>
      </div>
    </section> --> --}}

<div class="shopping">
    <h1>{{__('Shop by category')}}</h1>
    <div class="container">
        <div class="row">
        <div class="" dir="{{$dir}}">
             <div class="row">
             @foreach($categores as $ca)
             <div class="col-lg-3 col-6 mb-3">
                 <div class="d-flex flex-column item">
                 @if($ca->img)
                <div class="sort text-center">
                    <img src="{{asset('/storage/property/'.$ca->img)}}" alt="" class="custom-imgg">
                    <a href="{{route('category_property',$ca->id)}}">
                    @if($ca->name_en != null)
                                        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                        {{$ca->name}}
                                        @else
                                        {{$ca->name_en}}
                                        @endif @else
                                        {{$ca->name}}
                                        @endif

                    </a>
                </div>
                 @endif                
                </div>
               </div>
             @endforeach
             </div>
           </div>
        


        </div>
    </div>
</div>

<section class="much-seller">
    <div class="container">
        <h1>{{__('Best Selling')}}</h1>
        <div class="row">
            <div dir="{{$dir}}">
                 <div class="row">
                    @foreach ($images as $item)
                    <div class="d-flex flex-column item col-lg-3 col-6 overflow-hidden mb-3">
                        <img src="{{asset($item->image)}}" alt="" class="custom-imgg">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 
  <section class="product-banner-statistics">
               <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">{{__('Shop by category')}}</h2>
                         </div>
                    </div>
                </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="product-banner-carousel slick-row-10">
                        @foreach($categores as $ca)
                        @if($ca->img)
                            <div class="banner-slide-item" >
                                <figure class="banner-statistics">
                                    <a href="{{route('category_property',$ca->id)}}">
                                        <img src="{{asset('/storage/property/'.$ca->img)}}" alt="product banner" style=" height: 300px;" >
                                    </a>
                                    <div class="banner-content banner-content_style2">
                                        <h5 class="banner-text3"><a href="{{route('category_property',$ca->id)}}">@if($ca->name_en != null)
                                        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                        {{$ca->name}}
                                        @else
                                        {{$ca->name_en}}
                                        @endif @else
                                        {{$ca->name}}
                                        @endif</a></h5>
                                    </div>
                                </figure>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

@stop

@push('js') 

  <script>
$('.liked').click(function(anyothername) {
        //  e.preventDefault();
               
         var id = $(this).attr('property');
         var val = $(this).val();
         
         $.ajax({
                type: "post",
                url: "{{ route('property.like') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id 
                      },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                         
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });

    
$('.add_cart').on("click", function (e) {
            e.preventDefault();
               
         var id = $(this).attr('product_id');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('cart.store') }}",
                data: { _token: '{{ csrf_token() }}',
                     "product_id" : id,
                     "quantity" : 1},
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                      flashBox('success', '{{__('Added to cart')}}');
                       
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });
</script>
@endpush
 