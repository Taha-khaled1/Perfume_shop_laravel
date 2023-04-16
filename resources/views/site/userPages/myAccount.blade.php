@extends('layouts.layoutSite.SitePage')
{{-- <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}"> --}}
 @section('content')
<style>
    .my-account-wrapper .nav{
        all:unset;
    }
</style>
 <!-- breadcrumb area start --><br>
 <div class="breadcrumb-area" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('viewHomePage')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('My account')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<!-- end breadcrumb -->
@if ($errors->any())
    <div class="alert alert-danger col-md-4">
        {{__('Verify the information entered')}}
    </div>
@endif 
 <!-- my account wrapper start -->
 <div class="my-account-wrapper section-padding" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                            {{__('Control Board')}}</a>
                                            <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                            {{__('Requests')}}</a>
                                            <a href="#download" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                            {{__('Addresses')}}</a> 
                                            <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                            {{__('Add an address')}}</a>
                                            <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i>  {{__('Account details')}}</a>
                                             <form method="POST" action="{{ route('logout') }}" class="mr-70 ml-70" >
                                              @csrf
                                          <a href="{{route('logout')}}" class="nav-link pr-40 pl-40"
                                              onclick="event.preventDefault();
                                              this.closest('form').submit();"><i class="fa fa-sign-out"></i>
                                            {{__('Sign Out')}} </a> 
                                          </form> 
                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->

                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>{{__('Control Board')}}</h5>
                                                    <div class="welcome">
                                                        <p> {{__('Hello!')}} <strong> {{\Illuminate\Support\Facades\Auth::user()->fname}}</strong>  </p> 
                                                          <p>   {{__('From your account dashboard, you can view and manage your recent orders, shipping and billing addresses, and edit your password and account details.')}} </p>
                                                </div></div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>{{__('Requests')}}</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                              <tr>
                                                                <th scope="col"> {{__('Order number')}}</th>
                                                                <th scope="col"> {{__('Total')}}</th>
                                                                <th scope="col"> {{__('Quantity')}} </th>
                                                                <th scope="col"> {{__('Status')}} </th>
                                                                <th scope="col"> {{__('Cancel order')}}</th>
                                                                <th scope="col"> {{__('Payment status')}}</th>
                                                                <th scope="col"> {{__('View')}}</th>
                                                                
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach(\Illuminate\Support\Facades\Auth::user()->orders as $order)
                                                              <tr class="R_order{{$order->id}}">
                                                              <th scope="row">{{$order->id}}</th>
                                                              <td>  {{$order->total}}  {{__('AED')}}</td>
                                                              <td>    {{$order->items->count()}} </td>
                                                                
                                                                <th > @if($order->status == 0) {{__('Rejected')}}@endif @if($order->status == 1) {{__('Requested')}} @endif @if($order->status == 2)  {{__('is shipped')}} @endif @if($order->status == 3) {{__('Delivered')}} @endif </th>
                                                                <th> @if($order->payment_method == "cash") @if($order->status == 1)<a href="" class="deletem_order" deletem_order="{{$order->id}}" > {{__('cancel')}}</a>@endif @endif</th>
                                                                <td>    @if($order->payment_method == "cash")
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
                                                                        @endif  @endif </td>
                                                                <th ><a href="showorder/{{$order->id}}" > {{__('show')}}</a> </th>
                                                              </tr>
                                                              @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="download" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>{{__('Addresses')}}</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                             <tr>
                                                              <th scope="col"> {{__('Name')}} </th>
                                                              <th scope="col">   {{__('Email')}} </th>
                                                              <th scope="col">   {{__('Region')}}</th>
                                                              <th scope="col"> {{__('Street')}}</th>
                                                              <th scope="col"> {{__('Mobile number')}}</th>
                                                              <th scope="col"> {{__('Apartment/House')}} </th>
                                                              <th scope="col">  {{__('Blvd')}} </th>
                                                              <th scope="col">  {{__('delete')}} </th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                              @foreach(\Illuminate\Support\Facades\Auth::user()->addresses as $address)
                                                            <tr class="R_address{{$address->id}}">
                                                            <th scope="row">{{$address->name}}</th>
                                                              <td>{{$address->email}}</td>
                                                              <td >{{$address->area}}</td>
                                                              <th >{{$address->street}}</th>
                                                              <td>{{$address->phone}}</td>
                                                              <td>{{$address->house}}</td>
                                                              <td>{{$address->Blvd}}</td>
                                                              <td><a href="" class="deletem_b" deletem_b="{{$address->id}}" >{{__('delete')}}</a></td>
                                                            </tr>
                                                            @endforeach
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                             
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>{{__('The following addresses will be used on the checkout page by default')}}</h5>
                                                    <form method="POST" action="{{ route('user.location.save') }}"  >
                            @csrf
                            <div class="pb-8">
            <p style="color:red">* <label style="color:black" > {{__('Name')}}</label></p> 
                @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                <input type="text" class="form-control" name="name"  value="{{old('name')}}" placeholder="{{__('Name')}} " maxlength="100" required>
              </div><br>
      <div class="pb-8">
            <p style="color:red">* <label style="color:black" > {{__('Email')}}</label></p> 
                @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                <input type="text" class="form-control" name="email"  value="{{old('email')}}" placeholder="{{__('Email')}}" maxlength="100" required>
              </div><br>
         <div >
            <p style="color:red">* <label style="color:black" >  {{__('Region')}} </label></p> 
                @error('area')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                            <select name="area"  >
                                                     
                                                     @if( old('area') )
                                                     <option value="{{old('area')}}" selected>{{old('area')}}</option>@endif
                                                     <option value=""> {{__('Choose the regioan')}} </option>
                                                     @foreach($cities as $ca)
                                                     <option value="{{$ca->id}}"> {{$ca->name}}</option>
                                                     @endforeach
                                                 </select>               </div><br><br>
              <div class="pb-8">
            <p style="color:red">* <label style="color:black" > {{__('Street')}} </label></p> 
                @error('street')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                <input type="text" class="form-control" name="street"  value="{{old('street')}}" placeholder=" {{__('Street')}}   " maxlength="100" required>
              </div><br>
              <div class="pb-8">
             <label style="color:black" >  {{__('Add an address')}} </label><br>
          
                <input type="text" class="form-control" name="Blvd"  value="{{old('Blvd')}}" placeholder=" {{__('Blvd')}}   " maxlength="100"  ><br>
              </div><br>
              <div class="pb-8">
            <label style="color:black" > {{__('Apartment/House')}}  </label> 
               
                <input type="text" class="form-control" name="house"  value="{{old('house')}}" placeholder=" {{__('Apartment/House')}}   " maxlength="100" >
              </div><br>
        <div class="pb-8">
        <p style="color:red">* <label style="color:black" >  {{__('Mobile number')}} </label></p> 
            @error('phone')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="{{__('Mobile number')}} " maxlength="100" required >
          </div><br>
          <input type="submit" class="btn btn-sqr" value=" {{__('Add an address')}}  ">

</form>
                                                     
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h6>{{__('The following addresses will be used on the checkout page by default')}} </h6><hr><br>
                                                    <div class="account-details-form">
                                                    <form  name="learner_security" id="learner_security" enctype="multipart/form-data" method="post" action="">
                        @csrf
                        <div class="pb-8">
                           <p style="color:red">* <label style="color:black" > {{__('First name')}}</label></p>
                           @error('fname')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                           <input type="text" class="form-control" name="fname"  value="{{Auth::user()->fname}}" placeholder=" {{__('First name')}} " maxlength="100" required>
                        </div>
                        <br>
                        <div class="pb-8">
                           <p style="color:red">* <label style="color:black" > {{__('Second name')}}</label></p>
                           @error('lname')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                           <input type="text" class="form-control"  name="lname"  value="{{Auth::user()->lname}}" placeholder=" {{__('Second name')}} " maxlength="100" required>
                        </div>
                        <br>
                        <div class="pb-8">
                           <p style="color:red">* <label style="color:black" > {{__('Email')}}</label></p>
                           @error('email')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                           <input type="text" class="form-control" name="email"   value="@if(Auth::user()->email) {{ Auth::user()->email }} @endif" placeholder=" {{__('Email')}}" maxlength="100" required>
                        </div>
                        <br> 
                        <label for="user-password" class="form-label"> {{__('Change Password')}} </label>
                        <div class="input-group">
                           @error('old_password')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                            <input type="password" class="form-control" class="form-control" name="old_password" aria-label="user-password" aria-describedby="user-password" placeholder="{{__('Old Password')}} ">
                        </div>
                        <br>
                        <div class="input-group">
                           @error('new_password')
                           <small class="form-text text-danger">{{$message}}</small>
                           @enderror
                            <input type="password" class="form-control" class="form-control" name="new_password" aria-label="user-password" aria-describedby="user-password" placeholder=" {{__('New password')}} ">
                        </div>
                        <br>
                        <div class="mb-3">
                           <div class="input-group">
                              @error('password_confirmation')
                              <small class="form-text text-danger">{{$message}}</small>
                              @enderror
                               <input type="password" class="form-control" class="form-control" name="password_confirmation" aria-label="user-password" aria-describedby="user-password" placeholder=" {{__('Confirm password')}} ">
                           </div>
                        </div><br>
                        <button id="learner_security_btn" class="btn btn-sqr"> {{__('Save changes')}}  </button>

                   </div>
                  </form>
                                                    </div>
                                                </div>
                                            </div> <!-- Single Tab Content End -->
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                                </div>
                            </div> <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
@stop

@push('js')

<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
 
<script>
$('.deletem_b').on("click", function (e) {
            e.preventDefault();
               
         var id = $(this).attr('deletem_b');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('delete_address') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $(".R_address"+ data.id).remove();
                        flashBox('success', ' تم الحذف');

                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });
    

    $('.deletem_order').on("click", function (e) {
            e.preventDefault();
            
        if (confirm("هل انت متأكد من الغاء الطلب") == true) {

         var id = $(this).attr('deletem_order');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('delete_order') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $(".R_order"+ data.id).remove();
                        flashBox('success', ' تم الحذف');

                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
              }
    });


$('#learner_security_btn').on('click' , function (e) {
            e.preventDefault();
            $(document).find('#err').remove();
            $.ajax({
                type: "post",
                url: "{{ route('user.settings_security.save') }}",
                data: $("#learner_security").serialize(),
                dataType: 'json',              // let's set the expected response format
                success: function (data) {
                    //console.log(data);
                    flashBox('success', 'تم تحديث البيانات');

                     
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        $('#success_message_security').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible"> تأكد من البيانات المدخلة</div>');
                        document.body.scrollTop = document.documentElement.scrollTop = 0;

                        // you can loop through the errors object and show it to the user
                        console.warn(err.responseJSON.errors);
                        // display errors on each form field
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            //el.nextAll().remove();
                            el.after($(' <div id="err" class="input-group"><span  style="color: red;">' + error[0] + '</span> </div>'));
                        });
                    }
                }
            });

        });



 </script>
@endpush
