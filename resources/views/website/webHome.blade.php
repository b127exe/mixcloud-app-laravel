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

        .like__btn {
            width: 100%;
            padding: 10px 15px;
            background: #7300ff;
            font-size: 18px;
            border-radius: 5px;
            color: #e8efff;
            outline: none;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}
    <div class="modal fade" id="AddPlaylist" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Playlist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                        <strong class="text-dark">Your playlist add successfully</strong><button type="button"
                            class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('/mixcloud/add-playlist-store') }}" method="post" id="AddPlaylistForm">
                        @csrf
                        <h2 class="text-center">Add Playlist</h2>
                        <hr>
                        <div class="form-group">
                            <label>Playlist Name</label>
                            <input class="form-control" type="text" placeholder="Use # Instead" name="name">
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <Textarea class="form-control" rows="2" id="text-area" name="bio"></Textarea>
                        </div>
                        <button type="submit" class="btn-custom">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="header__logo">
                        <a href=""><img src="{{ url('/assets/logo/logo-2.png') }}"></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="/mixcloud">Home</a></li>
                                <li><a href="/mixcloud/all-songs">Songs</a></li>
                                <li><a href="/mixcloud/all-videos">Videos</a></li>
                                <li><a href="#">Playlist</a>
                                    <ul class="dropdown">
                                        <li><a href="" data-toggle="modal" data-target="#AddPlaylist">Add
                                                Playlist</a></li>
                                        <li><a href="/mixcloud/all-playlist">All Playlist</a></li>
                                    </ul>
                                </li>
                                <li><a href="/mixcloud/about">About</a></li>
                                <li><a href="/mixcloud/contact">Contact</a></li>
                                <li><a href="/mixcloud/all-reviews">Reviews</a></li>
                                <li><a href="#"><i class="fa fa-user"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="/mixcloud/setting">Setting</a></li>
                                        <li><a href="/logout">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        {{-- <div class="header__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div> --}}

                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero spad set-bg" data-setbg="{{ url('/web-img/hero-bg.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <span>New single</span>
                        <h1>Feel the heart beats</h1>
                        <div class="footer__newslatter">
                            <form action="{{ url('/mixcloud/search-content') }}" method="GET">
                                <select name="table">
                                    <option selected>---Select---</option>
                                    <option value="songs">Songs</option>
                                    <option value="videos">Videos</option>
                                </select>
                                <input type="text" placeholder="Searching..." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="linear__icon">
            <i class="fa fa-angle-double-down"></i>
        </div>
    </section>
    <!-- Hero Section End -->




    <!-- Event Section Begin  Also Latest Artist-->
    <section class="event spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Popular Artists</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="event__slider owl-carousel">
                    @foreach ($artist as $item)
                        <div class="col-lg-4">
                            <div class="event__item">
                                <div class="event__item__pic set-bg"
                                    data-setbg="{{ url('/storage/artist-images') }}/{{ $item->artist_picture }}">
                                </div>
                                <div class="event__item__text">
                                    <h4>{{ $item->artist_name }}</h4>
                                    <p><i class="fa fa-music"></i>Mixcloud Artist</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Event Section End -->

    <!-- Track Section Begin Music Tracks -->
    <section class="track spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-title">
                        <h2>Latest tracks</h2>
                        <h1>Music podcast</h1>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="track__all">
                        <a href="/mixcloud/all-songs" class="primary-btn border-btn">View all tracks</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 p-0">
                    <div class="track__content nice-scroll">
                        @foreach ($songs as $item)
                            <div class="single_player_container">
                                <div class="d-flex justify-content-between">
                                    <h4>{{ $item->title }}</h4>
                                    <span class="mr-5">Track #{{ $item->track }}</span>
                                </div>
                                <audio src="storage/songs/{{ $item->song_path }}" controls
                                    style="width: 90%"></audio>
                                <div class="d-flex justify-content-between">
                                    <a href="/mixcloud/song-to-playlist/{{ $item->sid }}"><button type="button"
                                            style="background: #f1f2f4; border-radius: 30px;" class="btn-custom"><i
                                                class="fa fa-plus"></i> Add to playlist</button></a>
                                    <a href="/mixcloud/song-review/{{ $item->sid }}"
                                        style="background: #f1f2f4; border-radius: 30px;" class="btn-custom mr-5"><i
                                            class="fa fa-star"></i>
                                        Review</a>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-5 p-0">
                    <div class="track__pic">
                        <img src="{{ url('/web-img/track-right.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Track Section End -->

    <!-- Youtube Section Begin -->
    <section class="youtube spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Videos feed</h2>
                        <h1>Latest videos</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($videos as $items)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="youtube__item">
                            <div class="youtube__item__pic set-bg" data-setbg="/web-img/youtube/youtube-2.jpg">
                                <a href="" data-toggle="modal"
                                    data-target="#verticalModal{{ $items->vid }}" class="play-btn"><i
                                        class="fa fa-play"></i></a>

                            </div>
                            <div class="youtube__item__text">
                                <h4>{{ $items->title }}</h4>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="/mixcloud/video-to-playlist/{{ $items->vid }}"><button type="button"
                                        style="background: #f1f2f4; border-radius: 30px;"
                                        class="btn-custom mb-3 ml-3"><i class="fa fa-plus"></i> Add to
                                        playlist</button></a>
                                <a href="/mixcloud/video-review/{{ $items->vid }}"><button type="button" style="background: #f1f2f4; border-radius: 30px;" class="btn-custom mb-3 mr-3"><i class="fa fa-star"></i> Review</button></a>
                            </div>
                        </div>
                        <div class="modal fade" id="verticalModal{{ $items->vid }}" tabindex="-1" role="dialog"
                            aria-labelledby="verticalModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="verticalModalTitle">Video</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <video src="storage/videos/{{ $items->video_path }}" width="100%"
                                            controls></video>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn mb-2 btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Youtube Section End -->

    <!-- Countdown Section Begin -->
    <section class="countdown spad set-bg" data-setbg="/web-img/countdown-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="countdown__text">
                        <h1>Music Podcast 2023</h1>
                    </div>
                </div>
            </div>
    </section>
    <!-- Countdown Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad set-bg" data-setbg="/web-img/footer-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer__address">
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p>Phone</p>
                                <h6>1-677-124-44227</h6>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <p>Email</p>
                                <h6>mixcloud@gmail.com</h6>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-6">
                    <div class="footer__social">
                        <h2>Mixcloud</h2>
                        <div class="footer__social__links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6">
                    <div class="footer__newslatter">
                        <h4>Stay With me</h4>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer__copyright__text">
                <p>Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This Website is made by Bilal</a>
                </p>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

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
        $(document).ready(function() {
            $(document).on("submit", "#AddPlaylistForm", function(e) {

                e.preventDefault();

                let formData = new FormData($('#AddPlaylistForm')[0]);

                $.ajax({
                    method: "post",
                    url: "/mixcloud/add-playlist-store",
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
                            $('#AddPlaylistForm').find('input').val('');
                            let textarea = document.getElementById('text-area');
                            textarea.value = "";
                            $(".alert-success").removeClass('d-none');
                        }

                    }
                });

            });
        });
    </script>

</body>

</html>
