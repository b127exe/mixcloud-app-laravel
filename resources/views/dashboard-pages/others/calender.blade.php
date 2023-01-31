@extends('layouts.dashboard.dashboard')
@section('link')
<link rel="stylesheet" href="{{url('/css/fullcalendar.css')}}">
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
            <div class="col-12">
                <div class="row align-items-center my-3">
                  <div class="col">
                    <h2 class="page-title">Calendar</h2>
                  </div>
                  <div class="col-auto">
                    <button type="button" class="btn" data-toggle="modal" data-target=".modal-calendar"><span class="fe fe-filter fe-16 text-muted"></span></button>
                  </div>
                </div>
                <div id='calendar'></div>
              </div>
        </div>
    </div>
@endsection
@section('script')
<script src='{{url('/js/fullcalendar.js')}}'></script>
<script src='{{url('/js/fullcalendar.custom.js')}}'></script>
<script>
var calendarEl = document.getElementById('calendar');
if (calendarEl)
{
  document.addEventListener('DOMContentLoaded', function()
  {
    var calendar = new FullCalendar.Calendar(calendarEl,
    {
      plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap'],
      timeZone: 'UTC',
      themeSystem: 'bootstrap',
      header:
      {
        left: 'today, prev, next',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      buttonIcons:
      {
        prev: 'fe-arrow-left',
        next: 'fe-arrow-right',
        prevYear: 'left-double-arrow',
        nextYear: 'right-double-arrow'
      },
      weekNumbers: true,
      eventLimit: true, // allow "more" link when too many events
      events: 'https://fullcalendar.io/demo-events.json'
    });
    calendar.render();
  });
}
</script>
@endsection