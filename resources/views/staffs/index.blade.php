@extends('layouts.app',['title'=>'Staffs'])
@section('headerMenu')
  <router-link :to="{ name:'listStaff' }" class="btn btn-sm btn-neutral">
    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
    <span class="btn-inner--text">List Staffs</span>
  </router-link>
  <router-link :to="{ name:'createStaff' }" class="btn btn-sm btn-neutral">
    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
    <span class="btn-inner--text">Add Staff</span>
  </router-link>
@endsection
@section('content')

  <!-- contents from vue js -->
  <router-view></router-view>

@endsection

@push('vueScripts')
  <script src="{{asset('system')}}/vue/staffs.js"></script>
@endpush
