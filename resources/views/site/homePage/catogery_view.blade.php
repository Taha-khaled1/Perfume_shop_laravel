@extends('layouts.layoutSite.SitePage')

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
 