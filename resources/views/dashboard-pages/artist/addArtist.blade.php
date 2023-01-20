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
                  <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Add Song</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Update Song</span>
                  </a>
                </li>               
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Sort Songs</span>
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
                  <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Add Video</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Update Video</span>
                  </a>
                </li>               
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Sort Videos</span>
                  </a>
                </li>               
              </ul>
          </li>         
          </ul>
          @endif
@endsection 
@section('content-1')
<style>
    .profile{
        position: relative;
        width: 200px;
        height: 200px;
        transition: .3s ease-in-out;
    }
    /* .profile:hover{
        transform: scale(1.06);
        filter: brightness(150%)
    } */
    .profile label{
        display: inline-block;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg , #8b2cff ,#5C00CE);
        border-radius: 50%;
        border: 3px solid #fff;
        text-align: center;
        cursor: pointer;
        overflow: hidden;
        line-height: 227px;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    }
    .profile input[type="file"]{
        display: none;
    }
    .profile .fe-user{
        font-size: 12rem;
        color: rgb(212, 212, 212);
    }
    .profile label:hover .fe-camera{
        transform: translateX(-27.5%) translateY(-43.5%) scale(1.6);
    }
    .profile .fe-camera{
        position: absolute;
        bottom: 0;
        right: 15px;
        background: #fff;
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
                <h2 class="page-title">Add Artist</h2>
                <p class="text-muted">Fill the below form</p>
              <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                      <div class="card-header">
                        <strong class="card-title">Artist</strong>
                      </div>
                      <div class="card-body">
                        <form class="needs-validation" novalidate enctype="multipart/form-data">
                            <div class="form-row justify-content-center">
                                <div class="profile">
                                    <label>
                                        <span class="fe fe-user"></span>
                                        <span class="fe fe-camera"></span>
                                        <input type="file" class="image-input">
                                    </label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                  <label for="validationCustom3">Name</label>
                                  <input type="text" class="form-control" id="validationCustom3" placeholder="Enter your name" required>
                                  <div class="valid-feedback"> Looks good! </div>
                                </div>
                              </div>                    
                          <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customControlValidation16" required="">
                            <label class="custom-control-label" for="customControlValidation16"> Agree to terms and conditions</label>
                            <div class="invalid-feedback"> You must agree before submitting. </div>
                          </div>
                          <button class="btn btn-primary" type="submit">Submit form</button>
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
        input_file.onchange = (e)=>{
          let files = e.target.files[0];
          let url = URL.createObjectURL(files);
          image_label.style.background = `url(${url}) center / cover`;
          image_label.querySelector('.fe-user').style.display = "none";
        }
    </script>
@endsection