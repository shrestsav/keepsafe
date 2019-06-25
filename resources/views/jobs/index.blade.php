@extends('layouts.app',['title'=>'Jobs'])

@section('headerMenu')
  <router-link :to="{ name: 'jobIndex'}" class="btn btn-sm btn-neutral">
    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
    <span class="btn-inner--text">Jobs</span>
  </router-link>
  <router-link :to="{ name: 'jobCreate', params:{type:'create'} }" class="btn btn-sm btn-neutral">
    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
    <span class="btn-inner--text">Create Job</span>
  </router-link>
@endsection

@section('content')

  <!-- contents from vue js -->
  <router-view v-bind:job_types="{{ json_encode(config('settings.job_types'))}}" v-bind:job_statuses="{{ json_encode(config('settings.job_statuses'))}}"></router-view>
  
@endsection

@push('vueScripts')

  <script src="{{asset('system')}}/vue/jobs.js"></script>

@endpush