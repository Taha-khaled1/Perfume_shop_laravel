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
                            {{-- <h4 class="page-title">@if ($a)طلبات تم استلامها او الغاءها@else طلبات جديدة@endif</h4> --}}
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
                                <div class="button-container">


                                    <a href="{{ route('admin.orders') }}">
                                        <button class="button primary">الطلبات الجديده</button>
                                    </a>
                                    <a href="{{ route('orderss.list') }}">
                                        <button class="button secondary">طلبات تم شحنها</button>
                                    </a>
                                    <a href="{{ route('sh.admin.orders') }}">
                                        <button class="button primary">الطلبات تم تسليمها</button>
                                    </a>
                                    <a href="{{ route('shs.admin.orders') }}">
                                        <button class="button tertiary">طلبات تم الغائها</button>
                                    </a>
                                    <a href="{{ route('orderss.exportProducts') }}">
                                        <button class="button primary">تصدير المنتجات</button>
                                    </a>
                                    <a href="{{ route('orderss_print_all') }}">
                                        <button class="button primary">تحديد الجميع والطباعه</button>
                                    </a>


                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                        <div class="table-responsive">


                                            <form action="{{ route('orderss_print_ids') }}">

                                                <button class="button secondary">طباعة الذي تم تحديده</button>
                                               <br>
                                               
                                                <table id="myDataTable" class="table table-hover align-middle mb-0"
                                                    style="width:90%;">
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
                                                            <th>اختيار</th>
                                                            <th>اختيار</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (count($orders) > 0)
                                                            @foreach ($orders as $c)
                                                                <tr class="R_user{{ $c->id }}">
                                                                    <td>{{ $c->id }} </td>
                                                                    <td>{{ $c->total }}د.إ </td>
                                                                    <td>
                                                                        @if ($c->user->id)
                                                                            <a
                                                                                href="{{ route('admin.user.profile', $c->user->id) }}">
                                                                                <i>
                                                                                </i>
                                                                                {{ $c->user->fname }}</a>
                                                                        @else
                                                                            {{ @$c->address->name }}
                                                                        @endif
                                                                    </td>


                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <button
                                                                                class="btn btn-secondary dropdown-toggle"
                                                                                type="button" id="statusDropdown"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                @if ($c->status == 1)
                                                                                    <span class="badge bg-info">طلب جديد
                                                                                    @elseif($c->status == 2)
                                                                                        <span class="badge bg-primary">تم
                                                                                            الشحن</span>
                                                                                    @elseif($c->status == 3)
                                                                                        <span class="badge bg-success">تم
                                                                                            التسليم</span>
                                                                                    @else
                                                                                        <span class="badge bg-danger">طلب
                                                                                            ملغي</span>
                                                                                @endif
                                                                            </button>
                                                                            <ul class="dropdown-menu"
                                                                                aria-labelledby="statusDropdown">
                                                                                <li>
                                                                                    <form method="POST"
                                                                                        action="{{ route('update.order', [$c->id, 1]) }}">
                                                                                        @csrf <button type="submit"
                                                                                            class="dropdown-item">طلب
                                                                                            جديد</button>
                                                                                    </form>
                                                                                </li>
                                                                                <li>
                                                                                    <form method="POST"
                                                                                        action="{{ route('update.order', [$c->id, 2]) }}">
                                                                                        @csrf <button type="submit"
                                                                                            class="dropdown-item">تم
                                                                                            الشحن</button>
                                                                                    </form>
                                                                                </li>
                                                                                <li>
                                                                                    <form method="POST"
                                                                                        action="{{ route('update.order', [$c->id, 3]) }}">
                                                                                        @csrf <button type="submit"
                                                                                            class="dropdown-item">تم
                                                                                            التسليم</button></form>
                                                                                </li>
                                                                                <li>
                                                                                    <form method="POST"
                                                                                        action="{{ route('update.order', [$c->id, 0]) }}">
                                                                                        @csrf <button type="submit"
                                                                                            class="dropdown-item">طلب
                                                                                            ملغي</button>
                                                                                    </form>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>



                                                                    {{-- <td>@if ($c->status == 1) <span class="badge bg-info">طلب جديد</span>
                                    @elseif($c->status == 2) <span class="badge bg-primary">تم الشحن</span>
                                    @elseif($c->status == 3) <span class="badge bg-success">تم التسليم</span>
                                    @else <span class="badge bg-danger">طلب ملغي</span>
                                    @endif</td> --}}
                                                                    <td>{{ $c->items->count() }} </td>




                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <button
                                                                                class="btn btn-secondary dropdown-toggle"
                                                                                type="button" id="statusDropdown"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                @if ($c->payment->status == 'pending')
                                                                                    <span class="badge bg-info">في انتظار
                                                                                        الدفع</span>
                                                                                @elseif($c->payment->status== 'completed')
                                                                                    <span class="badge bg-primary">تم
                                                                                        الدفع</span>
                                                                                @elseif($c->ppayment->status == 'failed')
                                                                                    <span class="badge bg-success">تم الغاء
                                                                                        الدفع</span>
                                                                                @else
                                                                                    <span class="badge bg-danger">الدفع عند
                                                                                        الاستلام</span>
                                                                                @endif
                                                                            </button>
                                                                            <ul class="dropdown-menu"
                                                                                aria-labelledby="statusDropdown">
                                                                                <li>
                                                                                    <form method="POST"
                                                                                        action="{{ route('update.orderpay', [$c->id, 'pending']) }}">
                                                                                        @csrf <button type="submit"
                                                                                            class="dropdown-item">في انتظار
                                                                                            الدفع</button></form>
                                                                                </li>
                                                                                <li>
                                                                                    <form method="POST"
                                                                                        action="{{ route('update.orderpay', [$c->id, 'completed']) }}">
                                                                                        @csrf <button type="submit"
                                                                                            class="dropdown-item">تم
                                                                                            الدفع</button>
                                                                                    </form>
                                                                                </li>
                                                                                <li>
                                                                                    <form method="POST"
                                                                                        action="{{ route('update.orderpay', [$c->id, 'failed']) }}">
                                                                                        @csrf <button type="submit"
                                                                                            class="dropdown-item">تم الغاء
                                                                                            الدفع</button></form>
                                                                                </li>
                                                                                <li>
                                                                                    <form method="POST"
                                                                                        action="{{ route('update.orderpay', [$c->id, 'cash']) }}">
                                                                                        @csrf <button type="submit"
                                                                                            class="dropdown-item">الدفع عند
                                                                                            الاستلام</button></form>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>






                                                                    <td>{{ $c->created_at->format('d/m/Y') }} </td>
                                                                    <td>



                                                                        <a href=" " class="deletem_b"
                                                                            deletem_b="{{ $c->id }}"> <i
                                                                                class="icofont-trash text-danger font-20"></i></a>



                                                                        <a
                                                                            href="{{ route('admin.order.profile', $c->id) }}"><i
                                                                                class="icofont-eye  text-secondary font-20"></i></a>

                                                                        {{-- @if ($c->user->id)
                                                                <a
                                                                    href="{{ route('admin.user.profile', $c->user->id) }}"><i
                                                                        class="icofont-eye  text-secondary font-20"></i>
                                                                </a>
                                                            @endif --}}


                                                                    </td>
                                                                    <td>

                                                                        <a href="{{ route('print', $c->id) }}">
                                                                            <button class="button primary">طباعه</button>
                                                                        </a>

                                                                    </td>

                                                                    <td>

                                                                        <input type="checkbox" name="vehicle[]"
                                                                            value="{{ $c->id }}">






                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <p>لا يوجد بيانات</p>
                                                        @endif

                                                    </tbody>
                                                </table>
                                        </div>
                                        </form>
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
        <script src="https://code.jquery.com/jquery-3.5.0.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
        <script src="{{ url('/') }}/cp/assets/bundles/dataTables.bundle.js"></script>

        <script>
            $('#myDataTable')
                .addClass('nowrap')
                .dataTable({
                    order: [
                        [0, 'desc']
                    ],
                    responsive: true,
                    columnDefs: [{
                        targets: [-1, -3],
                        className: 'dt-body-right'
                    }]
                });

            $('.deletem_b').on("click", function(e) {
                e.preventDefault();

                var id = $(this).attr('deletem_b');


                $.ajax({
                    type: "post",
                    url: "{{ route('delete_category') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        "id": id
                    },
                    dataType: 'json', // let's set the expected response format
                    success: function(data) {
                        $(".R_category" + data.id).remove();

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

            $(document).on("click", ".deletem_b", function(e) {
                e.preventDefault();
                var deletem_b = $(this).attr("deletem_b");
                Swal.fire({
                    title: 'هل أنت متأكد?',
                    text: "لن تتمكن من التراجع عن هذا!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'حذف!',
                    cancelButtonText: 'إلفاء!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "{{ route('admin.order.delete') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: deletem_b,
                            },
                            success: function(data) {
                                if (data.status == true) {

                                    $(".R_user" + data.id).remove();

                                }
                            },
                            error: function(reject) {},
                        });
                        Swal.fire(
                            'تم الحذف!',
                            'تم الحذف بنجاح.',
                            'success'
                        )
                    }
                })

            });
        </script>
    @endpush
