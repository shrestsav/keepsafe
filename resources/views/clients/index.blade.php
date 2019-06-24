@extends('layouts.app',['title'=>'Clients'])

@section('headerMenu')
  <router-link to="/" class="btn btn-sm btn-neutral">
    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
    <span class="btn-inner--text">Client List</span>
  </router-link>
  <router-link to="/create" class="btn btn-sm btn-neutral">
    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
    <span class="btn-inner--text">Add Client</span>
  </router-link>
@endsection

@section('content')

  <!-- contents from vue js -->
  <router-view v-bind:states="{{ json_encode(config('settings.states'))}}"></router-view>

@endsection

@push('vueScripts')

  <script src="{{asset('system')}}/vue/clients.js"></script>

@endpush