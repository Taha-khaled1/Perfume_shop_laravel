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
                            <h4 class="page-title"> عمليات الدفع </h4>
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
                                        
                                        <th>قيمة الفاتورة</th>
                                        <th>طريقة الدفع</th>
                                        <th>حاله الدفع</th>
                                        <th> التاريخ</th> 
                                        <th>رقم التحويل</th>
                                        <th>تفاصيل</th>
                                         
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $p)
                                    <tr  class="R_user{{$p->id}}">
                                        <td>{{$p->id}} </td>
                                        <td>{{$p->amount}}د.إ</td>
                                        <td>{{$p->method }} </td>
                                        <td>@if($p->status == 'pending' )                                                                              
                                            <span class="badge bg-primary"> في انتظار الدفع</span>
                                            @elseif($p->status == 'completed')
                                            <span class="badge bg-success">  تم الدفع</span>
                                            @elseif($p->status == 'failed')
                                            <span class="badge bg-danger"> تم الغاء الدفع</span>
                                            @else
                                            <span class="badge bg-danger"> فشل الدفع</span>
                                            @endif </td> 
                                        <td>{{$p->created_at->format('d/m/Y')}} </td>
                                        <td>{{$p->transaction_id}} </td>
                                        <td> <a href="{{ route('admin.order.profile',$p->order->id)}}"><span class=" text-primary ">عرض طلب رقم {{$p->order->id}}</span></a>  </td>
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
 
 </script>
@endpush