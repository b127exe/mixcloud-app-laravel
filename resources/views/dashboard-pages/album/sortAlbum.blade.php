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
        <div class="row justify-content-between">
            <div class="col-auto">
                <h2 class="mb-2 page-title">Albums</h2>
                <p class="card-text">Go sort any record and apply actions.</p>
            </div>
            <div class="col-auto">
                <div class="toolbar">
                    <form class="form" method="GET" action="">
                      <div class="form-row justify-content-end">
                        <div class="form-group col-auto">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Search...">
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
                    @foreach ($album as $items)
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="py-2">
                                    <img src="/storage/album-covers/{{ $items->cover_picture }}" width="100%"
                                        style="border-radius: 4px">
                                </div>
                                <div class="d-flex justify-content-between my-2">
                                    <h2>{{ $items->album_name }}</h2>
                                    <div class="show">
                                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="top-end"
                                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(820px, 37px, 0px);">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="{{url('/dashboard/delete-album')}}/{{$items->album_id}}">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <h6>Album ● {{ $items->artist_name }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
