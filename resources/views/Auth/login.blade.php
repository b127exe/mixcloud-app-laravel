<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Mixcloud | Login</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ url('/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ url('/css/feather.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ url('/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ url('/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('/css/select2.css') }}">
    <link rel="stylesheet" href="{{ url('/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ url('/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ url('/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ url('/css/quill.snow.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ url('/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ url('/css/app-dark.css') }}" id="darkTheme" disabled>
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body class="light ">
  {{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div> --}}
  @if($errors->any())
  <h4>{{$errors->first()}}</h4>
  @endif
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="POST"
                action="{{ url('/login-store') }}">
                @csrf
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="">
                    <img src="{{ url('/assets/logo/logo-1.png') }}" width="100">
                </a>
                <h1 class="h6 mb-3">Sign in</h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control form-control-lg" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control form-control-lg" name="password" placeholder="Enter password">
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>
                <div class="d-flex justify-content-between mt-3">
                    <p class="text-muted text-center">Copyright © 2023</p>
                    <p>Already an account? <a href="/register">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ url('/js/jquery.min.js') }}"></script>
    <script src="{{ url('/js/popper.min.js') }}"></script>
    <script src="{{ url('/js/moment.min.js') }}"></script>
    <script src="{{ url('/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/js/simplebar.min.js') }}"></script>
    <script src='{{ url('/js/daterangepicker.js') }}'></script>
    <script src='{{ url('/js/jquery.stickOnScroll.js') }}'></script>
    <script src="{{ url('/js/tinycolor-min.js') }}"></script>
    <script src="{{ url('/js/config.js') }}"></script>
    <script src="{{ url('/js/apps.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>
</body>

</html>
