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
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"></a></li>
                                 </ol>
                            </div>
                            <h4 class="page-title">اضافة الشرائح</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                    @include('layouts.success')
                    @include('layouts.error')
                </div>
                <!-- end page title end breadcrumb -->


     








                <div class="container">
              
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form  action="{{ route('slidestore') }}" method="POST" enctype="multipart/form-data">
                                {{ method_field('post') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">الاسم:</label>
                                    <input type="text" id="name" name="name" class="form-control" value="">
                                </div>
                               
                                <div class="form-group">
                                    <label for="image">الصوره:</label>
                                    <div>
                                        <input type="file" id="image" name="image" class="form-control-file" enctype="multipart/form-data">
                                    </div>
                                  
                                </div>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>




{{-- 
                <main>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="name">{{$images->name}}</label>
                            <input type="text" id="name" name="name" value="{{$images->name}}">
                        </div>
            
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image">
                        </div>
            
                        <button type="submit" class="btn-save"><i class="fas fa-save"></i> Save Changes</button>
                    </form>
                </main> --}}





























            </div><!-- container -->





              
            <!--Start Rightbar-->
            <!--Start Rightbar/offcanvas-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                    <button type="button" class="btn-close text-reset p-0 m-0 align-self-center"
                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <h6>Account Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch1" >
                            <label class="form-check-label" for="settings-switch1">Auto updates</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                            <label class="form-check-label" for="settings-switch2">Location Permission</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch3">
                            <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                    <h6>General Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch4">
                            <label class="form-check-label" for="settings-switch4">Show me Online</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                            <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch6">
                            <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                </div><!--end offcanvas-body-->
            </div>
            <!--end Rightbar/offcanvas-->
            <!--end Rightbar-->


        </div>
        <!-- end page content -->
    </div>

@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
document.getElementById("image").addEventListener("change", function() {
  const reader = new FileReader();
  const previewImg = document.querySelector(".image-preview");
  
  reader.addEventListener("load", function() {
    previewImg.src = reader.result;
  }, false);
  
  if (this.files[0]) {
    reader.readAsDataURL(this.files[0]);
  }
});


    // Preview the new image before uploading
    document.getElementById("image").addEventListener("change", function() {
        const reader = new FileReader();
        const previewImg = document.querySelector(".image-preview:last-of-type img");
        reader.onload = function() {
            previewImg.src = reader.result;
        };
        if (this.files[0]) {
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Handle form submission
    document.getElementById("modify-form").addEventListener("submit", function(event) {
        event.preventDefault();
        // Do something with the form data, e.g. submit it via AJAX
        const name = document.getElementById("name").value;
        const image = document.getElementById("image").files[0];
        // Reset the form fields
        document.getElementById("modify-form").reset();
        // Show success message or redirect to another page
        alert("Changes saved successfully.");
    });
</script>
@endpush