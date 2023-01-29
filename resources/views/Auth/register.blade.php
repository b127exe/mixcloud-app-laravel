<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Mixcloud | Register</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{url('/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{url('/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{url('/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{url('/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{url('/css/app-dark.css')}}" id="darkTheme" disabled>
    <style>
        body{
            overflow: hidden;
        }
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
    </style>
  </head>
  <body class="light ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form class="col-lg-6 col-md-8 col-10 mx-auto" method="POST" action="{{url('/register-store')}}" enctype="multipart/form-data">
            @csrf
          <div class="mx-auto text-center my-4">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="">
                <img src="{{url('/assets/logo/logo-1.png')}}" width="100">
            </a>
            <h2 class="my-3">Register</h2>
          </div>
          <div class="form-row justify-content-center">
            <div class="profile">
                <label>
                    <span class="fe fe-user"></span>
                    <span class="fe fe-camera"></span>
                    <input type="file" class="image-input" name="img">
                </label>
            </div>
        </div>
          <div class="form-group">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email">
          </div>
          <div class="form-group">
              <label for="firstname">Full Name</label>
              <input type="text" id="firstname" class="form-control" name="name">         
          </div>
          <div class="row mb-4">
            <div class="col-md-12">
              <div class="form-group">
                <label for="inputPassword5">Password</label>
                <input type="password" class="form-control" id="inputPassword5" name="password">
              </div>
            </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
          <div class="d-flex justify-content-between mt-3">
              <p class="text-muted text-center">Copyright © 2023</p>
              <p>Don't have an account? <a href="/login">Register</a></p>
        </div>
        </form>
      </div>
    </div>
    <script src="{{url('/js/jquery.min.js')}}"></script>
    <script src="{{url('/js/popper.min.js')}}"></script>
    <script src="{{url('/js/moment.min.js')}}"></script>
    <script src="{{url('/js/bootstrap.min.js')}}"></script>
    <script src="{{url('/js/simplebar.min.js')}}"></script>
    <script src='{{url('/js/daterangepicker.js')}}'></script>
    <script src='{{url('/js/jquery.stickOnScroll.js')}}'></script>
    <script src="{{url('/js/tinycolor-min.js')}}"></script>
    <script src="{{url('/js/config.js')}}"></script>
    <script src="{{url('/js/apps.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
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
  </body>
</html>
</body>
</html>