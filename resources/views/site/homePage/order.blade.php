@extends('layouts.layoutSite.SitePage')
<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">

@section('content')
<!-- start breadcrumb -->

 
<!-- end breadcrumb -->
<section class="container py-3 section-continue" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}" >
    <div class="row">
        <div class="col-md-6 payment-details">
            <p class="h4"> 
            {{__('Payment details')}}  
             </p>
            <br>
            <form action="{{route('storeorder')}}" method="post">
            @csrf
                <div class="mb-3">
                    <label for="full-name" class="form-label"> {{__('Full Name')}}</label>
                    @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input type="text" name="name" class="form-control" id="full-name" value="@if($add == 1) {{$address->name}} @else {{old('name')}} @endif" maxlength="100" required>
                  </div>
                  <div class="mb-3">
                    <label for="email-address" class="form-label"> {{__('Email')}}</label>
                    @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input type="email" name="email" class="form-control" id="email-address" value="@if($add == 1) {{$address->email}} @else {{old('email')}}  @endif" maxlength="100" required>
                  </div>
                  <div class="my-3">
                    <label for="choose-region"  > {{__('Region')}}</label><br>
                    @error('area')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                  <select name="area" class="form-control" id="choose-region" aria-label="Default select example" maxlength="100" required 
                  @if(isset($rate))  @if(isset($address)) total= "{{$cart->total() - ($cart->total() * $rate) + $address->Shipping }}" shipping="{{$address->Shipping }}" @else total=" {{$cart->total() - ($cart->total() * $rate) }}" shipping="0" @endif @else @if(isset($address)) total=" {{$cart->total() + $address->Shipping }}" shipping="{{$address->Shipping }}" @else total="{{$cart->total() }}" shipping="0" @endif @endif>
                  <option value=""> {{__('Choose the region')}}</option>  
                  <option selected value="@if($add == 1) {{$address->area}} @else {{old('area')}} @endif">    @if($add == 1) {{$address->area}} @else {{old('area')}}  @endif </option>
                    @foreach($cities as $ca)
                    <option value="{{$ca->name}}"> {{$ca->name}}</option>
                    @endforeach
                  </select> <br>
                </div>
                <div class="mb-3">
                    <label for="street"   > {{__('Street')}}</label>
                    @error('street')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input type="text" name="street" class="form-control" id="street" placeholder="أدخل اسم الشارع" value="@if($add == 1) {{$address->street}} @else {{old('street')}} @endif" maxlength="100"   >
                  </div>
                  <div class="mb-3">
                    <label for="District"  > {{__('Blvd')}}</label>
                    <input type="text" name="Blve" class="form-control" id="أدخل رقم الجادة" value="@if($add == 1) {{$address->Blve}} @else {{old('Blve')}}  @endif">
                  </div>
                  <div class="mb-3">
                    <label for="flat"  > {{__('Apartment/House')}}</label>
                    <input type="text" name="house" class="form-control" id="flat" placeholder="أدخل رقم/اسم الشقة/المنزل" value="@if($add == 1) {{$address->house}} @else {{old('house')}}  @endif" maxlength="100"  >
                  </div>
                  <div class="mb-3">
                    <label for="mobile-number"  > {{__('Mobile number')}}</label>
                    @error('phone')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                    <input type="text" name="phone" class="form-control" id="mobile-number" value="@if($add == 1) {{$address->phone}} @else {{old('phone')}}  @endif" maxlength="100" required>
                  </div> 
                   @if(Auth::user())@else
                  <div class="mb-1 ">
                    <input class="form-check-input" type="checkbox" value="1" name="make_user"  id="accept">
                    <label class="form-check-label" for="accept">
                       {{__('Create an account')}}
                     </label>
                  </div>
                  <div class="mb-3">
                  <label for="user-password"  > {{__('Password')}}</label>
                      @error('password')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                        <div class="input-group">
                         <input type="password" class="form-control" name="password" aria-label="user-password" aria-describedby="user-password">
                    </div></div>
                  <div class="mb-3">
                  <label for="user-password"  > {{__('Confirm password')}}</label>
                     @error('password_confirmation')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    <div class="input-group">
                     <input type="password" class="form-control" name="password_confirmation" aria-label="user-password" aria-describedby="user-password">
                    </div></div>
                    @endif
                  <div class="mb-3">
                    <label for="add-nots"  > {{__('Notes with the order')}}</label>
                    <textarea class="form-control" name="nots" id="add-nots" cols="10" maxlength="300"  rows="5"></textarea>
                  </div>

                  <div class="mb-1  ">
                    <input class="form-check-input" type="checkbox" value="" id="accept-terms"  required >
                    <label for="accept-terms">
                             {{__('I agree to the terms and conditions')}}
                    </label>
                  </div>
           
        </div>
        <div class="col-md-2 payment-details"></div>
        <div class="col-md-4 do-you-have-discount-code  bg-gray">
      
            
            <div class="cart-sum my-5">
                <p class="h5 my-3 text-center" >{{__('Shopping cart')}}</p>
                
                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th class="pro-thumbnail">{{__('Image')}}</th>
                                            <th class="pro-title">{{__('Product')}}</th>
                                            <th class="pro-price">{{__('Price')}}</th> 
                                            <th class="pro-price">{{__('Quantity')}}</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart->get() as $item)
                                        <tr id="a{{$item->id }}">
                                            <td class="pro-thumbnail"><a href="{{route('viewProperty',$item->product->id)}}"><img class="img-fluid" src="{{asset('/storage/property/'.$item->product->image)}}" alt="Product" width="100"/></a></td>
                                            <td class="pro-title"><a href="{{route('viewProperty',$item->product->id)}}"> {{$item->product->name }}  </a></td>
                                            <td class="pro-price"><span>{{ $item->product->price }}  {{__('AED')}}</span></td>
                                            <td class="pro-price"><span>{{$item->quantity}}</span></td>

                                         </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
               <hr>
                <div class="d-flex justify-content-between mt-5">
                    <span> {{__('Partial total')}}</span>
                    <div>
                        <span>  {{$cart->total()}}    </span>
                        {{__('AED')}}
                    </div>
                </div>
                <hr>
                @if(isset($rate))
                <div class="d-flex justify-content-between">
                    <span>{{__('Discount')}}</span>
                    <div>
                        <span>{{$cart->total() * $rate}}</span>
                        {{__('AED')}}
                    </div>
                </div> <hr>
                @endif
                
                <div class="d-flex justify-content-between">
                    <span>{{__('Shipping')}}</span>
                    <div>
                    @if($offer >= 1 && $offer <= $cart->total())
                    <span id="shipping">{{__('Free')}}</span>

                       @else
                        <span id="shipping">@if(isset($address)){{$address->Shipping}} @endif</span>
                        {{__('AED')}}
                        @endif
                    </div>
                </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <span> {{__('Total summation')}}</span>
                        <bold>
                            <span id="total_sh">@if(isset($rate))  @if(isset($address)) {{$cart->total() - ($cart->total() * $rate) + $address->Shipping }} @else {{$cart->total() - ($cart->total() * $rate) }} @endif @else @if(isset($address)) {{$cart->total() + $address->Shipping }} @else {{$cart->total() }} @endif @endif</span>
 
                            {{__('AED')}}
                        </bold>
                    </div>
                    
                
                
                
                </div>
                
                {{-- <div class="mb-3 form-check">
                    @error('payment_method')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    <input name="payment_method" class="form-check-input" type="radio" checked value="cash" id="buy-cash" >
                    <label class="form-check-label" for="buy-cash">
                        <img src="{{asset('images/cach.png')}}" width="50px" height="20px" alt="buy cash">
                             {{__('Cash on delivery')}}
                    </label>
                  </div> --}}
                  <div class="mb-3 form-check">
                    @error('payment_method')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    <input name="payment_method" class="form-check-input" type="radio" value="check" id="buy-check" checked>
                    <label class="form-check-label" for="buy-check">
                        <img src="{{asset('images/chech.png')}}" width="60px" height="10px" alt="buy cash">
                        {{__('Pay by credit card')}}
                    </label>
                  </div>
                   
                  <input type="text"  name="total" value="@if(isset($rate))  @if(isset($address)) {{$cart->total() - ($cart->total() * $rate) + $address->Shipping }} @else {{$cart->total() - ($cart->total() * $rate) }} @endif @else @if(isset($address)) {{$cart->total() + $address->Shipping }} @else {{$cart->total() }} @endif @endif" style="display:none"   >
                  <input type="text" value="@if(isset($rate)) {{$cart->total() * $rate}} @else 0 @endif" name="discount" style="display:none" >
                     @if($offer >= 1 && $offer <= $cart->total())
                     <input type="text"  name="shipping" value="0" style="display:none"   >
                      @else
                      <input type="text"  name="shipping" value="  @if(isset($address)) {{ $address->Shipping }} @else 0 @endif" style="display:none"   >
                      @endif

                  <hr class="my-4 hr-blue">

                <input type="submit" class="btn text-white d-block" style="background-color:#563e32;" value=" {{__('Confirmation')}} ">

        </div> </form> 
    </div>
