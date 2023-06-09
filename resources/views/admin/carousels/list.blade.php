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
                          
                            <h4 class="page-title">   العروض</h4>
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
                            <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Post" role="tab"
                                           aria-selected="true">العروض  </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab"
                                           aria-selected="false">اضف عرض  </a>
                                    </li>
                                </ul>

                            <div class="tab-content">
                              <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                <div class="table-responsive">
                                 <table id="example" class="table table-striped table-bordered" style="width:90%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> العنوان </th>
                                        <th>الوصف </th>
                                        <th>الصورة </th>
                                        <th>العمليات </th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($carousels as $t)
                                    <tr class="R_currency{{$t->id}}">
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$t->title}} </td>
                                        <td>{{$t->text}} </td>
                                        <td> @if($t->image)
                                        <img src="{{asset('/storage/property/'.$t->image)}}"   alt="{{$t->image}}" width="100">
                                        @endif  </td>
                                        <td>  <a href="{{ route('admin.carousel.profile', $t->id)}}"><i class=" icofont-edit text-secondary  "></i></a>
                                        <a href=" " class="deletem_b" deletem_b="{{$t->id}}"><i class=" icofont-trash text-danger  "></i></a>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                 </table>
                                 </div>
                                 </div>
                                 <div class="tab-pane p-3" id="Settings" role="tabpanel">
                                        <div class="row">
                                        <div class="card">
                                        <form name="" method="post" action="{{ route('admin.carousel.save') }}"   enctype= "multipart/form-data" >
                                     @csrf
 
                                        <div class="row">
                                            <div class="col-lg-6">
                                        
                                            <label  class="col-sm-2 "></label>
                                            <div class="col-sm-9">
                                            <div class="form-check form-switch form-switch-success">
                                            <input class="form-check-input" value="1" name="featured" type="checkbox"    >
                                            <label class="form-check-label" for="customSwitchSuccess"> عرض في الصفحة الرئيسية كسلايدر</label>
                                        </div>
                                     </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end"> العنوان  </label>
                                            <div class="col-sm-6">
                                            @error('title')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                                <input class="form-control" name="title" type="text" value="{{old('title')}}" id="example-text-input" maxlength="50">
                                            </div>
                                        </div>
                                        {{-- <div class="mb-4 row">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end"> العنوان باللغة الانجليزية </label>
                                            <div class="col-sm-6"> 
                                                <input class="form-control" name="title_en" type="text" value="{{old('title_en')}}" id="example-text-input" maxlength="50">
                                            </div>
                                        </div>
                                         <div class="mb-4 row" id="bb">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end"> عنوان فرعي  </label>
                                            <div class="col-sm-6">
                                            @error('subtitle')
                                        <small class="form-text text-danger">{{$message}}</small> 
                                        @enderror
                                                <input class="form-control" name="subtitle" type="text" value="{{old('subtitle')}}" id="example-text-input" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="mb-4 row" id="bb">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end"> عنوان فرعي باللغة الانجليزية </label>
                                            <div class="col-sm-6">
                                         
                                                <input class="form-control" name="subtitle_en" type="text" value="{{old('subtitle_en')}}" id="example-text-input" maxlength="50">
                                            </div>
                                        </div> --}}
                                           <div class="mb-4 row">
                                            <label for="example-text-input" class="col-sm-1 col-form-label text-end">  رابط تسوق الان   </label>
                                            <div class="col-sm-6">
                                            
                                                <input class="form-control" name="link" type="text" value="{{old('link')}}" id="example-text-input" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                        
                                        <label   class="col-sm-1 col-form-label text-end">الوصف </label>
                                        <div class="col-sm-9">
                                        @error('text')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                        <textarea class="form-control" name="text" rows="5" maxlength="300" >{{old('text')}}</textarea>                                            </div>
                                    </div> 

                                        {{-- <div class="mb-3 row">
                                        
                                        <label   class="col-sm-1 col-form-label text-end">الوصف باللغة الانجليزية</label>
                                        <div class="col-sm-9">
                                      
                                        <textarea class="form-control" name="text_en" rows="5" maxlength="300" >{{old('text_en')}}</textarea>                                            </div>
                                    </div> --}}

                                    <div class="mb-3 row">
                                       
                                        <label   class="col-sm-1 col-form-label text-end">الصورة الرئيسية</label>
                                        <div class="col-sm-9">
                                        @error('image')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                        <input type="file" name="image" class="form-control"   />   
                                         </div>
                                    </div> 
                                         















                                        
                                        </div><!--end row-->
                                        <div class="form-group mb-3 row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="submit" class="btn btn-primary">
                                                حفظ
                                            </button>
                                             
                                        </div>
                                        </div>
                                    </form>
                                                </div>

                                            </div><!--end col-->
                                        </div><!--end row-->
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
 
<script>
$('.deletem_b').on("click", function (e) {
            e.preventDefault();
               
         var id = $(this).attr('deletem_b');
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
                url: "{{ route('delete_carousel') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $(".R_currency"+ data.id).remove();
                       
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });                   Swal.fire(
                'تم الحذف!',
                'تم الحذف بنجاح.',
                'success'
                )
            }
            })
         

          
    });
    
  $("input[type='checkbox']").change(function() {
    if(this.checked) {
      $("#aa" ).show();
      $("#bb" ).hide();


    }else{
       $("#aa" ).hide();
      $("#bb" ).show();

    }
})
 </script>
@endpush