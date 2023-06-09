@extends('layouts.layoutSite.SitePage',['cartcount'=>$cart->get()->count()])
@section('content')


    @php
           if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                       
                            $dir = 'rtl';
                       
            else
                    
                            $dir = 'ltr';
                      
            
    @endphp
<div class="shopping">
    <h1>{{__('Shop by category')}}</h1>
    <div class="container">
        <div class="row">
        <div class="" dir="{{$dir}}">
             <div class="row">
             @foreach($categores as $ca)
             <div class="col-lg-3 col-6 mb-3">
                 <div class="d-flex flex-column item">
                 {{-- @if($ca->img) --}}
                <div class="sort text-center">
                    <a href="{{route('category_property',$ca->id)}}" class="text-decoration-none">
                    @if($ca->img)
                    <img src="{{asset('/storage/property/'.$ca->img)}}" alt="" class="custom-imgg">
                    @else
                    <img src="{{asset('assets/img/New/9jBoZTrvMNDfqb8ISPRPSAB5W200JUMSLyzdxjaU.png')}}" alt="" class="custom-imgg">
                    @endif
                    
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
                 {{-- @endif                 --}}
                </div>
               </div>
             @endforeach
             </div>
           </div>
        


        </div>
    </div>
</div>





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
 