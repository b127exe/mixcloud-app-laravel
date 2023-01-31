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
                        <a class="nav-link pl-3" href="/dashboard/sort-video"><span class="ml-1 item-text">Sort Videos</span>
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
            <div class="col-md-12 ">
                <div class="row align-items-center my-3">
                    <div class="col">
                      <h2 class="page-title">Playlists</h2>
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
                <hr class="my-3">
                <div class="row my-4 pb-4">
                    @foreach ($playlist as $items)
                    <div class="col-md-3">
                      <div class="card shadow text-center mb-4">
                        <div class="card-body file">
                          <div class="file-action">
                            <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu m-2">
                              <a class="dropdown-item" href="/dashboard/update-playlist/{{$items->pid}}"><i class="fe fe-edit-3 fe-12 mr-4"></i>Edit</a>
                            </div>
                          </div>
                          <div class="circle circle-lg bg-light my-4">
                            <span class="fe fe-music fe-24 text-success"></span>
                          </div>
                          <div class="file-info">
                            <span class="badge badge-light text-muted mr-2">Playlist by {{$items->name}}</span>
                          </div>
                        </div> 
                        <div class="card-footer bg-transparent border-0 fname">
                          <strong>{{$items->playlist_name}}</strong>
                        </div> 
                      </div>
                    </div> 
                    @endforeach
                  </div>
            </div>
        </div>
    </div>
@endsection