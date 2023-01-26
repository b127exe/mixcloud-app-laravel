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