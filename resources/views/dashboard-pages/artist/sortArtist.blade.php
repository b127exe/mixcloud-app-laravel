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
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">All Artists</h2>
                <p class="card-text">Go sort any record and apply actions.</p>
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                           <div class="card-body">
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
                            <table class="table table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Artist Image</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                               @foreach ($artist as $item)
                                  <tr>
                                    <td>{{$item->artist_id}}</td>
                                    <td><img src="/storage/artist-images/{{$item->artist_picture}}" width="50px" style="border-radius: 50%;"></td>
                                    <td>{{$item->artist_name}}</td>
                                    <td>
                                      <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                                          <a class="edit_btn dropdown-item" href="">Edit</a>
                                          <a class="delete_btn dropdown-item" href="{{url('/dashboard/delete-artist')}}/{{$item->artist_id}}">Delete</a>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
@endsection
