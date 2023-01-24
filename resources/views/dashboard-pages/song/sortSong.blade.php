@extends('layouts.dashboard.dashboard')
@section('link')
    <link rel="stylesheet" href="/web-css/rockville.css" type="text/css">
    <link rel="stylesheet" href="/web-css/font-awesome.min.css" type="text/css">
    <style>
        .hero__text h1 {
            font-size: 50px;
            font-family: "Rockville Solid Regular";
            color: #ffffff;
            letter-spacing: 2px;
            margin-bottom: 20px;
            margin-top: 22px;
            position: absolute;
            top: 60px;
            left: 50%;
            transform: translateX(-50%)
        }

        .track {
            padding-top: 120px;
            padding-bottom: 40px;
            overflow: hidden;
        }

        .track .section-title {
            margin-bottom: 105px;
        }

        .track__content {
            height: 502px;
            overflow-y: auto;
        }

        .track__all {
            text-align: right;
            margin-bottom: 100px;
        }

        .jp-play {
            position: relative;
            height: 50px;
            width: 50px;
            background: transparent;
            border: 2px solid #e1e1e1;
            border-radius: 50%;
        }

        .jp-play:after {
            position: absolute;
            display: block;
            left: 17px;
            top: 12px;
            width: 16px;
            height: 20px;
            background: url('/web-img/play-default.png');
            content: "";
        }

        .jp-state-playing .jp-play {
            background: #5c00ce !important;
            border-color: #5c00ce !important;
        }

        .jp-state-playing .jp-play:after {
            background: url('/web-img/pause.png') !important;
            left: 15px;
            top: 12px;
        }

        .jp-audio .jp-play:focus {
            background: #5c00ce !important;
            border-color: #5c00ce !important;
        }

        .jp-audio .jp-play:focus:after {
            background: url("/web-img/play.png");
        }

        .jp-seek-bar>div {
            height: 5px;
            background: #e1e1e1;
            cursor: pointer;
            width: 245px;
        }

        .player_bars {
            width: 350px;
            display: table;
            padding-left: 50px;
            position: relative;
            padding-top: 25px;
            float: left;
            margin-right: 30px;
        }

        .jp-play-bar {
            position: relative;
            height: 100%;
            background: #5c00ce;
            overflow: visible !important;
        }

        .jp-current-time {
            font-size: 15px;
            color: #111111;
            position: absolute;
            left: -50px;
            top: -9px;
        }

        .jp-duration {
            font-size: 15px;
            color: #111111;
            position: absolute;
            right: 0;
            top: 16px;
        }

        .player_controls_box {
            width: 50px;
            float: left;
            margin-right: 20px;
        }

        .jp-mute {
            font-size: 18px;
            border: none;
            background: none;
            color: #111111;
            position: absolute;
            left: 0;
            top: 13px;
        }

        .jp-volume-bar {
            height: 5px;
            width: 70px;
            background: #e1e1e1;
            cursor: pointer;
        }

        .jp-volume-bar-value {
            background: #5c00ce;
            height: 100%;
        }

        .jp-volume-controls {
            position: relative;
            width: 95px;
            float: left;
            padding-left: 30px;
            padding-top: 25px;
        }

        .single_player_container {
            overflow: hidden;
            margin-bottom: 40px;
        }

        .single_player_container:last-child {
            margin-bottom: 0;
        }

        .single_player_container h4 {
            font-size: 26px;
            color: #111111;
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .track__pic {
            position: relative;
            z-index: 1;
        }

        .track__pic:after {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: #f5f5f5;
            content: "";
            z-index: -1;
        }

        .track__pic img {
            position: relative;
            top: -50px;
            width: calc(100% - 40px);
            margin-left: 40px;
            height: 502px;
        }
    </style>
@endsection
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
                        <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Add Video</span>
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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Songs</h2>
                <p class="text-muted">Go sort any song</p>
                <div class="card-columns">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="py-2 mb-2">
                                <img src="/storage/album-covers/6v1D0MLualbum-9.png" width="100%"
                                    style="border-radius: 4px">
                                <div class="hero__text">
                                    <h1>Voicenotes</h1>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h2>We Don't Talk Anymore</h2>
                                <div class="show">
                                    <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="text-muted sr-only">Action</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="top-end"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(820px, 37px, 0px);">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <p>Artist: Charlie Puth</p>
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn mb-2 btn-outline-primary btn-block" data-toggle="modal"
                                    data-target="#verticalModal">More Details</button>
                                <!-- Modal -->
                                <div class="modal fade" id="verticalModal" tabindex="-1" role="dialog"
                                    aria-labelledby="verticalModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="verticalModalTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="single_player_container">
                                                    <h4>David Guetta Miami Ultra</h4>
                                                    <div class="jp-jplayer jplayer" data-ancestor=".jp_container_1"
                                                        data-url="/storage/songs/S0eCZNW1We-Dont-Talk-Anymore-charlie-puth.mp3"></div>
                                                    <div class="jp-audio jp_container_1" role="application" aria-label="media player">
                                                        <div class="jp-gui jp-interface">
                                                            <!-- Player Controls -->
                                                            <div class="player_controls_box">
                                                                <button class="jp-play player_button" tabindex="0"></button>
                                                            </div>
                                                            <!-- Progress Bar -->
                                                            <div class="player_bars">
                                                                <div class="jp-progress">
                                                                    <div class="jp-seek-bar">
                                                                        <div>
                                                                            <div class="jp-play-bar">
                                                                                <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                                            </div>
                                                            <!-- Volume Controls -->
                                                            <div class="jp-volume-controls">
                                                                <button class="jp-mute" tabindex="0"><i
                                                                        class="fa fa-volume-down"></i></button>
                                                                <div class="jp-volume-bar">
                                                                    <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn mb-2 btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn mb-2 btn-primary">Save changes</button>
                                            </div>
                                        </div>
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
    <script src="{{url('/web-js/jquery.jplayer.min.js')}}"></script>
    <script src="{{url('/web-js/jplayerInit.js')}}"></script>
    <script src="{{url('/web-js/main.js')}}"></script>
@endsection
