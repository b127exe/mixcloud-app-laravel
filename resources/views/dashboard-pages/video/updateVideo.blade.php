@extends('layouts.dashboard.dashboard')
@section('sidebar')
@if ($artist->isNotEmpty())
<p class="text-muted nav-heading mt-4 mb-1">
    <span>Music Component</span>
</p>
<ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item dropdown">
        <a href="#music" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-music fe-16"></i>
            <span class="ml-3 item-text">Song</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="music">
            <li class="nav-item">
                <a class="nav-link pl-3" href="/dashboard/add-song"><span class="ml-1 item-text">Add Song</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pl-3" href="/dashboard/sort-song"><span class="ml-1 item-text">Sort Songs</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
<p class="text-muted nav-heading mt-4 mb-1">
    <span>Video Components</span>
</p>
<ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item dropdown">
        <a href="#video" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-youtube fe-16"></i>
            <span class="ml-3 item-text">Video</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="video">
            <li class="nav-item">
                <a class="nav-link pl-3" href="/dashboard/add-video"><span class="ml-1 item-text">Add Video</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pl-3" href="/dashboard/sort-video"><span class="ml-1 item-text">Sort Videos</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
@endif
@endsection
@section('content-1')
    
     <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                    <strong class="text-dark">Your video detail updated successfully </strong><a href="/dashboard/sort-video">Go Back</a><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <h2 class="page-title">Update Video</h2>
                <p class="text-muted">Fill the below form</p>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card shadow">
                            <div class="card-header">
                               <strong class="card-title">Video Form</strong>
                            </div>
                            <div class="card-body">
                                <form action="{{url('/dashboard/update-store-video')}}/{{$findVideo->vid}}" method="post" enctype="multipart/form-data" id="UpdateVideoForm">
                                 @csrf
                                 <div class="alert alert-warning d-none" role="alert" id="save_error"></div>
                                 <div class="form-group mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" value="{{$findVideo->title}}" name="title" placeholder="Type video title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="example-textarea">Description</label>
                                    <textarea class="form-control" id="example-textarea" rows="4" style="height: 91px;" name="description">{{$findVideo->description}}</textarea>
                                  </div>
                                  <div class="form-group mb-3">
                                    <label>Video Duration</label>
                                    <input type="number" class="form-control" value="{{$findVideo->duration}}" name="duration">
                                  </div>
                                <div class="form-group mb-3">
                                    <label for="simple-select2">Video Artist</label>
                                    <select class="form-control select2" name="artist" id="simple-select2">
                                        @foreach ($artist as $item)
                                            <option value="{{$item->artist_id}}" @if ($item->artist_id == $findVideo->artist_id)
                                                selected
                                            @endif>{{$item->artist_name}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                <div class="form-group mb-3">
                                    <label for="simple-select3">Album</label>
                                    <select class="form-control select2" name="album" id="simple-select3">
                                        @foreach ($album as $item)
                                            <option value="{{$item->album_id}}" @if ($item->album_id == $findVideo->album_id)
                                                selected
                                            @endif>{{$item->album_name}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  <input type="text" value="{{$findVideo->video_path}}" hidden name="video">
                                  {{-- <div class="form-group mb-4">
                                    <label for="customFile">Video</label>
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="customFile" name="video">
                                      <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div> --}}
                              <div class="custom-control custom-checkbox mb-3">
                                  <input type="checkbox" class="custom-control-input" id="customControlValidation16"
                                      >
                                  <label class="custom-control-label" for="customControlValidation16"> Agree to terms
                                      and conditions</label>
                                  <div class="invalid-feedback"> You must agreed before submitting. </div>
                              </div>
                              <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>

@endsection
@section('script')
<script src="/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
       $(document).on("submit", "#UpdateVideoForm", function (e) {
           
           e.preventDefault();

           let formData = new FormData($('#UpdateVideoForm')[0]);

           $.ajax({
               method: "post",
               url: "/dashboard/update-store-video/{{$findVideo->vid}}",
               data: formData,
               contentType: false,
               processData: false,
               success: function (response) {
                   
                 if(response.status == 400){

                    $('#save_error').html("");
                    $('#save_error').removeClass("d-none");
                    $.each(response.errors, function (key, err_value) { 
                        
                      $('#save_error').append(`<p>${err_value}</p>`);

                    });

                 }
                 else if(response.status == 200){

                    $('#save_error').html("");
                    $('#save_error').addClass("d-none");
                    // this.reset();
                    $('#UpdateVideoForm').find('input').val('');
                    let textarea = document.getElementById('example-textarea');
                    textarea.value = "";
                    $(".alert-success").removeClass('d-none');
                 }

               }
           });

       });
    });
 </script>
@endsection