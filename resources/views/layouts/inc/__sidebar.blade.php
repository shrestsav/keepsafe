<div class="scrollbar-inner">
  <!-- Brand -->
  <div class="sidenav-header d-flex align-items-center">
    <a class="navbar-brand" href="{{route('dashboard')}}">
      <img src="{{asset('system')}}/img/logo.jpg" class="navbar-brand-img" alt="..." height="120%" width="120%">
    </a>
    <div class="ml-auto">
      <!-- Sidenav toggler -->
      <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
        <div class="sidenav-toggler-inner">
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar-inner">
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <!-- Nav items -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link @if ($title === 'Dashboard') active @endif" href="{{url('/')}}">
            <i class="ni ni-shop text-primary"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
            <i class="ni ni-ungroup text-orange"></i>
            <span class="nav-link-text">Attendance</span>
          </a>
          <div class="collapse" id="navbar-examples">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="/test" class="nav-link">Vue Test</a>
              </li>
              <li class="nav-item @if ($title === 'Check In / Out') active @endif">
                <a  href="{{route('attendance.index')}}" class="nav-link">Check IN/OUT</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#staff-menus" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
            <i class="ni ni-ungroup text-orange"></i>
            <span class="nav-link-text">Clients</span>
          </a>
          <div class="collapse" id="staff-menus">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="{{route('clients.index')}}" class="nav-link  @if ($title === 'Clients') active @endif">List</a>
              </li>
              <li class="nav-item">
                <a  href="{{route('clients.index')}}/#create" class="nav-link">Create</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link @if ($title === 'Staffs') active @endif" href="{{route('staffs.index')}}">
            <i class="ni ni-archive-2 text-green"></i>
            <span class="nav-link-text">Staffs</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link @if ($title === 'Jobs') active @endif" href="{{route('jobs.index')}}">
            <i class="ni ni-archive-2 text-green"></i>
            <span class="nav-link-text">Jobs</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>