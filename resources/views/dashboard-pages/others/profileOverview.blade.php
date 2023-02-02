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
                        <a class="nav-link pl-3" href="/dashboard/sort-video"><span class="ml-1 item-text">Sort
                                Videos</span>
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
        border-radius: 50%;
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

    .profile .fe-user {
        font-size: 12rem;
        color: rgb(212, 212, 212);
    }

    .profile label:hover .fe-camera {
        transform: translateX(-27.5%) translateY(-43.5%) scale(1.3);
    }

    .profile .fe-camera {
        position: absolute;
        bottom: 0;
        right: 15px;
        background: #fff;
        color: #333;
        line-height: normal;
        padding: .5rem;
        border-radius: 50%;
        font-size: 1.5rem;
        transition: .3s ease-in-out;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    }

    .oldImgBox {
        position: relative;
    }

    .oldImgBox img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }

    .oldImgBox h2 {
        position: absolute;
        text-align: center;
        padding-top: 75px;
        font-size: 2rem;
        color: #fff;
        font-family: sans-serif;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.3);
        width: 100%;
        height: 100%;
        border-radius: 50%;
        opacity: 0;
        transition: 300ms linear;
    }

    .oldImgBox h2:hover {
        opacity: 1;
    }
</style>
<div class="modal fade" id="verticalModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="verticalModalTitle">Message</h5>
          <a href="/logout"><button type="button" class="close">
            <span aria-hidden="true">&times;</span>
          </button></a>
        </div>
        <div class="modal-body">
            <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                <strong class="text-dark">Your information update successfully please go login again.</strong><button type="button" class="close"
                    data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <h2 class="text-center">Information Updated</h2><hr>
          <a href="/logout"><button type="button" class="btn mb-2 btn-primary btn-lg btn-block">Go to Login</button></a>
        </div>
        <div class="modal-footer">
          <a href="/logout"><button type="button" class="btn mb-2 btn-secondary">Close</button></a>
        </div>
      </div>
    </div>
  </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Profile Settings</h2>
                <p class="text-muted">Overview and update your profile.</p>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                            role="tab" aria-controls="pills-home" aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                            role="tab" aria-controls="pills-profile" aria-selected="false">Profile Update</a>
                                    </li>
                                </ul>
                                <div class="tab-content mb-1" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <div class="row align-items-center mt-5">
                                            <div class="col-md-3 text-center mb-5">
                                              <a href="#!" class="avatar avatar-xl">
                                                <img src="{{url('/storage/users-images')}}/{{session()->get('photo')}}" alt="..." class="avatar-img rounded-circle">
                                              </a>
                                            </div>
                                            <div class="col">
                                              <div class="row align-items-center">
                                                <div class="col-md-7">
                                                  <h4 class="mb-1">{{session()->get('name')}}</h4>
                                                  <p class="small mb-3"><span class="badge badge-dark">Karachi, Pakistan</span></p>
                                                </div>
                                                <div class="col">
                                                </div>
                                              </div>
                                              <div class="row mb-4">
                                                <div class="col-md-12">
                                                  <p class="text-muted">Hi there, My name is {{session()->get('name')}} and this is mixcloud admin dashboard for those who R role as admin can only access this dashboard!</p>
                                                </div>
                                              </div>
                                              <div class="row align-items-center">
                                                <div class="col-md-7 mb-2">
                                                  {{-- <span class="small text-muted mb-0">{{$uid->created_at}}</span> --}}
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <form action="{{url('/dashboard/profile-overview-store')}}"
                                        id="UpdateAdminSetting" class="needs-validation" method="POST"
                                        enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="alert alert-warning d-none" role="alert"
                                            id="save_error"></div>
                                        <div class="form-row justify-content-around my-3">
                                            <div class="oldImgBox">
                                                <img
                                                    src="/storage/users-images/{{ session()->get('photo') }}">
                                                <h2>Old Image</h2>
                                            </div>
                                            <div class="profile">
                                                <label>
                                                    <span class="fe fe-user"></span>
                                                    <span class="fe fe-camera"></span>
                                                    <input type="file" class="image-input"
                                                        name="newImage">
                                                </label>
                                            </div>
                                        </div>
                                        <input type="text" value="{{ session()->get('photo') }}" hidden
                                            name="olgImage">
                                        <input type="text" value="{{ session()->get('id') }}" hidden
                                            name="id">
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    required value="{{ session()->get('email') }}"
                                                    name="email">
                                                <div class="invalid-feedback"> Please use a valid email
                                                </div>
                                                <small id="emailHelp" class="form-text text-muted">We'll
                                                    never share your email with anyone else.</small>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">Full Name</label>
                                                <input type="text" class="form-control"
                                                    id="validationCustom01" required
                                                    value="{{ session()->get('name') }}" name="name">
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please provide a name field.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom03">New Password</label>
                                                <input type="password" class="form-control"
                                                    id="validationCustom03" required name="password">
                                                <div class="valid-feedback"> Password health good! </div>
                                                <div class="invalid-feedback"> Please provide a password
                                                    field.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="" id="invalidCheck" required>
                                                <label class="form-check-label" for="invalidCheck"> Agree
                                                    to terms and conditions </label>
                                                <div class="invalid-feedback"> You must agree before
                                                    submitting. </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit"  data-toggle="modal" data-target="#verticalModal">Update
                                            Profile</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
       $(document).on("submit", "#UpdateAdminSetting", function (e) {
           
           e.preventDefault();

           let formData = new FormData($('#UpdateAdminSetting')[0]);

           $.ajax({
               method: "post",
               url: "/dashboard/profile-overview-store",
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
                    // $('#UpdateAdminSetting').find('input').val('');
                    image_label.style.background = `linear-gradient(45deg, #8b2cff, #5C00CE)`;
                    image_label.querySelector('.fe-user').style.display = "block";
                    $(".alert-success").removeClass('d-none');
                 }

               }
           });

       });
    });
 </script>
<script>
    let input_file = document.querySelector(".image-input");
    let image_label = document.querySelector(".profile label");
    input_file.onchange = (e) => {
        let files = e.target.files[0];
        let url = URL.createObjectURL(files);
        image_label.style.background = `url(${url}) center / cover`;
        image_label.querySelector('.fe-user').style.display = "none";
    }
</script>
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection
