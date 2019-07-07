@extends('layouts.app',['title'=>'Jobs and Events'])

@section('headerMenu')
  <headermenu></headermenu>
@endsection

@section('content')

  <!-- contents from vue js -->
  <router-view v-bind:job_types="{{ json_encode(config('settings.job_types'))}}" v-bind:job_statuses="{{ json_encode(config('settings.job_statuses'))}}" v-bind:job_statuses_menu="{{ json_encode(config('settings.job_statuses_menu'))}}"></router-view>
  
@endsection

@push('vueScripts')

  <script src="{{asset('system')}}/vue/jobs.js"></script>

@endpush