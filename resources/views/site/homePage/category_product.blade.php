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
                                    <li class="breadcrumb-item active" aria-current="page">@if($category->name_en != null)
                                        @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                        {{$category->name}}
                                        @else
                                        {{$category->name_en}}
                                        @endif @else
                                        {{$category->name}}
                                        @endif</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->


<div class="container">
    <div class="products">
        <div class="row justify-content-center">
        @if( $products->count() == 0 ) <h3 class="mb-30 text-center">    {{__('This section does not currently contain items.')}} </h3>@endif
            @foreach($products as $product)
                <div class="col-lg-3 col-md-6 mb-3 col-6 text-center">
                    <div class="product">
                        <img class="mb-3" src="{{asset('/storage/property/'.$product->image)}}">
                        <a href="{{route('viewProperty',$product->id)}}" style="background-color:transparent" class="border-0 text-dark">
                        @if($product->name_en != null)
                                                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                {{$product->name}}
                                                @else
                                                {{$product->name_en}}
                                                @endif @else
                                                {{$product->name}}
                                                @endif
                        </a>
                        <p class="fs-5 mt-2">120$</p>
                        <a class="btn btn-cart add_cart mb-2" product_id="{{$product->id}}" href="#">{{__('Add to cart')}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

    
<!-- <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                @if( $products->count() == 0 ) <h3 class="mb-30 text-center">    {{__('This section does not currently contain items.')}} </h3>@endif
                    <div class="col-lg-12" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
                        <div class="shop-product-wrapper">
                             <div class="shop-product-wrap grid-view row mbn-30">
                            @foreach($products as $product)

                                <div class="col-lg-3 col-md-4 col-sm-6">
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
                                                <a href="{{route('viewProperty',$product->id)}}">
                                                    @if($product->name_en != null)
                                                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                {{$product->name}}
                                                @else
                                                {{$product->name_en}}
                                                @endif @else
                                                {{$product->name}}
                                                @endif
                                            </a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">{{$product->price}} {{__('AED')}}</span>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="product-list-item">
                                        <figure class="product-thumb">
                                            <a href="{{route('viewProperty',$product->id)}}">
                                                <img class="pri-img" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                                <img class="sec-img" src="{{asset('/storage/property/'.$product->image)}}" alt="product">
                                            </a>
                                            
                                            <div class="button-group">
                                            <a class="add-wishlist liked"  property="{{$product->id}}" value="1" name="like" >
                                                      <i class="pe-7s-like" @if(Auth::user()) @if( Auth::user()->like->where('property_id', $product->id)->first() ) style="color:red;" onclick="style.color = 'black' "@else onclick="style.color = 'red' "  @endif  @else onclick="style.color = 'red' "  @endif   ></i>
                                                    </a>                                             </div>
                                            <div class="cart-hover">
                                            <button class="btn btn-cart add_cart" product_id="{{$product->id}}" href="#">{{__('Add to cart')}}</button>
                                            </div>
                                        </figure>
                                        <div class="product-content-list"> 
                                            <h5 class="product-name"><a href="{{route('viewProperty',$product->id)}}">@if($product->name_en != null)
                                                @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                                {{$product->name}}
                                                @else
                                                {{$product->name_en}}
                                                @endif @else
                                                {{$product->name}}
                                                @endif</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">{{$product->price}} {{__('AED')}}</span>
                                             </div>
                                            <p>@if($product->description_en != null)
                                              @if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                              {{$product->description}}
                                              @else
                                              {{$product->description_en}}
                                              @endif @else
                                              {{$product->description}}
                                              @endif</p>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div> 
                            <div class="paginatoin-area text-center">
                            @if (isset($products) && $products->lastPage() > 1)
  <ul class="pagination justify-content-center">
    @php
      $interval = isset($interval) ? abs(intval($interval)) : 3 ;
      $from = $products->currentPage() - $interval;
      if($from < 1){
        $from = 1;
      }

      $to = $products->currentPage() + $interval;
      if($to > $products->lastPage()){
        $to = $products->lastPage();
      }
    @endphp
    @if($products->currentPage() > 1)
 
    <li class="page-item ">
      <a href="{{ $products->url(1) }}" class="page-link"   >
      <span >&laquo;</span>
      </a>
    </li> 
    <li class="page-item ">
      <a href="{{ $products->url($products->currentPage() - 1) }}"  class="page-link">
      <span >&lsaquo;</span>
      </a>
    </li>
    @endif
    @for($i = $from; $i <= $to; $i++)
    @php
      $isCurrentPage = $products->currentPage() == $i;
    @endphp
    <li class="page-item {{ $isCurrentPage ? 'active ' : '' }}" aria-current="{{ $isCurrentPage ? 'page ' : '' }}">
      <a href="{{ !$isCurrentPage ? $products->url($i) : '#' }}" class="page-link">
      {{ $i }}
      </a>
    </li>
    @endfor
    @if($products->currentPage() < $products->lastPage())
    <li class="page-item ">
      <a href="{{ $products->url($products->currentPage() + 1) }}" class="page-link" >
      <span >&rsaquo;</span>
      </a>
    </li>
    <li class="page-item ">
      <a href="{{ $products->url($products->lastpage()) }}" class="page-link">
      <span >&raquo;</span>
      </a>
    </li>
    @endif
  </ul>
@endif 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

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

