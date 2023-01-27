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
    <style>
        .profile {
            position: relative;
            width: 200px;
            height: 200px;
            transition: .3s ease-in-out;
        }

        /* .profile:hover{
                        transform: scale(1.06);
                        filter: brightness(150%)
                    } */
        .profile label {
            display: inline-block;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #8b2cff, #5C00CE);
            border-radius: 10%;
            border: 3px solid #fff;
            text-align: center;
            cursor: pointer;
            overflow: hidden;
            line-height: 227px;
            box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
        }

        .profile input[type="file"] {
            display: none;
        }

        .profile .fe-image {
            font-size: 12rem;
            color: rgb(212, 212, 212);
        }

        .profile label:hover .fe-camera {
            transform: translateX(-27.5%) translateY(-43.5%) scale(1.3);
        }

        .profile .fe-camera {
            position: absolute;
            bottom: 8px;
            right: 8px;
            background: #fff;
            color: #333;
            line-height: normal;
            padding: .5rem;
            border-radius: 50%;
            font-size: 1.5rem;
            transition: .3s ease-in-out;
            box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                    <strong class="text-dark">Your record add successfully</strong><button type="button" class="close"
                        data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h2 class="page-title">Add Album</h2>
                <p class="text-muted">Fill the below form</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Album</strong>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('/dashboard/album-store') }}" method="POST" class="needs-validation"
                                    id="AddAlbumForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="alert alert-warning d-none" role="alert" id="save_error"></div>
                                    <div class="form-row justify-content-center">
                                        <div class="profile">
                                            <label>
                                                <span class="fe fe-image"></span>
                                                <span class="fe fe-camera"></span>
                                                <input type="file" class="image-input" name="coverImage">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label>Album Name</label>
                                            <input type="text" class="form-control" name="coverName"
                                                placeholder="Enter album name">
                                            <div class="valid-feedback"> Looks good! </div>
                                        </div>
                                    </div>
                                     <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="simple-select2">Select Artist</label>
                                            <select class="form-control select2" name="artist" id="simple-select2">
                                              @foreach ($artist as $item)
                                                  <option value="{{$item->artist_id}}">{{$item->artist_name}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                     </div>

                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input"
                                                id="customControlValidation16">
                                            <label class="custom-control-label" for="customControlValidation16"> Agree to
                                                terms
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
    <script>
        let input_file = document.querySelector(".image-input");
        let image_label = document.querySelector(".profile label");
        input_file.onchange = (e) => {
            let files = e.target.files[0];
            let url = URL.createObjectURL(files);
            image_label.style.background = `url(${url}) center / cover`;
            image_label.querySelector('.fe-image').style.display = "none";
        }
    </script>
@endsection
@section('script')
<script src="/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
       $(document).on("submit", "#AddAlbumForm", function (e) {
           
           e.preventDefault();

           let formData = new FormData($('#AddAlbumForm')[0]);

           $.ajax({
               method: "post",
               url: "/dashboard/album-store",
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
                    $('#AddAlbumForm').find('input').val('');
                    image_label.style.background = `linear-gradient(45deg, #8b2cff, #5C00CE)`;
                    image_label.querySelector('.fe-image').style.display = "block";
                    $(".alert-success").removeClass('d-none');
                 }

               }
           });

       });
    });
 </script>
@endsection