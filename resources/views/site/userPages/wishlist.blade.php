@extends('layouts.layoutSite.SitePage')
@section('title','نتائج البحث')
<link rel="stylesheet" href="{{asset('/assets/css/New/mens.css')}}">
@section('content')
 <!-- breadcrumb area start --><br>
         <div class="breadcrumb-area" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('viewHomePage')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Favorite')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <!-- breadcrumb area end -->
             <!-- page main wrapper start -->
             <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                @if(Auth::user())
                @if( Auth::user()->like->count() == 0)<h3 class="mb-30 text-center">    {{__('There are currently no favorite products')}} </h3>@endif
               
                    <!-- shop main wrapper start -->
                    <div class="col-lg-12" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view" data-bs-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-bs-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                             
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                            @foreach(Auth::user()->like as $like)
                              @if($like->product)
                                <!-- product single item start -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <!-- product grid start -->
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{route('viewProperty',$like->product->id)}}">
                                                <img class="pri-img" src="{{asset('/storage/property/'.$like->product->image)}}" alt="product">
                                                <img class="sec-img" src="{{asset('/storage/property/'.$like->product->image)}}" alt="product">
                                            </a> 
                                            <div class="button-group">
                                            <a class="add-wishlist liked"  property="{{$like->product->id}}" value="1" name="like" >
                                                      <i class="pe-7s-like" @if(Auth::user()) @if( Auth::user()->like->where('property_id', $like->product->id)->first() ) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   ></i>
                                                    </a>
                                            </div>
                                            <div class="cart-hover">
                                            <button class="btn btn-cart add_cart" product_id="{{$like->product->id}}" href="#">{{__('Add to cart')}}</button>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center"> 
                                            <h6 class="product-name">
                                                <a href="{{route('viewProperty',$like->product->id)}}">@if($like->product->name_en != null)
                                                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                {{$like->product->name}}
                                                @else
                                                {{$like->product->name_en}}
                                                @endif @else
                                                {{$like->product->name}}
                                                @endif</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">{{$like->product->price}} {{__('AED')}}</span>
                                             </div>
                                        </div>
                                    </div>
                                    <!-- product grid end -->

                                    <!-- product list item end -->
                                    <div class="product-list-item">
                                        <figure class="product-thumb">
                                            <a href="{{route('viewProperty',$like->product->id)}}">
                                                <img class="pri-img" src="{{asset('/storage/property/'.$like->product->image)}}" alt="product">
                                                <img class="sec-img" src="{{asset('/storage/property/'.$like->product->image)}}" alt="product">
                                            </a>
                                            
                                            <div class="button-group">
                                            <a class="add-wishlist liked"  property="{{$like->product->id}}" value="1" name="like" >
                                                      <i class="pe-7s-like" @if(Auth::user()) @if( Auth::user()->like->where('property_id', $like->product->id)->first() ) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   ></i>
                                                    </a>                                             </div>
                                            <div class="cart-hover">
                                            <button class="btn btn-cart add_cart" product_id="{{$like->product->id}}" href="#">{{__('Add to cart')}}</button>
                                            </div>
                                        </figure>
                                        <div class="product-content-list"> 
                                            <h5 class="product-name"><a href="{{route('viewProperty',$like->product->id)}}">@if($like->product->name_en != null)
                                                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                {{$like->product->name}}
                                                @else
                                                {{$like->product->name_en}}
                                                @endif @else
                                                {{$like->product->name}}
                                                @endif</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">{{$like->product->price}} {{__('AED')}}</span>
                                             </div>
                                            <p>@if($like->product->description_en != null)
                                              @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                              {{$like->product->description}}
                                              @else
                                              {{$like->product->description_en}}
                                              @endif @else
                                              {{$like->product->description}}
                                              @endif</p>
                                        </div>
                                    </div>
                                    <!-- product list item end -->
                                </div>
                                <!-- product single item start -->
                                @endif
              @endforeach
                            </div>
                            <!-- product item list wrapper end -->

                            <!-- start pagination area -->
                            <div class="paginatoin-area text-center">
                            
 
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
    <!--== End Product Area Wrapper ==-->
    @endif --}}
    <div class="container">
        <div class="products">
            <div class="row justify-content-center">
                @if( Auth::user()->like->count() == 0)<h3 class="mb-30 text-center">    {{__('There are currently no favorite products')}} </h3>@endif
                @foreach(Auth::user()->like as $like)
                    <div class="col-lg-3 col-md-6 mb-3 col-6 text-center">
                        <div class="product">
                            <img class="mb-3" src="{{asset('/storage/property/'.$like->product->image)}}">
                            <a href="{{route('viewProperty',$like->id)}}">
                            @if($like->name_en != null)
                                                    @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                    {{$like->name}}
                                                    @else
                                                    {{$like->name_en}}
                                                    @endif @else
                                                    {{$like->name}}
                                                    @endif
                            </a>
                            <p class="fs-5 mt-2">120$</p>
                            <button class="btn btn-cart add_cart" product_id="{{$like->product->id}}" href="#">{{__('Add to cart')}}</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 <!-- end boards -->
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
                      flashBox('success', 'تمت الاضافة الى السلة');
                       
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

