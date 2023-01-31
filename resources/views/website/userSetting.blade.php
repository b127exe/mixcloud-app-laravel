<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mixcloud | Setting</title>
     <!-- Simple bar CSS -->
     <link rel="stylesheet" href="{{url('/css/simplebar.css')}}">
     <!-- Fonts CSS -->
     <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
     <!-- Icons CSS -->
     <link rel="stylesheet" href="{{url('/css/feather.css')}}">
     <link rel="stylesheet" href="{{url('/css/dataTables.bootstrap4.css')}}">
     <link rel="stylesheet" href="{{url('/css/select2.css')}}">
     <link rel="stylesheet" href="{{url('/css/dropzone.css')}}">
     <link rel="stylesheet" href="{{url('/css/uppy.min.css')}}">
     <link rel="stylesheet" href="{{url('/css/jquery.steps.css')}}">
     <link rel="stylesheet" href="{{url('/css/jquery.timepicker.css')}}">
     <link rel="stylesheet" href="{{url('/css/quill.snow.css')}}">
     <!-- Date Range Picker CSS -->
     <link rel="stylesheet" href="{{url('/css/daterangepicker.css')}}">
     <!-- App CSS -->
     <link rel="stylesheet" href="{{url('/css/app-light.css')}}" id="lightTheme">
     <link rel="stylesheet" href="{{url('/css/app-dark.css')}}" id="darkTheme" disabled>
</head>
<body class="vertical light">
    
    <div class="wrapper">
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
            <strong class="text-dark">Your record add successfully</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

      <main role="main">

        <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-10 col-xl-8">
                <a href="/mixcloud"><button type="button" class="btn btn-primary my-4"><span class="fe fe-arrow-left fe-16 mr-2"></span>Go Back</button></a>
                <div class="card shadow mt-5">
                  <div class="card-body">
                <h2 class="h3 mb-4 page-title text-center">Profile</h2><hr class="my-2">
                <div class="my-4">
                  <form>
                    @csrf
                    <div class="row mt-5 align-items-center">
                      <div class="col-md-3 text-center mb-5">
                        <div class="avatar avatar-xl">
                          <img src="{{url('/storage/users-images')}}/{{session()->get('photo')}}" alt="..." class="avatar-img rounded-circle">
                        </div>
                      </div>
                      <div class="col">
                        <div class="row align-items-center">
                          <div class="col-md-7">
                            <h4 class="mb-1">{{session()->get('name')}}</h4>
                            <p class="small mb-3"><span class="badge badge-dark">Karachi, Pakistan</span></p>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <div class="col-md-7">
                            <p class="text-muted">{{session()->get('email')}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div> 
              </div>
              </div>
              </div> 
            </div> 
          </div> 

      </main>

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
    <script src="{{url('/js/d3.min.js')}}"></script>
    <script src="{{url('/js/topojson.min.js')}}"></script>
    <script src="{{url('/js/datamaps.all.min.js')}}"></script>
    <script src="{{url('/js/datamaps-zoomto.js')}}"></script>
    <script src="{{url('/js/datamaps.custom.js')}}"></script>
    <script src="{{url('/js/Chart.min.js')}}"></script>
    <script src="{{url('/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{url('/js/gauge.min.js')}}"></script>
    <script src="{{url('/js/jquery.sparkline.min.js')}}"></script>
    <script src="{{url('/js/apexcharts.min.js')}}"></script>
    <script src="{{url('/js/apexcharts.custom.js')}}"></script>
    <script src="{{url('/js/jquery.mask.min.js')}}"></script>
    {{-- <script src="{{url('/js/select2.min.js')}}"></script> --}}
    <script src="{{url('/js/jquery.steps.min.js')}}"></script>
    <script src="{{url('/js/jquery.validate.min.js')}}"></script>
    <script src="{{url('/js/jquery.timepicker.js')}}"></script>
    <script src="{{url('/js/dropzone.min.js')}}"></script>
    <script src="{{url('/js/uppy.min.js')}}"></script>
    <script src="{{url('/js/quill.min.js')}}"></script>
    <script src='{{url('/ajax/ajax.min.js')}}'></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}
    @yield('script')
    <script>      
        $('.select2').select2(
          {
            theme: 'bootstrap4',
          });
          $('.select2-multi').select2(
            {
              multiple: true,
              theme: 'bootstrap4',
            });  
      $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
      $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
      /** date range picker */
      if ($('.datetimes').length)
      {
        $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
      }
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end)
      {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
      $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
      $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
      $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
      $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
      $('.input-phoneus').mask('(000) 000-0000');
      $('.input-mixed').mask('AAA 000-S0S');
      $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function()
      {
        'use strict';
        window.addEventListener('load', function()
        {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form)
          {
            form.addEventListener('submit', function(event)
            {
              if (form.checkValidity() === false)
              {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script>
      var uptarg = document.getElementById('drag-drop-area');
      if (uptarg)
      {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
        {
          endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) =>
        {
          console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
      }
    </script>
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
</body>
</html>