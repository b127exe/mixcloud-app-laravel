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
            <div class="col-12 mx-auto">
              <h2 class="h5 page-title">Mixcloud Analytics</h2>
              <p class="text-muted">This primitive is meant to make it easy to display both user-centric or activity-centric actions in your app.</p>
              <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-music text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">Songs</p>
                          <span class="h3 mb-0">{{$songs}}%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-video text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">Videos</p>
                          <span class="h3 mb-0">{{$videos}}%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-star text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col">
                          <p class="small text-muted mb-0">Artists</p>
                          <div class="row align-items-center no-gutters">
                            <div class="col-auto">
                              <span class="h3 mr-2 mb-0">{{$allArtists}}%</span>
                            </div>
                            <div class="col-md-12 col-lg">
                              <div class="progress progress-sm mt-2" style="height:3px">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$allArtists}}%" aria-valuenow="{{$allArtists}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-users text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col">
                          <p class="small text-muted mb-0">Users</p>
                          <span class="h3 mb-0">{{$users}}</span>
                          <span class="small text-success"> accounts</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

             <div class="row">
              <div class="col-md-6 col-xl-6 mb-4">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-lg bg-primary">
                          <i class="fe fe-16 fe-book-open text-white mb-0" style="font-size: 42px;"></i>
                        </span>
                      </div>
                      <div class="col">
                        <p class="small text-muted mb-0">Albums</p>
                        <div class="row align-items-center no-gutters">
                          <div class="col-auto">
                            <span class="h3 mr-2 mb-0">{{$albums}}%</span>
                          </div>
                          <div class="col-md-12 col-lg">
                            <div class="progress progress-sm mt-2" style="height:3px">
                              <div class="progress-bar bg-success" role="progressbar" style="width: {{$albums}}%" aria-valuenow="{{$albums}}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-6 mb-4">
                <div class="card shadow">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-3 text-center">
                        <span class="circle circle-lg bg-primary">
                          <i class="fe fe-16 fe-folder text-white mb-0" style="font-size: 42px;"></i>
                        </span>
                      </div>
                      <div class="col">
                        <p class="small text-muted mb-0">Playlists</p>
                        <div class="row align-items-center no-gutters">
                          <div class="col-auto">
                            <span class="h3 mr-2 mb-0">{{$playlists}}%</span>
                          </div>
                          <div class="col-md-12 col-lg">
                            <div class="progress progress-sm mt-2" style="height:3px">
                              <div class="progress-bar bg-success" role="progressbar" style="width: {{$playlists}}%" aria-valuenow="{{$playlists}}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             </div>

             <div class="my-4">
              <div id="lineChart"></div>
            </div>
            </div>
        </div>
        
    </div>
@endsection
@section('script')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection