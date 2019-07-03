@extends('layouts.app',['title'=>'Jobs and Events'])

@section('headerMenu')
  <router-link :to="{ name: 'jobIndex'}" class="btn btn-sm btn-neutral">
    <span class="btn-inner--icon"><i class="fas fa-list-ul"></i></span>
    <span class="btn-inner--text">Jobs</span>
  </router-link>
  <router-link :to="{ name: 'jobCreate' }" class="btn btn-sm btn-neutral">
    <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
    <span class="btn-inner--text">Create Job</span>
  </router-link>
  <router-link :to="{ name: 'allEvent' }" class="btn btn-sm btn-neutral">
    <span class="btn-inner--icon"><i class="fas fa-calendar-alt"></i></span>
    <span class="btn-inner--text">List All Events</span>
  </router-link>
@endsection

@section('content')

  <!-- contents from vue js -->
  <router-view v-bind:job_types="{{ json_encode(config('settings.job_types'))}}" v-bind:job_statuses="{{ json_encode(config('settings.job_statuses'))}}"></router-view>
  
@endsection

@push('vueScripts')

  <script src="{{asset('system')}}/vue/jobs.js"></script>

@endpush