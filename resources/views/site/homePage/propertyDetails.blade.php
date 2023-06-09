@extends('layouts.layoutSite.SitePage',['cartcount'=>$cart->get()->count()])
 @section('content')
 <link rel="stylesheet" href="{{asset('/assets/css/New/card-product.css')}}">
 <div class="breadcrumb-area" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('viewHomePage')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@if($product->name_en != null)
                                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                    {{$product->name}}
                                    @else
                                    {{$product->name_en}}
                                    @endif @else
                                    {{$product->name}}
                                    @endif</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
  </div> 


<div class="container">
    <div class="product">
        <div class="row">
            {{-- <div class="images col-lg-2 col-md-2 col-sm-4 col-4">
                @foreach($product->album as $a)
                    <img src="{{asset('/storage/property/'.$a->name)}}" alt="">
                @endforeach
                </div> --}}
            @if (LaravelLocalization::getCurrentLocaleDirection() == 'ltr')
                @php
                    $dir = 'order-0';
                    $text = 'text-start';
                    $justify = 'justify-content-start';

                    $text_sm_ltr = 'left';
                    $justify_sm_ltr = 'end';
                    $direction_rtl = 'rtl';

                @endphp
            @else
                @php
                    $dir = 'order-1';
                    $text = 'text-end';
                    $justify = 'justify-content-end';

                    $text_sm_rtl = 'right';
                    $justify_sm_rtl = 'start';
                    $direction_ltr = 'ltr';

                @endphp
            @endif
            <style>
                @media(max-width:767px){
                    .main-image{
                        order: 0 !important;
                    }
                    .product-details{
                        text-align: {{ isset($text_sm_ltr) ? $text_sm_ltr . '!important' : $text_sm_rtl . '!important' }};
                    }
                    .quantity-buttons{
                        justify-content: end !important;
                    }
                    .product .row{
                        direction: {{ isset($direction_ltr) ? $direction_ltr : $direction_rtl}}
                    }
                }
             </style>
            <div class="main-image col-lg-5 col-md-6 col-12 {{$dir}}">
                <img src="{{asset('/storage/property/'.$product->image)}}" alt="product-details" />
            </div>
            <div class="product-details col-lg-5 col-md-4 col-sm-12 {{$text}}">
                <h1>@if($product->name_en != null)
                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                    {{$product->name}}
                    @else
                    {{$product->name_en}}
                    @endif @else
                    {{$product->name}}
                    @endif
                </h1>
  <h5><span id="product-price">{{$product->price}}</span> {{__('AED')}}</h5>
                <p class="mt-3">@if($product->description_en != null)
                                                  @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                  {{$product->description}}
                                                  @else
                                                  {{$product->description_en}}
                                                  @endif @else
                                                  {{$product->description}}
                                                  @endif</p>
                <form action="{{ route('cart.store') }}" method="post" id="myform">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="size">
                    @if($product->option->count() >= 1)
                      <h5 class="text-secondary mb-3">{{__('size')}}</h5>
                      <select class="nice-select form-control size-input" style="width:60px" name="size">
                        @foreach($product->option as $a)
                          <option value="{{$a->name}}" data-price="{{$a->price}}">{{$a->name}}</option>
                        @endforeach
                      </select>
                    @endif
                  </div>







          
                <div class="d-flex gap-4 mb-3 {{$justify}} quantity-buttons">
                    <input type="hidden" name="quantity" id="quantity" value="1">
                    <div class="d-flex">
                        <h2 class="plus">+</h2>
                        <h1 class="num mx-3 align-self-center" data-max="{{$product->quantity}}">1</h1>
                        <h2 class="minus">-</h2>
                    </div>
                    <div class="align-self-center">
                        <span> {{__('Quantity')}}</span>
                    </div>
                </div>
                @if ($product->quantity == 0)
               <h1>{{__('No stock available') }}</h1>
                @else

                    <button class="btn btn-primary me-2 add_cart h-100 p-2 addcart" product_id="{{$product->id}}">{{__('Add to cart')}}</button>   
                @endif
             
             
             
             
                <button class="add-to-favorites" data-product-id="{{ $product->id }}">
                    @if (Auth::user() && Auth::user()->favorites->contains('product_id', $product->id))
                        <i class="fa fa-heart text-danger fw-bold fs-4 favorite-icon"></i>
                    @else
                        <i class="pe-7s-like text-dark fw-bold fs-4 favorite-icon"></i>
                    @endif
                </button>
             
                {{-- <form action="{{ route('favorites.add', $product->id) }}" method="POST">
                                
                        @csrf
                        <input type="hidden" name="_method" value="POST">
                        <button type="button" class="liked mt-1 h-100" style="transform: translateY(4px)"><i class="pe-7s-like fw-bold fs-4 text-white bg-danger p-2"></i></button>
                    
                </form> --}}
               {{-- @if ($product->quantity != 0)
               <button class="btn btn-danger add_cart" product_id="{{$product->id}}" href="#">{{__('Add to cart')}}</button>
               @endif --}}
                </form>
                <ul class="p-0 mt-4">
                    {{-- @if($product->sku) <li><span>SKU</span> : <span>{{$product->sku}}</span></li>@endif --}}
                    @if($product->code)  <li><span>  {{__('Item code')}}</span> : <span>{{$product->code}}</span></li>@endif
                    @if($product->quantity)<li><span> {{__('Quantity Left')}}</span> : <span class="quantity_num">{{$product->quantity}}</span></li>@endif
                    <!--<li><span>سومو</span> :<span> </span></li>-->
                    <li> @if($product->category)<span> {{__('Category')}}
                        @if($product->category->name_en != null)
                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                    {{$product->category->name}}
                    @else
                    {{$product->category->name_en}}
                    @endif @else
                    {{$product->category->name}}
                    @endif</span>   @endif </li>
                    </ul>
                <div class="like-icon">
                    <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/') }}/property/{{$product->id}}&display=popup" target="_blank"><i class="text-dark fs-5 me-2 fa fa-facebook"></i></a>
                    <a class="twitter" href="https://twitter.com/intent/tweet?url={{ url('/') }}/property/{{$product->id}}" target="_blank"><i class="text-dark fs-5 me-2 fa fa-twitter"></i></a>
                    <a class="" href="whatsapp://send?text={{url('/property/' . $product->id)}} أود مشاركة هذا المنتج معك" data-action="share/whatsapp/share" target="_blank"><i class="text-dark fs-5 me-2 fa fa-whatsapp"></i></a>
                    {{-- <a class="instagram" href="instagram://share?text={{url('/property/' . $product->id)}} أود مشاركة هذا المنتج معك" data-action="share/instagram/share" target="_blank"><i class="text-dark fs-5 me-2 fa fa-instagram"></i></a> --}}

                </div>
            </div>
        </div>
    </div>
