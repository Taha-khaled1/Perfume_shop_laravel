@extends('layouts.layoutSite.SitePage')
 
<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
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
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Shopping cart')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<br>
<!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                        @if($cart->get()->count()== 0 ) <h1>{{__('The cart is empty')}}</h1><br><a href="{{route('viewHomePage')}}">{{__('Home')}}</a>   @else

                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">{{__('Image')}}</th>
                                            <th class="pro-title">{{__('Product')}}</th>
                                            <th class="pro-price">{{__('Price')}}</th>
                                            <th class="pro-quantity">{{__('Quantity')}}</th>
                                             <th class="pro-remove">{{__('Remove')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart->get() as $item)
                                        <tr id="a{{$item->id }}">
                                            <td class="pro-thumbnail"><a href="{{route('viewProperty',$item->product->id)}}"><img class="img-fluid" src="{{asset('/storage/property/'.$item->product->image)}}" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="{{route('viewProperty',$item->product->id)}}"> {{$item->product->name }}  </a></td>
                                            <td class="pro-price"><span>{{ $item->product->price }}  {{__('AED')}}</span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty"><input type="text" class="item-quantity" product_id="{{$item->product->id}}" dataa_id="{{ $item->id }}" dataa_total="{{ $item->quantity * $item->product->price }}" dataa_price="{{ $item->product->price }}"  value="{{ $item->quantity }}"></div>
                                            </td>
                                             <td class="pro-remove"><a class="remove-item" data_id="{{ $item->id }}"  href="javascript:void(0)"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="apply-coupon-wrapper">
                                <label class="form-check-label" for="input-discount-code">
                                  {{__('Do you have a discount code?')}}
                                    </label>
                                  
                                    <p class="h4">
                                          {{__('Discount code')}}
                                    </p> 
                                        <input type="text" name="code" total="{{$cart->total()}}" class="form-control" maxlength="100" required placeholder="{{__('Enter the discount code')}} " >
                                    </div>
                                <div class="cart-update">
                                <a class="btn btn-sqr" href="{{route('cartempty')}}" >{{__('Empty the cart')}}</a>
 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <div class="col-lg-5 ml-auto" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}" >
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                <form action="{{route('indexorder')}}" method="GET" >
                                @csrf 
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                              
                                                @if(Auth::user())
                                                <td>{{__('Addresses saved by the user')}}</td>
                                                <td><select id="frm_country" class="form-control" name="address_id"  >
                                                <option value=""  > {{__('Choose the region')}}</option>

                                                @foreach(\Illuminate\Support\Facades\Auth::user()->addresses as $address)

                                                <option value="{{$address->id}}" selected>{{$address->name}} / {{$address->area}}</option>

                                                @endforeach
                                                </select></td>
                                                 
                                                    @endif 
                                            </tr>
                                            <tr>
                                                <td>{{__('Partial total')}} :</td>
                                                <td> <div id="totalq">
                                                    <span  id="totals"> {{$cart->total()}}</span>
                                                    {{__('AED')}}
                                                </div></td>
                                            </tr>
                                            <tr class="total">
                                                <td>{{__('Discount')}} :</td>
                                                <td class="total-amount"><div >
                                                  <span  id="discount"> 0 </span>
                                                  {{__('AED')}}
                                              </div></td>
                                            </tr>
                                               @if($offer >= 1)
                                               @if($offer <= $cart->total())
                                            <tr class="total">
                                                <td>{{__('Free shipping')}} :</td>
                                                <td class="total-amount">{{__('After the price of products exceeds')}} {{$offer}}</td>
                                            </tr> @endif @endif
                                        </table>
                                    </div>
                                     <br>    
                                     <input type="text"  name="rate" value="0" style="display:none"   >
                                    <div class="p-2"><button class="btn text-white d-block" style="background-color:#563e32;" type="submit">{{__('Continue to complete the purchase')}} </button></div>
                                    </div>
                                     
                                  </form>
                                </div>
                             </div>
                            @endif
                        </div>
                     
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->

@stop

@push('js')  
<script>   
     
   $('.remove-item').on("click", function (e) {
              //  e.preventDefault();
               
         var id = $(this).attr('data_id');
         
         
         $.ajax({
                type: "post",
                url: "/cart/" + id,
                method: "delete",
                data: { _token: '{{ csrf_token() }}'
                     },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $("#a"+ id).remove();
                        $("#totals").remove();
                        $("#totalq").fadeIn().html( '<span id="totals">' + data.totala +'</span> {{__('AED')}}' );
                        $("#totals1").remove();
                        $("#totalq1").fadeIn().html( '<span id="totals1">' + data.totala +'</span> {{__('AED')}}' );
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#axaa').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });

    
    $('.item-quantity').on("change", function (e) {
              //  e.preventDefault();
               
         var id = $(this).attr('dataa_id');
         var product_id = $(this).attr('product_id');
         var total = $(this).attr('dataa_total') + $(this).attr('dataa_price');
         

         
         $.ajax({
                type: "post",
                url: "/cart/" + id,
                method: "put",
                data: { _token: '{{ csrf_token() }}',
                quantity: $(this).val(),
                product_id: product_id,
                xx: 'x',
                     },
                               // let's set the expected response format
                    success: function (data) {
                        if(data.message == 1){
                              
                            flashBox('error', 'نفذت الكمية');


                        }else{
                        $("#totals").remove();
                        $("#totalq").fadeIn().html( '<span id="totals">' + data.totalx +'</span> {{__('AED')}}' );
                        $("#totals1").remove();
                        $("#totalq1").fadeIn().html( '<span id="totals1">' + data.totalx +'</span> {{__('AED')}}' );
                   
                        }
 
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#axaa').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });
    $(document).ready(function () {
        $('input[name="code"]').on('change', function () {
            var code = $(this).val();
            var total = $(this).attr('total');

            if (code) {
                $.ajax({
                    url: "{{ URL::to('get_discount') }}/" + code,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#discount').empty(); 
                        $('#discount').append( total * data.rate / 100 );
                        $('input[name="rate"]').val(data.rate / 100);

                        flashBox('success', '{{__('Discount done')}}');

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });

    </script>
     
    @endpush

