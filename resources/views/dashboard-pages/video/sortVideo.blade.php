@extends('layouts.dashboard.dashboard')
@section('link')
    <link rel="stylesheet" href="/web-css/rockville.css" type="text/css">
    <style>
        .hero__text {
            position: relative;
        }

        .hero__text h1 {
            font-size: 50px;
            text-align: center;
            width: 100%;
            font-family: "Rockville Solid Regular";
            color: #ffffff;
            letter-spacing: 2px;
            margin-bottom: 20px;
            margin-top: 22px;
            position: absolute;
            top: -152px;
            left: 50%;
            transform: translateX(-50%)
        }

        .hero__text span {
            background: #000;
            color: #fff;
            padding: 4px;
            border-radius: 4px;
            position: absolute;
            bottom: 0px;
            left: 289px;
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
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-auto">
                <h2 class="mb-2 page-title">Videos</h2>
                <p class="card-text">Go sort any video and apply actions.</p>
            </div>
            <div class="col-auto">
                <div class="toolbar my-3">
                    <form class="form" method="GET" action="">
                        <div class="form-row justify-content-end">
                            <div class="form-group col-auto">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" required
                                        placeholder="Search by name">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card-columns">
                    @foreach ($videos as $items)
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="py-2 mb-2">
                                    <img src="/storage/album-covers/{{ $items->cover_picture }}" width="100%"
                                        style="border-radius: 4px">
                                    <div class="hero__text">
                                        <h1>{{ $items->album_name }}</h1>
                                        <span>0{{$items->duration}}:00</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h2>{{ $items->title }}</h2>
                                    <div class="show">
                                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="top-end"
                                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(820px, 37px, 0px);">
                                            <a class="dropdown-item" href="{{url('/dashboard/update-video')}}/{{ $items->vid }}">Edit</a>
                                            <a class="dropdown-item"
                                                href="{{ url('/dashboard/delete-video') }}/{{ $items->vid }}">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <p>Album artist: {{ $items->artist_name }}</p>
                                <div class="d-flex justify-content-between">
                                    <!-- for details -->
                                    <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                                        data-target="#verticalModal{{ $items->vid }}"><span
                                            class="fe fe-chevrons-up fe-16 mr-2"></span> More Details</button>
                                    <!-- Modal for details -->
                                    <div class="modal fade" id="verticalModal{{ $items->vid }}" tabindex="-1"
                                        role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="verticalModalTitle">Song Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h2>{{ $items->title }}</h2>
                                                            <p>Video artist: {{ $items->artist_name }}</p>
                                                            <p>Album ● {{ $items->album_name }}</p>
                                                            <video width="100%"
                                                                src="{{ url('/storage/videos') }}/{{ $items->video_path }}"
                                                                controls></video>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn mb-2 btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn mb-2 btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- for lyrics -->
                                    <button type="button" class="btn mb-2 btn-primary" data-toggle="modal"
                                        data-target="#verticalLyricsModal{{ $items->vid }}"><span
                                            class="fe fe-clipboard fe-16 mr-2"></span>See Lyrics</button>
                                    <!-- Modal for lyrics-->
                                    <div class="modal fade" id="verticalLyricsModal{{ $items->vid }}" tabindex="-1"
                                        role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="verticalModalTitle">Video Description</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body"
                                                    style="height: 400px;overflow: hidden;overflow-y: scroll">
                                                    <p>{{ $items->description }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn mb-2 btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
