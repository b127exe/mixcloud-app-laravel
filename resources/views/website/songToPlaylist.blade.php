<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Mixcloud">
    <meta name="keywords" content="Mixcloud, unica, creative">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mixcloud | Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('/web-css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/web-css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('/web-css/barfiller.css') }}">
    <link rel="stylesheet" href="{{ url('/web-css/nowfont.css') }}">
    <link rel="stylesheet" href="{{ url('/web-css/rockville.css') }}">
    <link rel="stylesheet" href="{{ url('/web-css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('/web-css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('/web-css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ url('/web-css/style.css') }}">
    <style>
        .btn-custom {
            color: #ffffff;
            background-color: #7300ff;
            border-color: #7300ff;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.25rem;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Playlist</h5>
                    <a href="/mixcloud/all-songs"><button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                        <strong class="text-dark">Your playlist add successfully </strong><a href="/mixcloud">Go Back</a><button type="button"
                            class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('/mixcloud/song-to-playlist-store') }}" method="POST" id="SongToPlaylistForm">
                        @csrf
                        <h2 class="text-center">Add to Playlist</h2>
                        <hr>
                        <div class="form-group">
                            <label>Choose Playlist</label>
                           <select name="playlistId" class="form-control">
                             @foreach ($playlist as $items)
                                 <option value="{{$items->pid}}">{{$items->playlist_name}}</option>
                             @endforeach
                           </select>
                        </div>
                        <input type="text" value="{{$id}}" name="id" hidden>
                        <button type="submit" class="btn-custom">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="/mixcloud/all-songs"><button type="button" class="btn mb-2 btn-secondary">Close</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Js Plugins -->
    <script src="{{ url('/web-js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('/web-js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/web-js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('/web-js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('/web-js/jquery.barfiller.js') }}"></script>
    <script src="{{ url('/web-js/jquery.countdown.min.js') }}"></script>
    <script src="{{ url('/web-js/jquery.slicknav.js') }}"></script>
    <script src="{{ url('/web-js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('/web-js/main.js') }}"></script>

    <!-- Music Plugin -->
    <script src="{{ url('/web-js/jquery.jplayer.min.js') }}"></script>
    <script src="{{ url('/web-js/jplayerInit.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>
       <script>
        $(document).ready(function() {
            $(document).on("submit", "#SongToPlaylistForm", function(e) {

                e.preventDefault();

                let formData = new FormData($('#SongToPlaylistForm')[0]);

                $.ajax({
                    method: "post",
                    url: "/mixcloud/song-to-playlist-store",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        if (response.status == 400) {

                            $('#save_error').html("");
                            $('#save_error').removeClass("d-none");
                            $.each(response.errors, function(key, err_value) {

                                $('#save_error').append(`<p>${err_value}</p>`);

                            });

                        } else if (response.status == 200) {

                            $('#save_error').html("");
                            $('#save_error').addClass("d-none");
                            // this.reset();
                            $('#SongToPlaylistForm').find('input').val('');
                            $(".alert-success").removeClass('d-none');
                        }

                    }
                });

            });
        });
    </script>
</body>

</html>
