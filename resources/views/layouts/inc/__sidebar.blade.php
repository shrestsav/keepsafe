<div class="scrollbar-inner">
  <!-- Brand -->
  <div class="sidenav-header d-flex align-items-center">
    <router-link :to="{ name: 'dashboard'}" >
      <a class="navbar-brand" href="{{route('dashboard')}}" :href="''" >
        <img src="{{asset('system')}}/img/logo_blue.png" class="navbar-brand-img" alt="..." height="120%" width="120%">
      </a>
    </router-link>
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
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link :to="{ name: 'dashboard'}" >
            <a class="nav-link"  href="{{url('/')}}" :href="'/'" v-bind:class="{ active: currentPage=='dashboard' }">
              <i class="ni ni-shop text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </router-link>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
            <i class="ni ni-ungroup text-orange"></i>
            <span class="nav-link-text">Attendance</span>
          </a>
          <div class="collapse" id="navbar-examples">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item @if ($title === 'Check In / Out') active @endif">
                <a  href="{{route('attendance.index')}}" class="nav-link">Check IN/OUT</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#staff-menus" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples" v-bind:class="{ active: currentMenu=='clientsMenu'}">
            <i class="fas fa-people-carry text-orange"></i>
            <span class="nav-link-text">Clients</span>
          </a>
          <div class="collapse" id="staff-menus">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <router-link :to="{ name: 'clients'}" >
                  <a href="{{url('/v/clients')}}" :href="''" class="nav-link" v-bind:class="{ active: currentPage=='clients' }">List</a>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link :to="{ name: 'createClient'}" >
                  <a href="{{url('/v/createClient')}}" :href="''" class="nav-link" v-bind:class="{ active: currentPage=='createClient' }">Create</a>
                  </router-link>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'staffs'}" >
            <a class="nav-link" href="{{url('/v/staffs')}}" :href="''" v-bind:class="{ active: currentPage=='staffs' }">
              <i class="ni ni-circle-08 text-green"></i>
              <span class="nav-link-text">Staffs</span>
            </a>
          </router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'jobs'}" >
            <a class="nav-link" href="{{url('/v/jobs')}}" :href="''" v-bind:class="{ active: currentPage=='jobs' }">
              <i class="ni ni-briefcase-24 text-green"></i>
              <span class="nav-link-text">Jobs and Events</span>
            </a>
          </router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'events'}" >
            <a href="{{url('/v/events')}}" class="nav-link vue_menus" :href="'/v/events'" v-bind:class="{ active: currentPage=='events' }">
              <i class="ni ni-spaceship text-green"></i>
              <span class="btn-inner--text">All Events</span>
            </a>
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</div>