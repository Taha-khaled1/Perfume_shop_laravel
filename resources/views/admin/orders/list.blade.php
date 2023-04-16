@extends('layouts.admin.main')

@section('content')


    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-end">
                               
                            </div>
                            <h4 class="page-title">@if($a)طلبات تم استلامها او الغاءها@else طلبات جديدة@endif</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
               @include('layouts.success')
                @include('layouts.error')
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">


                            <div class="card-body">
                            

                            <div class="tab-content">
                              <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                <div class="table-responsive">
                                 <table id="myDataTable" class="table table-hover align-middle mb-0" style="width:90%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>المجموع</th>
                                        <th>اسم المستخدم</th>
                                        <th>حالة الطلب</th>
                                        <th>عدد المنتجات</th>
                                        <th>حالة الدفع</th>
                                        <th>التاريخ</th>
                                        <th>تفاصيل</th>
                                         
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $c)
                                    <tr  class="R_user{{$c->id}}">
                                        <td>{{$c->id}} </td>
                                        <td>{{$c->total}}د.إ </td>
                                        <td> @if($c->user->id) <a href="{{ route('admin.user.profile', $c->user->id)}}"><i class="icofont-eye  text-secondary font-20"></i> {{$c->user->fname}}</a>@else {{ @$c->address->name}} @endif</td>
                                        <td>@if($c->status == 1) <span class="badge bg-info">طلب جديد</span>
                                        @elseif($c->status == 2) <span class="badge bg-primary">تم الشحن</span>
                                        @elseif($c->status == 3) <span class="badge bg-success">تم التسليم</span>
                                        @else <span class="badge bg-danger">طلب ملغي</span>
                                        @endif</td>
                                        <td>{{$c->items->count()}} </td> 
                                        <td>     @if($c->payment_method == "cash")
                                        <span class="badge bg-primary">الدفع عند الاستلام</span>
                                                    @else
                                                    @if($c->payment )
                                                    @if($c->payment->status == 'pending' )                                                                              
                                                    <span class="badge bg-primary"> في انتظار الدفع</span>
                                                    @elseif($c->payment->status == 'completed')
                                                    <span class="badge bg-success">  تم الدفع</span>
                                                    @elseif($c->payment->status == 'failed')
                                                    <span class="badge bg-danger"> تم الغاء الدفع</span>
                                                    @else
                                                    <span class="badge bg-danger"> فشل الدفع</span>
                                                    @endif
                                                    @endif @endif 
                                        </td>
                                        <td>{{$c->created_at->format('d/m/Y')}} </td>
                                        <td>  <a href="{{ route('admin.order.profile', $c->id)}}"><i class="icofont-edit text-secondary font-20"></i></a>
                                     <a  href=" " class="deletem_b"  deletem_b="{{$c->id}}"> <i class="icofont-trash text-danger font-20"></i></a>
                                         </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                 </table>
                                 </div>
                                 </div>
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div><!-- container -->


        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->


@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="{{ url('/') }}/cp/assets/bundles/dataTables.bundle.js"></script>  

<script>
    
    $('#myDataTable')
    .addClass( 'nowrap' )
    .dataTable( {
        order: [[0, 'desc']],
        responsive: true,
        columnDefs: [
            { targets: [-1, -3], className: 'dt-body-right' }
        ]
    });

$('.deletem_b').on("click", function (e) {
            e.preventDefault();
               
         var id = $(this).attr('deletem_b');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('delete_category') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $(".R_category"+ data.id).remove();
                       
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });
    
    $(document).on("click", ".deletem_b", function (e) {
        e.preventDefault();
        if(confirm( `  Are you sure? ` )){
        var deletem_b = $(this).attr("deletem_b");
        $.ajax({
            type: "post",
            url: "{{route('admin.order.delete')}}",
            data: {
                _token: "{{csrf_token()}}",
                id: deletem_b,
            },
            success: function (data) {
                if (data.status == true) {
                  
                 
                }
                flashBox('success', ' تم الحذف');

                $(".R_user" + data.id).remove();
            },
            error: function (reject) {},
        });
    }
    });
 
 </script>
@endpush