</div>

{{-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
  <!-- <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 order-1 order-lg-2">
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{asset('/storage/property/'.$product->image)}}" alt="product-details" />
                                        </div>
                                        @foreach($product->album as $a)  
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{asset('/storage/property/'.$a->name)}}" alt="product-details" />
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                        <div class="pro-nav-thumb">
                                            <img src="{{asset('/storage/property/'.$product->image)}}" alt="product-details" />
                                        </div>
                                        @foreach($product->album as $a)  
                                        <div class="pro-nav-thumb">
                                            <img src="{{asset('/storage/property/'.$a->name)}}" alt="product-details" />
                                        </div>
                                        @endforeach 
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                      
                                        <h3 class="product-name">@if($product->name_en != null)
                                              @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                              {{$product->name}}
                                              @else
                                              {{$product->name_en}}
                                              @endif @else
                                              {{$product->name}}
                                              @endif</h3>
                                         
                                        <div class="price-box">
                                            <span class="price-regular"><sapn>{{$product->price}}</sapn> {{__('AED')}}</span> 
                                         </div>
                                         
                                        <p class="pro-desc">@if($product->description_en != null)
                                                  @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                  {{$product->description}}
                                                  @else
                                                  {{$product->description_en}}
                                                  @endif @else
                                                  {{$product->description}}
                                                  @endif </p>
                                          <form action="{{ route('cart.store') }}" method="post" id="myform">
                                          @csrf
                                          <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">{{__('qty')}}:</h6>
                                            <div class="quantity">
                                                <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
                                            </div>
                                            <div class="action_link">
                                            <a class="btn btn-cart2" href="#" onclick="document.getElementById('myform').submit()" > {{__('Add to cart')}}</a>

                                             </div>
                                        </div>
                                        <div class="pro-size">
                                          @if($product->option->count() >= 1)
                                            <h6 class="option-title">{{__('size')}} :</h6>
                                            <select class="nice-select" name="size">
                                               @foreach($product->option as $a)  
                                                <option value="{{$a->name}}"> {{$a->name}} </option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </div>
                                        <div class="color-option">
                                        @if($product->color->count() >= 1)

                                            <h6 class="option-title">color :</h6>
                                            @foreach($product->color as $a)  
                                             
                                              <input  type="radio" name="color" value="{{$a->color}}"     >
                                                   &nbsp;<div  style="background-color:{{$a->color}}; color:{{$a->color}}; border-radius: 50%;" > aaa
                                              </div>&nbsp;&nbsp;            
                                              @endforeach 
                                         @endif
                                        </div>
                                        </form>
                                        <div class="useful-links"> 
                                        <a class="liked" title="Add to wishlist"  property="{{$product->id}}" value="1" name="like"  >
                                                      <i  class="pe-7s-like" @if(Auth::user()) @if( Auth::user()->like->where('property_id', $product->id)->first() ) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   > {{__('Add to favorite')}}</i>
                                                </a>  
                                        </div>
                                        <br> 
                                  <ul>
                                  @if($product->sku) <li><span>SKU</span> : <span>{{$product->sku}}</span></li>@endif
                                  @if($product->code)  <li><span>  {{__('Item code')}}</span> : <span>{{$product->code}}</span></li>@endif
                                  @if($product->guarantee)<li><span> {{__('Guarantee')}}</span> : <span>{{$product->guarantee}}</span></li>@endif
                                  <li> @if($product->category)<span> {{__('Category')}}
                                        @if($product->category->name_en != null)
                                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                    {{$product->category->name}}
                                    @else
                                    {{$product->category->name_en}}
                                    @endif @else
                                    {{$product->category->name}}
                                    @endif</span>   @endif </li>
                                    </ul>
                                        <div class="like-icon">
                                            <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/') }}/property/{{$product->id}}&display=popup" target="_blank"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="https://twitter.com/intent/tweet?url={{ url('/') }}/property/{{$product->id}}" target="_blank"><i class="fa fa-twitter"></i>tweet</a>
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
              <br>
 
              -->

