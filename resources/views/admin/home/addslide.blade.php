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
                            <h4 class="page-title">تفاصيل</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                    @include('layouts.success')
                    @include('layouts.error')
                </div>
                <!-- end page title end breadcrumb -->
                <form  action="{{ route('slideedit') }}" >
                <button type="submit" class="btn btn-primary">اضافة شرائح جديده</button>
            </form>
                <div class="image-container">
                    @foreach ($images as $image)
                        <div class="image-card">
                            <img src="{{ $image->image }}" alt="{{ $image->name }}">
                            <div class="overlay">
                                <div class="image-details">
                                    <h3>{{ $image->name }}</h3>
                                </div>
                                <div class="image-actions">
                                    <a href="{{route('admin.show',$image->id)}}" class="edit-form"><i class="icofont-edit text-secondary font-20"></i></a>


                                    <a href="{{route('admin.destroy',$image->id)}}"> <i class="icofont-trash text-danger font-20"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                

                {{-- <div class="image-container">
                    @foreach ($images as $image)
                        <div class="image-card">
                            <img src="{{asset($image->image)}}" alt="{{ $image->name }}">
                            <div class="overlay">
                                <p>{{ $image->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                






























            </div><!-- container -->



            <div class="modal" id="edit-modal">
                <div class="modal-content">
                  <span class="close">&times;</span>
                  <form>
                    <div class="form-group">
                      <label for="edit-name">Name:</label>
                      <input type="text" id="edit-name" name="edit-name">
                    </div>
                    <div class="form-group">
                      <label for="edit-image">Image:</label>
                      <input type="file" id="edit-image" name="edit-image">
                    </div>
                    <div class="form-group">
                      <label for="edit-preview">Preview:</label>
                      <img id="edit-preview" src="#" alt="Preview" />
                    </div>
                    <button type="submit" class="save-btn">Save</button>
                  </form>
                </div>
              </div>


              
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
<script>

// Get the modal
var modal = document.getElementById("edit-modal");

// Get the <span> element that closes the modal


var span = document.getElementsByClassName("close")[0];

// When the user clicks on the edit icon, open the modal
document.querySelector('.edit-btn').addEventListener('click', function() {
  modal.style.display = "block";
});

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Preview the image before uploading
document.getElementById("edit-image").addEventListener("change", function

() {
const reader = new FileReader();

reader.onload = function() {
const previewImg = document.getElementById("edit-preview-image");
previewImg.src = reader.result;
};

if (this.files[0]) {
reader.readAsDataURL(this.files[0]);
}
});

// Handle form submission
document.getElementById("edit-form").addEventListener("submit", function(event) {
event.preventDefault();
// Do something with the form data, e.g. submit it via AJAX
const name = document.getElementById("edit-name").value;
const image = document.getElementById("edit-image").files[0];
// Close the modal
modal.style.display = "none";
// Reset the form fields
document.getElementById("edit-form").reset();
});




</script>
@endpush