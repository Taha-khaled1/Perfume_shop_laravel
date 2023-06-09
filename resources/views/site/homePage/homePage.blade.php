@extends('layouts.layoutSite.SitePage',['cartcount'=>$cart->get()->count()])

@section('content')

    <!-- hero slider area start -->
    <!-- <section class="slider-area">
                <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                @foreach ($carousels as $carousel)
    <div class="hero-single-slide hero-overlay">
                        <div class="hero-slider-item bg-img" data-bg="{{ asset('storage/property/' . $carousel->image) }}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="hero-slider-content slide-2">
                                            <h2 class="slide-title"> @if ($carousel->title_en != null)
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    {{ $carousel->title }}
@else
    {{ $carousel->title_en }}
    @endif
@else
    {{ $carousel->title }}
    @endif
    </h2>
    <h4 class="slide-desc"> @if ($carousel->subtitle_en != null)
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    {{ $carousel->subtitle }}
@else
    {{ $carousel->subtitle_en }}
    @endif
@else
    {{ $carousel->subtitle }}
    @endif
    </h4>
    <p class="slide-desc"> @if ($carousel->text_en != null)
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    {{ $carousel->text }}
@else
    {{ $carousel->text_en }}
    @endif
@else
    {{ $carousel->text }}
    @endif
    </p>
                                            <a class="btn btn-hero" href="{{ $carousel->link }}">{{ __('Shop now') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    @endforeach
        </div>
    </section> -->
    @if ($carousel->image != null)
    @php
        $extension = pathinfo($carousel->image, PATHINFO_EXTENSION);
    @endphp

    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
    <div class="hero text-center rounded m-1" style=" margin-left: 20px; margin-right: 20px; border-radius: 20px; overflow: hidden;">
        <img src="{{ asset('storage/property/' . $carousel->image) }}" class="w-100 h-100" style="object-fit: cover;">
    </div>
    
    @elseif (in_array($extension, ['mp4', 'webm', 'ogg']))
        <div class="hero text-center rounded m-1">
            <video src="{{ asset('storage/property/' . $carousel->image) }}" muted autoplay loop class="w-100 h-100" style="object-fit: cover;"></video>
        </div>
    @endif
@endif





    {{-- <div class="hero text-center rounded m-1">
    <video src="{{asset('storage/property/'.$carousel->image)}}"></video>
</div> --}}



    @if ($ispro->actv != 1)

        @foreach ($categories as $category)
            <div class="bg-light">
                <div class="container">
                    <section class="last-product pb-5">


                        @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                            <a href="{{ route('category_property', $category->id) }}" class="text-decoration-none">
                                <h1 class="fs-2">{{ $category->name }}</h1>
                            </a>
                        @else
                            <a href="{{ route('category_property', $category->id) }}">
                                <h1>{{ $category->name_en }}</h1>
                            </a>
                        @endif
                        <!-- Swiper -->
                        @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                            @php
                                $dir = 'rtl';
                            @endphp
                        @else
                            @php
                                $dir = 'ltr';
                            @endphp
                        @endif
                        <div class="" dir="{{ $dir }}">
                            <div class="row">

                                @foreach ($category->product as $product)
                                    <div class="col-lg-3 col-6 mb-3">

                                        <div class="d-flex flex-column item position-relative">
                                            <a href="{{ route('viewProperty', $product->id) }}"
                                                class="bg-transparent p-0"><img
                                                    src="{{ asset('/storage/property/' . $product->image) }}" alt=""
                                                    class="custom-imgg"></a>
                                            <div class="text-center p-2">
                                                <h4 class="mt-2 mb-0">
                                                    @if ($product->name_en != null)
                                                        @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                            {{ $product->name }}
                                                         
                                                        @else
                                                            {{ $product->name_en }}
                                                        @endif
                                                    @else 
                                                        {{ $product->name }}
                                                    @endif
                                                </h4>
                                                <h6 class="text-center py-2 mb-0">{{ $product->price }} {{ __('AED') }}
                                                </h6>
                                                <div class="product-buttons d-flex justify-content-center mb-0">

                                                    @if ($product->quantity != 0)
                                                    <a class="add_cart border-0"  product_id="{{ $product->id }}"><i class="pe-7s-cart fw-bold fs-4"></i></a>
                                                    @endif
                                                    <a>

                                                        <button class="add-to-favorites" data-product-id="{{ $product->id }}">
                                                            @if (Auth::user() && Auth::user()->favorites->contains('product_id', $product->id))
                                                                <i class="fa fa-heart fw-bold fs-4 favorite-icon text-danger"></i>
                                                            @else
                                                                <i class="pe-7s-like fw-bold fs-4 favorite-icon"></i>
                                                            @endif
                                                        </button>
                                                        
                                                          
                                                       
                                                        
                                                        
                                                        
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                {{-- @foreach ($products as $product)
          
             @endforeach --}}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        @endforeach
    @else
        @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <h1 class="centered-text">{{ $ispro->Description_ar }}</h1>
        @else
        <h1 class="centered-text">{{ $ispro->Description_en }}</h1>  
        @endif

    @endif




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
                                    @foreach ($products as $product)
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{route('viewProperty',$product->id)}}">
                                                    <img class="pri-img" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                                    <img class="sec-img" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                                </a>
                                                 
                                                <div class="button-group">
                                                     <a class="add-wishlist liked"  property="{{$product->id}}" value="1" name="like" >
                                                      <i class="pe-7s-like" @if (Auth::user()) @if (Auth::user()->like->where('property_id', $product->id)->first()) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   ></i>
                                                    </a>
                                                 </div>
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart add_cart" product_id="{{$product->id}}" href="#">{{__('Add to cart')}}</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                
                                                <h6 class="product-name">
                                                    <a href="{{route('viewProperty',$product->id)}}">@if ($product->name_en != null)
                                                        @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
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

    {{-- <div class="shopping">
    <h1>{{__('Shop by category')}}</h1>
    <div class="container">
        <div class="row">
        <div class="" dir="{{$dir}}">
             <div class="row">
             @foreach ($categores as $ca)
             <div class="col-lg-3 col-6 mb-3">
                 <div class="d-flex flex-column item">
                 @if ($ca->img)
                <div class="sort text-center">
                    <img src="{{asset('/storage/property/'.$ca->img)}}" alt="" class="custom-imgg">
                    <a href="{{route('category_property',$ca->id)}}">
                    @if ($ca->name_en != null)
                                        @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
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
</div> --}}



    {{-- <div class="bg-light">
            <div class="container">
                <section class="last-product pb-5">
                 <h1>{{__('Best Selling')}}</h1>
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
                     @foreach ($toppro as $product)
                     <div class="col-lg-3 col-6 mb-3">
        
                         <div class="d-flex flex-column item">
                            <a href="{{route('viewProperty',$product->id)}}" class="bg-transparent p-0"><img src="{{asset('/storage/property/'.$product->image)}}" alt="" class="custom-imgg"></a>
                         <div class="text-center p-2">
                            <h4 class="mt-2">
                            @if ($product->name_en != null)
                                @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
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
        </div> --}}

    <!--
      <section class="product-banner-statistics">
                   <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center">
                                <h2 class="title">{{ __('Shop by category') }}</h2>
                             </div>
                        </div>
                    </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-banner-carousel slick-row-10">
                            @foreach ($categores as $ca)
                            @if ($ca->img)
    <div class="banner-slide-item" >
                                    <figure class="banner-statistics">
                                        <a href="{{ route('category_property', $ca->id) }}">
                                            <img src="{{ asset('/storage/property/' . $ca->img) }}" alt="product banner" style=" height: 300px;" >
                                        </a>
                                        <div class="banner-content banner-content_style2">
                                            <h5 class="banner-text3"><a href="{{ route('category_property', $ca->id) }}">
    @if ($ca->name_en != null)
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    {{ $ca->name }}
@else
    {{ $ca->name_en }}
    @endif
@else
    {{ $ca->name }}
    @endif
    </a></h5>
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
$(document).ready(function() {
    $('.add-to-favorites').on('click', function(event) {
        event.preventDefault();
        
        var productId = $(this).data('product-id');
        var url = "{{ route('favorites.add', ':id') }}".replace(':id', productId);

        $.ajax({
            type: "POST",
            url: url,
            data: {_token: '{{ csrf_token() }}'},
            success: function(data) {
                var icon = $('.add-to-favorites[data-product-id="' + productId + '"]').find('.favorite-icon');
                if (icon.hasClass("fa fa-heart")) {
                    icon.addClass("pe-7s-like").removeClass("fa fa-heart text-danger");

                    flashBox('success', '{{ __('Removed from favorite') }}');
                } else {
                    icon.addClass("fa fa-heart text-danger").removeClass("pe-7s-like");

                    flashBox('success', '{{ __('Added to favorite') }}');
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred while adding to favorites');
            }
        });
    });
});



//     $(function() {
//         $('.add-to-favorites').click(function(e) {
//             e.preventDefault();
//             var productId = $(this).data('product-id');
//             var icon = $(this).find('.favorite-icon');
//             $.ajax({
//                 url: '/add-to-favorites/' + productId,
//                 type: 'POST',
//                 data: {
//                     _token: '{{ csrf_token() }}'
//                 },
//                 success: function(data) {
//                     if (icon.css('color') === 'rgb(255, 0, 0)') {
//                         icon.css('color', '');
//                     } else {
//                         icon.css('color', 'red');
//                     }
//                 }
//             });
//         });
//     });


















// $(document).ready(function() {
//     $('.add-to-favorites').on('click', function(event) {
//         event.preventDefault();
        
//         var productId = $(this).data('product-id');
//         var url = "{{ route('favorites.add', ':id') }}".replace(':id', productId);

//         $.ajax({
//             type: "POST",
//             url: url,
//             data: {_token: '{{ csrf_token() }}'},
//             success: function(data) {
//                 flashBox('success', '{{ __('Added to favorite') }}');
//             },
//             error: function(xhr, status, error) {
//                 alert('An error occurred while adding to favorites');
//             }
//         });
//     });
// });


        if($(".cart-count")[0].innerHTML === "0"){
            localStorage.removeItem('cartItems')
        }
        let cartCount = 0;
        const storedCartItems = localStorage.getItem('cartItems');
        const cartItems = JSON.parse(storedCartItems) ? JSON.parse(storedCartItems) : [];
        if (storedCartItems) {
            //cartItems = JSON.parse(storedCartItems);
            cartCount = cartItems.length;
            $(".cart-count").html(cartCount);
        }
        $('.add_cart').on("click", function(e) {
            e.preventDefault();
            var id = $(this).attr('product_id');
            console.log(cartItems)

            $.ajax({
                type: "post",
                url: "{{ route('cart.store') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    "product_id": id,
                    "quantity": 1
                },
                dataType: 'json', // let's set the expected response format
                success: function(data) {
                    // flashBox('success', '{{ __('Added to cart') }}');
                    const productIndex = cartItems.findIndex(item => item.id === id);
                    if (productIndex >= 0) {
                        // alert('This product is already in your cart!');
                        return;
                    }

                    cartItems.push({ id });
                    cartCount++;
                    $(".cart-count").html(cartCount);
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                },
                error: function(err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        $('#success_message_notifications').fadeIn().html(
                            '<div class="alert alert-danger border-0 alert-dismissible">' + err
                            .responseJSON.message + '</div>');


                    }
                }
            });

        });

    </script>
@endpush