</section>
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
                        $("#"+ data.id).remove();
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
         var total = $(this).attr('dataa_total') + $(this).attr('dataa_price');
         

         
         $.ajax({
                type: "post",
                url: "/cart/" + id,
                method: "put",
                data: { _token: '{{ csrf_token() }}',
                quantity: $(this).val(),
                xx: 'x',
                     },
                               // let's set the expected response format
                    success: function (data) {
                         $("#totals").remove();
                        $("#totalq").fadeIn().html( '<span id="totals">' + data.totalx +'</span> {{__('AED')}}' );
                        $("#totals1").remove();
                        $("#totalq1").fadeIn().html( '<span id="totals1">' + data.totalx +'</span> {{__('AED')}}' );
                        $("#totalq1").fadeIn().html( '<span id="totals1">' + data.totalx +'</span> {{__('AED')}}' );

 
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#axaa').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });
    </script>

    @if($offer >= 1 && $offer <= $cart->total())
                       @else
 <script>              
    $(document).ready(function () {
        $('select[name="area"]').on('change', function () {
            var country = $(this).val();
            var total = $(this).attr('total');
            var shipping = $(this).attr('shipping');

            if (country) {
                $.ajax({
                    url: "{{ URL::to('get_shipping') }}/" + country,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#shipping').empty();
                        $('#shipping').append(data.price);
                        $('#total_sh').empty();
                        $('#total_sh').append(total - shipping + data.price);
                        $('input[name="total"]').val(total - shipping + data.price);
                        $('input[name="shipping"]').val(data.price);
                       

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });</script>
@endif
    
    
    @endpush

