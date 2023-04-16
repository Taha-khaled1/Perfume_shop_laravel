@extends('layouts.layoutSite.SitePage')
 
<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">

@section('content')

<!-- start breadcrumb -->

<section class="section-breadcrumb p-2">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{__('Order tracking')}}</li>
                </ol>
              </nav>
        </div>
    </div>
</section>
<!-- end breadcrumb -->

<section class="container section-order-details mb-5">
    <div class="row">
<p class="h5">
 {{__('Order details')}}
</p>
 
<br>

<ul class="order-details mt-4">
    <li>
        <span>  {{__('Order number')}}</span>
         : 
         <span class="order">#{{$order->id}}</span>
    </li>
    <li>
        <span> {{__('Total')}}</span>
         : 
         <span class="order"><span>{{$order->items->count()}}</span> {{__('Producer')}}</span>
         <span>{{$order->total}}</span>
         {{__('AED')}}
    </li> <li>
        <span>{{__('Order status')}}</span>
         : 
         <span class="order"> @if($order->status == 0) {{__('Reques has been rejected')}}@endif @if($order->status == 1) {{__('The receipt of the request')}} @endif @if($order->status == 2)  {{__('The order has been shipped')}} @endif @if($order->status == 3) {{__('The request is cancelled')}} @endif</span>
    </li>
    <li>
        <span>{{__('payment status')}}</span>
         : 
         <span class="order">  :    @if($order->payment_method == "cash")
                                    الدفع عند الاستلام
                                    @else
                                    بطاقة ائتمان
                                    @if($order->payment )
                                    @if($order->payment->status == 'pending' )                                                                              
                                    <span class="badge bg-primary"> في انتظار الدفع</span>
                                    @elseif($order->payment->status == 'completed')
                                    <span class="badge bg-success">  تم الدفع</span>
                                    @elseif($order->payment->status == 'failed')
                                    <span class="badge bg-danger"> تم الغاء الدفع</span>
                                    @else
                                    <span class="badge bg-danger"> فشل الدفع</span>
                                    @endif
                                    @endif  @endif</span>
    </li>
</ul>
<br>
<hr>
<div class="table-responsive">
                                 <table id="example" class="table table-striped table-bordered" style="width:90%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> {{__('Product name')}}</th>
                                         <th> {{__('Product code')}}</th>
                                        <th> {{__('Product Image')}}</th> 
                                        <th> {{__('Product quantity')}}</th>
                                        <th>{{__('Price')}}</th>
                                        <th>{{__('Total')}}</th>
                                        
                                 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->items as $item)
                                    <tr  >
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$item->product_name}} </td>
                                        <td>{{$item->product->code}} </td>
                                        
                                        <td>
                                        @if($item->product->image)
                                        <img src="{{asset('/storage/property/'.$item->product->image)}}"   alt="{{$item->product->image}}" width="100">
                                        @endif 
                                        </td>
                                        <td>{{$item->quantity}} </td>
                                        <td>{{$item->product->price}} {{__('AED')}}</td>
                                        <td>{{$item->product->price * $item->quantity}} {{__('AED')}}</td>
                                         
                                        </tr>
                                        @endforeach
                                    </tbody>
                                 </table>
                               
                                 </div>
</section>


@stop

@push('js')   
    
    @endpush