<div class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center my-5">
                    <h2 class="title">{{__('Linked products')}}</h2>
                    </div>
                <!-- section title start -->
            </div>
        </div>
        <section class="last-product pb-5">
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
           <div class="swiper mySwiper" dir="{{$dir}}">
             <div class="swiper-wrapper">
             @if( $products->count() == 0 ) <h3 class="mb-30 text-center">    {{__('No results found.')}} </h3>@endif
             @foreach( $products as $product)
             <div class="swiper-slide d-flex flex-column item position-relative">
                 <a href="{{route('viewProperty',$product->id)}}" class="bg-transparent p-0"><img src="{{asset('/storage/property/'.$product->image)}}" alt="" style="width:100%;height: 320px;"></a>
                 <div>
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
                    <div class="product-buttons d-flex justify-content-center text-center">
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
             @endforeach
             </div>
           </div>
         </section>
    </div>
</div>
              <!-- <section class="product-area section-padding bg-gray"  > 
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">{{__('Linked products')}}</h2>
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
        </section> -->

@stop

@push('js') 
    <script src="{{asset('/assets/js/New/card-product.js' )}}"></script>
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
                    icon.addClass("pe-7s-like").removeClass("fa fa-heart text-danger text-dark");

                    flashBox('success', '{{ __('Removed from favorite') }}');
                } else {
                    icon.addClass("fa fa-heart text-danger").removeClass("pe-7s-like text-dark");

                    flashBox('success', '{{ __('Added to favorite') }}');
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred while adding to favorites');
            }
        });
    });
});
    












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
$('.addcart').on("click", function(e) {
    e.preventDefault();
    var id = $(this).attr('product_id');
    console.log(cartItems)

    $.ajax({
        type: "post",
        url: "{{ route('cart.store') }}",
        data: {
            _token: '{{ csrf_token() }}',
            "product_id": id,
            "quantity": $("#quantity").val()
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
  
    {{-- <script>

        // Get references to the color and size input elements
        const colorInputs = document.querySelectorAll('.color-input');
        // const sizeInput = document.querySelector('.size-input');
      
        // Get reference to the product price element
        const productPriceEl = document.querySelector('#product-price');
      
        // Add event listeners to the color and size inputs
        colorInputs.forEach(colorInput => {
          colorInput.addEventListener('change', updateProductPrice);
        });
      
        sizeInput.addEventListener('change', updateProductPrice);
        let updatedPrice;
        // Function to update the product price based on the selected color and size
        function updateProductPrice() {
            productPriceEl.innerHTML = ''
          // Get the selected color and size values
          const selectedColor = document.querySelector('input[name="color"]:checked').dataset.price;
         // const selectedSize = sizeInput.value;
          // Look up the prices for the selected color and size in the product data
          const colorPrice = Number(selectedColor); // replace with actual code to get the price for the selected color
          //const sizePrice = sizeInput.options[sizeInput.selectedIndex].dataset.price;
          // Calculate the updated price of the product
          const basePrice = Number(productPriceEl.innerHTML); // replace with actual code to get the base price of the product

          const updatedPrice = basePrice + colorPrice //+ parseInt(sizePrice)
          // Update the price display with the updated price 
          productPriceEl.textContent = updatedPrice;
        }
      </script> --}}
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <script>
    $(".whatsapp")[0].addEventListener('click', () => {
  const productName = 'Example Product'; // Replace with the actual product name
  const productUrl = 'https://example.com/product'; // Replace with the actual product URL
  const message = `Check out ${productName} at ${productUrl}`;

  const whatsappUrl = `https://wa.me/?text=${encodeURIComponent(message)}`;
  window.open(whatsappUrl);
});
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






