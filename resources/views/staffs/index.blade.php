@extends('layouts.app',['title'=>'Staffs'])
@section('subMenus')
  <router-link to="/addStaff" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#add_staffs_modal">
    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
    <span class="btn-inner--text">Add Staff</span>
  </router-link>
@endsection
@section('content')

  <div class="card">
    <div class="card-header border-0">
      <div class="row">
        <div class="col-6">
          <h3 class="mb-0">Staffs</h3>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @php $i=0; @endphp
          @foreach ($staffs as $key => $staff)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $staff->name }}</td>
            <td>{{ $staff->email }}</td>
            <td>
              @if(!empty($staff->roles))
              @foreach($staff->roles as $role)
              <label class="label label-success">{{ $role->display_name }}</label>
              @endforeach
              @endif
            </td>
            <td class="table-actions" style="text-align: right;">
              <a class="btn btn-outline-info" href="{{ route('users.show',$staff->id) }}">Show</a>
              <a class="btn btn-outline-primary" href="{{ route('users.edit',$staff->id) }}">Edit</a>

              <form action="{{ url('admin/users/'.$staff->id) }}" method="POST" style="display: inline-block">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" id="delete-task-{{ $staff->id }}" class="btn btn-outline-danger"> Delete </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
        {{-- {{ $staffs->links() }}  --}}
      </table>
    </div>
  </div>
  <!-- contents from vue js -->
  <router-view></router-view>
@endsection

@push('vueScripts')
  <script src="{{asset('system')}}/vue/staffs.js"></script>
@endpush